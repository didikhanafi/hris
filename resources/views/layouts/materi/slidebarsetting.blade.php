			<!-- Sidebar -->
            <div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">

						<ul>
							<li>
								<a href="/home"><i class="la la-home"></i> <span>Back to Home</span></a>
							</li>
                            <li class="menu-title">
                                <span>Employees</span>
                            </li>
							{{-- <li class="active">
								<a href="settings.html"><i class="la la-building"></i> <span>Company Settings</span></a>
							</li> --}}


                            @php
                                if($slide=='setting'){
                                    echo   '<li class="active">
                                                <a href="/setting"><i class="la la-photo"></i> <span>Website Settings</span></a>
                                            </li>';
                                }else{
                                    echo   '<li>
                                                <a href="/setting"><i class="la la-photo"></i> <span>Website Settings</span></a>
                                            </li>';
                                }
                            @endphp

                            @php
                                if($slide=='formatcetak'){
                                    echo   '<li class="active">
                                                <a href="/formatcetak"><i class="la la-photo"></i> <span>Format Cetak</span></a>
                                            </li>';
                                }else{
                                    echo   '<li>
                                                <a href="/formatcetak"><i class="la la-photo"></i> <span>Format Cetak</span></a>
                                            </li>';
                                }
                            @endphp  @php
                                if($slide=='settingkop'){
                                    echo   '<li class="active">
                                                <a href="/settingkop"><i class="la la-photo"></i> <span>Format Kop Surat</span></a>
                                            </li>';
                                }else{
                                    echo   '<li>
                                                <a href="/settingkop"><i class="la la-photo"></i> <span>Format Kop Surat</span></a>
                                            </li>';
                                }
                            @endphp
                            @php
                            if($slide=='formatspk'){
                                echo   '<li class="active">
                                            <a href="/formatspk"><i class="la la-photo"></i> <span>Format SPK</span></a>
                                        </li>';
                            }else{
                                echo   '<li>
                                            <a href="/formatspk"><i class="la la-photo"></i> <span>Format SPK</span></a>
                                        </li>';
                            }
                        @endphp
							{{-- <li>
								<a href="change-password.html"><i class="la la-lock"></i> <span>Change Password</span></a>
							</li> --}}
						</ul>
					</div>
                </div>
            </div>
			<!-- Sidebar -->
