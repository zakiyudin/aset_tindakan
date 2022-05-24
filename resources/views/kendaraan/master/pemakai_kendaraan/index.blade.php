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
                                            <b>{{ __('PEMAKAI KENDARAAN') }}</b>
                                        </div>
                                        <div class="col-sm-6 float-right">
                                            <button type="button" id="tombol-tambah" class="btn btn-primary btn-sm float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                Tambah
                                              </button>
                                              <a href="{{ route('pemakai_kendaraan.import') }}" class="btn btn-success btn-sm float-end">Import Excel</a>

                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table class="table tabel-pemakai-kendaraan hover stripe table-bordered table-striped cell-border">
                                        <thead class="thead-light  bg-warning bg-opacity-50">
                                            <tr>
                                                <th>NO.</th>
                                                <th>PEMAKAI</th>
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


<!-- Modal Tambah Pemakai Kendaraan-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header  bg-primary bg-opacity-50">
        <h5 class="modal-title" id="exampleModalLabel">TAMBAH</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form action="{{ route('pemakai_kendaraan.store') }}" class="form-group" id="form-tambah-edit" method="POST">
            @csrf
            <input type="hidden" name="id_pemakai_kendaraan" id="id_pemakai_kendaraan">
            <label for="nama_pemakai_kendaraan" class="form-label"><b>Nama Pemakai</b></label>
            <input type="text" name="nama_pemakai_kendaraan" id="nama_pemakai_kendaraan" class="form-control">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="tambah-pemakai" value="create">Tambah</button>
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

        $('.tabel-pemakai-kendaraan').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('pemakai_kendaraan.index') }}",
            columns: [
                { data: 'id_pemakai_kendaraan', name: 'id_pemakai_kendaraan' },
                { data: 'nama_pemakai_kendaraan', name: 'nama_pemakai_kendaraan' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ]
        });
    });


    $('#tombol-tambah').click(function(){
        $('#form-tambah-edit')[0].reset();
        $('#id_pemakai_kendaraan').val('');
        $('#nama_pemakai_kendaraan').val('');
        $('#divisi_id').val('');
        $("#exampleModal").modal('show');
    });

    if($("#form-tambah-edit").length > 0){
        $("#form-tambah-edit").validate({
            submitHandler: function(){
                $.ajax({
                    url: "{{ route('pemakai_kendaraan.store') }}",
                    method: "POST",
                    data: $("#form-tambah-edit").serialize(),
                    success: function(data){
                        if(data.status === 'success'){
                            swal({
                                title: "Success!",
                                text: data.pesan,
                                icon: "success",
                                button: "OK",
                            });
                            $("#exampleModal").modal("hide");
                            $('.tabel-pemakai-kendaraan').DataTable().ajax.reload();
                        }else if(data.status === 'error'){
                            swal({
                                title: "Error!",
                                text: data.pesan,
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
        var id_pemakai_kendaraan = $(this).data('id');
        console.log(id_pemakai_kendaraan);
        
        $.ajax({
            url: "/pemakai_kendaraan/"+id_pemakai_kendaraan+"/edit",
            method: "GET",
            dataType: "JSON",
            data: {
                id_pemakai_kendaraan: id_pemakai_kendaraan
            },
            success: function(data){
                $('#form-tambah-edit')[0].reset();
                $('#id_pemakai_kendaraan').val(data.id_pemakai_kendaraan);
                $('#nama_pemakai_kendaraan').val(data.nama_pemakai_kendaraan);
                $("#exampleModal").modal('show');
            },
            error: function(data){
                console.log(data);
            }
        })
    })

    $("body").on("click", ".hapus", function(){
        var id_pemakai_kendaraan = $(this).data('id');
        console.log(id_pemakai_kendaraan);
        swal({
            title: "Apakah Anda Yakin?",
            text: "Data Asuransi Akan Dihapus",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then(willdelete => {
            if(willdelete){
                $.ajax({
                    url: "/pemakai_kendaraan/"+id_pemakai_kendaraan+"/delete",
                    method: "DELETE",
                    dataType: "JSON",
                    data: {
                        id_pemakai_kendaraan: id_pemakai_kendaraan
                    },
                    success: function(data){
                        if(data.status === 'success'){
                            swal({
                                title: "Success!",
                                text: data.pesan,
                                icon: "success",
                                button: "OK",
                            });
                            $('.tabel-pemakai-kendaraan').DataTable().ajax.reload();
                        }else if(data.status === 'error'){
                            swal({
                                title: "Error!",
                                text: data.pesan,
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