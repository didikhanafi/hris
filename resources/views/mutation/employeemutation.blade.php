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
                            <a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_mutation"><i class="fa-solid fa-plus"></i> Add {{$title}}</a>
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
                                        <th>Branch Name</th>
                                        <th class="width-thirty text-center">Status</th>
                                        <th class="width-thirty text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datamutation as $itemmutation)
                                    <tr>
                                        {{-- <td>{{$itemmutation->mutationcode}}</td> --}}
                                        <td> {{$itemmutation->mutation}} ({{$itemmutation->mutationcode}})</td>
                                        <td  class="text-center">
                                            @php
                                                if($itemmutation->status==true){
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
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#edit_mutation{{$itemmutation->id}}"><i class="fa-solid fa-pencil m-r-5"></i> Edit</a>
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_mutation{{$itemmutation->id}}"><i class="fa-regular fa-trash-can m-r-5"></i> Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                        
                                        <!-- Edit Mutation Modal -->
                                        <div id="edit_mutation{{$itemmutation->id}}" class="modal custom-modal fade" role="dialog">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Edit {{$title}}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="POST" action="/employeemutation/{{ $itemmutation->id }}" enctype=multipart/form-data>
                                                            @method('put')
                                                            @csrf
                                                            <div class="input-block mb-3">
                                                                <label class="col-form-label">Mutation Code <span class="text-danger">*</span></label>
                                                                <input class="form-control" name="mutationcode" value="{{$itemmutation->mutationcode}}" type="text" readonly>
                                                            </div>
                                                            <div class="input-block mb-3">
                                                                <label class="col-form-label">Mutation Name <span class="text-danger">*</span></label>
                                                                <input class="form-control" name="mutation" value="{{$itemmutation->mutation}}" type="text">
                                                            </div>    
                                                            <div class="input-block mb-3">
                                                                <label class="col-form-label">Status <span class="text-danger">*</span></label>
                                                                <div class="checkbox">
                                                                    <label class="col-form-label">
                                                                        <input type="checkbox" name="status" 
                                                                        @php
                                                                            if($itemmutation->status=="1"){
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
                                        <!-- /Edit Mutation Modal -->

                                        <!-- Delete Mutation Modal -->
                                        <div class="modal custom-modal fade" id="delete_mutation{{$itemmutation->id}}" role="dialog">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <div class="form-header">
                                                            <h3>Delete {{$title}}</h3>
                                                            <p>Are you sure want to delete {{$itemmutation->mutation}}?</p>
                                                        </div>
                                                        <div class="modal-btn delete-action">
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <form method="POST" action="/employeemutation/{{ $itemmutation->id }}" class="d-inline">
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
                                        <!-- /Delete Mutation Modal -->    

                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Page Content -->
            

            <!-- Add Mutation Modal -->
            <div id="add_mutation" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add {{$title}}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="/employeemutation" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="input-block mb-3">
                                    <label class="col-form-label">Mutation Code <span class="text-danger">*</span></label>
                                    <input class="form-control" name="mutationcode" value="{{$codeno}}" type="text">
                                </div>
                                <div class="input-block mb-3">
                                    <label class="col-form-label">Mutation Name <span class="text-danger">*</span></label>
                                    <input class="form-control" name="mutation" type="text">
                                </div>
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
            <!-- /Add Mutation Modal -->
            
        </div>
        <!-- /Page Wrapper -->

@endsection