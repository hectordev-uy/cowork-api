<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reserv extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = 'reservations';

    protected $fillable = [
        'space_id',
        'user_id',
        'start_date',
        'end_date',
        'status',
        'total_price',
    ];

    protected $casts = [
        'start_date' => 'date',	
        'end_date' => 'date',
        'status' => 'enum:available,booked,canceled',
    ];

    public function space()
    {
        return $this->belongsTo(Space::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }   
}
