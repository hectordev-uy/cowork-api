<?php

namespace App\Http\Controllers;

use App\Http\Resources\ReservResource;
use App\Services\ReservService;
use App\Services\SpaceService;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ReservController extends Controller
{
    protected ReservService $reservService;
    protected SpaceService $spaceService;

    public function __construct(ReservService $reservService, SpaceService $spaceService) 
    {
        $this->reservService = $reservService;
        $this->spaceService = $spaceService;
    }

    public function store(Request $request)
    {
        $request->validate([
            'space_id' => 'required|integer|min:1|exists:spaces,id',
            'start_date' => ['required', 'datetime'],
            'end_date' => ['required', 'datetime'], 
        ]);

        $data = $request->all();

        try
        {
            $space_price = $this->spaceService->byId($data['space_id'])->price;

            $data['user_id'] = $request->user()->id;
            $data['total_price'] = $this->getTotalPrice($data, $space_price);
            
            $reserv = $this->reservService->create($data, $space_price);

            return response()->json([
                'message' => 'Reserved',
                'data' => new ReservResource($reserv)
            ]);
        } catch (Exception $ex) {
            info($ex->getMessage());
            return response()->json([
                'error' => 'Error on process reserv'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function update(Request $request, int $id)
    {
        $request->merge(['id' => $id]);

        $request->validate([
            'id' => 'required|integer|min:1|exists:reservations,id',
            'start_date' => ['required', 'datetime'],
            'end_date' => ['required', 'datetime'],
            'status' => 'required|string|in:available,booked,canceled'
        ]);

        $data = $request->all();

        try {
            $reserv = $this->reservService->byId($data['id']);
            $space_price = $this->spaceService->byId($reserv->space_id)->price;

            $data['total_price'] = $this->getTotalPrice($data, $space_price);
            
            $reserv = $this->reservService->update($reserv, $data);

            return response()->json([
                'message' => 'Reserv updated',
                'data' => new ReservResource($reserv)
            ]);
        } catch (Exception $ex) {   
            info($ex->getMessage());
            return response()->json([
                'error' => 'Error on process reserv'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    private function getTotalPrice(array $data, float $space_price) : float
    {
        $time = Carbon::parse($data['start_date'])->diffInHours(Carbon::parse($data['end_date']));
        $total_price = $space_price * $time;  

        return $total_price;
    }

}
