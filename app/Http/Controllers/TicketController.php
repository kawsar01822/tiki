<?php

namespace App\Http\Controllers;
use App\Models\Ticket;
use App\Models\Trip;
use App\Models\Fare;
use Illuminate\Http\Request;

class TicketController extends Controller
{

    public function index()
    {
        $tickets = Ticket::all();
        return view('tickets.index', compact('tickets'));
    }

    public function create()
    {
        $trips = Trip::all();
        return view('tickets.create', compact('trips'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'trip_id' => 'required|exists:trips,id',
            'user_name' => 'required|string',
            'seat_number' => 'required|integer',
            'fare' => 'required|numeric',
        ]);

        Ticket::create($request->all());

        return redirect()->route('tickets.index')->with('success', 'Ticket created successfully.');
    }

    public function show(Ticket $ticket)
    {
        return view('tickets.show', compact('ticket'));
    }

    public function edit(Ticket $ticket)
    {
        $trips = Trip::all();
        return view('tickets.edit', compact('ticket', 'trips'));
    }

    public function update(Request $request, Ticket $ticket)
    {
        $request->validate([
            'trip_id' => 'required|exists:trips,id',
            'user_name' => 'required|string',
            'seat_number' => 'required|integer',
            'fare' => 'required|numeric',
        ]);

        $ticket->update($request->all());

        return redirect()->route('tickets.index')->with('success', 'Ticket updated successfully.');
    }

    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return redirect()->route('tickets.index')->with('success', 'Ticket deleted successfully.');
    }
}
