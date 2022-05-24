@extends('layouts.app')

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
                                            <b>{{ __('ASURANSI') }}</b>
                                        </div>
                                        <div class="col-sm-6 float-right">
                                            <button type="button" id="tombol-tambah" class="btn btn-primary btn-sm float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                Tambah
                                              </button>
                                              <a href="{{ route('asuransi.import') }}" class="btn btn-sm btn-success float-end">Import Data</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table class="table tabel-asuransi hover stripe table-bordered table-striped cell-border">
                                        <thead class="thead-light  bg-warning bg-opacity-50">
                                            <tr>
                                                <th>NO.</th>
                                                <th>NAMA</th>
                                                <th>EMAIL</th>
                                                <th>TELP.</th>
                                                <th>ALAMAT</th>
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

<!-- Modal Tambah Asuransi-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header  bg-primary bg-opacity-50">
        <h5 class="modal-title" id="exampleModalLabel">TAMBAH DIVISI</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form action="{{ route('asuransi.store') }}" class="form-group" id="form-tambah-edit" method="POST">
            @csrf
            <input type="hidden" name="id_asuransi" id="id_asuransi">
            <label for="nama_asuransi" class="form-label"><b>Nama Asuransi</b></label>
            <input type="text" name="nama_asuransi" id="nama_asuransi" class="form-control">

            <label for="email_asuransi" class="form-label"><b>Email Asuransi</b></label>
            <input type="email" name="email_asuransi" id="email_asuransi" class="form-control">

            <label for="no_telp_asuransi" class="form-label"><b>Telp. Asuransi</b></label>
            <input type="text" name="no_telp_asuransi" id="no_telp_asuransi" class="form-control">

            <label for="alamat_asuransi" class="form-label"><b>Alamat Asuransi</b></label>
            <input type="text" name="alamat_asuransi" id="alamat_asuransi" class="form-control">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="tambah-asuransi" value="create">Tambah</button>
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

        $('.tabel-asuransi').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('asuransi.index') }}",
            columns: [
                { data: 'id_asuransi', name: 'id_asuransi' },
                { data: 'nama_asuransi', name: 'nama_asuransi' },
                { data: 'email_asuransi', name: 'email_asuransi' },
                { data: 'no_telp_asuransi', name: 'no_telp_asuransi' },
                { data: 'alamat_asuransi', name: 'alamat_asuransi' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ]
        });
    });

    $("#tombol-tambah").click(function(){
        $("#form-tambah-edit").trigger("reset");
        $("#id_asuransi").val("");
        $("#tambah-asuransi").val("create");
        $("#tambah-asuransi").html("Tambah");
        $("#exampleModalLabel").html("TAMBAH ASURANSI");
    });

    if($("#form-tambah-edit").length > 0){
        $("#form-tambah-edit").validate({
            submitHandler: function(){
                $.ajax({
                    url: "{{ route('asuransi.store') }}",
                    method: "POST",
                    data: $("#form-tambah-edit").serialize(),
                    success: function(data){
                        if(data.status === 'success'){
                            swal({
                                title: "Success!",
                                text: "Data Asuransi Berhasil Ditambahkan",
                                icon: "success",
                                button: "OK",
                            });
                            $("#exampleModal").modal("hide");
                            $('.tabel-asuransi').DataTable().ajax.reload();
                        }else if(data.status === 'error'){
                            swal({
                                title: "Error!",
                                text: "Data Asuransi Gagal Ditambahkan",
                                icon: "error",
                                button: "OK",
                            });
                        }
                            // $("#exampleModal").modal("hide");
                            // $(".tabel-asuransi").DataTable().ajax.reload();    
                    },
                    error: function(data){
                        console.log(data);
                    }
                });
            }
        })
    }


    $("body").on("click", ".edit", function(){
        var id_asuransi = $(this).data("id");
        // console.log(id);
        $.ajax({
            url: "/asuransi/" +id_asuransi+ "/edit",
            method: "GET",
            data: {id_asuransi: id_asuransi},
            dataType: "json",
            success: function(data){
                $("#id_asuransi").val(data.id_asuransi);
                $("#nama_asuransi").val(data.nama_asuransi);
                $("#email_asuransi").val(data.email_asuransi);
                $("#no_telp_asuransi").val(data.no_telp_asuransi);
                $("#alamat_asuransi").val(data.alamat_asuransi);
                $("#tambah-asuransi").val("update");
                $("#tambah-asuransi").html("Update");
                $("#exampleModalLabel").html("EDIT ASURANSI");
                $("#exampleModal").modal("show");
            },
            error: function (error) { 
                console.log(error.message);
             }
        })
    })

    $("body").on("click", ".hapus", function(){
        var id_asuransi = $(this).data("id");

        swal({
            title: "Apakah Anda Yakin?",
            text: "Data Asuransi Akan Dihapus",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then(willdelete => {
            if(willdelete){
                $.ajax({
                    url: "/asuransi/" +id_asuransi+ "/delete",
                    method: "DELETE",
                    data: {id_asuransi: id_asuransi},
                    dataType: "json",
                    success: function(data){
                        if(data.status === 'success'){
                            swal({
                                title: "Success!",
                                text: "Data Asuransi Berhasil Dihapus",
                                icon: "success",
                                button: "OK",
                            });
                            $('.tabel-asuransi').DataTable().ajax.reload();
                        }else if(data.status === 'error'){
                            swal({
                                title: "Error!",
                                text: "Data Asuransi Gagal Dihapus",
                                icon: "error",
                                button: "OK",
                            });
                        }
                    },
                    error: function(data){
                        console.log(data);
                    }
                })
            }
        })
    })
</script>
@endsection