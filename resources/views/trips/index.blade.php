@extends('layout.app')

@section('content')

	<section role="main" class="content-body">
		<header class="page-header">
			<h2>Trip List</h2>
		
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
			
			<h1>Trip List</h1>

            <a href="{{ route('trips.create') }}">Create New Trip</a>

            <ul>
                @forelse($trips as $trip)
                    <li>
                        {{ $trip->origin->name }} to {{ $trip->destination->name }} on {{ $trip->date }}
                        <a href="{{ route('trips.show', $trip) }}">View</a>
                        <a href="{{ route('trips.edit', $trip) }}">Edit</a>
                        <form action="{{ route('trips.destroy', $trip) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                        <a href="{{ route('trips.allocate-seats', $trip) }}">Allocate Seats</a>
                    </li>
                @empty
                    <li>No trips available.</li>
                @endforelse
            </ul>
		</div>

	</section>

@endsection