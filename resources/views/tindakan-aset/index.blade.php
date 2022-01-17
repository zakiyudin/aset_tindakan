@extends('layouts.app')

@section('judul')
    Tindakan Aset
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-6">
                            {{ __('Tindakan Aset') }}
                        </div>
                        <div class="col-sm-6 float-right">
                            <button type="button" id="tombol-tambah" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Tambah
                              </button>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table tabel-aset-tindakan">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Nama Aset</th>
                                <th>Divisi</th>
                                <th>Tanggal Beli</th>
                                <th>Tipe Aset</th>
                                <th>Nama Tindakan</th>
                                <th>Tanggal Tindakan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal Tambah Tindakan-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">TAMBAH TINDAKAN</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form action="{{ route('tindakan-aset.store') }}" class="form-group" id="form-tambah-edit" method="POST">
            @csrf
              <input type="hidden" name="id" id="id">
              <div class="form-group">
                <label for="nama_aset" class="form-label"><b>Nama Aset</b></label>
                <input type="text" name="nama_aset" id="nama_aset" class="form-control">
            </div>
            <div class="form-group">
                <label for="tanggal_pembelian" class="form-label"><b>Tanggal Beli</b></label>
                <input type="date" name="tanggal_pembelian" id="tanggal_pembelian" class="form-control">
            </div>
            <div class="form-group">
                <label for="nama_tindakan" class="form-label"><b>Nama Tindakan</b></label>
                <input type="text" name="nama_tindakan" id="nama_tindakan" class="form-control">
            </div>
            <div class="form-group">
                <label for="nama_divisi" class="form-label"><b>Divisi</b></label>
                <select class="form-control" name="nama_divisi" id="nama_divisi">
                    <option value="">.: Pilih Divisi :.</option>
                    @foreach ($divisi as $div)
                        <option value="{{ $div->nama_divisi }}">{{ $div->nama_divisi }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="nama_tipe_asset" class="form-label"><b>Tipe Aset</b></label>
                <select class="form-control" name="nama_tipe_asset" id="nama_tipe_asset">
                    <option value="">.: Pilih Tipe Aset :.</option>
                    @foreach ($tipe_aset as $item)
                        <option value="{{ $item->nama_tipe_asset }}">{{ $item->nama_tipe_asset }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="tanggal_tindakan" class="form-label"><b>Tanggal Tindakan</b></label>
                <input type="date" name="tanggal_tindakan" id="tanggal_tindakan" class="form-control">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="tambah-tindakan" value="create">Tambah</button>
            </div>
        </form>
      </div>
    </div>
  </div>




{{-- ajax & jquery aset tindakan --}}
<script type="text/javascript">
    $(document).ready(function(){
        $.ajaxSetup({
            'headers': {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'X-Requested-With': 'XMLHttpRequest'
            }
        })

        $('.tabel-aset-tindakan').DataTable({
            processing: true,
            serverSide: true,
            searching: true,
            ajax: "{{ route('tindakan-aset.index') }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'nama_aset', name: 'nama_aset'},
                {data: 'nama_divisi', name: 'nama_divisi'},
                {data: 'tanggal_pembelian', name: 'tanggal_pembelian'},
                {data: 'nama_tipe_asset', name: 'nama_tipe_asset'},
                {data: 'nama_tindakan', name: 'nama_tindakan'},
                {data: 'tanggal_tindakan', name: 'tanggal_tindakan'},
                {data: 'action', name: 'action', orderable: true, searchable: true},
            ]
        });
    })
</script>
@endsection