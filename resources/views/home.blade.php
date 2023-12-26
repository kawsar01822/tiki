@extends('layout.app')

@section('content')

	<section role="main" class="content-body">
		<header class="page-header">
			<h2>Dashboard</h2>
		
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
			
			<div class="col-md-12 col-lg-12 col-xl-12">
				<div class="row">
					<div class="col-md-12 col-lg-6 col-xl-6">
						<section class="panel panel-featured-left panel-featured-primary">
							<div class="panel-body">
								<div class="widget-summary">
									<div class="widget-summary-col widget-summary-col-icon">
										<div class="summary-icon bg-primary">
											<i class="fa fa-usd"></i>
										</div>
									</div>
									<div class="widget-summary-col">
										<div class="summary">
											<h4 class="title">Today</h4>
											<div class="info">
												<strong class="amount">{{$todaySales}}</strong>
											</div>
										</div>
									</div>
								</div>
							</div>
						</section>
					</div>
					<div class="col-md-12 col-lg-6 col-xl-6">
						<section class="panel panel-featured-left panel-featured-secondary">
							<div class="panel-body">
								<div class="widget-summary">
									<div class="widget-summary-col widget-summary-col-icon">
										<div class="summary-icon bg-secondary">
											<i class="fa fa-usd"></i>
										</div>
									</div>
									<div class="widget-summary-col">
										<div class="summary">
											<h4 class="title">Yesterday</h4>
											<div class="info">
												<strong class="amount">{{$yesterdaySales}}</strong>
											</div>
										</div>
									</div>
								</div>
							</div>
						</section>
					</div>
					<div class="col-md-12 col-lg-6 col-xl-6">
						<section class="panel panel-featured-left panel-featured-tertiary">
							<div class="panel-body">
								<div class="widget-summary">
									<div class="widget-summary-col widget-summary-col-icon">
										<div class="summary-icon bg-tertiary">
											<i class="fa fa-usd"></i>
										</div>
									</div>
									<div class="widget-summary-col">
										<div class="summary">
											<h4 class="title">This Month</h4>
											<div class="info">
												<strong class="amount">{{$thisMonthSales}}</strong>
											</div>
										</div>
									</div>
								</div>
							</div>
						</section>
					</div>
					<div class="col-md-12 col-lg-6 col-xl-6">
						<section class="panel panel-featured-left panel-featured-quartenary">
							<div class="panel-body">
								<div class="widget-summary">
									<div class="widget-summary-col widget-summary-col-icon">
										<div class="summary-icon bg-quartenary">
											<i class="fa fa-usd"></i>
										</div>
									</div>
									<div class="widget-summary-col">
										<div class="summary">
											<h4 class="title">Last Month</h4>
											<div class="info">
												<strong class="amount">{{$lastMonthSales}}</strong>
											</div>
										</div>
									</div>
								</div>
							</div>
						</section>
					</div>
				</div>
			</div>
		</div>

	</section>

@endsection