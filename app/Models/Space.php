<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Space extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'name',
        'price',
    ];

    public function reservations()
    {
        return $this->hasMany(Reserv::class);
    }
}
