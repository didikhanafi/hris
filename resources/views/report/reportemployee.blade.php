@extends('layouts.appmain')

@section('content')


    <!-- Page Wrapper -->
    <div class="page-wrapper">

        <!-- Page Content -->
        <div class="content container-fluid">


            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">{{$title}}</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">{{$title}}</li>
                        </ul>
                    </div>
                    {{-- <div class="col-auto">
                        <a href="#" class="btn btn-primary">PDF</a>
                    </div> --}}
                </div>
            </div>
            <!-- /Page Header -->

                <!-- Content Starts -->

                    <!-- Search Filter -->
                <form method="GET" action="{{ route('reportemployee.index') }}">
                    <div class="row filter-row mb-4">
                        <div class="col-sm-6 col-md-3">
                            <div class="input-block mb-3 form-focus">
                                <input type="text" class="form-control floating" id="search_name" name="search_name" value="{{ request('search_name') }}">
                                <label class="focus-label">{{ $title }} Name</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
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
                            <div class="input-block mb-3 form-focus">
                                <div class="cal-icon">
                                    <input class="form-control floating datetimepicker" name="start_date" type="text" value="{{ request('start_date') }}">
                                </div>
                                <label class="focus-label">From</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="input-block mb-3 form-focus">
                                <div class="cal-icon">
                                    <input class="form-control floating datetimepicker" name="end_date" type="text" value="{{ request('end_date') }}">
                                </div>
                                <label class="focus-label">To</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="d-grid">
                                <button class="btn btn-success w-100" type="submit">Search</button>
                            </div>
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
                                        {{-- <th>Status</th> --}}
                                        <th class="text-end no-sort">Status</th>
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
                                        <td>{{ date('d M Y',strtotime($itememployee->tglmasuk)) }}</td>
                                        <td>{{ optional($itememployee->companies)->companies ?? '-' }}</td>
                                        <td>{{ optional($itememployee->positions)->position ?? '-' }}</td>
                                        <td class="text-start">
                                            @if ($itememployee->employeestatus=="1")
                                                <div class="dropdown action-label">
                                                    <a href="#" class="btn btn-white btn-sm btn-rounded"><i class="fa-regular fa-circle-dot text-success"></i> Active&nbsp;&nbsp;&nbsp; </a>
                                                </div>
                                            @else
                                                <div class="dropdown action-label">
                                                    <a href="#" class="btn btn-white btn-sm btn-rounded"><i class="fa-regular fa-circle-dot text-danger"></i> InActive </a>

                                                </div>
                                            @endif
                                        </td>
                                    </tr>

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


                <!-- /Content End -->

        </div>
        <!-- /Page Content -->

    </div>
    <!-- /Page Wrapper -->

@endsection
