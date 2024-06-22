@extends('layouts.appmain')

@section('content')

    <!-- Main Wrapper -->
    <div class="main-wrapper">
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
                            <a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_companies"><i class="fa-solid fa-plus"></i> Add {{$title}}</a>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <div class="row">
                    <div class="col-md-12">
                        <div>
                            <table class="table table-striped custom-table mb-0 datatable">
                                <thead>
                                    <tr>
                                        {{-- <th class="width-thirty text-center">#</th> --}}
                                        <th>Code</th>
                                        <th>Company Name</th>
                                        <th>Logo</th>
                                        <th>Banner</th>
                                        <th class="width-thirty text-center">Status</th>
                                        <th class="width-thirty text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datacompanies as $itemcompanies)
                                    <tr>
                                        {{-- <td>{{$itemcompanies->index}}</td> --}}
                                        <td>{{$itemcompanies->companiescode}}</td>
                                        <td>{{$itemcompanies->companies}} <br>{{$itemcompanies->alamat}}</td>
                                        <td>
                                            @if ($itemcompanies->logo!="")
                                                <img src="{{ asset('storage/' . $itemcompanies->logo) }}" width="50" alt="{{$itemcompanies->companies}}">
                                            @else
                                                <img width="50" src="{{ asset('storage/noimage.png') }}"
                                            @endif
                                        </td>
                                        <td>
                                            @if ($itemcompanies->banner!="")
                                                <img src="{{ asset('storage/' . $itemcompanies->banner) }}" width="150" alt="{{$itemcompanies->companies}}">
                                            @else
                                                <img width="150" src="{{ asset('storage/noimage.png') }}"
                                            @endif
                                        </td>
                                        <td  class="text-center">
                                            @php
                                                if($itemcompanies->status==true){
                                                    echo '<input type="checkbox" name="status" checked>';
                                                }else{
                                                    echo '<input type="checkbox" name="status">';
                                                }
                                            @endphp
                                        </td>
                                        <td class="text-end">
                                            <div class="dropdown dropdown-action">
                                                    <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#edit_companies{{ $itemcompanies->id }}"><i class="fa-solid fa-pencil m-r-5"></i> Edit</a>
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_companies{{ $itemcompanies->id }}"><i class="fa-regular fa-trash-can m-r-5"></i> Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>


                                        <!-- Edit Companies Modal -->
                                        <div id="edit_companies{{$itemcompanies->id}}" class="modal custom-modal fade" role="dialog">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Edit {{$title}}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="POST" action="/companies/{{$itemcompanies->id}}" enctype=multipart/form-data>
                                                            @method('put')
                                                            @csrf
                                                            <div class="input-block mb-3">
                                                                <label class="col-form-label">Companies Code <span class="text-danger">*</span></label>
                                                                <input class="form-control" name="companiescode" value="{{$itemcompanies->companiescode}}" type="text" readonly>
                                                            </div>
                                                            <div class="input-block mb-3">
                                                                <label class="col-form-label">Companies Name <span class="text-danger">*</span></label>
                                                                <input class="form-control" name="companies" value="{{$itemcompanies->companies}}" type="text">
                                                            </div>
                                                            <div class="input-block mb-3">
                                                                <label class="col-form-label">Alamat <span class="text-danger">*</span></label>
                                                                <input class="form-control" name="alamat" value="{{$itemcompanies->alamat}}" type="text">
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="input-block mb-3">
                                                                    <label class="col-form-label">Upload Logo <span class="text-danger">*</span></label>
                                                                    @if($itemcompanies->logo)
                                                                        <img src="{{ asset('storage/' . $itemcompanies->logo) }}" width="100" alt="Company Logo">
                                                                    @endif
                                                                    <input class="form-control" name="logo" type="file">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="input-block mb-3">
                                                                    <label class="col-form-label">Upload Identitas <span class="text-danger">*</span></label>
                                                                    @if($itemcompanies->banner)
                                                                        <img src="{{ asset('storage/' . $itemcompanies->banner) }}" width="100" alt="Company Banner">
                                                                    @endif
                                                                    <input class="form-control" name="banner" type="file">
                                                                </div>
                                                            </div>
                                                            <div class="input-block mb-3">
                                                                <label class="col-form-label">Status <span class="text-danger">*</span></label>
                                                                <div class="checkbox">
                                                                    <label class="col-form-label">
                                                                        <input type="checkbox" name="status"
                                                                        @php
                                                                            if($itemcompanies->status=="1"){
                                                                                echo "checked";
                                                                            }
                                                                        @endphp
                                                                        > Active
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="submit-section">
                                                                <button class="btn btn-primary submit-btn" type="submit">Save</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Edit Companies Modal -->

                                        <!-- Delete Companies Modal -->
                                        <div class="modal custom-modal fade" id="delete_companies{{$itemcompanies->id}}" role="dialog">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <div class="form-header">
                                                            <h3>Delete {{$title}}</h3>
                                                            <p>Are you sure want to delete {{$itemcompanies->companies}}?</p>
                                                        </div>
                                                        <div class="modal-btn delete-action">
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <form method="POST" action="/companies/{{$itemcompanies->id}}" class="d-inline">
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
                                        <!-- /Delete Companies Modal -->

                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Page Content -->

            <!-- Add Companies Modal -->
            <div id="add_companies" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add {{$title}}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="/companies" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="input-block mb-3">
                                    <label class="col-form-label">Companies Code <span class="text-danger">*</span></label>
                                    <input class="form-control" name="companiescode" value="{{$codeno}}" type="text">
                                </div>
                                <div class="input-block mb-3">
                                    <label class="col-form-label">Companies Name <span class="text-danger">*</span></label>
                                    <input class="form-control" name="companies"  type="text">
                                </div>
                                <div class="input-block mb-3">
                                    <label class="col-form-label">Alamat <span class="text-danger">*</span></label>
                                    <input class="form-control" name="alamat" type="text">
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-block mb-3">
                                        <label class="col-form-label">Upload Logo <span class="text-danger">*</span></label>
                                        {{-- @if($dataemployees->uploadktp)
                                            <img src="{{ asset('storage/' . $dataemployees->uploadktp) }}" width="100" alt="Identitas Karyawan">
                                        @endif --}}
                                        <input class="form-control" name="logo" type="file">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-block mb-3">
                                        <label class="col-form-label">Upload Banner <span class="text-danger">*</span></label>
                                        {{-- @if($dataemployees->uploadktp)
                                            <img src="{{ asset('storage/' . $dataemployees->uploadktp) }}" width="100" alt="Identitas Karyawan">
                                        @endif --}}
                                        <input class="form-control" name="banner" type="file">
                                    </div>
                                </div>
                                {{-- <div class="input-block mb-3">
                                    <label class="col-form-label">Note <span class="text-danger">*</span></label>
                                    <input class="form-control" name="companiesnote" type="text">
                                </div> --}}
                                <div class="input-block mb-3">
                                    <label class="col-form-label">Status <span class="text-danger">*</span></label>
                                    <div class="checkbox">
                                        <label class="col-form-label">
                                            <input type="checkbox" name="status" checked> Active
                                        </label>
                                    </div>
                                </div>
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn" type="submit" >Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Add Companies Modal -->


        </div>
        <!-- /Page Wrapper -->

    </div>
    <!-- /Main Wrapper -->

    {{-- <script>
        //message with toastr
        @if(session()->has('success'))

            toastr.success('{{ session('success') }}', 'BERHASIL!');

        @elseif(session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!');

        @endif
    </script> --}}
@endsection
