@extends('layout.app')

@section('content')

	<section role="main" class="content-body">
		<header class="page-header">
			<h2>Create New Trip</h2>
		
			<div class="right-wrapper pull-right">
				<ol class="breadcrumbs">
					<li>
						<a href="{{url('/')}}">
							<i class="fa fa-home"></i>
						</a>
					</li>
					<li><span>Dashboard</span></li>
				</ol>
			</div>
		</header>

		<!-- start: page -->
		<div class="row">
			
			<h1>Allocate Seats for {{ $trip->origin->name }} to {{ $trip->destination->name }} on {{ $trip->date }}</h1>

            <form action="{{ route('trips.seat-allocations.store', $trip) }}" method="post">
                @csrf

                <label for="seat_number">Select Seat:</label>
                <select name="seat_number" required>
                    @foreach($availableSeats as $seat)
                        <option value="{{ $seat }}">{{ $seat }}</option>
                    @endforeach
                </select>

                <label for="user_name">Passenger Name:</label>
                <input type="text" name="user_name" required>

                <button type="submit">Allocate Seat</button>
            </form>

            <a href="{{ route('trips.index') }}">Back to Trip List</a>
		</div>

	</section>

@endsection