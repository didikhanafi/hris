
				<!-- Add Employee Modal -->

				 <div id="edit_employee{{$itememployee->id}}" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Edit Employee {{$itememployee->id}}</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">    
								<form action="{{ route('employees.update', $itememployee->id) }}" method="POST" enctype="multipart/form-data">
								@csrf
								@method('PUT')
								{{-- <form method="POST" action="/employees/{{$itememployee->id}}" enctype=multipart/form-data>
									@method('put')
									@csrf --}}

									<div class="row">                                   
										<div class="col-sm-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Perusahaan (PT)</label>
												<select class="select" name="company_id"
													@foreach ($datacompany as $itemcompany)
														@if ($itemcompany->id==$itememployee->company_id)
															<option value="{{$itemcompany->id}}" selected>{{$itemcompany->companies}}</option>                                        
														@else
															<option value="{{$itemcompany->id}}">{{$itemcompany->companies}}</option> 
														@endif
													@endforeach
												</select>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Cabang</label>
												<select class="select" name="branches"
													@foreach ($databranches as $itembranches)
													 
														@if ($itembranches->id==$itememployee->branches_id)
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
												<select class="select" name="departements"
													@foreach ($datadepartement as $itemdepartement)
													
													@if ($itemdepartement->id==$itememployee->departement_id)
														<option value="{{$itemdepartement->id}}" selected>{{$itemdepartement->departements}}</option>
													@else
														<option value="{{$itemdepartement->id}}">{{$itemdepartement->departements}}</option>
													@endif	
														                                         
													@endforeach
												</select>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Jabatan</label>
												<select class="select" name="position">
													@foreach ($dataposition as $itemposition)
														
														@if ($itemposition->id==$itememployee->id)
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
												<input class="form-control" name="employeecode" value="{{$itememployee->employeecode}}" type="text">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Nama Karyawan <span class="text-danger">*</span></label>
												<input class="form-control" name="employee" value="{{$itememployee->employee}}" type="text">
											</div>
										</div>
										<div class="col-sm-12">
											<div class="input-block mb-3">
												<label class="col-form-label">Alamat <span class="text-danger">*</span></label>
												<input class="form-control" name="alamat" value="{{$itememployee->alamat}}" type="text">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Kota <span class="text-danger">*</span></label>
												<input class="form-control" name="city" value="{{$itememployee->city}}" type="text">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Provensi <span class="text-danger">*</span></label>
												<input class="form-control" name="provensi" value="{{$itememployee->provensi}}" type="text">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Phone <span class="text-danger">*</span></label>
												<input class="form-control" name="phone" value="{{$itememployee->phone}}" type="text">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Upload Foto <span class="text-danger">*</span></label>
												@if($itememployee->uploademployee)
													<img src="{{ asset('storage/' . $itememployee->uploademployee) }}" width="100" alt="Foto Karyawan">
												@endif
												<input class="form-control" name="uploademployee" type="file">
											</div>
										</div>
										<div class="col-sm-12">
											<div class="input-block mb-3">
												<label class="col-form-label">Email <span class="text-danger">*</span></label>
												<input class="form-control" name="email" value="{{$itememployee->email}}" type="email">
											</div>
										</div>
									</div>
									<hr>
									<div class="row">
									
										<div class="col-sm-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Tempat lahir</label>
												<input class="form-control" name="tempatlahir" value="{{$itememployee->tempatlahir}}" type="text">
											</div>
										</div>
										<div class="col-sm-6">  
											<div class="input-block mb-3">
												<label class="col-form-label">Tanggal Lahir <span class="text-danger">*</span></label>
												<div class="cal-icon"><input class="form-control datetimepicker" name="tgllahir" value="{{$itememployee->tgllahir}}" type="text"></div>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Jenis Kelamin</label>
												<select class="select" name="gender">
													<option value="Laki-laki"
														@if ($itememployee->gender=="Laki-laki")
															selected
														@endif
													>Laki-laki</option>
													<option value="Prempuan"
														@if ($itememployee->gender=="Perempuan")
															selected
														@endif
													>Perempuan</option>
												</select>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Agama</label>
												<select class="select" name="religion_id">
													@foreach ($datareligion as $itemreligion)
													@if ($itemreligion->id==$itememployee->religion_id)
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
														@if ($itemstatusnikah->id==$itememployee->statusnikah)
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
														@if ($itempendidikan->id==$itememployee->pendidikan)
															<option value="{{$itempendidikan->id}}" selected>{{$itempendidikan->pendidikan}}</option>
														@else
															<option value="{{$itempendidikan->id}}">{{$itempendidikan->pendidikan}}</option>
														@endif
													@endforeach
												</select>
											</div>
										</div>
										
										<div class="col-sm-6">  
											<div class="input-block mb-3">
												<label class="col-form-label">Tanggal Masuk <span class="text-danger">*</span></label>
												<div class="cal-icon"><input readonly class="form-control datetimepicker" name="tglmasuk" value="{{date('d-m-Y',strtotime($itememployee->tglmasuk))}}" type="text"></div>
											</div>
										</div>
										<div class="col-sm-6">  
											<div class="input-block mb-3">
												<label class="col-form-label">Tanggal Keluar <span class="text-danger">*</span></label>
												<div class="cal-icon">
													<input class="form-control datetimepicker" name="tglkeluar" 
													@if ($itememployee->employeestatus=="1")
														value="{{date('d-m-Y',strtotime($itememployee->tglkeluar))}}" 														
													@else
														value=""
													@endif
													type="text">
												</div>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Status Karyawan</label>
												<select class="select" name="statuskontrak">
													<option value="kontrak"
													@if ($itememployee->statuskontrak=='kontrak')
														selected
													@endif
													>Kontrak</option>
													<option value="tetap"
													@if ($itememployee->statuskontrak=='tetap')
														selected
													@endif
													>Tetap</option>
												</select>
											</div>
										</div>
									</div>
									<hr>
									<div class="row">
										<div class="col-sm-6">
											<div class="input-block mb-3">
												<input class="checkbox" type="checkbox" name="emoloyeestatus" 
												@if ($itememployee->employeestatus=='1')
													@checked(true)
												@endif>
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
												<input class="form-control" name="ktp" value="{{$itememployee->ktp}}" type="text">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Upload Identitas <span class="text-danger">*</span></label>  
												@if($itememployee->uploadktp)
													<img src="{{ asset('storage/' . $itememployee->uploadktp) }}" width="100" alt="Foto Karyawan">
												@endif                                              
												<input class="form-control" name="uploadktp" type="file">
											</div>
										</div>
										<div class="col-sm-12">
											<div class="input-block mb-3">
												<label class="col-form-label">Alamat KTP <span class="text-danger">*</span></label>
												<input class="form-control" name="ktpalamat" value="{{$itememployee->ktpalamat}}" type="text">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Kota <span class="text-danger">*</span></label>
												<input class="form-control" name="ktpkota" value="{{$itememployee->ktpkota}}" type="text">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Provensi <span class="text-danger">*</span></label>
												<input class="form-control" name="ktpprovensi" value="{{$itememployee->ktpprovensi}}" type="text">
											</div>
										</div>
									</div>
									<hr>
									<div class="row">
										<div class="col-sm-6">
											<div class="input-block mb-3">
												<label class="col-form-label">NPWP <span class="text-danger">*</span></label>
												<input class="form-control" name="npwp" value="{{$itememployee->npwp}}" type="text">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Jamsostek <span class="text-danger">*</span></label>
												<input class="form-control" name="jamsostek" value="{{$itememployee->jamsostek}}" type="text">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Asuransi Kesehatan <span class="text-danger">*</span></label>
												<input class="form-control" name="asuransi" value="{{$itememployee->asuransi}}" type="text">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="input-block mb-3">
											</div>
										</div>
										<div class="col-sm-12">
											<div class="input-block mb-3">
												<label class="col-form-label">Nama Bank <span class="text-danger">*</span></label>
												<input class="form-control" name="bank" value="{{$itememployee->bank}}" type="text">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Nomor Rekening <span class="text-danger">*</span></label>
												<input class="form-control" name="bankacc" value="{{$itememployee->bankacc}}" type="text">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Atas Nama <span class="text-danger">*</span></label>
												<input class="form-control" name="bankname" value="{{$itememployee->bankname}}" type="text">
											</div>
										</div>
									</div>
									<hr>
									<div class="row">
										<div class="col-sm-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Nama Istri/Suami <span class="text-danger">*</span></label>
												<input class="form-control" name="spousename" value="{{$itememployee->spousename}}" type="text">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="input-block mb-3">
											</div>
										</div>
										<div class="col-sm-6">  
											<div class="input-block mb-3">
												<label class="col-form-label">Tanggal Lahir <span class="text-danger">*</span></label>
												<div class="cal-icon"><input class="form-control datetimepicker" name="spousetempatlahir" value="{{$itememployee->spousetempatlahir}}" type="text"></div>
											</div>
										</div>
										<div class="col-sm-6">  
											<div class="input-block mb-3">
												<label class="col-form-label">Tanggal Menikah <span class="text-danger">*</span></label>
												<div class="cal-icon"><input class="form-control datetimepicker" name="spousetgllahir" value="{{$itememployee->spousetgllahir}}" type="text"></div>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Kota</label>
												<input class="form-control" name="spousecity" value="{{$itememployee->spousecity}}"  type="text">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Provensi</label>
												<input class="form-control" name="spouseprovensi" value="{{$itememployee->spouseprovensi}}" type="Text">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Pekerjaan</label>
												<input class="form-control" name="spousepekerjaan" value="{{$itememployee->spousejob}}" type="Text">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="input-block mb-3">
												<label class="col-form-label">Jumlah Anak</label>
												<input class="form-control" name="jmlanak" value="{{$itememployee->jmlanak}}" type="number">
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
				<!-- /Add Employee Modal -->