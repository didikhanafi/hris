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
                                <li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
                                <li class="breadcrumb-item active">{{$title}}</li>
                            </ul>
                        </div>
                        <div class="col-auto float-end ms-auto">
                            <a href="#" class="btn"><i class="fa-solid fa-link"></i> Link Import</a>
                            <a href="#" class="btn"><i class="fa-solid fa-file"></i> Import Excel</a>
                            <a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_import"><i class="fa-solid fa-plus"></i> Import Mutation</a>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <div class="row">
                    <div class="col-md-12">
                        <div>
                            <table class="table table-new custom-table mb-0 datatable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Mutasi</th>
                                        <th>Tgl Masuk</th>
                                        <th>Tgl Keluar</th>
                                        <th>Cabang</th>
                                        <th>Jabatan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($datamutation as $index=>$mutation)
                                        <tr>
                                        @if (!is_null($mutation->tglawal) && !is_null($mutation->tglakhir))
                                            <td>{{ $index+1 }}</td>
                                            <td>{{ $mutation->mutation_ke }}</td>
                                            <td>{{ date('d-M-Y',strtotime($mutation->tglawal)) }}</td>
                                            <td>
                                                @if ($mutation->tglakhir!=null)
                                                    {{ date('d-M-Y',strtotime($mutation->tglakhir)) }}
                                                @endif
                                            </td>
                                            <td>{{$mutation->branches->branches ?? '' }} ({{$mutation->companies->companies ?? '' }})</td>
                                            <td>{{$mutation->positions->position ?? '' }} ({{$mutation->departements->departements ?? '' }})</td>
                                            <td class="text-end">
                                                {{-- {{$mutation->id}} | {{$mutation->employees->employee}} --}}
                                                <div class="dropdown dropdown-action">
                                                    <a aria-expanded="false" data-bs-toggle="dropdown" class="action-icon dropdown-toggle" href="#"><i class="material-icons">more_vert</i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#edit_mutation{{$mutation->id}}"><i class="fa-solid fa-pencil m-r-5"></i> Edit</a>
                                                        <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#delete_mutation{{$mutation->id}}"><i class="fa-regular fa-trash-can m-r-5"></i> Delete</a>
                                                    </div>
                                                </div>
                                            </td>

                                        @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Page Content -->



    <!-- Add Import Modal -->
    <div id="add_import" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Import File Mutasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">



                    <form action="{{ route('mutations.import') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            {{-- <input type="hidden" name="employee_id" value="{{$dataemployees->id}}"> --}}
                            <div class="col-sm-12">
                                <div class="input-block mb-3">
                                    <label class="col-form-label">Pilih File Excel <span class="text-danger">*</span></label>
                                    <input class="form-control" name="file" type="file">
                                </div>
                            </div>
                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn" type="submit">Import</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Add Import Modal -->

        </div>
        <!-- /Page Wrapper -->

@endsection
