@inject('carbon', 'Carbon\Carbon')
@extends('layouts.app')

@section('judul')
    Dashboard
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-center mx-auto">
                        <div class="col-3">
                          <div class="card text-black bg-warning bg-opacity-25 mb-3" style="max-width: 18rem;">
                            <div class="card-header">ASURANSI</div>
                            <div class="card-body">
                              <div class="row">
                                <div class="col-sm-6">
                                  <img src="{{ asset('img/every-user-svgrepo-com.svg') }}" alt="">
                                </div>
                                <div class="col-sm-6">
                                  <h5 class="card-title">{{ $asuransi }}</h5>
                                </div>
                                <a href="{{ route('kendaraan_expired.asuransi_expired') }}" class="btn btn-success btn-sm mt-3">selengkapnya</a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-3">
                          <div class="card text-black bg-warning bg-opacity-25 mb-3" style="max-width: 18rem;">
                            <div class="card-header">PAJAK STNK</div>
                            <div class="card-body">
                              <div class="row">
                                <div class="col-sm-6">
                                  <img src="{{ asset('img/document-folder-svgrepo-com.svg') }}" alt="">
                                </div>
                                <div class="col-sm-6">
                                  <h5 class="card-title">{{ $pajak_stnk }}</h5>
                                </div>
                                <a href="{{ route('kendaraan_expired.pajak_stnk_expired') }}" class="btn btn-success btn-sm mt-3">selengkapnya</a>
                              </div>
                              
                            </div>
                          </div>
                        </div>
                        <div class="col-3">
                          <div class="card text-black bg-warning bg-opacity-25" style="max-width: 18rem;">
                            <div class="card-header">STNK</div>
                            <div class="card-body">
                              <div class="row">
                                <div class="col-sm-6">
                                  <img src="{{ asset('img/caution-svgrepo-com.svg') }}" alt="">
                                </div>
                                <div class="col-sm-6">
                                  <h5 class="card-title">{{ $stnk }}</h5>
                                </div>
                                <a href="{{ route('kendaraan_expired.stnk_expired') }}" class="btn btn-success btn-sm mt-3">selengkapnya</a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-3">
                          <div class="card text-black bg-warning bg-opacity-25" style="max-width: 18rem;">
                            <div class="card-header">KIR</div>
                            <div class="card-body">
                              <div class="row">
                                <div class="col-sm-6">
                                  <img src="{{ asset('img/document-folder-svgrepo-com.svg') }}" alt="">
                                </div>
                                <div class="col-sm-6">
                                  <h5 class="card-title">{{ $kir }}</h5>
                                </div>
                                <a href="{{ route('kendaraan_expired.kir_expired') }}" class="btn btn-success btn-sm mt-3">selengkapnya</a>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                        {{-- <p>Jumlah Divisi : {{ $divisi }}</p>
                        <p>Jumlah Tipe Aset : {{ $tipe_aset }}</p>
                        <p>Jumlah Tindakan : {{ $tindakan_aset }}</p> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
