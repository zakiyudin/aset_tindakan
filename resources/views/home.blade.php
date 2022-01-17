@extends('layouts.app')

@section('judul')
    Dashboard
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <p>Jumlah Divisi : {{ $divisi }}</p>
                        <p>Jumlah Tipe Aset : {{ $tipe_aset }}</p>
                        <p>Jumlah Tindakan : {{ $tindakan_aset }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
