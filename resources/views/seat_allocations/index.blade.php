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
			
			<h1>Seat Allocations</h1>

            @if($seatAllocations->isNotEmpty())
                <table>
                    <thead>
                        <tr>
                            <th>Trip</th>
                            <th>Origin</th>
                            <th>Destination</th>
                            <th>Fare</th>
                            <th>Seat Number</th>
                            <th>User Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($seatAllocations as $allocation)
                            <tr>
                                <td>{{ $allocation->trip->origin->name }} to {{ $allocation->trip->destination->name }}</td>
                                <td>{{ $allocation->trip->origin->name }}</td>
                                <td>{{ $allocation->trip->destination->name }}</td>
                                <td>{{ $allocation->trip->fare ? $allocation->trip->fare->amount : 'Fare not available' }}</td>
                                <td>{{ $allocation->seat_number }}</td>
                                <td>{{ $allocation->user_name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>No seat allocations available.</p>
            @endif
		</div>

	</section>

@endsection