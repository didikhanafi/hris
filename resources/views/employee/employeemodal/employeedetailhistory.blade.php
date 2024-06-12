
<div class="tab-pane fade" id="emp_history">
                    
    {{-- <div class="page-header">
        <div class="row align-items-center">
            <div class="col-auto float-end ms-auto">
                <a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_suratperingatan"><i class="fa-solid fa-plus"></i> Add Surat Peringatan</a>
            </div>
        </div>
    </div> --}}
    <div class="table-responsive table-newdatatable"><div class="container">
        <h4>Riwayat Karyawan: {{ $dataemployees->employee }}</h4>
    </div>
        <table class="table table-new custom-table mb-0 datatable">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Jenis</th>
                    <th>Deskripsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($history as $index=>$item)
                <tr>
                    <td>{{ $item->sort_date }}</td>
                    <td>
                        @if($item instanceof App\Models\Mutation)
                            Mutasi
                        @elseif($item instanceof App\Models\Suratpk)
                            SPK
                        @elseif($item instanceof App\Models\SuratPeringatan)
                            Surat Peringatan
                        @elseif($item instanceof App\Models\Loan)
                            Pinjaman
                        @endif
                    </td>
                    <td>{{ $item->keterangan }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>