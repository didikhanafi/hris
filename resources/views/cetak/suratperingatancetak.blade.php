<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$suratperingatan->suratperingatan}}({{$suratperingatan->spke}}.{{$dataemployee->employee}})</title>
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <style>
        @page {
            size: A4;
            margin: 0;
        }
        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        .container {
            width: 100%;
            height: 100%;
            position: relative;
        }
        .address {
            margin: 0;
        }
        .banner-container {
            width: 19cm;
            height: 4cm;
            margin: 0 auto;
            position: relative;
        }

        .banner {
            width: 100%;
            height: 100%;
            background: url("{{ asset('storage/' . $datacompany->banner) }}") no-repeat center center;
            background-size: contain;
            position: relative;
        }
        /* .address {
            position: absolute;        top: 3cm;
            left: 50%;
            transform: translateX(-50%);
            font-size: 16px;
            font-weight: bold;
            white-space: nowrap;
        } */
        {{$datacompany->companiesnote}}
    </style>

    <script>
        // Fungsi ini akan dijalankan ketika halaman dimuat
        function printPage() {
            window.print();
        }
        // Tambahkan event listener untuk memanggil fungsi printPage ketika halaman dimuat
        window.onload = printPage;
    </script>
</head>
<body>
    <div class="container">
        <div class="banner-container">
            <div class="banner">
                {{-- <div class="address">{{datacompany->alamat}}Jl. Raya Babat Lamongan. Km 62, Ds. Pucuk, Kec. Pucuk, Kab. Lamongan</div> --}}
                <div class="address">{{$datacompany->alamat}}</div>
            </div>
            <center>
                <table width="100%" border="0">
                    <tr>
                        <td colspan="5">&nbsp;</td>
                    </tr>
                    <tr>
                        <td width="70">Nomor</td>
                        <td>: {{$suratperingatan->suratperingatan}}</td>
                        <td></td>
                        <td></td>
                        <td align="right">Kepada Yth :</td>
                    </tr>
                    <tr>
                        <td>Prihal</td>
                        <td>: Surat Peringatan ke {{$suratperingatan->spke}}</td>
                        <td></td>
                        <td></td>
                        <td align="right"><b>{{$dataemployee->employee}}</b></td>
                    </tr>
                    <tr><td colspan="4">&nbsp;</td></tr>
                    <tr>

                        <td colspan="5">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            Dengan Hormat
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            Sehubungan dengan kesalahan / pelanggaran disiplin kerja yang telah Sdri lakukan sebagai berikut :
                        </td>
                    </tr>
                    <tr height="25px">
                        <td colspan="5">
                            <b>{{$suratperingatan->keterangansp}}</b>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5">
                            Oleh karena hal tsb diatas, saudara diberikan sanksi berupa :
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">Pemberian  Surat  Peringatan  </td>
                        <td colspan="3">
                            : {{$suratperingatan->spke}}
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">Terhitung  dari  tanggal  </td>
                        <td colspan="3">
                            : <b>{{date('d F Y',strtotime($suratperingatan->tglawalsp))}} s/d {{date('d F Y',strtotime($suratperingatan->tglakhirsp))}}</b>
                        </td>
                    </tr>

                    @php
                        // Membuat objek DateTime untuk masing-masing tanggal
                        $datetime_awal = new DateTime($suratperingatan->tglawalsp);
                        $datetime_akhir = new DateTime($suratperingatan->tglakhirsp);

                        // Menghitung selisih antara dua tanggal
                        $interval = $datetime_awal->diff($datetime_akhir);

                        // Mengambil nilai selisih dalam format bulan dan hari
                        $bulan = $interval->format('%m');
                        $hari = $interval->format('%d');
                    @endphp
                    <tr>
                        <td colspan="2">Dengan Ketentuan  </td>
                        <td colspan="3">
                            : Surat Peringatan {{$suratperingatan ->spke}} ini berlaku selama
                            @php
                                if($bulan!=0){
                                    echo $bulan.' bulan ';
                                }
                                if($hari!=0){
                                    echo $hari.' hari';
                                }
                            @endphp
                        </td>
                    </tr>
                    {{-- <tr>
                        <td colspan="5">

                        </td>
                    </tr> --}}
                    <tr>
                        <td colspan="5">
                            Oleh karenanya kami berharap agar Saudara :
                        </td>
                    </tr>
                    @if ($suratperingatan->syaratsp1!='')
                        <tr>
                            <td valign="top" align="right">1. </td>
                            <td colspan="4">
                                {{$suratperingatan->syaratsp1}}
                            </td>
                        </tr>
                    @endif
                    @if ($suratperingatan->syaratsp2!='')
                        <tr>
                            <td valign="top" align="right">2. </td>
                            <td colspan="4">
                                {{$suratperingatan->syaratsp2}}
                            </td>
                        </tr>
                    @endif
                    @if ($suratperingatan->syaratsp3!='')
                        <tr>
                            <td valign="top" align="right" >3. </td>
                            <td colspan="4">
                                {{$suratperingatan->syaratsp3}}
                            </td>
                        </tr>
                    @endif
                    <tr>
                        <td colspan="5">
                            Dengan adanya Surat Peringatan ini diharapkan saudara / i menyadarai kesalahan saudara / i serta berusaha memperbaikinya serta tidak akan mengulanginya / membuat kesalahan yang sama atau yang lainnya.
                        </td>
                    </tr>
                    <tr><td colspan="5">&nbsp;</td></tr>
                    <tr>
                        <td colspan="5">
                            <table width="100%">
                                <tr>
                                    <td align="center"></td>
                                    <td align="center"></td>
                                    <td align="center">{{$suratperingatan->tempatsp}},{{date('d F Y',strtotime($suratperingatan->tglsp))}}</td>
                                </tr>
                                <tr>
                                    <td align="center">Karyawan</td>
                                    <td align="center">Atasan Langsung</td>
                                    <td align="center">Mengetahui</td>
                                </tr>
                                <tr><td colspan="3">&nbsp;</td></tr>
                                <tr>
                                    <td align="center">{{$dataemployee->employee}}</td>
                                    <td align="center">{{$suratperingatan->atasanlgs}}</td>
                                    <td align="center">{{$suratperingatan->mengetahui}}</td>
                                </tr>
                                <tr>
                                    <td align="center"><small><b>({{$dataposition->positions->position}})</b></small></td>
                                    <td align="center"><small><b>({{$datapositionsp->position}})</b></small></td>
                                    <td align="center"><small><b>({{$datapositionsp1->position}})</b></small></td>
                                </tr>
                                <tr><td colspan="3">&nbsp;</td></tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5">
                            <table width="30%">
                                <tr  height="10px">
                                    <td><small>Tembusan</small></td>
                                    <td><small>:</small></td>
                                </tr>
                                <tr  height="10px">
                                    <td><small>Kuasa Hukum</small></td>
                                    <td><small>: {{$suratperingatan->kuasahukum}}</small></td>
                                </tr>
                                <tr  height="10px">
                                    <td><small>Arsip</small></td>
                                    <td><small>: {{$suratperingatan->arsip}}</small></td>
                                </tr>
                                <tr  height="5px"><td colspan="3">&nbsp;</td></tr>
                            </table>

                        </td>
                    </tr>
                </table>
            </center>
        </div>
    </div>
</body>
</html>
