@inject('carbon', 'Carbon\Carbon')
@extends('layouts.app')

@section('judul')
    KIR(6bln) Expired
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
                                    <th>Tgl KIR(6bln)</th>
                                    <th>Expired Dalam ?</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kir as $item)
                                    @php
                                        $dateNow = $carbon->parse($carbon->now());
                                        $tglExKir = $carbon->parse($item->tgl_ex_kir);
                                        $diffDaysKir = $tglExKir->diffInDays($dateNow);
                                        $dateFormat = $carbon->parse($item->tgl_ex_kir)->format('d-m-Y');
                                    @endphp
                                    @if ($diffDaysKir <= 14 && $tglExKir >= $dateNow && $item->tgl_ex_kir != null)
                                        <tr>
                                            <td>{{ $item->nopol }}</td>
                                            <td>{{ $item->jenis_kendaraan }}</td>
                                            <td>{{ $dateFormat }}</td>
                                            <td>
                                                Dalam <span class="text text-danger">{{ $diffDaysKir }} Hari</span>
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

            <div class="card">  
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <div class="d-flex bd-highlight">
                                <div class="p-2 flex-grow-1 bd-highlight">
                                    <h3><u class="badge bg-danger">Berikut data yang sudah expired tetapi belum ter-update</u></h3>
                                </div>
                                <div class="p-2 bd-highlight">
                                    <form action="{{ route('update_kir_otomatis') }}" method="POST">
                                        @csrf
                                        <button class="btn btn-outline-danger">UPDATE OTOMATIS</button>
                                    </form>
                                </div>
                              </div>
                            <thead>
                                <tr>
                                    <th>No.Polisi</th>
                                    <th>Jenis Kendaraan</th>
                                    <th>Tgl KIR(6bln)</th>
                                    <th>Expired Dalam ?</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kir as $item)
                                    @php
                                        $dateNow = $carbon->parse($carbon->now());
                                        $tglExKir = $carbon->parse($item->tgl_ex_kir);
                                        $diffDaysKir = $tglExKir->diffInDays($dateNow);
                                        $dateFormat = $carbon->parse($item->tgl_ex_kir)->format('d-m-Y');
                                    @endphp
                                    @if ($diffDaysKir <= 14 && $tglExKir <= $dateNow && $item->tgl_ex_kir != null)
                                        <tr>
                                            <td>{{ $item->nopol }}</td>
                                            <td>{{ $item->jenis_kendaraan }}</td>
                                            <td>{{ $dateFormat }}</td>
                                            <td>
                                                Dalam <span class="text text-danger">{{ $diffDaysKir }} Hari</span>
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