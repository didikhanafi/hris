@extends('layouts.appsetting')

@section('content')
	<!-- Page Content -->
	<div class="content container-fluid">
		<div class="row">
			<div class="col-md-8 offset-md-2">
			
				<!-- Page Header -->
				<div class="page-header">
					<div class="row">
						<div class="col-sm-12">
							<h3 class="page-title">Company Settings</h3>
						</div>
					</div>
				</div>
				<!-- /Page Header -->
				

				{{-- <img src="{{ asset('storage/' . $itememployee->uploademployee) }}" alt="User Image"> --}}
				<form action="{{ route('setting.update', $settingwebcom->id) }}" method="POST" enctype="multipart/form-data">
					@csrf
					@method('PUT')
					<div class="input-block mb-3 row">
						<label class="col-lg-3 col-form-label">Website Name</label>
						<div class="col-lg-9">
							<input name="webname" class="form-control" value="{{$settingwebcom->webname}}" type="text">
						</div>
					</div>
					<div class="input-block mb-3 row">
						<label class="col-lg-3 col-form-label">Light Logo</label>
						<div class="col-lg-7">
							<input type="file" name="uploadlogo" class="form-control">
							<span class="form-text text-muted">Recommended image size is 40px x 40px</span>
						</div>
						<div class="col-lg-2">
							<div class="img-thumbnail float-end"><img src="{{ asset('storage/' . $settingwebcom->lightlogo) }}" alt="Logo" width="40" height="40"></div>
						</div>
					</div>
					<div class="input-block mb-3 row">
						<label class="col-lg-3 col-form-label">Favicon</label>
						<div class="col-lg-7">
							<input type="file" name="uploadfavicon" class="form-control">
							<span class="form-text text-muted">Recommended image size is 32px x 32px</span>
						</div>
						<div class="col-lg-2">
							<div class="settings-image img-thumbnail float-end"><img src="{{ asset('storage/' . $settingwebcom->favicon) }}" class="img-fluid" width="16" height="16" alt="Logo"></div>
						</div>
					</div>
					<div class="submit-section">
						<button class="btn btn-primary submit-btn">Save</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- /Page Content -->
@endsection
