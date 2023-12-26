<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = ['trip_id', 'user_name', 'seat_number', 'fare'];

    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }
}
