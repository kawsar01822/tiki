<?php

namespace App\Http\Controllers;
use App\Models\Trip;
use App\Models\Location;
use App\Models\SeatAllocation;
use App\Models\Fare;
use Illuminate\Http\Request;

class TripController extends Controller
{
    public function create()
    {
        $locations = Location::all();
        return view('trips.create', compact('locations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'origin_id' => 'required|exists:locations,id',
            'destination_id' => 'required|exists:locations,id',
        ]);

        Trip::create([
            'date' => $request->input('date'),
            'origin_id' => $request->input('origin_id'),
            'destination_id' => $request->input('destination_id'),
        ]);

        return redirect()->route('trips.index')->with('success', 'Trip created successfully.');
    }

    public function index()
    {
        $trips = Trip::all();
        return view('trips.index', compact('trips'));
    }

    public function show(Trip $trip)
    {
        $fare = $this->getFare($trip->origin_id, $trip->destination_id);
        return view('trips.show', compact('trip', 'fare'));
    }

    private function getFare($originId, $destinationId)
    {
        // Fetch fare from the fare table based on origin_id and destination_id
        $fare = Fare::where('origin_id', $originId)
            ->where('destination_id', $destinationId)
            ->first();

        return $fare ? $fare->amount : 'Fare not available';
    }

    public function edit(Trip $trip)
    {
        $locations = Location::all();
        return view('trips.edit', compact('trip', 'locations'));
    }

    public function update(Request $request, Trip $trip)
    {
        $request->validate([
            'date' => 'required|date',
            'origin_id' => 'required|exists:locations,id',
            'destination_id' => 'required|exists:locations,id',
        ]);

        $trip->update([
            'date' => $request->input('date'),
            'origin_id' => $request->input('origin_id'),
            'destination_id' => $request->input('destination_id'),
        ]);

        return redirect()->route('trips.index')->with('success', 'Trip updated successfully.');
    }

    public function destroy(Trip $trip)
    {
        $trip->delete();
        return redirect()->route('trips.index')->with('success', 'Trip deleted successfully.');
    }

    public function allocateSeats(Trip $trip)
    {
        // Assuming each trip has 36 seats
        $seats = range(1, 36);

        // Get already allocated seats for the trip
        $allocatedSeats = $trip->seatAllocations->pluck('seat_number')->toArray();

        // Available seats are those not yet allocated
        $availableSeats = array_diff($seats, $allocatedSeats);

        return view('trips.allocate-seats', compact('trip', 'availableSeats'));
    }

    public function storeSeatAllocation(Request $request, Trip $trip)
    {
        $request->validate([
            'seat_number' => 'required|integer',
            'user_name' => 'required|string',
        ]);

        SeatAllocation::create([
            'trip_id' => $trip->id,
            'seat_number' => $request->input('seat_number'),
            'user_name' => $request->input('user_name'),
        ]);

        return redirect()->route('trips.index')->with('success', 'Seat allocated successfully.');
    }
}
