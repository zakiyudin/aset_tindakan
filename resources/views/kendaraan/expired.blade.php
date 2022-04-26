@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3>Kendaraan Exp Pajak STNK</h3>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No. Pol</th>
                                <th>Jenis</th>
                                <th>Tahun</th>
                                <th>Warna</th>
                                <th>No. Mesin</th>
                                <th>No. Rangka</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $kendaraan)
                                <tr>
                                    <td>{{ $kendaraan->nopol }}</td>
                                    <td>{{ $kendaraan->jenis_kendaraan }}</td>
                                    <td>{{ $kendaraan->tahun_kendaraan }}</td>
                                    <td>{{ $kendaraan->warna_kendaraan }}</td>
                                    <td>{{ $kendaraan->no_mesin }}</td>
                                    <td>{{ $kendaraan->no_rangka }}</td>
                                    <td>
                                        <a href="#">Tindak</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3>Kendaraan Exp STNK</h3>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No. Pol</th>
                                <th>Jenis</th>
                                <th>Tahun</th>
                                <th>Warna</th>
                                <th>No. Mesin</th>
                                <th>No. Rangka</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data2 as $kendaraan)
                                <tr>
                                    <td>{{ $kendaraan->nopol }}</td>
                                    <td>{{ $kendaraan->jenis_kendaraan }}</td>
                                    <td>{{ $kendaraan->tahun_kendaraan }}</td>
                                    <td>{{ $kendaraan->warna_kendaraan }}</td>
                                    <td>{{ $kendaraan->no_mesin }}</td>
                                    <td>{{ $kendaraan->no_rangka }}</td>
                                    <td>
                                        <a href="#">Tindak</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3>Kendaraan Exp Asuransi</h3>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No. Pol</th>
                                <th>Jenis</th>
                                <th>Tahun</th>
                                <th>Warna</th>
                                <th>No. Mesin</th>
                                <th>No. Rangka</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data3 as $kendaraan)
                                <tr>
                                    <td>{{ $kendaraan->nopol }}</td>
                                    <td>{{ $kendaraan->jenis_kendaraan }}</td>
                                    <td>{{ $kendaraan->tahun_kendaraan }}</td>
                                    <td>{{ $kendaraan->warna_kendaraan }}</td>
                                    <td>{{ $kendaraan->no_mesin }}</td>
                                    <td>{{ $kendaraan->no_rangka }}</td>
                                    <td>
                                        <a href="#">Tindak</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3>Kendaraan Exp KIR</h3>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No. Pol</th>
                                <th>Jenis</th>
                                <th>Tahun</th>
                                <th>Warna</th>
                                <th>No. Mesin</th>
                                <th>No. Rangka</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data4 as $kendaraan)
                                <tr>
                                    <td>{{ $kendaraan->nopol }}</td>
                                    <td>{{ $kendaraan->jenis_kendaraan }}</td>
                                    <td>{{ $kendaraan->tahun_kendaraan }}</td>
                                    <td>{{ $kendaraan->warna_kendaraan }}</td>
                                    <td>{{ $kendaraan->no_mesin }}</td>
                                    <td>{{ $kendaraan->no_rangka }}</td>
                                    <td>
                                        <a href="#">Tindak</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection