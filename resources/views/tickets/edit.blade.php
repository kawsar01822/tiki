@extends('layout.app')

@section('content')

	<section role="main" class="content-body">
		<header class="page-header">
			<h2>Book Tickets</h2>
		
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
			
			<h1>Edit Ticket</h1>

            <form action="{{ route('tickets.update', $ticket) }}" method="post">
                @csrf
                @method('PUT')

                <label for="trip_id">Trip:</label>
                <select name="trip_id" required>
                    @foreach($trips as $trip)
                        <option value="{{ $trip->id }}" {{ $ticket->trip_id == $trip->id ? 'selected' : '' }}>
                            {{ $trip->origin->name }} to {{ $trip->destination->name }} on {{ $trip->date }}
                        </option>
                    @endforeach
                </select>

                <label for="user_name">Passenger Name:</label>
                <input type="text" name="user_name" value="{{ $ticket->user_name }}" required>

                <label for="seat_number">Seat Number:</label>
                <input type="number" name="seat_number" value="{{ $ticket->seat_number }}" required>

                <label for="fare">Fare:</label>
                <input type="number" name="fare" value="{{ $ticket->fare }}" required>

                <button type="submit">Update Ticket</button>
            </form>

            <a href="{{ route('tickets.index') }}">Back to Ticket List</a>
		</div>

	</section>

@endsection