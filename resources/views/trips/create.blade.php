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
			
			<h1>Create New Trip</h1>

            <form action="{{ route('trips.store') }}" method="post">
                @csrf

                <label for="date">Date:</label>
                <input type="date" name="date" required>

                <label for="origin_id">Origin:</label>
                <select name="origin_id" required>
                    @foreach($locations as $location)
                        <option value="{{ $location->id }}">{{ $location->name }}</option>
                    @endforeach
                </select>

                <label for="destination_id">Destination:</label>
                <select name="destination_id" required>
                    @foreach($locations as $location)
                        <option value="{{ $location->id }}">{{ $location->name }}</option>
                    @endforeach
                </select>

                <button type="submit">Create Trip</button>
            </form>
		</div>

	</section>

@endsection