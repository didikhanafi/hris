@extends('layouts.appmain')

@section('content')

<!-- Page Wrapper -->
<div class="page-wrapper">


				<!-- Page Content -->
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Welcome {{ Auth::user()->name }}!</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item active">Dashboard</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
				
					<div class="row">
						<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
							<a href="/employees">
								<div class="card dash-widget">
									<div class="card-body">
										<span class="dash-widget-icon"><i class="fa-solid fa-user"></i></span>
										<div class="dash-widget-info">
											<h3>{{$counttotal}}</h3>
											<span>Employees</span>
										</div>
									</div>
								</div>
							</a>
						</div>
						<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
							<a href="/employeesstatus">
								<div class="card dash-widget">
									<div class="card-body">
										<span class="dash-widget-icon"><i class="fa-solid fa-address-card"></i></span>
										<div class="dash-widget-info">
											<h3>{{$counttetap}}</h3>
											<span>Emp. Permanent</span>
										</div>
									</div>
								</div>
							</a>
						</div>
						<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
							<a href="/employeesstatus">
								<div class="card dash-widget">
									<div class="card-body">
										<span class="dash-widget-icon"><i class="fa-regular fa-address-book"></i></span>
										<div class="dash-widget-info">
											<h3>{{$countkontrak}}</h3>
											<span>Emp. Contract</span>
										</div>
									</div>
								</div>
							</a>
						</div>
						<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
								<a href="/employeescontexpired">
								<div class="card dash-widget">
									<div class="card-body">
										<span class="dash-widget-icon"><i class="fa-solid fa-users"></i></span>
										<div class="dash-widget-info">
											<h3>{{$countexpired}}</h3>
											<span>Contract Expires</span>
										</div>
									</div>
								</div>
							</a>
						</div>
					</div>
				
					
					<div class="row">
						<div class="col-md-6 d-flex">
							<div class="card card-table flex-fill">
								<div class="card-header">
									<h3 class="card-title mb-0">Pegawai Tetap</h3>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-nowrap custom-table mb-0">
											<thead>
												<tr>
													<th>Name</th>
													<th>Company</th>
													<th>Date</th>
													{{-- <th>Paid Amount</th> --}}
												</tr>
											</thead>
											<tbody>
												@foreach($employeenew as $employee)
													<tr>
														<td>{{ $employee->tglmasuk }}</td>
														<td>{{ $employee->employee }}</td>
														<td>{{ $employee->companies }}</td>
													</tr>
												@endforeach
											</tbody>
										</table>
									</div>
								</div>
								<div class="card-footer">
									<a href="/employees">View all Employees</a>
								</div>
							</div>
						</div>
						<div class="col-md-6 d-flex">
							<div class="card card-table flex-fill">
								<div class="card-header">
									<h3 class="card-title mb-0">Pegawai Akan Habis Kontrak</h3>
								</div>
								<div class="card-body">
									<div class="table-responsive">	
										<table class="table custom-table table-nowrap mb-0">
											<thead>
												<tr>
													<th>Expire Date</th>
													<th>Name</th>
													<th>Company</th>
													{{-- <th>Paid Amount</th> --}}
												</tr>
											</thead>
											<tbody>
												@foreach($employeeexpired as $employee)
												<tr>
													<td>{{ $employee->tglawal }}</td>
													<td>{{ $employee->employee }}</td>
													<td>{{ $employee->companies }}</td>
												</tr>
												@endforeach
											</tbody>
										</table>
									</div>
								</div>
								<div class="card-footer">
									<a href="/employeescontexpired">View all Contracts</a>
								</div>
							</div>
						</div>
					</div>
					
				
				</div>
				<!-- /Page Content -->

@endsection
