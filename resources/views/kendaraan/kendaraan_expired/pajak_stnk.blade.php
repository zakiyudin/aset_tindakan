@inject('carbon', 'Carbon\Carbon')
@extends('layouts.app')

@section('judul')
    Pajak STNK(1thn) Expired
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
                                    <th>Tgl Pajak STNK(1thn)</th>
                                    <th>Expired Dalam ?</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pajak_stnk as $item)
                                    @php
                                        $dateNow = $carbon->parse($carbon->now());
                                        $tglExPajakStnk = $carbon->parse($item->tgl_ex_pajak_stnk);
                                        $diffDaysPajakStnk = $tglExPajakStnk->diffInDays($dateNow);
                                        $dateFormat = $carbon->parse($item->tgl_ex_pajak_stnk)->format('d-m-Y');
                                    @endphp
                                    @if ($diffDaysPajakStnk <= 50 && $tglExPajakStnk >= $dateNow && $item->tgl_ex_pajak_stnk != null)
                                        <tr>
                                            <td>{{ $item->nopol }}</td>
                                            <td>{{ $item->jenis_kendaraan }}</td>
                                            <td>{{ $dateFormat }}</td>
                                            <td>
                                                Dalam <span class="text text-danger">{{ $diffDaysPajakStnk }} Hari</span>
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