<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    protected $fillable = ['date', 'origin_id', 'destination_id'];

    public function origin()
    {
        return $this->belongsTo(Location::class, 'origin_id');
    }

    public function destination()
    {
        return $this->belongsTo(Location::class, 'destination_id');
    }

    public function fare()
    {
        return $this->hasOne(Fare::class, 'origin_id', 'origin_id')
            ->where('destination_id', $this->destination_id);
    }

    public function seatAllocations()
    {
        return $this->hasMany(SeatAllocation::class);
    }
}
