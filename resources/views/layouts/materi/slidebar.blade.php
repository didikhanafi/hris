<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul class="sidebar-vertical">
                <li class="menu-title">
                    <span>Main</span>
                </li>

                @php
                    if($slide=='dashboard'){
                        echo '<li class="active"><a href="/home"><i class="la la-dashboard"></i> <span> Dashboard</span> </a></li>';
                    }else{
                        echo '<li><a href="/home"><i class="la la-dashboard"></i> <span> Dashboard</span> </a></li>';
                    }
                @endphp

                <li class="menu-title">
                    <span>Employees</span>
                </li>
                <li class="submenu">
                    <a href="#"><i class="la la-object-group"></i> <span> Master </span> <span class="menu-arrow"></span></a>
                    <ul>
                        @php
                            if($slide=='companies'){
                                echo '<li><a href="/companies" class="active">Companies</a></li>';
                            }else{
                                echo '<li><a href="/companies">Companies</a></li>';
                            }
                        @endphp
                        @php
                            if($slide=='branches'){
                                echo '<li><a href="/branches" class="active">Branches</a></li>';
                            }else{
                                echo '<li><a href="/branches">Branches</a></li>';
                            }
                        @endphp
                        @php
                            if($slide=='departements'){
                                echo '<li><a href="/departements" class="active">Departements</a></li>';
                            }else{
                                echo '<li><a href="/departements">Departements</a></li>';
                            }
                        @endphp
                        {{-- @php
                            if($slide=='subdepartements'){
                                echo '<li><a href="/subdepartements" class="active">Sub Departements</a></li>';
                            }else{
                                echo '<li><a href="/subdepartements">Sub Departements</a></li>';
                            }
                        @endphp --}}
                        @php
                            if($slide=='position'){
                                echo '<li><a href="/position" class="active">Position</a></li>';
                            }else{
                                echo '<li><a href="/position">Position</a></li>';
                            }
                        @endphp
                        @php
                            if($slide=='religion'){
                                echo '<li><a href="/religion" class="active">Religion</a></li>';
                            }else{
                                echo '<li><a href="/religion">Religion</a></li>';
                            }
                        @endphp
                        @php
                            if($slide=='statusnikah'){
                                echo '<li><a href="/statusnikah" class="active">Status Pernikahan</a></li>';
                            }else{
                                echo '<li><a href="/statusnikah">Status Pernikahan</a></li>';
                            }
                        @endphp
                        @php
                            if($slide=='pendidikan'){
                                echo '<li><a href="/pendidikan" class="active">Pendidikan</a></li>';
                            }else{
                                echo '<li><a href="/pendidikan">Pendidikan</a></li>';
                            }
                        @endphp
                    </ul>
                </li>

                <li class="submenu">
                    <a href="#"><i class="la la-user"></i> <span> Employees</span> <span class="menu-arrow"></span></a>
                    <ul>
                        @php
                            if($slide=='employees'){
                                echo '<li><a href="/employees" class="active">Daftar Karyawan</a></li>';
                            }else{
                                echo '<li><a href="/employees">Daftar Karyawan</a></li>';
                            }
                        @endphp
                        @php
                            if($slide=='employeesstatus'){
                                echo '<li><a href="/employeesstatus" class="active">Status Karyawan</a></li>';
                            }else{
                                echo '<li><a href="/employeesstatus">Status Karyawan</a></li>';
                            }
                        @endphp
                        @php
                            if($slide=='employeescontexpired'){
                                echo '<li><a href="/employeescontexpired" class="active">Kontrak Akan Berakhir</a></li>';
                            }else{
                                echo '<li><a href="/employeescontexpired">Kontrak Akan Berakhir</a></li>';
                            }
                        @endphp
                        @php
                            if($slide=='reportemployee'){
                                echo '<li><a href="/reportemployee" class="active">Report Employees</a></li>';
                            }else{
                                echo '<li><a href="/reportemployee">Report Employees</a></li>';
                            }
                        @endphp

                        {{-- <li><a href="activities.html">Notification</a></li> --}}
                        {{-- <li><a href="">Employees Report</a></li> --}}
                        {{-- <li><a href="/employeesdetail">profile</a></li> --}}
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="la la-users"></i> <span>Mutations</span> <span class="menu-arrow"></span></a>
                    <ul>
                        @php
                            if($slide=='mutationimport'){
                                echo '<li><a href="/mutationimport class="active">Import File Mutasi</a></li>';
                            }else{
                                echo '<li><a href="/mutationimport">Import File Mutasi</a></li>';
                            }
                        @endphp
                    </ul>
                </li>
                {{-- <li class="submenu">
                    <a href="#"><i class="la la-pie-chart"></i> <span>Reports</span> <span class="menu-arrow"></span></a>
                    <ul>
                        @php
                            if($slide=='reportemployee'){
                                echo '<li><a href="/reportemployee class="active">Employees Report</a></li>';
                            }else{
                                echo '<li><a href="/reportemployee">Employees Report</a></li>';
                            }
                        @endphp
                        <li><a href="">Loans Reports</a></li>
                        <li><a href="">Mutatoins Reports</a></li>
                    </ul>
                </li> --}}
                <li class="menu-title">
                    <span>Administration</span>
                </li>
                <li>
                    <a href="/setting"><i class="la la-cog"></i> <span>Settings</span></a>
                </li>
            </ul>
        </div>
    </div>
</div>
