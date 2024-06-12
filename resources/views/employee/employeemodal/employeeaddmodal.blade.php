
				<!-- Add Employee Modal -->
				<div id="add_employee" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Add Employee</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form action="/employees" method="POST" enctype="multipart/form-data">
									@csrf
									<div class="row">                                   
										<div class="col-sm-6">
                                            <div class="input-block mb-3">
                                                <label class="col-form-label">Perusahaan (PT)</label>
												<select class="select" name="company_id">
													@foreach ($datacompany as $itemcompany)
														<option value="{{$itemcompany->id}}">{{$itemcompany->companies}}</option>                                        
													@endforeach
												</select>
											</div>
                                        </div>
										<div class="col-sm-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Cabang</label>
												<select class="select" name="branches">
													@foreach ($databranches as $itembranches)
														<option value="{{$itembranches->id}}">{{$itembranches->branches}}</option>                                        
													@endforeach
												</select>
											</div>
										</div>
                                        <div class="col-sm-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Departemen</label>
												<select class="select" name="departements">
													@foreach ($datadepartement as $itemdepartement)
														<option value="{{$itemdepartement->id}}">{{$itemdepartement->departements}}</option>                                        
													@endforeach
												</select>
											</div>
                                        </div>
                                        <div class="col-sm-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Jabatan</label>
												<select class="select" name="position">
													@foreach ($dataposition as $itemposition)
														<option value="{{$itemposition->id}}">{{$itemposition->position}}</option>                                        
													@endforeach
												</select>
											</div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="input-block mb-3">
                                                <label class="col-form-label">Employee ID / NIK <span class="text-danger">*</span></label>
                                                <input class="form-control" name="employeecode" value="{{$codeno}}" type="text">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Nama Karyawan <span class="text-danger">*</span></label>
												<input class="form-control" name="employee" type="text">
											</div>
                                        </div>
                                        <div class="col-sm-12">
											<div class="input-block mb-3">
												<label class="col-form-label">Alamat <span class="text-danger">*</span></label>
												<input class="form-control" name="alamat" type="text">
											</div>
										</div>
                                        <div class="col-sm-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Kota <span class="text-danger">*</span></label>
												<input class="form-control" name="city" type="text">
											</div>
                                        </div>
                                        <div class="col-sm-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Provensi <span class="text-danger">*</span></label>
												<input class="form-control" name="provensi" type="text">
											</div>
                                        </div>
                                        <div class="col-sm-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Phone <span class="text-danger">*</span></label>
												<input class="form-control" name="phone" type="text">
											</div>
                                        </div>
                                        <div class="col-sm-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Upload Foto <span class="text-danger">*</span></label>
                                                <input class="form-control" name="uploademployee" type="file">
											</div>
                                        </div>
                                        <div class="col-sm-12">
											<div class="input-block mb-3">
												<label class="col-form-label">Email <span class="text-danger">*</span></label>
												<input class="form-control" name="email" type="email">
											</div>
										</div>
                                    </div>
                                    <hr>
                                    <div class="row">

										<div class="col-sm-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Tempat lahir</label>
												<input class="form-control" name="tempatlahir" type="text">
											</div>
										</div>
										<div class="col-sm-6">  
											<div class="input-block mb-3">
												<label class="col-form-label">Tanggal Lahir <span class="text-danger">*</span></label>
												<div class="cal-icon"><input class="form-control datetimepicker" name="tgllahir" type="text"></div>
											</div>
										</div>
                                        <div class="col-sm-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Jenis Kelamin</label>
												<select class="select" name="gender">
													<option value="Laki-laki">Laki-laki</option>
													<option value="Prempuan">Perempuan</option>
												</select>
											</div>
                                        </div>
                                        <div class="col-sm-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Agama</label>
												<select class="select" name="religion_id">
													@foreach ($datareligion as $itemreligion)
														<option value="{{$itemreligion->id}}">{{$itemreligion->religion}}</option>                                        
													@endforeach
												</select>
											</div>
                                        </div>
                                        <div class="col-sm-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Status Pernikahan</label>
												<select class="select" name="statusnikah">
													@foreach ($datastatusnikah as $itemstatusnikah)
														<option value="{{$itemstatusnikah->id}}">{{$itemstatusnikah->statusnikah}}</option>                                        
													@endforeach
												</select>
											</div>
                                        </div>
                                        <div class="col-sm-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Pendidikan</label>
                                                <select class="select" name="pendidikan">
                                                    @foreach ($datapendidikan as $itempendidikan)
                                                        <option value="{{$itempendidikan->id}}">{{$itempendidikan->pendidikan}}</option>                                        
                                                    @endforeach
												</select>
											</div>
                                        </div>
                                        
										<div class="col-sm-6">  
											<div class="input-block mb-3">
												<label class="col-form-label">Tanggal Masuk <span class="text-danger">*</span></label>
												<div class="cal-icon"><input class="form-control datetimepicker" name="tglmasuk" type="text"></div>
											</div>
										</div>
										<div class="col-sm-6">  
											<div class="input-block mb-3">
												<label class="col-form-label">Tanggal Keluar <span class="text-danger">*</span></label>
												<div class="cal-icon"><input class="form-control datetimepicker" name="tglkeluar" type="text"></div>
											</div>
										</div>
                                        <div class="col-sm-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Status Karyawan</label>
												<select class="select" name="statuskontrak">
													<option value="kontrak">Kontrak</option>
													<option value="tetap">Tetap</option>
												</select>
											</div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
										<div class="col-sm-6">
											<div class="input-block mb-3">
												<input class="checkbox" type="checkbox" name="emoloyeestatus" checked>
												<label class="col-form-label">Karyawan Aktif <span class="text-danger">*</span></label>                                                
												{{-- <input class="form-control" type="checkbox"> --}}
											</div>
										</div>
										<div class="col-sm-6">
											<div class="input-block mb-3">
												{{-- <input class="checkbox" type="checkbox" name="sesuaiktp">
												<label class="col-form-label">Alamat Sesuai KTP <span class="text-danger">*</span></label>                                                 --}}
												{{-- <input class="form-control" type="checkbox"> --}}
											</div>
										</div>
                                        <div class="col-sm-6">
                                            <div class="input-block mb-3">
                                                <label class="col-form-label">Identitas KTP <span class="text-danger">*</span></label>
                                                <input class="form-control" name="ktp" type="text">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="input-block mb-3">
                                                <label class="col-form-label">Upload Identitas <span class="text-danger">*</span></label>                                                
                                                <input class="form-control" name="uploadktp" type="file">
                                            </div>
                                        </div>
										<div class="col-sm-12">
											<div class="input-block mb-3">
												<label class="col-form-label">Alamat KTP <span class="text-danger">*</span></label>
												<input class="form-control" name="ktpalamat" type="text">
											</div>
										</div>
                                        <div class="col-sm-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Kota <span class="text-danger">*</span></label>
												<input class="form-control" name="ktpkota" type="text">
											</div>
                                        </div>
                                        <div class="col-sm-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Provensi <span class="text-danger">*</span></label>
												<input class="form-control" name="ktpprovensi" type="text">
											</div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-6">
											<div class="input-block mb-3">
												<label class="col-form-label">NPWP <span class="text-danger">*</span></label>
												<input class="form-control" name="npwp" type="text">
											</div>
                                        </div>
                                        <div class="col-sm-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Jamsostek <span class="text-danger">*</span></label>
												<input class="form-control" name="jamsostek" type="text">
											</div>
                                        </div>
                                        <div class="col-sm-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Asuransi Kesehatan <span class="text-danger">*</span></label>
												<input class="form-control" name="asuransi" type="text">
											</div>
                                        </div>
                                        <div class="col-sm-6">
											<div class="input-block mb-3">
											</div>
                                        </div>
                                        <div class="col-sm-12">
											<div class="input-block mb-3">
												<label class="col-form-label">Nama Bank <span class="text-danger">*</span></label>
												<input class="form-control" name="bank" type="text">
											</div>
                                        </div>
                                        <div class="col-sm-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Nomor Rekening <span class="text-danger">*</span></label>
												<input class="form-control" name="bankacc" type="text">
											</div>
                                        </div>
                                        <div class="col-sm-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Atas Nama <span class="text-danger">*</span></label>
												<input class="form-control" name="bankname" type="text">
											</div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
										<div class="col-sm-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Nama Istri/Suami <span class="text-danger">*</span></label>
												<input class="form-control" name="spousename" type="text">
											</div>
										</div>
                                        <div class="col-sm-6">
											<div class="input-block mb-3">
											</div>
                                        </div>
										<div class="col-sm-6">  
											<div class="input-block mb-3">
												<label class="col-form-label">Tanggal Lahir <span class="text-danger">*</span></label>
												<div class="cal-icon"><input class="form-control datetimepicker" name="spousetempatlahir" type="text"></div>
											</div>
										</div>
										<div class="col-sm-6">  
											<div class="input-block mb-3">
												<label class="col-form-label">Tanggal Menikah <span class="text-danger">*</span></label>
												<div class="cal-icon"><input class="form-control datetimepicker" name="spousetgllahir" type="text"></div>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Kota</label>
												<input class="form-control" name="spousecity" type="text">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Provensi</label>
												<input class="form-control" name="spouseprovensi" type="Text">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Pekerjaan</label>
												<input class="form-control" name="spousepekerjaan" type="Text">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Jumlah Anak</label>
												<input class="form-control"name="jmlanak" type="number">
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
				<!-- /Add Employee Modal -->