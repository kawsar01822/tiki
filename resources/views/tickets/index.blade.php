@extends('layout.app')

@section('content')

	<section role="main" class="content-body">
		<header class="page-header">
			<h2>Ticket List</h2>
		
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
			
			<h1>Ticket List</h1>

            <a href="{{ route('tickets.create') }}">Create New Ticket</a>

            <ul>
                @forelse($tickets as $ticket)
                    <li>
                        Trip: {{ $ticket->trip->origin->name }} to {{ $ticket->trip->destination->name }} on {{ $ticket->trip->date }}<br>
                        Passenger: {{ $ticket->user_name }}<br>
                        Seat Number: {{ $ticket->seat_number }}<br>
                        Fare: {{ $ticket->fare }}<br>
                        <a href="{{ route('tickets.show', $ticket) }}">View</a>
                        <a href="{{ route('tickets.edit', $ticket) }}">Edit</a>
                        <form action="{{ route('tickets.destroy', $ticket) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </li>
                @empty
                    <li>No tickets available.</li>
                @endforelse
            </ul>
		</div>

	</section>

@endsection