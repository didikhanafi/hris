

    <div class="tab-pane fade" id="bank_statutory">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title"> Basic Salary Information</h3>
                {{-- {{$salarytemp}} --}}
                @if ($salarytemp=='1')
                    <form method="POST" action="{{ route('salary.update', $dataemployees->id) }}" enctype=multipart/form-data>
                        @method('put')
                        @csrf
                
                @else
                    <form method="POST" action="{{ route('salary.store') }}" enctype=multipart/form-data>
                        @csrf            
                @endif 
                        <input type="hidden" name="employee_id" value="{{$dataemployees->id}}">
                        <div class="row">
                            {{-- <div class="col-sm-4">
                                <div class="input-block mb-3">
                                    <label class="col-form-label">Salary basis <span class="text-danger">*</span></label>
                                    <select class="select">
                                        <option>Select salary basis type</option>
                                        <option>Hourly</option>
                                        <option>Daily</option>
                                        <option>Weekly</option>
                                        <option>Monthly</option>
                                    </select>
                                </div>
                            </div> --}}

                            <div class="col-sm-4">
                                <div class="input-block mb-3">
                                    <label class="col-form-label">Gaji Pokok <small class="text-muted">per month</small></label>
                                    <div class="input-group">
                                        <span class="input-group-text">Rp.</span>
                                        <input type="number" name="salary" class="form-control text-end" placeholder="Gaji Pokok" 
                                            value="{{$datasallary['salary']}}">  
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="input-block mb-3">
                                    <label class="col-form-label">Standart Salary (LMK)</label>
                                    
                                    <div class="input-group">
                                        <span class="input-group-text">Rp.</span>
                                        <input type="number" name="salarystd" class="form-control text-end" placeholder="Standart Salary" 
                                            value="{{$datasallary['salarystd']}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="input-block mb-3">
                                    <label class="col-form-label">Limit Pinjaman Karyawan</label>
                                    
                                    <div class="input-group">
                                        <span class="input-group-text">Rp.</span>
                                        <input type="text" name="limitloan" class="form-control text-end" placeholder="Limit Pinjaman" value="{{$datasallary['limitloan']}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h3 class="card-title"> PF Information</h3>
                        <div class="row">                                    
                            <div class="col-sm-4">
                                <div class="input-block mb-3">
                                    <label class="col-form-label">Uang Makan</label>
                                    
                                    <div class="input-group">
                                        <span class="input-group-text">Rp.</span>
                                        <input type="number" name="uangmakan" class="form-control text-end" placeholder="Uang Makan" 
                                            value="{{$datasallary['uangmakan']}}">
                                    </div>
                                </div>
                            </div>                            
                            <div class="col-sm-4">
                                <div class="input-block mb-3">
                                    <label class="col-form-label">Transport</label>
                                    
                                    <div class="input-group">
                                        <span class="input-group-text">Rp.</span>
                                        <input type="number"name="transport"  class="form-control text-end" placeholder="Transport" 
                                            value="{{$datasallary['transport']}}">
                                        
                                    </div>
                                </div>
                            </div>                            
                            <div class="col-sm-4">
                                <div class="input-block mb-3">
                                    <label class="col-form-label">Tunjangan Jabatan / lain-lain</label>
                                    
                                    <div class="input-group">
                                        <span class="input-group-text">Rp.</span>
                                        <input type="number" name="tunjanganjabatan" class="form-control text-end" placeholder="Tunjangan Jabatan" 
                                            value="{{$datasallary['tunjanganjabatan']}}">
                                    </div>
                                </div>
                            </div>                            
                            <div class="col-sm-4">
                                <div class="input-block mb-3">
                                    <label class="col-form-label">Tunjangan Rumah / Kost</label>
                                    
                                    <div class="input-group">
                                        <span class="input-group-text">Rp.</span>
                                        <input type="number" name="tunjanganrumah" class="form-control text-end" placeholder="Tunjangan Rumah"
                                            value="{{$datasallary['tunjanganrumah']}}">
                                    </div>
                                </div>
                            </div>                            
                            <div class="col-sm-4">
                                <div class="input-block mb-3">
                                    <label class="col-form-label">Tunjangan Phone / Pulsa</label>
                                    
                                    <div class="input-group">
                                        <span class="input-group-text">Rp.</span>
                                        <input type="number" name="tunjanganphone" class="form-control text-end" placeholder="tunjanganphone" 
                                            value="{{$datasallary['tunjanganphone']}}">
                                    </div>
                                </div>
                            </div>                            
                            <div class="col-sm-4">
                                <div class="input-block mb-3">
                                    <label class="col-form-label">Tunjangan Perjalanan</label>
                                    
                                    <div class="input-group">
                                        <span class="input-group-text">Rp.</span>
                                        <input type="number" name="tunjanganperjalanan" class="form-control text-end" placeholder="Tunjangan Perjalannan" value="{{$datasallary['tunjanganperjalanan']}}">
                                    </div>
                                </div>
                            </div>                            
                            <div class="col-sm-4">
                                <div class="input-block mb-3">
                                    <label class="col-form-label">Insentif 01 / Operasional</label>
                                    
                                    <div class="input-group">
                                        <span class="input-group-text">Rp.</span>
                                        <input type="number" name="insentif1" class="form-control text-end" placeholder="Insentif 01 / Operasional" value="{{$datasallary['insentif1']}}">
                                    </div>
                                </div>
                            </div>                            
                            <div class="col-sm-4">
                                <div class="input-block mb-3">
                                    <label class="col-form-label">Insentif 02</label>
                                    
                                    <div class="input-group">
                                        <span class="input-group-text">Rp.</span>
                                        <input type="number" name="insentif2" class="form-control text-end" placeholder="Insentif 02" value="{{$datasallary['insentif2']}}">
                                    </div>
                                </div>
                            </div>                 
                            <div class="col-sm-4">
                                <div class="input-block mb-3">
                                    <label class="col-form-label">Komisi</label>
                                    
                                    <div class="input-group">
                                        <span class="input-group-text">Rp.</span>
                                        <input type="number" name="komisi" class="form-control text-end" placeholder="Komisi" value="{{$datasallary['komisi']}}">
                                    </div>
                                </div>
                            </div>     
                        </div>
                        <div class="row">                  
                            <div class="col-sm-4">
                                <div class="input-block mb-3">
                                    <label class="col-form-label">Lembur</label>
                                    
                                    <div class="input-group">
                                        <span class="input-group-text">Rp.</span>
                                        <input type="number" name="lembur" class="form-control text-end" placeholder="Lembur" value="{{$datasallary['lembur']}}">
                                    </div>
                                </div>
                            </div>      
                        </div>
                        <hr>
                        <div class="row">                   
                            <div class="col-sm-4">
                                <div class="input-block mb-3">
                                    <label class="col-form-label">Sewa Motor</label>
                                    
                                    <div class="input-group">
                                        <span class="input-group-text">Rp.</span>
                                        <input type="number" name="sewamotor" class="form-control text-end" placeholder="Sewa Motor" value="{{$datasallary['sewamotor']}}">
                                    </div>
                                </div>
                            </div>                   
                            <div class="col-sm-4">
                                <div class="input-block mb-3">
                                    <label class="col-form-label">Claim Parkir</label>
                                    
                                    <div class="input-group">
                                        <span class="input-group-text">Rp.</span>
                                        <input type="number" name="claimparkir" class="form-control text-end" placeholder="Claim Parkir" value="{{$datasallary['claimparkir']}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <hr>
                        {{-- <h3 class="card-title"> ESI Information</h3> --}}
                        <div class="row">                
                            <div class="col-sm-4">
                                <div class="input-block mb-3">
                                    <label class="col-form-label">Biaya Lain-lain</label>
                                    
                                    <div class="input-group">
                                        <span class="input-group-text">Rp.</span>
                                        <input type="number" name="biayalain" class="form-control text-end" placeholder="Biaya Lain-lain" value="{{$datasallary['biayalain']}}">
                                    </div>
                                </div>
                            </div>              
                            <div class="col-sm-4">
                                <div class="input-block mb-3">
                                    <label class="col-form-label">Peserta Program Pensiun</label>
                                    
                                    <div class="input-group">
                                        <span class="input-group-text">Rp.</span>
                                        <input type="number" name="pensiun" class="form-control text-end" placeholder="Program Pensiun" value="{{$datasallary['pensiun']}}">
                                    </div>
                                </div>
                            </div>          
                            <div class="col-sm-4">
                                <div class="input-block mb-3">
                                    <label class="col-form-label">Peserta Program BPJS TK</label>
                                    
                                    <div class="input-group">
                                        <span class="input-group-text">Rp.</span>
                                        <input type="number" name="bpjs_tk" class="form-control text-end" placeholder="Program BPJS Tenaga Kerja" value="{{$datasallary['bpjs_tk']}}">
                                    </div>
                                </div>
                            </div>          
                            <div class="col-sm-4">
                                <div class="input-block mb-3">
                                    <label class="col-form-label">Peserta Program BPJS Kesehatan</label>
                                    
                                    <div class="input-group">
                                        <span class="input-group-text">Rp.</span>
                                        <input type="number" name="bpjs_kesehatan" class="form-control text-end" placeholder="Program BPJS Kesehatan" value="{{$datasallary['bpjs_kesehatan']}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h3 class="card-title"> Pengurang</h3>
                        <div class="row">                
                            <div class="col-sm-4">
                                <div class="input-block mb-3">
                                    <label class="col-form-label">Jabatan Pph 21 - Percent & Limit </label>
                                    {{-- <input type="checkbox" name="pph21"> --}}
                                    
                                    <div class="input-group">
                                        <span class="input-group-text">Rp.</span>
                                        <input type="number" name="pph21" class="form-control text-end" placeholder="Gaji Pokok" value="{{$datasallary['pph21']}}">
                                    </div>
                                </div>
                            </div>              
                            <div class="col-sm-4">
                                <div class="input-block mb-3">
                                    <label class="col-form-label">Lain-lain</label>
                                    
                                    <div class="input-group">
                                        <span class="input-group-text">Rp.</span>
                                        <input type="number" name="lainlain" class="form-control text-end" placeholder="Lain - Lain" value="{{$datasallary['lainlain']}}">
                                    </div>
                                </div>
                            </div>          
                            <div class="col-sm-4">
                                <div class="input-block mb-3">
                                    <label class="col-form-label">Hari Kerja Standart</label>
                                    <input type="number" name="harikerja" class="form-control" 
                                            value="{{$datasallary['harikerja']}}">
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