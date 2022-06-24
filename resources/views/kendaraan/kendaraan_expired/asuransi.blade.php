@inject('carbon', 'Carbon\Carbon')
@extends('layouts.app')

@section('judul')
    Asuransi Expired
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <div class="d-flex bd-highlight">
                                    <div class="p-2 flex-grow-1 bd-highlight">
                                        <h3><u class="badge bg-danger">Berikut data yang akan expired dalam 7 hari</u></h3>
                                    </div>
                                    <div class="p-2 bd-highlight">
                                        <form action="#" method="POST">
                                            @csrf
                                            <button class="btn btn-outline-danger">UPDATE OTOMATIS</button>
                                        </form>
                                    </div>
                                  </div>
                                <thead>
                                    <tr>
                                        <th>No.Polisi</th>
                                        <th>Jenis Kendaraan</th>
                                        <th>Tgl Asuransi</th>
                                        <th>Expired Dalam ?</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($asuransi as $item)
                                        @php
                                            $dateNow = $carbon->parse($carbon->now());
                                            $tglExAsuransi = $carbon->parse($item->tgl_ex_asuransi);
                                            $diffDaysAsuransi = $tglExAsuransi->diffInDays($dateNow);
                                            $dateFormat = $carbon->parse($item->tgl_ex_asuransi)->format('d-m-Y');
                                        @endphp
                                        @if ($diffDaysAsuransi <= 14 && $tglExAsuransi >= $dateNow && $item->tgl_ex_asuransi != null)
                                            <tr>
                                                <td>{{ $item->nopol }}</td>
                                                <td>{{ $item->jenis_kendaraan }}</td>
                                                <td>{{ $dateFormat }}</td>
                                                <td>
                                                    Dalam <span class="text text-danger">{{ $diffDaysAsuransi }} Hari</span>
                                                </td>
                                                <td>
                                                    <a href="#" class="btn btn-primary btn-sm">Lihat</a>
                                                </td>
                                            </tr>        
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <div class="d-flex bd-highlight">
                                    <div class="p-2 flex-grow-1 bd-highlight">
                                        <h3><u class="badge bg-danger">Berikut data yang sudah expired tetapi belum ter-update</u></h3>
                                    </div>
                                    <div class="p-2 bd-highlight">
                                        <a href="{{ route('update_asuransi_otomatis') }}" class="btn btn-outline-danger">UPDATE OTOMATIS</a>
                                    </div>
                                  </div>
                                <thead>
                                    <tr>
                                        <th>No.Polisi</th>
                                        <th>Jenis Kendaraan</th>
                                        <th>Tgl Asuransi</th>
                                        <th>Expired Dalam ?</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($asuransi as $item)
                                        @php
                                            $dateNow = $carbon->parse($carbon->now());
                                            $tglExAsuransi = $carbon->parse($item->tgl_ex_asuransi);
                                            $diffDaysAsuransi = $tglExAsuransi->diffInDays($dateNow);
                                            $dateFormat = $carbon->parse($item->tgl_ex_asuransi)->format('d-m-Y');
                                        @endphp
                                        @if ($diffDaysAsuransi <= 7 && $tglExAsuransi <= $dateNow && $item->tgl_ex_asuransi != null)
                                            <tr>
                                                <td>{{ $item->nopol }}</td>
                                                <td>{{ $item->jenis_kendaraan }}</td>
                                                <td>{{ $dateFormat }}</td>
                                                <td>
                                                    Dalam <span class="text text-danger">{{ $diffDaysAsuransi }} Hari</span>
                                                </td>
                                                <td>
                                                    <a href="#" class="btn btn-primary btn-sm">Lihat</a>
                                                </td>
                                            </tr>        
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection