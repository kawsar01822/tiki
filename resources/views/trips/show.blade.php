@extends('layout.app')

@section('content')

	<section role="main" class="content-body">
		<header class="page-header">
			<h2>Trip Details</h2>
		
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
			
			<h1>Trip Details</h1>

            <p>Origin: {{ $trip->origin->name }}</p>
            <p>Destination: {{ $trip->destination->name }}</p>
            <p>Date: {{ $trip->date }}</p>
            <p>Fare: {{ $trip->fare ? $trip->fare->amount : 'Fare not available' }}</p>

            <!-- Display seat allocations if needed -->
            @if($trip->seatAllocations->isNotEmpty())
                <h2>Seat Allocations:</h2>
                <ul>
                    @foreach($trip->seatAllocations as $allocation)
                        <li>
                            Seat Number: {{ $allocation->seat_number }} - Passenger: {{ $allocation->user_name }}
                        </li>
                    @endforeach
                </ul>
            @else
                <p>No seat allocations for this trip.</p>
            @endif

            <a href="{{ route('trips.index') }}">Back to Trip List</a>
		</div>

	</section>

@endsection