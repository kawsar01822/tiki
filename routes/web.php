<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\SeatAllocationController;

Route::get('/', [TripController::class,'dashboard']);
Route::resource('trips', TripController::class);
Route::get('trips/{trip}/allocate-seats', [TripController::class, 'allocateSeats'])->name('trips.allocate-seats');
Route::post('trips/{trip}/allocate-seats', [TripController::class, 'storeSeatAllocation'])->name('trips.seat-allocations.store');

Route::resource('tickets', TicketController::class);

Route::resource('seat_allocations', SeatAllocationController::class);