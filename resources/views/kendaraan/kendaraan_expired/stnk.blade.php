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
                                    @if ($diffDaysStnk <= 50 && $tglExStnk >= $dateNow && $item->tgl_ex_stnk != null)
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection