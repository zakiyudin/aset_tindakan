@extends('layouts.app')

@section('judul')
    Tipe Aset
@endsection

@section('validate_source')
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.19.0/jquery.validate.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
@endsection

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('MASTER') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-12 mx-auto">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            {{ __('TPE ASET') }}
                                        </div>
                                        <div class="col-sm-6 float-right">
                                            <button type="button" id="tombol-tambah2" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                                                Tambah
                                              </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table class="table tabel-tipe-aset">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>ID</th>
                                                <th>Nama Aset</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- modal tipe-aset --}}
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">TAMBAH TIPE ASET</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form action="{{ route('tipe-aset.store') }}" class="form-group" id="form-tambah-edit" method="POST">
            @csrf
              <input type="hidden" name="id_tipe_asset" id="id_tipe_asset">
              <label for="nama_divisi" class="form-label"><b>Nama Tipe Aset</b></label>
              <input type="text" name="nama_tipe_asset" id="nama_tipe_asset" class="form-control">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="tambah-tipe-aset" value="create">Tambah</button>
            </div>
        </form>
      </div>
    </div>
  </div>


   {{-- modal hapus data Tipe Aset --}}
   <div class="modal fade" tabindex="-1" role="dialog" id="konfirmasi-modal-hapus" data-backdrop="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">PERHATIAN</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><b>APAKAH ANDA YAKIN INGIN MENGHAPUS ??</b></p>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" name="btn_hapus" id="btn_hapus">Hapus
                    Data</button>
            </div>
        </div>
    </div>
  </div>

   {{-- ajax & jquery tipe aset --}}
  <script type="text/javascript">
    $(document).ready(function(){
        $.ajaxSetup({
            'headers': {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        $('.tabel-tipe-aset').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('tipe-aset.index') }}",
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                { data: 'nama_tipe_asset', name: 'nama_tipe_asset' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ]
        });

        $("#tombol-tambah2").click(function(){
            $("#tambah-tipe-aset").val("create-post2");
            $("#id_tipe_asset").val("");
            $("#form-tambah-edit").trigger("reset");
            $("#exampleModal2").modal("show");
        });



        if($("#form-tambah-edit").length > 0){
            $("#form-tambah-edit").validate();
        }

        $('body').on('click', '.edit_data', function(){
            var id_tipe_asset = $(this).data("id");
            console.log(id_tipe_asset);
            $.ajax({
                type: "GET",
                url: "/tipe-aset/"+id_tipe_asset+"/edit",
                data:{
                    id_tipe_asset: id_tipe_asset
                },
                success: function(data){
                    console.log(data);
                    $("#id_tipe_asset").val(data.id_tipe_asset);
                    $("#nama_tipe_asset").val(data.nama_tipe_asset);
                    $("#tambah-tipe-aset").val("edit-post");
                    $("#tambah-tipe-aset").html("Update");
                    $("#exampleModal2").modal("show");
                }
            })
        });


        $('body').on('click','.hapus_data', function(){
            var id_tipe_asset = $(this).data("id");
            console.log(id_tipe_asset);
            $("#konfirmasi-modal-hapus").modal("show");

            $("#btn-hapus").click(function(){
                $.ajax({
                    type: "DELETE",
                    url: "{{ url('tipe-aset') }}"+'/'+id_tipe_asset,
                    success: function(data){
                        $("#konfirmasi-modal-hapus").modal("hide");
                        swal({
                            title: "Success!",
                            text: "Data Berhasil Dihapus",
                            icon: "success",
                            button: "OK",
                        });
                        var table = $(".tabel-tipe-aset").DataTable();
                        table.ajax.reload();
                    }
                })
            })
        })
    });
</script>
@endsection