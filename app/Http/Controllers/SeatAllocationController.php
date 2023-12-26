<?php

namespace App\Http\Controllers;
use App\Models\SeatAllocation;
use Illuminate\Http\Request;

class SeatAllocationController extends Controller
{
    public function index()
    {
        $seatAllocations = SeatAllocation::with('trip.origin', 'trip.destination', 'trip.fare')->get();
        return $seatAllocations;
        // return view('seat_allocations.index', compact('seatAllocations'));
    }
}
