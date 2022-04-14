@extends('layouts.app')

@section('judul')
    Tindakan Aset
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-danger bg-opacity-50">
                    <div class="row">
                        <div class="col-sm-6">
                            <b>{{ __('ASET') }}</b>
                        </div>
                        <div class="col-sm-6 float-right">
                            <button type="button" id="tombol-tambah" class="btn btn-primary btn-sm float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Tambah
                            </button>
                            <button type="button" class="btn btn-success btn-sm float-end" id="btn-import">Import <i class="fas fa-file-upload"></i></button>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table tabel-aset-tindakan hover stripe table-bordered table-striped cell-border">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Nama Aset</th>
                                <th>Divisi</th>
                                <th>Tanggal Beli</th>
                                <th>Tipe Aset</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modal-import" tabindex="-1" aria-labelledby="modal-import" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Import File</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('tindakan-aset.import-excel') }}" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
                @csrf
                <div class="form-group">
                    <label for="" class="form-label"><b>Import File</b></label>
                    <input type="file" name="file_excel" id="file_excel" class="form-control">
                    <span>.xlsx|.xlx|.csv</span>
                </div>
            </div>
            <div class="modal-footer">
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-md btn-opacity-50">Import</button>
                </div>
            </div>
        </form>
      </div>
    </div>
</div>


<!-- Modal Detail Data -->
<div class="modal fade animate__animated animate__bounce" id="modal-detail-data" tabindex="-1" aria-labelledby="modal-import" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-success bg-opacity-50">
          <h5 class="modal-title " id="exampleModalLabel">Detail Data Aset</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-4">
                        {{-- @if ($file_image === null)
                            <img src="{{ asset('img/no-photos.png') }}" alt="" class="img-thumbnail rounded">
                        @else
                            image not found
                        @endif --}}
                        {{-- <img src="{{ asset('gambar_aset/monitor.webp') }}" alt="" class="img-thumbnail rounded"> --}}
                </div>
                <div class="col-8">
                    <form action="#">
                        <table class="table">
                            <tr>
                                <h3 id="detail_nama_aset"></h1>
                            </tr>
                            <tr>
                                <td>Divisi</td>
                                <td>:</td>
                                <td><p id="detail_divisi"></p></td>
                            </tr>
                            <tr>
                                <td>Tanggal Beli</td>
                                <td>:</td>
                                <td><p id="detail_tanggal_beli"></p></td>
                            </tr>
                            <tr>
                                <td>Tanggal Expired</td>
                                <td>:</td>
                                <td><p id="detail_tanggal_expired"></p></td>
                            </tr>
                            <tr>
                                <td>Tipe Aset</td>
                                <td>:</td>
                                <td><p id="detail_tipe_aset"></p></td>
                            </tr>
                            <tr>
                                <td>Spesifikasi</td>
                                <td>:</td>
                                <td><p id="detail_spesifikasi"></p></td>
                            </tr>
                        </table>
                    </form>
                </div>
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
        <form action="{{ route('tindakan-aset.store') }}" class="form-group" id="form-tambah-edit" method="POST" enctype="multipart/form-data">
            @method('POST')
            @csrf
            <input type="hidden" name="id" id="id">
            <div class="form-group">
                <label for="nama_aset" class="form-label"><b>Nama Aset</b></label>
                <input type="text" name="nama_aset" id="nama_aset" class="form-control">
            </div>
            <hr>
            <div class="form-group">
                <label for="tanggal_pembelian" class="form-label"><b>Tanggal Beli</b></label>
                <input type="date" name="tanggal_pembelian" id="tanggal_pembelian" class="form-control">
            </div>
            <hr>
            <div class="form-group">
                <label for="tanggal_expired" class="form-label"><b>Tanggal Expired</b></label>
                <input type="date" name="tanggal_expired" id="tanggal_expired" class="form-control">
            </div>
            <hr>
            <div class="form-group">
                <label for="gambar_aset" class="form-label"><b>Upload Gambar</b></label>
                <input type="file" name="gambar_aset" id="gambar_aset" class="form-control">
            </div>
            <hr>
            <div class="form-group">
                <label for="nama_divisi" class="form-label"><b>Divisi</b></label>
                <select class="form-control" name="id_divisi" id="nama_divisi">
                    <option value="">.: Pilih Divisi :.</option>
                    @foreach ($divisi as $div)
                        <option value="{{ $div->id_divisi }}">{{ $div->code_divisi }} - {{ $div->nama_divisi }}</option>
                    @endforeach
                </select>
            </div>
            <hr>
            <div class="form-group">
                <label for="nama_tipe_asset" class="form-label"><b>Tipe Aset</b></label>
                <select class="form-control" name="id_tipe_asset" id="nama_tipe_asset">
                    <option value="">.: Pilih Tipe Aset :.</option>
                    @foreach ($tipe_aset as $item)
                        <option value="{{ $item->id_tipe_asset }}">{{ $item->code_tipe_asset }} - {{ $item->nama_tipe_asset }}</option>
                    @endforeach
                </select>
            </div>
            <hr>
            <div class="form-group">
                <label for="spesifikasi" class="form-label"><b>Spek</b></label>
                <textarea class="form-control" name="spesifikasi" id="spesifikasi" cols="20" rows="5"></textarea>
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
                'X-Requested-With': 'XMLHttpRequest',
                'encType': 'multipart/form-data'
            }
        })

        $('.tabel-aset-tindakan').DataTable({
            processing: true,
            serverSide: true,
            searching: true,
            order: [],
            ajax: "{{ route('tindakan-aset.index') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'nama_aset', name: 'nama_aset', width: "25%"},
                {data: 'nama_divisi', name: 'nama_divisi'},
                {data: 'tanggal_pembelian', name: 'tanggal_pembelian'},
                {data: 'nama_tipe_asset', name: 'nama_tipe_asset'},
                {data: 'action', name: 'action', orderable: true, searchable: true},
            ]
        });
    })

    $("#btn-import").click(function(e){
        e.preventDefault();
        $("#modal-import").modal("show");
        // $("#form-filter-tanggal").form("reset");
    })

        $("#tombol-tambah").click(function(){
            $("#tambah-tindakan").val("create-post");
            $("#id").val('');
            $("#form-tambah-edit").trigger("reset");
            $("#exampleModal").modal("show");
        });

        if($("#form-tambah-edit").length > 0){
            $("#form-tambah-edit").validate({
                submitHandler: function(form){
                    var actionType = $("#tambah-tindakan").val();
                    $("#tambah-tindakan").html("Sending...");
                    var form = $('#form-tambah-edit')[0];
                    var formData = new FormData(form);
                    $.ajax({
                        // data: $('#form-tambah-edit').serialize(),
                        data: formData,
                        enctype: 'multipart/form-data',
                        url: "{{ route('tindakan-aset.store') }}",
                        type: "POST",
                        dataType: 'json',
                        success: function (data) {
                            $('#exampleModal').modal('hide');
                            $('#form-tambah-edit').trigger("reset");
                            $('#tambah-tindakan').html("Tambah");
                            $('.tabel-aset-tindakan').DataTable().ajax.reload();
                            swal({
                                title: "Berhasil!",
                                text: "Data Berhasil Ditambahkan",
                                icon: "success",
                                button: "OK",
                            });
                        },
                        error: function (data) {
                            console.log("error", data.responseJSON.message);
                            $('#tambah-tindakan').html('Tambah');
                            swal({
                                title: "Gagal!",
                                text: "Data Gagal Ditambahkan",
                                icon: "error",
                                button: "OK",
                            });
                        }
                    })
                }
            })
        }

        $("body").on("click", ".detail_data", function(){
            var id = $(this).data('id');
            console.log(id);

            $.ajax({
                type: "GET",
                url: "/tindakan-aset/" + id + "/detail",
                data: {id: id},
                dataType: "json",
                success: function(data){
                    console.log(data.spesifikasi.length);
                    $("#detail_nama_aset").text(data.nama_aset);
                    $("#detail_spesifikasi").text(data.spesifikasi);
                    $("#detail_divisi").text(data.nama_divisi);
                    $("#detail_tipe_aset").text(data.nama_tipe_asset);
                    $("#detail_tanggal_expired").text(data.tanggal_expired);
                    $("#detail_tanggal_beli").text(data.tanggal_pembelian);
                    // $("#img").attr("src", "{{ asset('storage/') }}" + "/" + data.foto);
                    $("#modal-detail-data").modal("show");
                }
            })
        })


        $("body").on("click", ".edit_data", function() {
            var id = $(this).data("id");
            console.log(id);

            $.ajax({
                type: "GET",
                url: "/tindakan-aset/" + id + "/edit",
                data: {
                    id: id
                },
                dataType: "json",
                success: function(data){
                    // console.log(data.id);
                    $("#id").val(data.id);
                    $("#nama_aset").val(data.nama_aset);
                    $("#nama_divisi").val(data.id_divisi);
                    $("#nama_tipe_asset").val(data.id_tipe_asset);
                    $("#spesifikasi").val(data.spesifikasi);
                    $("#tanggal_pembelian").val(data.tanggal_pembelian);
                    $("#tanggal_expired").val(data.tanggal_expired);
                    $("#exampleModalLabel").html("Edit Data");
                    $("#tambah-tindakan").html("Update Tindakan");
                    $("#tambah-tindakan").toggleClass("btn-primary btn-warning");
                    $("#exampleModal").modal("show");
                }
            })
        })


        $("body").on("click", ".hapus_data", function(){
            var id = $(this).data("id");
            console.log(id);

            swal({
                title: "Apakah anda yakin?",
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: "/tindakan-aset/"+id+"/delete",
                    type: "DELETE",
                    dataType: "JSON",
                    data: {
                        id: id
                    },
                    success: function(data){
                        swal({
                            title: "Berhasil!",
                            text: "Data berhasil dihapus",
                            icon: "success",
                            button: "OK",
                        });
                        $(".tabel-aset-tindakan").DataTable().ajax.reload();
                    },
                    error: function(data){
                        console.log(typeof(data));
                        console.log(data.responseJSON.message);
                    }
                })
            }
        });
        })


        // CKEDITOR.replace('spesifikasi');
</script>
@endsection