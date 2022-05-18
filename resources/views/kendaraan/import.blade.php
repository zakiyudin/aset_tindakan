@extends('layouts.app')

@section('judul')
    Import Data Kendaraan
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Import Data Kendaraan</div>

                    <div class="card-body">
                        <form action="{{ route('kendaraan.import-excel') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="import_file" class="form-control">
                            <br>
                            <button class="btn btn-primary">Import Data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection