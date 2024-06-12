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
                    <h3 class="page-title">{{ $title }}</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">{{ $title }}</li>
                    </ul>
                </div>
                <div class="col-auto float-end ms-auto">
                    <a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_employee"><i class="fa-solid fa-plus"></i> Add {{ $title }}</a>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        @if (session('success'))
            <div class="alert alert-secondary alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <!-- Search Filter -->
        <form method="GET" action="{{ route('employees.index') }}">
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
                                <th>Phone</th>
                                <th>PKWT</th>
                                <th>PKWT Awal</th>
                                <th>PKWT Akhir</th>
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
                                <td>{{ $itememployee->phone }}</td>
                                {{-- @foreach($itememployee as $employee) --}}
                                    @foreach($itememployee->mutations as $mutation)
                                        @if($mutation->tglakhir >= \Carbon\Carbon::today() && $mutation->tglakhir <= \Carbon\Carbon::today()->addMonth())
                                            
                                                <td>{{ $mutation->mutation_ke }}</td>
                                                <td>{{ $mutation->tglawal }}</td>
                                                <td>{{ $mutation->tglakhir }}</td>
                                                <td>{{ $itememployee->companies->companies }}</td>
                                                <td>{{ $itememployee->positions->position }}</td>
                                        @endif
                                    @endforeach
                                {{-- @endforeach --}}
                                </td>
                                {{-- <td>{{ optional($itememployee->companies)->companies ?? '-' }}</td> --}}
                                {{-- <td>{{ optional($itememployee->positions)->position ?? '-' }}</td> --}}
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
    <!-- /Page Content -->

    @include('employee.employeemodal.employeeaddmodal')

</div>
<!-- /Page Wrapper -->
@endsection
