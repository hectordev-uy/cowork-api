<?php

namespace App\Services;

use App\Models\Reserv;
use Carbon\Carbon;

class ReservService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function create(array $data) : Reserv
    {
        return Reserv::create([
            'space_id' => $data['space_id'],
            'user_id' => $data['user_id'],
            'start_date' => Carbon::parse($data['start_date']),
            'end_date' => Carbon::parse($data['end_date']),
            'status' => 'booked',
            'total_price' => $data['total_price'],
        ]);
    }

    public function byId(int $id) : Reserv | null
    {
        return Reserv::findOrFail($id);
    }

    public function update(Reserv $reserv, $data) : Reserv
    {
        $reserv->start_date = Carbon::parse($data['start_date']);
        $reserv->end_date = Carbon::parse($data['end_date']);
        $reserv->status = $data['status'];
        $reserv->total_price = $data['total_price'];
        $reserv->save();

        return $reserv;
    }
}
