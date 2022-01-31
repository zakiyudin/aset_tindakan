@extends('layouts.app')

@section('judul')
    Tindakan Maintenance
@endsection


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-12">
                            {{ __('Tindakan') }}
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table tabel-tindakan hover stripe table-bordered table-striped cell-border">
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




<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tindakan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form action="{{ route('tindakan.store') }}" class="form-group" id="form-tambah-edit" method="POST">
            @csrf
            <input type="hidden" name="id" id="id">
            <div class="form-group">
                <label for="nama_tindakan" class="form-label"><b>Nama Tindakan</b></label>
                <input type="text" name="nama_tindakan" id="nama_tindakan" class="form-control">
            </div>
            <div class="form-group">
                <label for="tanggal_tindakan" class="form-label"><b>Tanggal Tindakan</b></label>
                <input type="date" name="tanggal_tindakan" id="tanggal_tindakan" class="form-control">
            </div>
            <div class="form-group">
                <label for="keterangan" class="form-label"><b>Keterangan</b></label>
                <textarea name="keterangan" id="keterangan" rows="3" class="form-control"></textarea>
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="tombo-tindak" value="create">Tindak</button>
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

        $('.tabel-tindakan').DataTable({
            processing: true,
            serverSide: true,
            searching: true,
            ajax: "{{ route('tindakan.index') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'nama_aset', name: 'nama_aset'},
                {data: 'nama_divisi', name: 'nama_divisi'},
                {data: 'tanggal_pembelian', name: 'tanggal_pembelian'},
                {data: 'nama_tipe_asset', name: 'nama_tipe_asset'},
                {data: 'action', name: 'action', orderable: true, searchable: true},
            ]
        });
    });


    if($("#form-tambah-edit").length > 0){
        $("#form-tambah-edit").validate({
            submitHandler: function(form){
                var actionType = $("#tombol-tindak").val();
                $("#tombol-tindak").html('Sending..');

                $.ajax({
                    url:"{{ route('tindakan.store') }}",
                    type: "POST",
                    data: $('#form-tambah-edit').serialize(),
                    dataType: 'json',
                    success:function(data){
                        $('#exampleModal').modal('hide');
                        $('#form-tambah-edit').trigger("reset");
                        swal({
                            title: "Success!",
                            text: "Data Berhasil Ditambahkan",
                            icon: "success",
                            button: "Ok",
                        })
                        $('.tabel-tindakan').DataTable().ajax.reload();
                    },
                    error: function(data){
                        console.log('Error:', data);
                    }
                })
            }
        })
    }





    $("body").on("click", ".tindak_data", function(e){
        e.preventDefault();
        var id = $(this).data('id');
        console.log(id);

        $.ajax({
            url: "/tindakan/"+id+"/edit",
            type: "GET",
            dataType: "JSON",
            data:{
                id: id
            },
            success: function(data){
                $('#exampleModal').modal('show');
                $('#id').val(data.id);
                $('#nama_tindakan').val(data.nama_tindakan);
                $('#tanggal_tindakan').val(data.tanggal_tindakan);
                $('#user_id').val(data.user_id);
            }
        })
    })
</script>
@endsection