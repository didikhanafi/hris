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
                            <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="/employees">All Employees</a></li>
                            <li class="breadcrumb-item active">{{$title}}</li>
                        </ul>
                    </div>
                    <div class="col-auto float-end ms-auto">
                        <a href="/employees" class="btn btn-info" ><i class="fa-solid fa-arrow-left"></i> Back to Employees</a>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            
            <div class="card mb-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile-view">
                                <div class="profile-img-wrap">
                                    <div class="profile-img">
                                        <a href="#">
                                            @if ($dataemployees->uploademployee!="")
                                                <img src="{{ asset('storage/' . $dataemployees->uploademployee) }}" alt="{{$dataemployees->employee}}">
                                            @else
                                                <img src="{{ asset('storage/noimage.png') }}" 															
                                            @endif
                                        </a>
                                    </div>
                                </div>
                                <div class="profile-basic">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="profile-info-left">
                                                <h3 class="user-name m-t-0 mb-0">{{$dataemployees->employee}}</h3>
                                                <h6 class="text-muted">{{$dataemployees->companies->companies}}</h6>
                                                <small class="text-muted">{{$dataemployees->positions->position}} | {{$dataemployees->positions->position}}</small>
                                                <div class="staff-id">Employee ID : {{$dataemployees->employeecode}}</div>
                                                <div class="small doj text-muted">Date of Join : {{date('d-M-Y', strtotime($dataemployees->tglmasuk));}} </div>   
                                                

                                                @if ($dataemployees->statuskontrak=='kontrak')
                                                    <div class="small doj text-muted">
                                                        Status Karyawan : {{$dataemployees->statuskontrak}} 
                                                        <a href="#">(Update Status)</a>
                                                    </div>                                                    
                                                @else
                                                    <div class="small doj text-muted">Status Karyawan : {{$dataemployees->statuskontrak}} {{date('d-M-Y', strtotime($dataemployees->tglmasuk));}} </div>                                                    
                                                @endif


                                                {{-- status Karyawan Aktif atau Resign --}}
                                                @if ($dataemployees->employeestatus=='1')
                                                    <div class="mt-2 dropdown action-label">
                                                        <a href="#" class="btn btn-white btn-sm btn-rounded"><i class="fa-regular fa-circle-dot text-success"></i> Active </a>
                                                    </div>
                                                @else
                                                    <div class="mt-2 dropdown action-label">
                                                        <a href="#" class="btn btn-white btn-sm btn-rounded"><i class="fa-regular fa-circle-dot text-danger"></i> Resign </a>
                                                        
                                                    </div>
                                                @endif

                                                {{-- <div class="staff-msg"><a class="btn btn-success" href="chat.html">Active</a></div> --}}
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <ul class="personal-info">
                                                <li>
                                                    <div class="title">Phone:</div>
                                                    <div class="text"><a href="">{{$dataemployees->phone}}</a></div>
                                                </li>
                                                <li>
                                                    <div class="title">Email:</div>
                                                    <div class="text"><a href="">{{$dataemployees->email}}</a></div>
                                                </li>
                                                <li>
                                                    <div class="title">Birthday:</div>
                                                    <div class="text">{{$dataemployees->tempatlahir}}, {{date('d-M-Y', strtotime($dataemployees->tgllahir));}}</div>
                                                </li>
                                                <li>
                                                    <div class="title">Address:</div>
                                                    <div class="text">{{$dataemployees->alamat}}</div>
                                                </li>
                                                <li>
                                                    <div class="title"></div>
                                                    <div class="text">{{$dataemployees->city}} - {{$dataemployees->provensi}}</div>
                                                </li>
                                                <li>
                                                    <div class="title">Gender:</div>
                                                    <div class="text">{{$dataemployees->gender}}</div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="pro-edit"><a data-bs-target="#profile_info" data-bs-toggle="modal" class="edit-icon" href="#"><i class="fa-solid fa-pencil"></i></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="card tab-box">
                <div class="row user-tabs">
                    <div class="col-lg-12 col-md-12 col-sm-12 line-tabs">
                        <ul class="nav nav-tabs nav-tabs-bottom">
                            <li class="nav-item"><a href="#emp_profile" data-bs-toggle="tab" class="nav-link active">Profile</a></li>
                            <li class="nav-item"><a href="#bank_statutory" data-bs-toggle="tab" class="nav-link">Salary</a></li>
                            {{-- <li class="nav-item"><a href="#bank_statutory" data-bs-toggle="tab" class="nav-link">Salary <small class="text-danger">(Admin Only)</small></a></li> --}}
                            <li class="nav-item"><a href="#emp_assets" data-bs-toggle="tab" class="nav-link">Surat Peringatan (SP)</a></li>
                            <li class="nav-item"><a href="#emp_spk" data-bs-toggle="tab" class="nav-link">SPK</a></li>
                            <li class="nav-item"><a href="#emp_loan" data-bs-toggle="tab" class="nav-link">Pinjaman Karyawan</a></li>
                            <li class="nav-item"><a href="#emp_mutation" data-bs-toggle="tab" class="nav-link">Mutasi Karyawan</a></li>
                            <li class="nav-item"><a href="#emp_history" data-bs-toggle="tab" class="nav-link">History</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="tab-content">
            
                <!-- Profile Info Tab -->
                <div id="emp_profile" class="pro-overview tab-pane fade show active">
                    <div class="row">
                        <div class="col-md-6 d-flex">
                            <div class="card profile-box flex-fill">
                                <div class="card-body">
                                    <h3 class="card-title">Personal Informations <a href="#" class="edit-icon" data-bs-toggle="modal" data-bs-target="#personal_info_modal"><i class="fa-solid fa-pencil"></i></a></h3>
                                    <ul class="personal-info">
                                        <li>
                                            <div class="title">No Identitas KTP</div>
                                            <div class="text">{{$dataemployees->ktp}}</div>
                                        </li>
                                        <li>
                                            <div class="title">Alamat</div>
                                            <div class="text">{{$dataemployees->ktpalamat}}</div>
                                        </li>
                                        <li>
                                            <div class="title">Kota</div>
                                            <div class="text">{{$dataemployees->ktpkota}}</div>
                                        </li>
                                        <li>
                                            <div class="title">Povensi</div>
                                            <div class="text">{{$dataemployees->ktpprovensi}}</div>
                                        </li>
                                        <li>
                                            <div class="title">Religion</div>
                                            <div class="text">{{$dataemployees->religions->religion}}</div>
                                        </li>
                                        <li>
                                            <div class="title">Marital status</div>
                                            <div class="text">{{$dataemployees->statusnikahs->statusnikah}}</div>
                                        </li>
                                        <li>
                                            <div class="title">Pendidikan</div>
                                            <div class="text">{{$dataemployees->pendidikans->pendidikan}}</div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 d-flex">
                            <div class="card profile-box flex-fill">
                                <div class="card-body">
                                    <h3 class="card-title">Employment of spouse <a href="#" class="edit-icon" data-bs-toggle="modal" data-bs-target="#emergency_contact_modal"><i class="fa-solid fa-pencil"></i></a></h3>
                                    <h5 class="section-title">Suami / Istri</h5>
                                    <ul class="personal-info">
                                        <li>
                                            <div class="title">Nama Pasangan</div>
                                            <div class="text">{{$dataemployees->spousename}}</div>
                                        </li>
                                        <li>
                                            <div class="title">Tempat Lahir</div>
                                            <div class="text">{{$dataemployees->spousetempatlahir}}</div>
                                        </li>
                                        <li>
                                            <div class="title">Tanggal Lahir </div>
                                            <div class="text">{{date('d-M-Y', strtotime($dataemployees->spousetgllahir));}}</div>
                                        </li>
                                        <li>
                                            <div class="title">Tanggal Menikah </div>
                                            <div class="text">{{date('d-M-Y', strtotime($dataemployees->spousetglnikah));}}</div>
                                        </li>
                                        <li>
                                            <div class="title">Pekerjaan </div>
                                            <div class="text">{{$dataemployees->spousejob}}</div>
                                        </li>
                                        <li>
                                            <div class="title">Jumlah Anak</div>
                                            <div class="text">{{$dataemployees->jmlanak}} Anak</div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 d-flex">
                            <div class="card profile-box flex-fill">
                                <div class="card-body">
                                    {{-- <h3 class="card-title">Bank Information <a href="#" class="edit-icon" data-bs-toggle="modal" data-bs-target="#personal_info_modal"><i class="fa-solid fa-pencil"></i></a></h3> --}}
                                    <h3 class="card-title">Bank Information <a href="#" class="edit-icon" data-bs-toggle="modal" data-bs-target="#bank_info_modal"><i class="fa-solid fa-pencil"></i></a></h3>

                                    <ul class="personal-info">
                                        <li>
                                            <div class="title">Bank name</div>
                                            <div class="text">{{$dataemployees->bank}}</div>
                                        </li>
                                        <li>
                                            <div class="title">Account Nama.</div>
                                            <div class="text">{{$dataemployees->bankname}}</div>
                                        </li>
                                        <li>
                                            <div class="title">Bank account No.</div>
                                            <div class="text">{{$dataemployees->bankacc}}</div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 d-flex">
                            <div class="card profile-box flex-fill">
                                <div class="card-body">
                                    <h3 class="card-title">Other Information <a href="#" class="edit-icon" data-bs-toggle="modal" data-bs-target="#other_modal"><i class="fa-solid fa-pencil"></i></a></h3>

                                    <ul class="personal-info">
                                        <li>
                                            <div class="title">NPWP</div>
                                            <div class="text">{{$dataemployees->npwp}}</div>
                                        </li>
                                        <li>
                                            <div class="title">Jamsostek</div>
                                            <div class="text">{{$dataemployees->jamsostek}}</div>
                                        </li>
                                        <li>
                                            <div class="title">Asuransi Kesehatan</div>
                                            <div class="text">{{$dataemployees->asuransi}}</div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 d-flex">
                            <div class="card profile-box flex-fill">
                                <div class="card-body">
                                    <h3 class="card-title">Foto Identitas</h3>
                                    <div>
                                        @if ($dataemployees->uploadktp!="")
                                        <img src="{{ asset('storage/' . $dataemployees->uploadktp) }}" 
                                        @else
                                        <img src="{{ asset('storage/noimage.png') }}" 															
                                        @endif
                                        alt="User Image">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Profile Info Tab -->
                
                <!-- Projects Tab -->
                @include('employee.employeemodal.employeedetailhistory')
                <!-- /Projects Tab -->

                <!-- SPK Tab -->
                @include('employee.employeemodal.employeedetailspk')
                <!-- /SPK Tab -->                
                
                <!-- Salary Tab -->
                @include('employee.employeemodal.employeedetailsalary')
                <!-- /Salary Tab -->
                
                <!-- Surat Peringatan -->
                @include('employee.employeemodal.employeedetailsp')
                <!-- /Surat Peringatan -->

                <!-- loan -->

                @include('employee.employeemodal.employeedetailloan')
                <!-- /loan -->
                
                
                <!-- Mutation -->
                @include('employee.employeemodal.employeedetailmutation')
                <!-- /Mutation -->
                
            </div>
        </div>
        <!-- /Page Content -->
        
        <!-- Profile Modal -->
        <div id="profile_info" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Profile Information</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">        
                        {{-- <form action="{{ route('employees.update', $dataemployees->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT') --}}
                        <form method="POST" action="{{ route('employeesdetail.update', $dataemployees->id) }}" enctype=multipart/form-data>
                            @method('put')
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="profile-img-wrap edit-img">
                                        @if ($dataemployees->uploademployee!="")
                                            <img class="inline-block" src="{{ asset('storage/' . $dataemployees->uploademployee) }}" alt="{{$dataemployees->employee}}">
                                        @else
                                            <img class="inline-block"  src="{{ asset('storage/noimage.png')}}"> 															
                                        @endif
                                        {{-- <img class="inline-block" src="{{ asset('storage/' . $dataemployees->uploademployee) }}" alt="{{$dataemployees->employee}}">  --}}
                                        <div class="fileupload btn">
                                            <span class="btn-text">edit</span>
                                            <input class="upload" name="uploademployee" type="file">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" name="tabakses" value="mainprofile" >
                            <div class="row">                                   
                                <div class="col-sm-6">
                                    <div class="input-block mb-3">
                                        <label class="col-form-label">Perusahaan (PT)</label>
                                        <select class="select" name="company_id">
                                            @foreach ($datacompany as $itemcompany)
                                                <option value="{{$itemcompany->id}}"
                                                @if ($itemcompany->id==$dataemployees->company_id)
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
                                        <select class="select" name="branches"
                                            @foreach ($databranches as $itembranches)
                                             
                                                @if ($itembranches->id==$dataemployees->branches_id)
                                                    <option value="{{$itembranches->id}}" selected>{{$itembranches->branches}}</option>                                        
                                                @else
                                                    <option value="{{$itembranches->id}}">{{$itembranches->branches}}</option>                                        
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-block mb-3">
                                        <label class="col-form-label">Departemen</label>
                                        <select class="select" name="departement">
                                            @foreach ($datadepartement as $itemdepartement)
                                            @if ($itemdepartement->id==$dataemployees->departement_id)
                                                @selected(true)
                                            @endif	
                                                <option value="{{$itemdepartement->departementscode}}">{{$itemdepartement->departements}}</option>                                        
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-block mb-3">
                                        <label class="col-form-label">Jabatan</label>
                                        <select class="select" name="position">
                                            @foreach ($dataposition as $itemposition)
                                                
                                                @if ($itemposition->id==$dataemployees->id)
                                                    <option value="{{$itemposition->id}}" selected>{{$itemposition->position}}</option>
                                                @else
                                                    <option value="{{$itemposition->id}}">{{$itemposition->position}}</option>
                                                @endif
                                                                                        
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-block mb-3">
                                        <label class="col-form-label">Employee ID / NIK <span class="text-danger">*</span></label>
                                        <input class="form-control" name="employeecode" value="{{$dataemployees->employeecode}}" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-block mb-3">
                                        <label class="col-form-label">Nama Karyawan <span class="text-danger">*</span></label>
                                        <input class="form-control" name="employee" value="{{$dataemployees->employee}}" type="text">
                                    </div>
                                </div>                                       
                                <div class="col-sm-6">
                                    <div class="input-block mb-3">
                                        <label class="col-form-label">Phone <span class="text-danger">*</span></label>
                                        <input class="form-control" name="phone" value="{{$dataemployees->phone}}" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-block mb-3">
                                        <label class="col-form-label">Upload Identitas <span class="text-danger">*</span></label>
                                        @if($dataemployees->uploadktp)
                                            <img src="{{ asset('storage/' . $dataemployees->uploadktp) }}" width="100" alt="Identitas Karyawan">
                                        @endif
                                        <input class="form-control" name="uploadktp" type="file">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="input-block mb-3">
                                        <label class="col-form-label">Email <span class="text-danger">*</span></label>
                                        <input class="form-control" name="email" value="{{$dataemployees->email}}" type="email">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-block mb-3">
                                        <input class="checkbox" type="checkbox" name="emoloyeestatus" 
                                        @if ($dataemployees->employeestatus=='1')
                                            @checked(true)
                                        @endif>
                                        <label class="col-form-label">Karyawan Aktif <span class="text-danger">*</span></label>                                                
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">

                                <div class="col-sm-6">
                                    <div class="input-block mb-3">
                                        <label class="col-form-label">Tempat lahir</label>
                                        <input class="form-control" name="tempatlahir" value="{{$dataemployees->tempatlahir}}" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-6">  
                                    <div class="input-block mb-3">
                                        <label class="col-form-label">Tanggal Lahir <span class="text-danger">*</span></label>
                                        <div class="cal-icon"><input class="form-control datetimepicker" name="tgllahir" value="{{$dataemployees->tgllahir}}" type="text"></div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-block mb-3">
                                        <label class="col-form-label">Jenis Kelamin</label>
                                        <select class="select" name="gender">
                                            <option value="Laki-laki" 
                                            @if ($dataemployees->gender=='Laki-laki')
                                                @selected(true)
                                            @endif
                                            >Laki-laki</option>
                                            <option value="Prempuan"
                                            @if ($dataemployees->gender=='Prempuan')
                                                @selected(true)
                                            @endif
                                            >Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="input-block mb-3">
                                        <label class="col-form-label">Alamat <span class="text-danger">*</span></label>
                                        <input class="form-control" name="alamat" value="{{$dataemployees->alamat}}" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-block mb-3">
                                        <label class="col-form-label">Kota <span class="text-danger">*</span></label>
                                        <input class="form-control" name="city" value="{{$dataemployees->city}}" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-block mb-3">
                                        <label class="col-form-label">Provensi <span class="text-danger">*</span></label>
                                        <input class="form-control" name="provensi" value="{{$dataemployees->provensi}}" type="text">
                                    </div>
                                </div>
                                
                                <div class="col-sm-6">  
                                    <div class="input-block mb-3">
                                        <label class="col-form-label">Tanggal Masuk <span class="text-danger">*</span></label>
                                        <div class="cal-icon"><input class="form-control datetimepicker" name="tglmasuk" type="text" value="{{$dataemployees->tglmasuk}}"></div>
                                    </div>
                                </div>
                                <div class="col-sm-6">  
                                    <div class="input-block mb-3">
                                        <label class="col-form-label">Tanggal Keluar <span class="text-danger">*</span></label>
                                        <div class="cal-icon"><input class="form-control datetimepicker" name="tglkeluar" type="text" 
                                            @if ($dataemployees->employeestatus=='1')
                                                value="">
                                            @else
                                                value="{{$dataemployees->tglkeluar}}">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-block mb-3">
                                        <label class="col-form-label">Status Karyawan</label>
                                        <select class="select" name="statuskontrak">
                                            <option value="kontrak"
                                            @if ($dataemployees->statuskontrak=='kontrak')
                                                selected
                                            @endif
                                            >Kontrak</option>
                                            <option value="tetap"
                                            @if ($dataemployees->statuskontrak=='tetap')
                                                selected
                                            @endif
                                            >Tetap</option>
                                        </select>
                                    </div>
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
        <!-- /Profile Modal -->
        
        <!-- Personal Info Modal -->
        <div id="personal_info_modal" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Personal Information</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('employeespersonal.update', $dataemployees->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="input-block mb-3">
                                        <label class="col-form-label">Nomor Identitas KTP <span class="text-danger">*</span></label>
                                        <input class="form-control" name="ktp" value="{{$dataemployees->ktp}}" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="input-block mb-3">
                                        <label class="col-form-label">Alamat Sesuai KTP <span class="text-danger">*</span></label>
                                        <input class="form-control" name="ktpalamat" value="{{$dataemployees->ktpalamat}}" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-block mb-3">
                                        <label class="col-form-label">Kota <span class="text-danger">*</span></label>
                                        <input class="form-control" name="ktpkota" value="{{$dataemployees->ktpkota}}" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-block mb-3">
                                        <label class="col-form-label">Provensi <span class="text-danger">*</span></label>
                                        <input class="form-control" name="ktpprovensi" value="{{$dataemployees->ktpprovensi}}" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-block mb-3">
                                        <label class="col-form-label">Agama</label>
                                        <select class="select" name="religion_id">
                                            @foreach ($datareligion as $itemreligion)
                                            @if ($itemreligion->id==$dataemployees->religion_id)
                                                <option value="{{$itemreligion->id}}" selected>{{$itemreligion->religion}}</option>  
                                            @else
                                                <option value="{{$itemreligion->id}}">{{$itemreligion->religion}}</option>                                        
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-block mb-3">
                                        <label class="col-form-label">Status Pernikahan</label>
                                        <select class="select" name="statusnikah">
                                            @foreach ($datastatusnikah as $itemstatusnikah)
                                                @if ($itemstatusnikah->id==$dataemployees->statusnikah)
                                                    <option value="{{$itemstatusnikah->id}}" selected>{{$itemstatusnikah->statusnikah}}</option>  
                                                @else
                                                    <option value="{{$itemstatusnikah->id}}">{{$itemstatusnikah->statusnikah}}</option>															
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-block mb-3">
                                        <label class="col-form-label">Pendidikan</label>
                                        <select class="select" name="pendidikan">
                                            @foreach ($datapendidikan as $itempendidikan)
                                                @if ($itempendidikan->id==$dataemployees->pendidikan)
                                                    <option value="{{$itempendidikan->id}}" selected>{{$itempendidikan->pendidikan}}</option>
                                                @else
                                                    <option value="{{$itempendidikan->id}}">{{$itempendidikan->pendidikan}}</option>
                                                @endif
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
        <!-- /Personal Info Modal -->

        <!-- Bank Info Modal -->
        <div id="bank_info_modal" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Bank Information</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('employeesbank.update', $dataemployees->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="input-block mb-3">
                                        <label class="col-form-label">Bank Name <span class="text-danger">*</span></label>
                                        <input class="form-control" name="bank" value="{{$dataemployees->bank}}" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-block mb-3">
                                        <label class="col-form-label">Account Name <span class="text-danger">*</span></label>
                                        <input class="form-control" name="bankname" value="{{$dataemployees->bankname}}" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-block mb-3">
                                        <label class="col-form-label">Nomor Bank Account <span class="text-danger">*</span></label>
                                        <input class="form-control" name="bankacc" value="{{$dataemployees->bankacc}}" type="text">
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
        <!-- /Bank Info Modal -->   

        <!-- Other Info Modal -->
        <div id="other_modal" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Other Information</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('employeesother.update', $dataemployees->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="input-block mb-3">
                                        <label class="col-form-label">NPWP <span class="text-danger">*</span></label>
                                        <input class="form-control" name="npwp" value="{{$dataemployees->npwp}}" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-block mb-3">
                                        <label class="col-form-label">Alamat KTP <span class="text-danger">*</span></label>
                                        <input class="form-control" name="jamsostek" value="{{$dataemployees->jamsostek}}" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-block mb-3">
                                        <label class="col-form-label">Asuransi Kesehatan <span class="text-danger">*</span></label>
                                        <input class="form-control" name="asuransi" value="{{$dataemployees->asuransi}}" type="text">
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
        <!-- /Other Info Modal -->
        
        <!-- Family Info Modal -->
        <div id="family_info_modal" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"> Employee Mutation</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-scroll">
                                <div class="card">
                                    <div class="card-body">
                                        {{-- <h3 class="card-title">Employee Mutation <a href="javascript:void(0);" class="delete-icon"><i class="fa-regular fa-trash-can"></i></a></h3> --}}
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-block mb-3">
                                                    <label class="col-form-label">PKWT ke <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="number">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-block mb-3">
                                                    <label class="col-form-label">Tanggal Masuk <span class="text-danger">*</span></label>
                                                    <div class="cal-icon"><input class="form-control datetimepicker" name="tglmasuk" type="text"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-block mb-3">
                                                    <label class="col-form-label">Keterangan <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-block mb-3">
                                                    <label class="col-form-label">Tanggal Keluar <span class="text-danger">*</span></label>
                                                    <div class="cal-icon"><input class="form-control datetimepicker" name="tglkeluar" type="text"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                {{-- <div class="card">
                                    <div class="card-body">
                                        <h3 class="card-title">Education Informations <a href="javascript:void(0);" class="delete-icon"><i class="fa-regular fa-trash-can"></i></a></h3>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-block mb-3">
                                                    <label class="col-form-label">Name <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-block mb-3">
                                                    <label class="col-form-label">Relationship <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-block mb-3">
                                                    <label class="col-form-label">Date of birth <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-block mb-3">
                                                    <label class="col-form-label">Phone <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="add-more">
                                            <a href="javascript:void(0);"><i class="fa-solid fa-plus-circle"></i> Add More</a>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                            <div class="submit-section">
                                <button class="btn btn-primary submit-btn">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Family Info Modal -->
        
        <!-- Emergency Contact Modal -->
        <div id="emergency_contact_modal" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Employment of spouse</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('employeesspouse.update', $dataemployees->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="input-block mb-3">
                                        <label class="col-form-label">Nama Istri/Suami <span class="text-danger">*</span></label>
                                        <input class="form-control" name="spousename" value="{{$dataemployees->spousename}}" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-6">  
                                    <div class="input-block mb-3">
                                        <label class="col-form-label">Tanggal Menikah <span class="text-danger">*</span></label>
                                        <div class="cal-icon"><input class="form-control datetimepicker" name="spousetglnikah" value="{{$dataemployees->spousetglnikah}}" type="text"></div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-block mb-3">
                                        <label class="col-form-label">Tempat</label>
                                        <input class="form-control" name="spousetempatlahir" value="{{$dataemployees->spousetempatlahir}}"  type="text">
                                    </div>
                                </div>
                                <div class="col-sm-6">  
                                    <div class="input-block mb-3">
                                        <label class="col-form-label">Tanggal Lahir <span class="text-danger">*</span></label>
                                        <div class="cal-icon"><input class="form-control datetimepicker" name="spousetgllahir" value="{{$dataemployees->spousetgllahir}}" type="text"></div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-block mb-3">
                                        <label class="col-form-label">Kota</label>
                                        <input class="form-control" name="spousecity" value="{{$dataemployees->spousecity}}"  type="text">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-block mb-3">
                                        <label class="col-form-label">Provensi</label>
                                        <input class="form-control" name="spouseprovensi" value="{{$dataemployees->spouseprovensi}}" type="Text">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-block mb-3">
                                        <label class="col-form-label">Pekerjaan</label>
                                        <input class="form-control" name="spousejob" value="{{$dataemployees->spousejob}}" type="Text">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-block mb-3">
                                        <label class="col-form-label">Jumlah Anak</label>
                                        <input class="form-control" name="jmlanak" value="{{$dataemployees->jmlanak}}" type="number">
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
        <!-- /Emergency Contact Modal -->
        
        
    </div>
    <!-- /Page Wrapper -->
@endsection