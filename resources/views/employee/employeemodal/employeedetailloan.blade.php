
<div class="tab-pane fade" id="emp_loan">
                    
    <div class="page-header">
        <div class="row align-items-center">
            
			<div class="col">
                <h4>Limit Pinjaman : RP. {{$datasallary['salary']}}</h4> 
            </div>
            <div class="col-auto float-end ms-auto">
                <a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_loan"><i class="fa-solid fa-plus"></i> Add Loan</a>
            </div>
        </div>
    </div>
    <div class="table-responsive table-newdatatable">                     

        <table class="table table-new custom-table mb-0 datatable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tgl Pinjam</th>
                    <th>Pinjaman</th>
                    {{-- <th>Keterangan</th> --}}
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataloan as $index=>$itemloan)
                    <tr>
                        <td>{{$index+1}}</td>
                        <td>{{date('d-M-Y',strtotime($itemloan->tglloan))}}</td>
                        <td>{{$itemloan->jmlloan}}</td>
                        {{-- <td></td> --}}
                        <td class="text-end">
                            <div class="dropdown dropdown-action">
                                <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#edit_loan{{$itemloan->id}}"><i class="fa-solid fa-pencil m-r-5"></i> Edit</a>
                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_loan{{$itemloan->id}}"><i class="fa-regular fa-trash-can m-r-5"></i> Delete</a>
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

                    
                    <!-- Edit Loan Modal -->
                    <div id="edit_loan{{$itemloan->id}}" class="modal custom-modal fade" role="dialog">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add Pinjaman</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    {{-- <form action="{{ route('loan.update') }}" method="POST" enctype="multipart/form-data"> --}}
                                    <form method="POST" action="{{ route('loan.update', $itemloan->id) }}" enctype=multipart/form-data>
                                        @method('put')
                                        @csrf
                                        <div class="row">

                                            <input type="hidden" name="employee_id" value="{{$dataemployees->id}}">
                                            {{-- <div class="col-sm-6">
                                                <div class="input-block mb-3">
                                                    <label class="col-form-label">Loan <span class="text-danger">*</span></label>
                                                    <input class="form-control" name="loan" type="text">
                                                </div>
                                            </div>     --}}
                                            <div class="col-sm-6">  
                                                <div class="input-block mb-3">
                                                    <label class="col-form-label">Tanggal Pinjam <span class="text-danger">*</span></label>
                                                    <div class="cal-icon"><input class="form-control datetimepicker" name="tglloan" value="{{date('d-m-Y',strtotime($itemloan->tglloan))}}" type="text"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="input-block mb-3">
                                                    <label class="col-form-label">Jumlah Pinjaman <span class="text-danger">*</span></label>
                                                    <input class="form-control" name="jmlloan" value="{{$itemloan->jmlloan}}" type="number">
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
                    <!-- /Edit Loan Modal -->

                    <!-- Delete Loan Modal -->
                    <div class="modal custom-modal fade" id="delete_loan{{$itemloan->id}}" role="dialog">
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
                                                <form method="POST" action="/loan/{{ $itemloan->id }}" class="d-inline">
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
                    <!-- /Delete Loan Modal -->                      
                @endforeach
            </tbody>
        </table>
    </div>
    
    <!-- Add Loan Modal -->
    <div id="add_loan" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Pinjaman</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('loan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <input type="hidden" name="employee_id" value="{{$dataemployees->id}}">
                            {{-- <div class="col-sm-6">
                                <div class="input-block mb-3">
                                    <label class="col-form-label">Loan <span class="text-danger">*</span></label>
                                    <input class="form-control" name="loan" type="text">
                                </div>
                            </div>     --}}
                            <div class="col-sm-6">  
                                <div class="input-block mb-3">
                                    <label class="col-form-label">Tanggal Pinjam <span class="text-danger">*</span></label>
                                    <div class="cal-icon"><input class="form-control datetimepicker" name="tglloan" type="text"></div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-block mb-3">
                                    <label class="col-form-label">Jumlah Pinjaman <span class="text-danger">*</span></label>
                                    <input class="form-control" name="jmlloan" type="number">
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
    <!-- /Add Loan Modal -->
</div>