
@extends('layouts.appsetting')

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
                            <li class="breadcrumb-item">Employees</li>
                            <li class="breadcrumb-item active">{{$title}}</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            <div class="search-lists">
                <ul class="nav nav-tabs nav-tabs-solid">
                    <li class="nav-item"><a class="nav-link active" href="#results_aktif" data-bs-toggle="tab">Karyawan Aktif</a></li>
                    <li class="nav-item"><a class="nav-link" href="#results_tidakaktif" data-bs-toggle="tab">Karyawan Tidak Aktif</a></li>
                    <li class="nav-item"><a class="nav-link" href="#results_kontrak" data-bs-toggle="tab">Karyawan Kontrak</a></li>
                    <li class="nav-item"><a class="nav-link" href="#results_tetap" data-bs-toggle="tab">Karyawan Tetap</a></li>
                </ul>
                <div class="tab-content">
                    
                    <div class="tab-pane show active" id="results_aktif">
                       //
                    </div>
                    <div class="tab-pane" id="results_tidakaktif">
                        //
                    </div>
                    <div class="tab-pane" id="results_kontrak">
                        //
                    </div>
                    <div class="tab-pane" id="results_tetap">
                        //
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- /Page Content -->
        
        
    </div>
    <!-- /Page Wrapper -->
@endsection