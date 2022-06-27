@inject('carbon', 'Carbon\Carbon')
@extends('layouts.app')

@section('judul')
    STNK(5thn) Expired
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
                                    <th>Tgl STNK(5thn)</th>
                                    <th>Expired Dalam ?</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($stnk as $item)
                                    @php
                                        $dateNow = $carbon->parse($carbon->now());
                                        $tglExStnk = $carbon->parse($item->tgl_ex_stnk);
                                        $diffDaysStnk = $tglExStnk->diffInDays($dateNow);
                                        $dateFormat = $carbon->parse($item->tgl_ex_stnk)->format('d-m-Y');
                                    @endphp
                                    @if ($diffDaysStnk <= 14 && $tglExStnk >= $dateNow && $item->tgl_ex_stnk != null)
                                        <tr>
                                            <td>{{ $item->nopol }}</td>
                                            <td>{{ $item->jenis_kendaraan }}</td>
                                            <td>{{ $dateFormat }}</td>
                                            <td>
                                                Dalam <span class="text text-danger">{{ $diffDaysStnk }} Hari</span>
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-primary btn-sm">Lihat</a>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                        <hr style="height:10px;border-width:100%;color:black;background-color:black">
                    </div>
                </div>
            </div>
            {{-- Data Sudah Expired Tapi Belum Terupdate --}}
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <div class="d-flex bd-highlight">
                                <div class="p-2 flex-grow-1 bd-highlight">
                                    <h3><u class="badge bg-danger">Berikut data yang sudah expired tetapi belum ter-update</u></h3>
                                </div>
                                <div class="p-2 bd-highlight">
                                    <form action="{{ route('update_stnk_otomatis') }}" method="POST">
                                        @csrf
                                        <button class="btn btn-outline-danger">UPDATE OTOMATIS</button>
                                    </form>
                                </div>
                              </div>
                            <thead>
                                <tr>
                                    <th>No.Polisi</th>
                                    <th>Jenis Kendaraan</th>
                                    <th>Tgl STNK(5thn)</th>
                                    <th>Sudah Expired Dalam ?</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($stnk as $data)
                                    @php
                                        $dateNow = $carbon->parse($carbon->now());
                                        $tglExStnk = $carbon->parse($data->tgl_ex_stnk);
                                        $diffDaysStnk = $tglExStnk->diffInDays($dateNow);
                                        $dateFormat = $carbon->parse($data->tgl_ex_stnk)->format('d-m-Y');
                                    @endphp
                                    @if ($diffDaysStnk <= 14 && $tglExStnk <= $dateNow && $data->tgl_ex_stnk != null)
                                        <tr>
                                            <td>{{ $data->nopol }}</td>
                                            <td>{{ $data->jenis_kendaraan }}</td>
                                            <td>{{ $dateFormat }}</td>
                                            <td>
                                                Dalam <span class="text text-danger">{{ $diffDaysStnk }} Hari</span>
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