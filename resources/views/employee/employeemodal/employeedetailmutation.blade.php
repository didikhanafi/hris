<div class="tab-pane fade" id="emp_mutation">
                    
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col-auto float-end ms-auto">
                <a href="#" class="btn" data-bs-toggle="modal" data-bs-target="#add_import"><i class="fa-solid fa-file"></i> Import Data</a>
            {{-- </div>
            <div class="col-auto float-end ms-auto"> --}}
                <a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_mutation"><i class="fa-solid fa-plus"></i> Add Mutation</a>
            </div>
        </div>
    </div>
    <div class="table-responsive table-newdatatable">                     
        @if(session('success'))
            <div>
                {{ session('success') }}
            </div>
        @endif
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

                @foreach ($dataemployees->mutations as $index=>$mutation)
                    <tr>
                    @if (!is_null($mutation->tglawal) && !is_null($mutation->tglakhir))
                        <td>{{ $index+1 }}</td>
                        <td>{{ $mutation->mutation_ke }}</td>
                        <td>{{ date('d-M-Y',strtotime($mutation->tglawal)) }}</td>
                        <td>{{ date('d-M-Y',strtotime($mutation->tglakhir)) }}</td>
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



                    <!-- Edit Mutation Modal -->
                    <div id="edit_mutation{{$mutation->id}}" class="modal custom-modal fade" role="dialog">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Mutasi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    {{-- <form method="POST" action="{{ route('loan.update', $itemloan->id) }}" enctype=multipart/form-data>
                                        @method('put')
                                        @csrf --}}
                                    <form action="{{ route('mutation.update', $mutation->id) }}" method="POST" enctype="multipart/form-data">
                                        @method('put')
                                        @csrf
                                        <div class="row">    
                                            <input type="hidden" name="employee_id" value="{{$dataemployees->id}}">
                                            <div class="col-sm-12">
                                                <div class="input-block mb-3">
                                                    <label class="col-form-label">PKWT ke <span class="text-danger">*</span></label>
                                                    <input class="form-control" name="mutation_ke" value="{{$mutation->mutation_ke}}" type="text">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">  
                                                <div class="input-block mb-3">
                                                    <label class="col-form-label">Tanggal Masuk <span class="text-danger">*</span></label>
                                                    <div class="cal-icon"><input class="form-control datetimepicker" name="tglawal" value="{{date('d-m-Y',strtotime($mutation->tglawal))}}" type="text"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">  
                                                <div class="input-block mb-3">
                                                    <label class="col-form-label">Tanggal Keluar <span class="text-danger">*</span></label>
                                                    <div class="cal-icon"><input class="form-control datetimepicker" name="tglakhir" value="{{date('d-m-Y',strtotime($mutation->tglakhir))}}" type="text"></div>
                                                </div>
                                            </div><div class="col-sm-6">
                                                <div class="input-block mb-3">
                                                    <label class="col-form-label">Perusahaan (PT)</label>
                                                    <select class="select" name="companies_id">
                                                        @foreach ($datacompany as $itemcompany)
                                                            <option value="{{$itemcompany->id}}"
                                                                @if ($itemcompany->id==$mutation->companies_id)
                                                                    @selected(true)
                                                                @endif    
                                                            >{{$itemcompany->companies}}</option>                                        
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="input-block mb-3">
                                                    <label class="col-form-label">Cabang</label>
                                                    <select class="select" name="branch_id">
                                                        @foreach ($databranches as $itembranches)
                                                            <option value="{{$itembranches->id}}"
                                                                @if ($itembranches->id==$mutation->branch_id)
                                                                    @selected(true)
                                                                @endif    
                                                            >{{$itembranches->branches}}</option>                                        
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="input-block mb-3">
                                                    <label class="col-form-label">Departemen</label>
                                                    <select class="select" name="departement_id">
                                                        @foreach ($datadepartement as $itemdepartement)
                                                            <option value="{{$itemdepartement->id}}"
                                                                @if ($itemdepartement->id==$mutation->departement_id)
                                                                    @selected(true)
                                                                @endif    
                                                            >{{$itemdepartement->departements}}</option>                                        
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="input-block mb-3">
                                                    <label class="col-form-label">Jabatan</label>
                                                    <select class="select" name="position_id">
                                                        @foreach ($dataposition as $itemposition)
                                                            <option value="{{$itemposition->id}}"
                                                                @if ($itemposition->id==$mutation->position_id)
                                                                    @selected(true)
                                                                @endif    
                                                            >{{$itemposition->position}}</option>                                        
                                                        @endforeach
                                                    </select>
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
                    <!-- /Edit Mutation Modal -->     

                    <!-- Delete Mutation Modal -->
                    <div class="modal custom-modal fade" id="delete_mutation{{$mutation->id}}" role="dialog">
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
                                                <form method="POST" action="/mutation/{{ $mutation->id }}" class="d-inline">
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
                    @endif
                    </tr>
                    {{-- <td>{{$mutation->}}</td> --}}
                @endforeach
                {{-- @foreach ($datamutation as $index=>$itemmutation)

                    <tr>
                        <td>{{$index+1}}</td>
                        <td>{{$itemmutation->mutation_ke}}</td>
                        <td>{{date('d-M-Y',strtotime($itemmutation->tglawal))}}</td>
                        <td>{{date('d-M-Y',strtotime($itemmutation->tglakhir))}}</td>
                        <td>{{$itemmutation->branches->branches ?? '' }} ({{$itemmutation->companies->companies ?? '' }})</td>
                        <td>{{$itemmutation->positions->position ?? '' }} ({{$itemmutation->departements->departements ?? '' }})</td>
                        <td class="text-end">
                            <div class="dropdown dropdown-action">
                                <a aria-expanded="false" data-bs-toggle="dropdown" class="action-icon dropdown-toggle" href="#"><i class="material-icons">more_vert</i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#edit_mutation{{$itemmutation->id}}"><i class="fa-solid fa-pencil m-r-5"></i> Edit</a>
                                    <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#delete_mutation{{$itemmutation->id}}"><i class="fa-regular fa-trash-can m-r-5"></i> Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>                                    
                @endforeach --}}
            </tbody>
        </table>
    </div>
    
    <!-- Add Mutation Modal -->
    <div id="add_mutation" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Mutasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('mutation.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">    
                            <input type="hidden" name="employee_id" value="{{$dataemployees->id}}">
                            <div class="col-sm-12">
                                <div class="input-block mb-3">
                                    <label class="col-form-label">PKWT ke <span class="text-danger">*</span></label>
                                    <input class="form-control" name="mutation_ke" type="text">
                                </div>
                            </div>
                            <div class="col-sm-6">  
                                <div class="input-block mb-3">
                                    <label class="col-form-label">Tanggal Masuk <span class="text-danger">*</span></label>
                                    <div class="cal-icon"><input class="form-control datetimepicker" name="tglawal" type="text"></div>
                                </div>
                            </div>
                            <div class="col-sm-6">  
                                <div class="input-block mb-3">
                                    <label class="col-form-label">Tanggal Keluar <span class="text-danger">*</span></label>
                                    <div class="cal-icon"><input class="form-control datetimepicker" name="tglakhir" type="text"></div>
                                </div>
                            </div><div class="col-sm-6">
                                <div class="input-block mb-3">
                                    <label class="col-form-label">Perusahaan (PT)</label>
                                    <select class="select" name="companies_id">
                                        @foreach ($datacompany as $itemcompany)
                                            <option value="{{$itemcompany->id}}">{{$itemcompany->companies}}</option>                                        
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-block mb-3">
                                    <label class="col-form-label">Cabang</label>
                                    <select class="select" name="branch_id">
                                        @foreach ($databranches as $itembranches)
                                            <option value="{{$itembranches->id}}">{{$itembranches->branches}}</option>                                        
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-block mb-3">
                                    <label class="col-form-label">Departemen</label>
                                    <select class="select" name="departement_id">
                                        @foreach ($datadepartement as $itemdepartement)
                                            <option value="{{$itemdepartement->id}}">{{$itemdepartement->departements}}</option>                                        
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-block mb-3">
                                    <label class="col-form-label">Jabatan</label>
                                    <select class="select" name="position_id">
                                        @foreach ($dataposition as $itemposition)
                                            <option value="{{$itemposition->id}}">{{$itemposition->position}}</option>                                        
                                        @endforeach
                                    </select>
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
    <!-- /Add Mutation Modal -->

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
                            <input type="hidden" name="employee_id" value="{{$dataemployees->id}}">
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