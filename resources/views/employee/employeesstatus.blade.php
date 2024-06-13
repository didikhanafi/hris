@extends('layouts.appmain')

@section('content')

            <!-- Page Wrapper -->
            <div class="page-wrapper">
			
				<!-- Page Content -->
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row align-items-center">
							<div class="col">
								<h3 class="page-title">{{$title}}</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item">Employees</li>
									<li class="breadcrumb-item active">{{$title}}</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
                    <div class="search-lists">
                        <ul class="nav nav-tabs nav-tabs-solid">
                            <li class="nav-item"><a class="nav-link active" href="#results_aktif" data-bs-toggle="tab">Karyawan Aktif</a></li>
                            <li class="nav-item"><a class="nav-link" href="#results_tidakaktif" data-bs-toggle="tab">Karyawan Tidak Aktif</a></li>
                            <li class="nav-item"><a class="nav-link" href="#results_kontrak" data-bs-toggle="tab">Karyawan Kontrak</a></li>
                            <li class="nav-item"><a class="nav-link" href="#results_tetap" data-bs-toggle="tab">Karyawan Tetap</a></li>
                        </ul>
                        <div class="tab-content">
                            
                            <div class="tab-pane show active" id="results_aktif">
                                <!-- Search Filter -->
                                <form method="GET" action="{{ route('employeesstatus.index') }}">
                                    <div class="row filter-row">
                                        <div class="col-sm-6 col-md-5">
                                            <div class="input-block mb-3 form-focus">
                                                <input type="text" class="form-control floating" id="search_name" name="search_name" value="{{ request('search_name') }}">
                                                <label class="focus-label">{{ $title }} Name</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="input-block mb-3 form-focus select-focus">
                                                <select class="select floating" name="search_company">
                                                    <option value="">Select Company</option>
                                                    @foreach ($datacompany as $itemcompany)
                                                        <option value="{{ $itemcompany->companiescode }}" {{ request('search_company') == $itemcompany->companiescode ? 'selected' : '' }}>
                                                            {{ $itemcompany->companies }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <label class="focus-label">Company</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-3">
                                            <button class="btn btn-success w-100" type="submit">Search</button>
                                        </div>
                                    </div>
                                </form>
                                <!-- /Search Filter -->

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table table-striped custom-table datatable">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Employee ID</th>
                                                        <th>Phone</th>
                                                        <th class="text-nowrap">Join Date</th>
                                                        <th>Company</th>
                                                        <th>Position</th>
                                                        <th class="text-end no-sort">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($employees as $itememployee)
                                                    <tr>
                                                        <td>
                                                            <h2 class="table-avatar">
                                                                <a href="/employeesdetail/{{ $itememployee->id }}" class="avatar">
                                                                    @if ($itememployee->uploademployee)
                                                                        <img src="{{ asset('storage/' . $itememployee->uploademployee) }}" alt="User Image">
                                                                    @else
                                                                        <img src="{{ asset('storage/noimage.png') }}" alt="User Image">
                                                                    @endif
                                                                </a>
                                                                <a href="/employeesdetail/{{ $itememployee->id }}">{{ $itememployee->employee }}</a>
                                                            </h2>
                                                        </td>
                                                        <td>{{ $itememployee->employeecode }}</td>
                                                        <td>{{ $itememployee->phone }}</td>
                                                        <td>{{ date('d-M-Y',strtotime($itememployee->tglmasuk)) }}</td>
                                                        <td>{{ optional($itememployee->companies)->companies ?? '-' }}</td>
                                                        <td>{{ optional($itememployee->positions)->position ?? '-' }}</td>
                                                        
                                                        <td class="text-end">
                                                            <div class="dropdown dropdown-action">
                                                                <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#edit_employee{{ $itememployee->id }}"><i class="fa-solid fa-pencil m-r-5"></i> Edit</a>
                                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_employee{{ $itememployee->id }}"><i class="fa-regular fa-trash-can m-r-5"></i> Delete</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <!-- Edit Employee Modal -->
                                                    @include('employee.employeemodal.employeeeditmodal')
                                                    <!-- /Edit Employee Modal -->

                                                    <!-- Delete Employee Modal -->
                                                    <div class="modal custom-modal fade" id="delete_employee{{ $itememployee->id }}" role="dialog">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-body">
                                                                    <div class="form-header">
                                                                        <h3>Delete Employee</h3>
                                                                        <p>Are you sure want to delete {{ $itememployee->employee }}?</p>
                                                                    </div>
                                                                    <div class="modal-btn delete-action">
                                                                        <div class="row">
                                                                            <div class="col-6">
                                                                                <form method="POST" action="/employees/{{ $itememployee->id }}" class="d-inline">
                                                                                    @method('delete')
                                                                                    @csrf
                                                                                    <button class="col-12 btn btn-primary continue-btn">
                                                                                        Delete
                                                                                    </button>
                                                                                </form>
                                                                            </div>
                                                                            <div class="col-6">
                                                                                <a data-bs-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- /Delete Employee Modal -->

                                                    @empty
                                                    <tr>
                                                        <td colspan="7" class="text-center">No data available</td>
                                                    </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="results_tidakaktif">
                                <!-- Search Filter -->
                                <form method="GET" action="{{ route('employeesstatus.index') }}">
                                    <div class="row filter-row">
                                        <div class="col-sm-6 col-md-5">
                                            <div class="input-block mb-3 form-focus">
                                                <input type="text" class="form-control floating" id="search_name1" name="search_name1" value="{{ request('search_name1') }}">
                                                <label class="focus-label">{{ $title }} Name</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="input-block mb-3 form-focus select-focus">
                                                <select class="select floating" name="search_company1">
                                                    <option value="">Select Company</option>
                                                    @foreach ($datacompany as $itemcompany)
                                                        <option value="{{ $itemcompany->companiescode }}" {{ request('search_company1') == $itemcompany->companiescode ? 'selected' : '' }}>
                                                            {{ $itemcompany->companies }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <label class="focus-label">Company</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-3">
                                            <button class="btn btn-success w-100" type="submit">Search</button>
                                        </div>
                                    </div>
                                </form>
                                <!-- /Search Filter -->

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table table-striped custom-table datatable">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Employee ID</th>
                                                        <th>Phone</th>
                                                        <th class="text-nowrap">Join Date</th>
                                                        <th>Company</th>
                                                        <th>Position</th>
                                                        <th class="text-end no-sort">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($employees1 as $itememployee)
                                                    <tr>
                                                        <td>
                                                            <h2 class="table-avatar">
                                                                <a href="/employeesdetail/{{ $itememployee->id }}" class="avatar">
                                                                    @if ($itememployee->uploademployee)
                                                                        <img src="{{ asset('storage/' . $itememployee->uploademployee) }}" alt="User Image">
                                                                    @else
                                                                        <img src="{{ asset('storage/noimage.png') }}" alt="User Image">
                                                                    @endif
                                                                </a>
                                                                <a href="/employeesdetail/{{ $itememployee->id }}">{{ $itememployee->employee }}</a>
                                                            </h2>
                                                        </td>
                                                        <td>{{ $itememployee->employeecode }}</td>
                                                        <td>{{ $itememployee->phone }}</td>
                                                        <td>{{ date('d-M-Y',strtotime($itememployee->tglmasuk)) }}</td>
                                                        <td>{{ optional($itememployee->companies)->companies ?? '-' }}</td>
                                                        <td>{{ optional($itememployee->positions)->position ?? '-' }}</td>
                                                        
                                                        <td class="text-end">
                                                            <div class="dropdown dropdown-action">
                                                                <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#edit_employee{{ $itememployee->id }}"><i class="fa-solid fa-pencil m-r-5"></i> Edit</a>
                                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_employee{{ $itememployee->id }}"><i class="fa-regular fa-trash-can m-r-5"></i> Delete</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <!-- Edit Employee Modal -->
                                                    @include('employee.employeemodal.employeeeditmodal')
                                                    <!-- /Edit Employee Modal -->

                                                    <!-- Delete Employee Modal -->
                                                    <div class="modal custom-modal fade" id="delete_employee{{ $itememployee->id }}" role="dialog">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-body">
                                                                    <div class="form-header">
                                                                        <h3>Delete Employee</h3>
                                                                        <p>Are you sure want to delete {{ $itememployee->employee }}?</p>
                                                                    </div>
                                                                    <div class="modal-btn delete-action">
                                                                        <div class="row">
                                                                            <div class="col-6">
                                                                                <form method="POST" action="/employees/{{ $itememployee->id }}" class="d-inline">
                                                                                    @method('delete')
                                                                                    @csrf
                                                                                    <button class="col-12 btn btn-primary continue-btn">
                                                                                        Delete
                                                                                    </button>
                                                                                </form>
                                                                            </div>
                                                                            <div class="col-6">
                                                                                <a data-bs-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- /Delete Employee Modal -->

                                                    @empty
                                                    <tr>
                                                        <td colspan="7" class="text-center">No data available</td>
                                                    </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="results_kontrak">
                                <!-- Search Filter -->
                                <form method="GET" action="{{ route('employeesstatus.index') }}">
                                    <div class="row filter-row">
                                        <div class="col-sm-6 col-md-5">
                                            <div class="input-block mb-3 form-focus">
                                                <input type="text" class="form-control floating" id="search_name2" name="search_name2" value="{{ request('search_name2') }}">
                                                <label class="focus-label">{{ $title }} Name</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="input-block mb-3 form-focus select-focus">
                                                <select class="select floating" name="search_company2">
                                                    <option value="">Select Company</option>
                                                    @foreach ($datacompany as $itemcompany)
                                                        <option value="{{ $itemcompany->companiescode }}" {{ request('search_company2') == $itemcompany->companiescode ? 'selected' : '' }}>
                                                            {{ $itemcompany->companies }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <label class="focus-label">Company</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-3">
                                            <button class="btn btn-success w-100" type="submit">Search</button>
                                        </div>
                                    </div>
                                </form>
                                <!-- /Search Filter -->

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table table-striped custom-table datatable">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Employee ID</th>
                                                        <th>Phone</th>
                                                        <th class="text-nowrap">Join Date</th>
                                                        <th>Company</th>
                                                        <th>Position</th>
                                                        <th class="text-end no-sort">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($employees2 as $itememployee)
                                                    <tr>
                                                        <td>
                                                            <h2 class="table-avatar">
                                                                <a href="/employeesdetail/{{ $itememployee->id }}" class="avatar">
                                                                    @if ($itememployee->uploademployee)
                                                                        <img src="{{ asset('storage/' . $itememployee->uploademployee) }}" alt="User Image">
                                                                    @else
                                                                        <img src="{{ asset('storage/noimage.png') }}" alt="User Image">
                                                                    @endif
                                                                </a>
                                                                <a href="/employeesdetail/{{ $itememployee->id }}">{{ $itememployee->employee }}</a>
                                                            </h2>
                                                        </td>
                                                        <td>{{ $itememployee->employeecode }}</td>
                                                        <td>{{ $itememployee->phone }}</td>
                                                        <td>{{ date('d-M-Y',strtotime($itememployee->tglmasuk)) }}</td>
                                                        <td>{{ optional($itememployee->companies)->companies ?? '-' }}</td>
                                                        <td>{{ optional($itememployee->positions)->position ?? '-' }}</td>
                                                        
                                                        <td class="text-end">
                                                            <div class="dropdown dropdown-action">
                                                                <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#edit_employee{{ $itememployee->id }}"><i class="fa-solid fa-pencil m-r-5"></i> Edit</a>
                                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_employee{{ $itememployee->id }}"><i class="fa-regular fa-trash-can m-r-5"></i> Delete</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <!-- Edit Employee Modal -->
                                                    @include('employee.employeemodal.employeeeditmodal')
                                                    <!-- /Edit Employee Modal -->

                                                    <!-- Delete Employee Modal -->
                                                    <div class="modal custom-modal fade" id="delete_employee{{ $itememployee->id }}" role="dialog">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-body">
                                                                    <div class="form-header">
                                                                        <h3>Delete Employee</h3>
                                                                        <p>Are you sure want to delete {{ $itememployee->employee }}?</p>
                                                                    </div>
                                                                    <div class="modal-btn delete-action">
                                                                        <div class="row">
                                                                            <div class="col-6">
                                                                                <form method="POST" action="/employees/{{ $itememployee->id }}" class="d-inline">
                                                                                    @method('delete')
                                                                                    @csrf
                                                                                    <button class="col-12 btn btn-primary continue-btn">
                                                                                        Delete
                                                                                    </button>
                                                                                </form>
                                                                            </div>
                                                                            <div class="col-6">
                                                                                <a data-bs-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- /Delete Employee Modal -->

                                                    @empty
                                                    <tr>
                                                        <td colspan="7" class="text-center">No data available</td>
                                                    </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="results_tetap">
                                <!-- Search Filter -->
                                <form method="GET" action="{{ route('employeesstatus.index') }}">
                                    <div class="row filter-row">
                                        <div class="col-sm-6 col-md-5">
                                            <div class="input-block mb-3 form-focus">
                                                <input type="text" class="form-control floating" id="search_name3" name="search_name3" value="{{ request('search_name3') }}">
                                                <label class="focus-label">{{ $title }} Name</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="input-block mb-3 form-focus select-focus">
                                                <select class="select floating" name="search_company3">
                                                    <option value="">Select Company</option>
                                                    @foreach ($datacompany as $itemcompany)
                                                        <option value="{{ $itemcompany->companiescode }}" {{ request('search_company3') == $itemcompany->companiescode ? 'selected' : '' }}>
                                                            {{ $itemcompany->companies }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <label class="focus-label">Company</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-3">
                                            <button class="btn btn-success w-100" type="submit">Search</button>
                                        </div>
                                    </div>
                                </form>
                                <!-- /Search Filter -->

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table table-striped custom-table datatable">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Employee ID</th>
                                                        <th>Phone</th>
                                                        <th class="text-nowrap">Join Date</th>
                                                        <th>Company</th>
                                                        <th>Position</th>
                                                        <th class="text-end no-sort">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($employees3 as $itememployee)
                                                    <tr>
                                                        <td>
                                                            <h2 class="table-avatar">
                                                                <a href="/employeesdetail/{{ $itememployee->id }}" class="avatar">
                                                                    @if ($itememployee->uploademployee)
                                                                        <img src="{{ asset('storage/' . $itememployee->uploademployee) }}" alt="User Image">
                                                                    @else
                                                                        <img src="{{ asset('storage/noimage.png') }}" alt="User Image">
                                                                    @endif
                                                                </a>
                                                                <a href="/employeesdetail/{{ $itememployee->id }}">{{ $itememployee->employee }}</a>
                                                            </h2>
                                                        </td>
                                                        <td>{{ $itememployee->employeecode }}</td>
                                                        <td>{{ $itememployee->phone }}</td>
                                                        <td>{{ date('d-M-Y',strtotime($itememployee->tglmasuk)) }}</td>
                                                        <td>{{ optional($itememployee->companies)->companies ?? '-' }}</td>
                                                        <td>{{ optional($itememployee->positions)->position ?? '-' }}</td>
                                                        
                                                        <td class="text-end">
                                                            <div class="dropdown dropdown-action">
                                                                <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#edit_employee{{ $itememployee->id }}"><i class="fa-solid fa-pencil m-r-5"></i> Edit</a>
                                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_employee{{ $itememployee->id }}"><i class="fa-regular fa-trash-can m-r-5"></i> Delete</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <!-- Edit Employee Modal -->
                                                    @include('employee.employeemodal.employeeeditmodal')
                                                    <!-- /Edit Employee Modal -->

                                                    <!-- Delete Employee Modal -->
                                                    <div class="modal custom-modal fade" id="delete_employee{{ $itememployee->id }}" role="dialog">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-body">
                                                                    <div class="form-header">
                                                                        <h3>Delete Employee</h3>
                                                                        <p>Are you sure want to delete {{ $itememployee->employee }}?</p>
                                                                    </div>
                                                                    <div class="modal-btn delete-action">
                                                                        <div class="row">
                                                                            <div class="col-6">
                                                                                <form method="POST" action="/employees/{{ $itememployee->id }}" class="d-inline">
                                                                                    @method('delete')
                                                                                    @csrf
                                                                                    <button class="col-12 btn btn-primary continue-btn">
                                                                                        Delete
                                                                                    </button>
                                                                                </form>
                                                                            </div>
                                                                            <div class="col-6">
                                                                                <a data-bs-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- /Delete Employee Modal -->

                                                    @empty
                                                    <tr>
                                                        <td colspan="7" class="text-center">No data available</td>
                                                    </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
				<!-- /Page Content -->
				
				
            </div>
			<!-- /Page Wrapper -->
			

@endsection