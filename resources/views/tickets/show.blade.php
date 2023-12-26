@extends('layout.app')

@section('content')

	<section role="main" class="content-body">
		<header class="page-header">
			<h2>Ticket Details</h2>
		
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
			
			<h1>Ticket Details</h1>

            <p>Trip: {{ $ticket->trip->origin->name }} to {{ $ticket->trip->destination->name }} on {{ $ticket->trip->date }}</p>
            <p>Passenger: {{ $ticket->user_name }}</p>
            <p>Seat Number: {{ $ticket->seat_number }}</p>
            <p>Fare: {{ $ticket->fare }}</p>

            <a href="{{ route('tickets.index') }}">Back to Ticket List</a>
		</div>

	</section>

@endsection