@extends('layouts.app')

@section('judul')
    Detail Expired Pajak STNK(5thn)
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="d-flex justify-content-center">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-6">
                                            <h5>No. Polisi</h5>
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="form-control" value="{{ $detail_kir->nopol }}">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-6">
                                            <h5>Jenis Kendaraan</h5>
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="form-control" value="{{ $detail_kir->jenis_kendaraan }}">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-6">
                                            <h5>Tahun Kendaraan</h5>
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="form-control" value="{{ $detail_kir->tahun_kendaraan }}">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-6">
                                            <h5>Warna Kendaraan</h5>
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="form-control" value="{{ $detail_kir->warna_kendaraan }}">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-6">
                                            <h5>No. Rangka</h5>
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="form-control" value="{{ $detail_kir->no_rangka }}">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-6">
                                            <h5>No. Mesin</h5>
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="form-control" value="{{ $detail_kir->no_mesin }}">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-6">
                                            <h5>Tonase</h5>
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="form-control" value="{{ $detail_kir->tonase }}">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-6">
                                            <h5>Atas Nama</h5>
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="form-control" value="{{ $detail_kir->atas_nama }}">
                                        </div>
                                    </div>
                                    <br>
                                </div>
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-6">
                                            <h5>Pemakai Kendaraan</h5>
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="form-control" value="{{ $detail_kir->pemakai_kendaraan->nama_pemakai_kendaraan }}">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-6">
                                            <h5>Polis Asuransi</h5>
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="form-control" value="{{ $detail_kir->polis_asuransi }}">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-6">
                                            <h5>Tgl Exp Asuransi</h5>
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="form-control" value="{{ $detail_kir->tgl_ex_asuransi }}">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-6">
                                            <h5>Asuransi</h5>
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="form-control" value="{{ $detail_kir->asuransi->nama_asuransi }}">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-6">
                                            <h5>Tgl Exp STNK (5Thn)</h5>
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="form-control" value="{{ $detail_kir->tgl_ex_stnk }}">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-6">
                                            <h5>Tgl Exp STNK (1Thn)</h5>
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="form-control" value="{{ $detail_kir->tgl_ex_pajak_stnk }}">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-6">
                                            <h5>Tgl Exp KIR (6Bln)</h5>
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="form-control" value="{{ $detail_kir->tgl_ex_kir }}">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-6">
                                            <h5>Keterangan</h5>
                                        </div>
                                        <br>
                                        <div class="col-6">
                                            <input type="text" class="form-control" value="{{ $detail_kir->keterangan }}">
                                            <a href="{{ route('kendaraan_expired.kir_expired') }}" class="btn btn-success">Kembali</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection