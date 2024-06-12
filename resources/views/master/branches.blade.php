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
                            <a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_branches"><i class="fa-solid fa-plus"></i> Add {{$title}}</a>
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
                                    @foreach ($databranches as $itembranches)
                                    <tr>
                                        {{-- <td>{{$itembranches->branchescode}}</td> --}}
                                        <td> {{$itembranches->branches}} ({{$itembranches->branchescode}})</td>
                                        <td  class="text-center">
                                            @php
                                                if($itembranches->status==true){
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
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#edit_branches{{$itembranches->id}}"><i class="fa-solid fa-pencil m-r-5"></i> Edit</a>
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_branches{{$itembranches->id}}"><i class="fa-regular fa-trash-can m-r-5"></i> Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                        
                                        <!-- Edit Branches Modal -->
                                        <div id="edit_branches{{$itembranches->id}}" class="modal custom-modal fade" role="dialog">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Edit {{$title}}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="POST" action="/branches/{{ $itembranches->id }}" enctype=multipart/form-data>
                                                            @method('put')
                                                            @csrf
                                                            <div class="input-block mb-3">
                                                                <label class="col-form-label">Branches Code <span class="text-danger">*</span></label>
                                                                <input class="form-control" name="branchescode" value="{{$itembranches->branchescode}}" type="text" readonly>
                                                            </div>
                                                            <div class="input-block mb-3">
                                                                <label class="col-form-label">Branches Name <span class="text-danger">*</span></label>
                                                                <input class="form-control" name="branches" value="{{$itembranches->branches}}" type="text">
                                                            </div>    
                                                            <div class="input-block mb-3">
                                                                <label class="col-form-label">Status <span class="text-danger">*</span></label>
                                                                <div class="checkbox">
                                                                    <label class="col-form-label">
                                                                        <input type="checkbox" name="status" 
                                                                        @php
                                                                            if($itembranches->status=="1"){
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
                                        <!-- /Edit Branches Modal -->

                                        <!-- Delete Branches Modal -->
                                        <div class="modal custom-modal fade" id="delete_branches{{$itembranches->id}}" role="dialog">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <div class="form-header">
                                                            <h3>Delete {{$title}}</h3>
                                                            <p>Are you sure want to delete {{$itembranches->branches}}?</p>
                                                        </div>
                                                        <div class="modal-btn delete-action">
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <form method="POST" action="/branches/{{ $itembranches->id }}" class="d-inline">
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
                                        <!-- /Delete Branches Modal -->    

                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Page Content -->
            

            <!-- Add Branches Modal -->
            <div id="add_branches" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add {{$title}}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="/branches" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="input-block mb-3">
                                    <label class="col-form-label">Branches Code <span class="text-danger">*</span></label>
                                    <input class="form-control" name="branchescode" value="{{$codeno}}" type="text">
                                </div>
                                <div class="input-block mb-3">
                                    <label class="col-form-label">Branches Name <span class="text-danger">*</span></label>
                                    <input class="form-control" name="branches" type="text">
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
            <!-- /Add Branches Modal -->
            
        </div>
        <!-- /Page Wrapper -->

@endsection