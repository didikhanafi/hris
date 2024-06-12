
<div class="tab-pane fade" id="emp_assets">
                    
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col-auto float-end ms-auto">
                <a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_suratperingatan"><i class="fa-solid fa-plus"></i> Add Surat Peringatan</a>
            </div>
        </div>
    </div>
    
    <div class="table-responsive table-newdatatable">                     

        <table class="table table-new custom-table mb-0 datatable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Surat Peringatan</th>
                    <th>Assigned Date</th>
                    <th>Keterangan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datasuratperingatan as $index=>$itemsuratperingatan)
                    <tr>
                        <td>{{$index+1}}</td>
                        <td>{{$itemsuratperingatan->suratperingatan}}</td>
                        <td>{{date('d-M-Y',strtotime($itemsuratperingatan->tglsp))}}</td>
                        <td>{{$itemsuratperingatan->keterangansp}}</td>
                        <td class="text-end">
                            <div class="dropdown dropdown-action">
                                <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#view_employee{{$itemsuratperingatan->id}}"><i class="fa-solid fa-eye m-r-5"></i>View</a>
                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#edit_employee{{$itemsuratperingatan->id}}"><i class="fa-solid fa-pencil m-r-5"></i> Edit</a>
                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_employee{{$itemsuratperingatan->id}}"><i class="fa-regular fa-trash-can m-r-5"></i> Delete</a>
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
                    
                    <!-- Edit Surat Peringatan Modal -->
                    <div id="edit_employee{{$itemsuratperingatan->id}}" class="modal custom-modal fade" role="dialog">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add Surat Peringatan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="{{ route('suratperingatan.update', $itemsuratperingatan->id) }}" enctype=multipart/form-data>
                                        @method('put')
                                        @csrf
                                        <div class="row">
                                            <input type="hidden" name="employee_id" value="{{$itemsuratperingatan->employee_id}}">
                                            <div class="col-sm-6">
                                                <div class="input-block mb-3">
                                                    <label class="col-form-label">Surat Peringatan <span class="text-danger">*</span></label>
                                                    <input class="form-control" name="suratperingatan" value="{{$itemsuratperingatan->suratperingatan}}" type="text">
                                                </div>
                                            </div>    
                                            <div class="col-sm-6">  
                                                <div class="input-block mb-3">
                                                    <label class="col-form-label">Tanggal SP <span class="text-danger">*</span></label>
                                                    <div class="cal-icon"><input class="form-control datetimepicker" name="tglsp" value="{{date('d-m-Y',strtotime($itemsuratperingatan->tglsp))}}" type="text"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="input-block mb-3">
                                                    <label class="col-form-label">Keterangan <span class="text-danger">*</span></label>
                                                    <input class="form-control" name="keterangansp" value="{{$itemsuratperingatan->keterangansp}}" type="text">
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
                    <!-- /Edit Surat Peringatan Modal -->

                    <!-- Delete Surat Peringatan Modal -->
                    <div class="modal custom-modal fade" id="delete_employee{{$itemsuratperingatan->id}}" role="dialog">
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
                                                <form method="POST" action="{{ route('suratperingatan.destroy', $dataemployees->id) }}" class="d-inline">
                                                {{-- <form method="POST" action="/suratperingatan/{{ $itemsuratperingatan->id }}" class="d-inline"> --}}
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
                    <!-- /Delete Surat Peringatan Modal -->                    
                @endforeach
            </tbody>
        </table>
    </div>
    
    <!-- Add Surat Peringatan Modal -->
    <div id="add_suratperingatan" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Surat Peringatan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/suratperingatan" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <input type="hidden" name="employee_id" value="{{$dataemployees->id}}">
                            <div class="col-sm-6">
                                <div class="input-block mb-3">
                                    <label class="col-form-label">Surat Peringatan <span class="text-danger">*</span></label>
                                    <input class="form-control" name="suratperingatan" type="text">
                                </div>
                            </div>    
                            <div class="col-sm-6">  
                                <div class="input-block mb-3">
                                    <label class="col-form-label">Tanggal SP <span class="text-danger">*</span></label>
                                    <div class="cal-icon"><input class="form-control datetimepicker" name="tglsp" type="text"></div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="input-block mb-3">
                                    <label class="col-form-label">Keterangan <span class="text-danger">*</span></label>
                                    <input class="form-control" name="keterangansp" type="text">
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
    <!-- /Add Surat Peringatan Modal -->
</div>