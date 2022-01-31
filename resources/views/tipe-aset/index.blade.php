@extends('layouts.app')

@section('judul')
    Tipe Asset
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header bg-success bg-opacity-50">{{ __('MASTER') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-12 mx-auto">
                            <div class="card">
                                <div class="card-header bg-warning bg-opacity-50">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <b>{{ __('TIPE ASSET') }}</b>
                                        </div>
                                        <div class="col-sm-6 float-right">
                                            <button type="button" id="tombol-tambah" class="btn btn-primary btn-sm float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                Tambah
                                              </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table class="table tabel-tipe-aset hover stripe table-bordered table-striped cell-border">
                                        <thead class="thead-light  bg-warning bg-opacity-50">
                                            <tr>
                                                <th>Code Tipe Aset</th>
                                                <th>Tipe Asset</th>
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


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-warning bg-opacity-50">
          <h5 class="modal-title" id="exampleModalLabel">TAMBAH TIPE ASSET</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form action="{{ route('tipe-aset.store') }}" class="form-group" id="form-tambah-edit" method="POST">
            @csrf
              <input type="hidden" name="id_tipe_asset" id="id_tipe_asset">
              <label for="nama_tipe_asset" class="form-label"><b>Tipe Aset</b></label>
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



<script type="text/javascript">
    $(document).ready(function(){
        $.ajaxSetup({
            'headers' : {
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content'),
                'X-Requested-With': 'XMLHttpRequest'
            }
        })

        $('.tabel-tipe-aset').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('tipe-aset.index') }}",
            columns: [
                { data: 'code_tipe_asset', name: 'code_tipe_asset' },
                { data: 'nama_tipe_asset', name: 'nama_tipe_asset' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ]
        });
    });


    $("#tombol-tambah").click(function(){
        $("#form-tambah-edit").trigger("reset");
        $("#id_tipe_asset").val("");
        $("#tambah-tipe-aset").val("create");
        $("#tambah-tipe-aset").html("Tambah");
        $("#exampleModalLabel").html("TAMBAH TIPE ASSET");
        $("#exampleModal").modal("show");
    });


    if($("#form-tambah-edit").length > 0){
        $("#form-tambah-edit").validate({
            submitHandler: function(form){
                $.ajax({
                    url: "{{ route('tipe-aset.store') }}",
                    method: "POST",
                    data: $(form).serialize(),
                    beforeSend: function(){
                        $("#tambah-tipe-aset").html('kirim...');
                    },
                    success: function(data){
                        swal({
                            title: "Berhasil!",
                            text: "Data berhasil disimpan",
                            icon: "success",
                            button: "OK",
                        });
                        $(".tabel-tipe-aset").DataTable().ajax.reload();
                        // $("#exampleModal").modal("hide");
                    },
                    error: function(data){
                        console.log(data);
                    }
                })
            }
        });
    }


    $("body").on("click", ".edit_data", function(){
        var id_tipe_asset = $(this).data("id");
        // console.log(id_tipe_asset);
        $.ajax({
            url: "/tipe-aset/"+id_tipe_asset+"/edit",
            type: "GET",
            dataType: "JSON",
            data: {
                id_tipe_asset: id_tipe_asset
            },
            success: function(data){
                $("#id_tipe_asset").val(data.id_tipe_asset);
                $("#nama_tipe_asset").val(data.nama_tipe_asset);
                $("#tambah-tipe-aset").html("Update");
                $("#exampleModalLabel").html("EDIT TIPE ASSET");
                $("#tambah-tipe-aset").toggleClass("btn-primary btn-warning");
                $("#exampleModal").modal("show");
            }
        })
    })


    $("body").on("click", ".hapus_data", function(e){
        e.preventDefault();
        var id_tipe_asset = $(this).data("id");
        console.log(id_tipe_asset);
        swal({
            title: "Apakah anda yakin?",
            text: "Data yang dihapus tidak dapat dikembalikan!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: "/tipe-aset/"+id_tipe_asset+"/delete",
                    type: "DELETE",
                    dataType: "JSON",
                    data: {
                        id_tipe_asset: id_tipe_asset
                    },
                    success: function(data){
                        swal({
                            title: "Berhasil!",
                            text: "Data berhasil dihapus",
                            icon: "success",
                            button: "OK",
                        });
                        $(".tabel-tipe-aset").DataTable().ajax.reload();
                    }
                })
            }
        });
    })


    
</script>
@endsection