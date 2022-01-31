@extends('layouts.app')

@section('judul')
    Laporan Tindakan
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-12">
                            {{ __('Laporan') }}
                            <a href="{{ route('laporan.export_pdf') }}" class="btn btn-success btn-sm">PDF <i class="fas fa-download"></i></a>
                            <a href="{{ route('laporan.export_csv') }}" class="btn btn-warning btn-sm">CSV <i class="fas fa-download"></i></a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table tabel-laporan-tindakan hover stripe table-bordered table-striped cell-border">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Nama Aset</th>
                                <th>Nama Tindakan</th>
                                <th>Tannggal Tindakan</th>
                                <th>Tanggal Pembelian</th>
                                <th>Ket.</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function(){
        $.ajaxSetup({
            'headers': {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'X-Requested-With': 'XMLHttpRequest'
            }
        })

        $('.tabel-laporan-tindakan').DataTable({
            processing: true,
            serverSide: true,
            searching: true,
            ajax: "{{ route('laporan.index') }}",
            columns: [
                {data: 'id_tindakan', name: 'id_tindakan'},
                {data: 'nama_aset', name: 'nama_aset'},
                {data: 'nama_tindakan', name: 'nama_tindakan'},
                {data: 'tanggal_tindakan', name: 'tanggal_tindakan'},
                {data: 'tanggal_pembelian', name: 'tanggal_pembelian'},
                {data: 'keterangan', name: 'keterangan'},
            ]
        });
    })
</script>
@endsection