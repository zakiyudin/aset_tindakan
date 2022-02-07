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
                            <a href="{{ route('laporan.export_pdf') }}" class="btn btn-success btn-sm tombol-pdf">PDF <i class="fas fa-download"></i></a>
                            <a href="{{ route('laporan.export_csv') }}" class="btn btn-warning btn-sm">EXCEL <i class="fas fa-download"></i></a>
                            {{-- <input type="date">
                            <input type="date">
                            <button>filter</button> --}}
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
                                <th>Penindak</th>
                                <th>Ket.</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>




<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('laporan.export_pdf') }}" method="GET" id="form-filter-tanggal">
            <div class="modal-body">
                <label for="tanggal_awal" class="form-label"><b>Pilih Dari Tanggal</b></label>
                <input class="form-control" type="date" name="tanggal_awal" id="tanggal_awal">
                <br>
                <label for="tanggal_akhir" class="form-label"><b>Pilih Ke Tanggal</b></label>
                <input class="form-control" type="date" name="tanggal_akhir" id="tanggal_akhir">
          
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-warning">EXPORT</button>
            </div>
        </form>
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
                {data: 'name', name: 'name'},
                {data: 'keterangan', name: 'keterangan'},
            ]
        });
    })


    $(".tombol-pdf").click(function(e){
        e.preventDefault();
        $("#exampleModal").modal("show");
        $("#form-filter-tanggal").trigger("reset");
    })
</script>
@endsection