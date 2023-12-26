<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeatAllocation extends Model
{
    use HasFactory;

    protected $fillable = ['trip_id', 'seat_number', 'user_name'];

    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }

    public function getFareAmountAttribute()
    {
        return $this->trip->fare ? $this->trip->fare->amount : null;
    }
}
