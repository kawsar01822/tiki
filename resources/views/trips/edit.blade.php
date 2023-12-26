@extends('layout.app')

@section('content')

	<section role="main" class="content-body">
		<header class="page-header">
			<h2>Edit Trip</h2>
		
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
			
			<h1>Edit Trip</h1>

            <form action="{{ route('trips.update', $trip) }}" method="post">
                @csrf
                @method('PUT')

                <label for="date">Date:</label>
                <input type="date" name="date" value="{{ $trip->date }}" required>

                <label for="origin_id">Origin:</label>
                <select name="origin_id" required>
                    @foreach($locations as $location)
                        <option value="{{ $location->id }}" {{ $trip->origin_id == $location->id ? 'selected' : '' }}>{{ $location->name }}</option>
                    @endforeach
                </select>

                <label for="destination_id">Destination:</label>
                <select name="destination_id" required>
                    @foreach($locations as $location)
                        <option value="{{ $location->id }}" {{ $trip->destination_id == $location->id ? 'selected' : '' }}>{{ $location->name }}</option>
                    @endforeach
                </select>

                <button type="submit">Update Trip</button>
            </form>

            <a href="{{ route('trips.index') }}">Back to Trip List</a>
		</div>

	</section>

@endsection