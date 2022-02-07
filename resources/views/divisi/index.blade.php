@extends('layouts.app')

@section('judul')
    Divisi
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
                <div class="card-header bg-success bg-opacity-50">{{ __('MASTER') }}</div>

                <div class="card-body ">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-12 mx-auto">
                            <div class="card">
                                <div class="card-header bg-primary bg-opacity-50">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <b>{{ __('DIVISI') }}</b>
                                        </div>
                                        <div class="col-sm-6 float-right">
                                            <button type="button" id="tombol-tambah" class="btn btn-primary btn-sm float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                Tambah
                                              </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table class="table tabel-divisi hover stripe table-bordered table-striped cell-border">
                                        <thead class="thead-light  bg-primary bg-opacity-50">
                                            <tr>
                                                {{-- <th>ID</th> --}}
                                                <th width="">Code Divisi</th>
                                                <th>Nama Divisi</th>
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

  
  <!-- Modal Tambah Divisi-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header  bg-primary bg-opacity-50">
            <h5 class="modal-title" id="exampleModalLabel">TAMBAH DIVISI</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="{{ route('divisi.store') }}" class="form-group" id="form-tambah-edit" method="POST">
                @csrf
                <input type="hidden" name="id_divisi" id="id_divisi">
                <label for="nama_divisi" class="form-label"><b>Nama Divisi</b></label>
                <input type="text" name="nama_divisi" id="nama_divisi" class="form-control">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="tambah-divisi" value="create">Tambah</button>
                </div>
            </form>
        </div>
        </div>
    </div>


  {{-- ajax & jquery Divisi --}}
  <script language="Javascript" type="text/javascript">

        $(document).ready(function(){
            $.ajaxSetup({
                'headers': {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            $('.tabel-divisi').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('divisi.index') }}",
                columns: [
                    // { data: 'DT_RowIndex', name: 'DT_RowIndex', width: "5%" },
                    { data: 'code_divisi', name: 'code_divisi' },
                    { data: 'nama_divisi', name: 'nama_divisi' },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ]
            });
        });

        $("#tombol-tambah").click(function(){
            $("#tambah-divisi").val("create-post");
            $("#id_divisi").val("");
            $("#form-tambah-edit").trigger("reset");
            $("#exampleModal").modal("show");
        });

        if($("#form-tambah-edit").length > 0){
            $("#form-tambah-edit").validate({
                submitHandler: function(form){
                    // var actionType = $("#tambah-divisi").val();
                    // $("#tambah-divisi").html('Sending..');
                    $.ajax({
                        type: "POST",
                        url: "{{ route('divisi.store') }}",
                        data: $("#form-tambah-edit").serialize(),
                        success: function(data){
                            if(data.status === 'success'){
                                $("#exampleModal").modal("hide");
                                $('.tabel-divisi').DataTable().ajax.reload();
                                swal({
                                    title: "Success!",
                                    text: "Data Divisi Berhasil Ditambahkan",
                                    icon: "success",
                                    button: "OK",
                                });
                            }else if(data.status === 'error'){
                                swal({
                                    title: "Error!",
                                    text: "Data Divisi Gagal Ditambahkan",
                                    icon: "error",
                                    button: "OK",
                                });
                            }
                            $("#exampleModal").modal("hide");
                            $(".tabel-divisi").DataTable().ajax.reload();                         
                        },
                    })
                }
            })
        }

        $('body').on('click', '.edit_data', function(){
            var id_divisi = $(this).data("id");
            // console.info(id_divisi);
            $.ajax({
                type: "GET",
                url: "/divisi/"+id_divisi+"/edit",
                data: {id_divisi: id_divisi},
                dataType: "json",
                success: function(data){
                    $("#id_divisi").val(data.id_divisi);
                    $("#nama_divisi").val(data.nama_divisi);
                    $("#tambah-divisi").val("edit-post");
                    $("#tambah-divisi").html('Update Data');
                    $("#exampleModalLabel").html("EDIT DIVISI");
                    $("#tambah-divisi").toggleClass("btn-primary btn-warning");
                    $("#exampleModal").modal("show");
                },
                error: function(data){
                    console.log('Error:', data);
                }
            })
        })

        $('body').on('click', '.hapus_data', function(){
            var id_divisi = $(this).data("id");
            // $("#konfirmasi-modal-hapus").modal("show");

            swal({
                title: "Apakah anda yakin?",
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: "/divisi/"+id_divisi+"/delete",
                    type: "DELETE",
                    dataType: "JSON",
                    data: {
                        id_divisi: id_divisi
                    },
                    success: function(data){
                        swal({
                            title: "Berhasil!",
                            text: "Data berhasil dihapus",
                            icon: "success",
                            button: "OK",
                        });
                        $(".tabel-divisi").DataTable().ajax.reload();
                    }
                })
            }
        });
        })
  </script>

  

@endsection