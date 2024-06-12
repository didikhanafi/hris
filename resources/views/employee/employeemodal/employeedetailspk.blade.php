
<div class="tab-pane fade" id="emp_spk">
                    
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col-auto float-end ms-auto">
                <a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_spk"><i class="fa-solid fa-plus"></i> Add SPK</a>
            </div>
        </div>
    </div>
    <div class="table-responsive table-newdatatable">                     

        <table class="table table-new custom-table mb-0 datatable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>SPK</th>
                    <th>Assigned Date</th>
                    <th>Keterangan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataspk as $index=>$itemspk)
                    <tr>
                        <td>{{$index+1}}</td>
                        <td>{{$itemspk->spk}}</td>
                        <td>{{date('d-M-Y',strtotime($itemspk->tglsp))}}</td>
                        <td>{{$itemspk->keteranganspk}}</td>
                        <td class="text-end">
                            <div class="dropdown dropdown-action">
                                <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#view_employee{{$itemspk->id}}"><i class="fa-solid fa-eye m-r-5"></i>View</a>
                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#edit_employee{{$itemspk->id}}"><i class="fa-solid fa-pencil m-r-5"></i> Edit</a>
                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_employee{{$itemspk->id}}"><i class="fa-regular fa-trash-can m-r-5"></i> Delete</a>
                                </div>
                            </div>
                        </td>
                        {{-- <td>
                            <div class="table-actions d-flex">
                                <a class="delete-table me-2" href="user-asset-details.html">
                                    <img src="/assets/img/icons/eye.svg" alt="Eye Icon">
                                </a>
                            </div>
                        </td> --}}
                    </tr>

                    <!-- View SPK Modal -->
                    <div class="modal custom-modal fade" id="view_employee{{$itemspk->id}}" role="dialog">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="form-header">
                                        <h3>View & Print SPK</h3>
                                        <p>Are you sure want to print?</p>
                                    </div>
                                    <div class="modal-btn delete-action">
                                        <div class="row">
                                            <div class="col-6">
                                                <button class="col-12 btn btn-primary continue-btn">
                                                    Print
                                                </button>
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
                    <!-- /View SPK Modal -->                     
                    <!-- Edit SPK Modal -->
                    <div id="edit_employee{{$itemspk->id}}" class="modal custom-modal fade" role="dialog">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add SPK</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="{{ route('spk.update', $itemspk->id) }}" enctype=multipart/form-data>
                                        @method('put')
                                        @csrf
                                        <div class="row">
                                            <input type="hidden" name="employee_id" value="{{$itemspk->employee_id}}">
                                            <div class="col-sm-6">
                                                <div class="input-block mb-3">
                                                    <label class="col-form-label">SPK <span class="text-danger">*</span></label>
                                                    <input class="form-control" name="spk" value="{{$itemspk->spk}}" type="text">
                                                </div>
                                            </div>    
                                            <div class="col-sm-6">  
                                                <div class="input-block mb-3">
                                                    <label class="col-form-label">Tanggal SP <span class="text-danger">*</span></label>
                                                    <div class="cal-icon"><input class="form-control datetimepicker" name="tglsp" value="{{date('d-m-Y',strtotime($itemspk->tglspk))}}" type="text"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="input-block mb-3">
                                                    <label class="col-form-label">Keterangan <span class="text-danger">*</span></label>
                                                    <input class="form-control" name="keteranganspk" value="{{$itemspk->keteranganspk}}" type="text">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="submit-section">
                                            <button class="btn btn-primary submit-btn" type="submit">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Edit SPK Modal -->

                    <!-- Delete SPK Modal -->
                    <div class="modal custom-modal fade" id="delete_employee{{$itemspk->id}}" role="dialog">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="form-header">
                                        <h3>Delete {{$title}}</h3>
                                        <p>Are you sure want to delete?</p>
                                    </div>
                                    <div class="modal-btn delete-action">
                                        <div class="row">
                                            <div class="col-6">
                                                <form method="POST" action="{{ route('spk.destroy', $dataemployees->id) }}" class="d-inline">
                                                {{-- <form method="POST" action="/spk/{{ $itemspk->id }}" class="d-inline"> --}}
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
                    <!-- /Delete SPK Modal -->                    
                @endforeach
            </tbody>
        </table>
    </div>
    
    <!-- Add SPK Modal -->
    <div id="add_spk" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add SPK</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('spk.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <input type="hidden" name="employee_id" value="{{$dataemployees->id}}">
                            <div class="col-sm-6">
                                <div class="input-block mb-3">
                                    <label class="col-form-label">SPK <span class="text-danger">*</span></label>
                                    <input class="form-control" name="spk" type="text">
                                </div>
                            </div>    
                            <div class="col-sm-6">  
                                <div class="input-block mb-3">
                                    <label class="col-form-label">Tanggal SP <span class="text-danger">*</span></label>
                                    <div class="cal-icon"><input class="form-control datetimepicker" name="tglspk" type="text"></div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="input-block mb-3">
                                    <label class="col-form-label">Keterangan <span class="text-danger">*</span></label>
                                    <input class="form-control" name="keteranganspk" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Add SPK Modal -->
</div>