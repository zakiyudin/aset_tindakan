@extends('layouts.app')

@section('judul')
    Dashboard
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-success bg-opacity-50">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    <div class="row justify-content-center mx-auto">
                        <div class="col-3">
                          <div class="card text-black bg-warning bg-opacity-25 mb-3" style="max-width: 18rem;">
                            <div class="card-header">DIVISI</div>
                            <div class="card-body">
                              <div class="row">
                                <div class="col-sm-6">
                                  <img src="{{ asset('img/every-user-svgrepo-com.svg') }}" alt="">
                                </div>
                                <div class="col-sm-6">
                                  <h5 class="card-title">{{ $divisi }}</h5>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-3">
                          <div class="card text-black bg-warning bg-opacity-25 mb-3" style="max-width: 18rem;">
                            <div class="card-header">TIPE ASSET</div>
                            <div class="card-body">
                              <div class="row">
                                <div class="col-sm-6">
                                  <img src="{{ asset('img/document-folder-svgrepo-com.svg') }}" alt="">
                                </div>
                                <div class="col-sm-6">
                                  <h5 class="card-title">{{ $tipe_aset }}</h5>
                                </div>
                              </div>
                              
                            </div>
                          </div>
                        </div>
                        <div class="col-3">
                          <div class="card text-black bg-warning bg-opacity-25" style="max-width: 18rem;">
                            <div class="card-header">EXPIRED ASSET</div>
                            <div class="card-body">
                              <div class="row">
                                <div class="col-sm-6">
                                  <img src="{{ asset('img/caution-svgrepo-com.svg') }}" alt="">
                                </div>
                                <div class="col-sm-6">
                                  <h5 class="card-title">{{ $expired_aset }}</h5>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-3">
                          <div class="card text-black bg-warning bg-opacity-25" style="max-width: 18rem;">
                            <div class="card-header">ASSET</div>
                            <div class="card-body">
                              <div class="row">
                                <div class="col-sm-6">
                                  <img src="{{ asset('img/document-folder-svgrepo-com.svg') }}" alt="">
                                </div>
                                <div class="col-sm-6">
                                  <h5 class="card-title">{{ $aset }}</h5>
                                </div>
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
