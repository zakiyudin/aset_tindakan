@extends('layouts.app')

@section('title')
    Kendaraan
@endsection

@section('content')
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                <button type="button" class="close" data-bs-dismiss="alert">x</button>
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                <button type="button" class="close" data-bs-dismiss="alert">x</button>
                {{ session('error') }}
            </div>
            
        @endif
        <h1>Kendaraan</h1>
        <table>
            <tr>
                <div class="btn-group btn-group-sm" role="group" aria-label="Basic mixed styles example">
                    <a href="#" type="button" class="btn btn-outline-success" id="tambah-btn-modal">Tambah</a>
                    <a href="{{ route('kendaraan.pdf') }}" class="btn btn-outline-warning">Download PDF</a>
                    <a href="{{ route('kendaraan.import') }}" type="button" class="btn btn-outline-secondary">Import Excel</a>
                    <a href="{{ route('kendaraan.excel') }}" class="btn btn-outline-dark">Export Excel</a>
                    {{-- <a href="{{ route('kendaraan.expired') }}" class="btn btn-outline-danger">Expired</a> --}}
                    <a href="{{ route('kendaraan.delete_date') }}" class="btn btn-outline-danger">fixing</a>
                </div>
            </tr>
        </table>

        <table class="table table-kendaraan table-bordered table-striped cell-border table-hover">
            <thead>
                <th scope="col">#</th>
                <th scope="col">NO. POL</th>
                <th scope="col">JENIS</th>
                <th scope="col">TAHUN</th>
                <th scope="col">WARNA</th>
                <th scope="col">NO. RANGKA</th>
                <th scope="col">NO. MESIN</th>
                <th scope="col">AKSI</th>
            </thead>
        </table>
    </div>

  
    

    {{-- Modal Detail Kendaraan --}}
  <div class="modal fade modal-detail" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Detail Kendaraan</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form class="form-group">
                <div class="row">
                    <div class="col-6">
                        <p>No. Polisi</p>
                    </div>
                    <div class="col-6">
                        <input class="form-control" type="text" disabled id="detail_nopol">
                    </div>
                </div>
    
                <div class="row">
                    <div class="col-6">
                        <p>Jenis Kendaraan</p>
                    </div>
                    <div class="col-6">
                        <input class="form-control" type="text" disabled id="detail_jenis_kendaraan">
                    </div>
                </div>
    
                <div class="row">
                    <div class="col-6">
                        <p>Tahun</p>
                    </div>
                    <div class="col-6">
                        <input class="form-control" type="text" disabled id="detail_tahun_kendaraan">
                    </div>
                </div>
    
                <div class="row">
                    <div class="col-6">
                        <p>Warna</p>
                    </div>
                    <div class="col-6">
                        <input class="form-control" type="text" disabled id="detail_warna_kendaraan">
                    </div>
                </div>
    
                <div class="row">
                    <div class="col-6">
                        <p>No. Ranka</p>
                    </div>
                    <div class="col-6">
                        <input class="form-control" type="text" disabled id="detail_no_rangka">
                    </div>
                </div>
    
                <div class="row">
                    <div class="col-6">
                        <p>No. Mesin</p>
                    </div>
                    <div class="col-6">
                        <input class="form-control" type="text" disabled id="detail_no_mesin">
                    </div>
                </div>
    
                <div class="row">
                    <div class="col-6">
                        <p>Tonase</p>
                    </div>
                    <div class="col-6">
                        <input class="form-control" type="text" disabled id="detail_tonase">
                    </div>
                </div>
    
                <div class="row">
                    <div class="col-6">
                        <p>Atas Nama</p>
                    </div>
                    <div class="col-6">
                        <input class="form-control" type="text" disabled id="detail_atas_nama">
                    </div>
                </div>
    
                <div class="row">
                    <div class="col-6">
                        <p>Pemakai Kendaraan</p>
                    </div>
                    <div class="col-6">
                        <input class="form-control" type="text" disabled id="detail_pemakai_kendaraan">
                    </div>
                </div>
    
                <div class="row">
                    <div class="col-6">
                        <p>Polis Asuransi</p>
                    </div>
                    <div class="col-6">
                        <input class="form-control" type="text" disabled id="detail_polis_asuransi">
                    </div>
                </div>
    
                <div class="row">
                    <div class="col-6">
                        <p>Tanggal Expired Asuransi</p>
                    </div>
                    <div class="col-6">
                        <input class="form-control" type="text" disabled id="detail_tgl_ex_asuransi">
                    </div>
                </div>
    
                <div class="row">
                    <div class="col-6">
                        <p>Asuransi</p>
                    </div>
                    <div class="col-6">
                        <input class="form-control" type="text" disabled id="detail_asuransi">
                    </div>
                </div>
    
                <div class="row">
                    <div class="col-6">
                        <p>Tanggal Expired STNK(5thn)</p>
                    </div>
                    <div class="col-6">
                        <input class="form-control" type="text" disabled id="detail_tgl_ex_stnk">
                    </div>
                </div>
    
                <div class="row">
                    <div class="col-6">
                        <p>Tanggal Expired STNK(1thn)</p>
                    </div>
                    <div class="col-6">
                        <input class="form-control" type="text" disabled id="detail_tgl_ex_pajak_stnk">
                    </div>
                </div>
    
                <div class="row">
                    <div class="col-6">
                        <p>Tanggal Expired KIR</p>
                    </div>
                    <div class="col-6">
                        <input class="form-control" type="text" disabled id="detail_tgl_ex_kir">
                    </div>
                </div>
    
                <div class="row">
                    <div class="col-6">
                        <p>Keterangan</p>
                    </div>
                    <div class="col-6">
                        <input class="form-control" type="text" disabled id="detail_keterangan">
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  

    <!-- Modal Tambah Data Kendaraan-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">TAMBAH DATA KENDARAAN</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form action="{{ route('kendaraan.store') }}" class="form-group" id="form-tambah-edit" method="POST" enctype="multipart/form-data">
            @method('POST')
            @csrf
            <input type="hidden" name="id_kendaraan" id="id_kendaraan">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="nopol" class="form-label"><b>No. Pol</b></label>
                        <input type="text" name="nopol" id="nopol" class="form-control">
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="jenis_kendaraan" class="form-label"><b>Jenis Kendaraan</b></label>
                        <input type="text" name="jenis_kendaraan" id="jenis_kendaraan" class="form-control">
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="tahun_kendaraan" class="form-label"><b>Tahun Kendaraan</b></label>
                        <input type="text" name="tahun_kendaraan" id="tahun_kendaraan" class="form-control">
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="warna_kendaraan" class="form-label"><b>Warna Kendaraan</b></label>
                        <input type="text" name="warna_kendaraan" id="warna_kendaraan" class="form-control">
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="no_mesin" class="form-label"><b>No. Mesin</b></label>
                        <input type="text" name="no_mesin" id="no_mesin" class="form-control">
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="no_rangka" class="form-label"><b>No. Rangka</b></label>
                        <input type="text" name="no_rangka" id="no_rangka" class="form-control">
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="tonase" class="form-label"><b>Tonase</b></label>
                        <input type="text" name="tonase" id="tonase" class="form-control">
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="atas_nama" class="form-label"><b>Atas Nama</b></label>
                        <input type="text" name="atas_nama" id="atas_nama" class="form-control">
                    </div>
                    <hr>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="pemakai" class="form-label"><b>Pemakai</b></label>
                        <select name="pemakai_kendaraan_id" id="pemakai_kendaraan_id" class="form-control custom-select">
                            <option value="">.:: Pilih Pemakai ::.</option>
                            @foreach ($pemakai_kendaraan as $item)
                                <option value="{{ $item->id_pemakai_kendaraan }}">{{ $item->nama_pemakai_kendaraan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="polis_asuransi" class="form-label"><b>Polis Asuransi</b></label>
                        <input type="text" name="polis_asuransi" id="polis_asuransi" class="form-control">
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="tgl_ex_asuransi" class="form-label"><b>Exp. Asuransi</b></label>
                        <input type="date" name="tgl_ex_asuransi" id="tgl_ex_asuransi" class="form-control">
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="asuransi" class="form-label"><b>Asuransi</b></label>
                        <select name="asuransi_id" id="asuransi_id" class="form-control">
                            <option value="">.:: Pilih Asuransi ::.</option>
                            @foreach ($asuransi as $item)
                                <option value="{{ $item->id_asuransi }}">{{ $item->nama_asuransi }}</option>
                            @endforeach
                        </select>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="tgl_ex_stnk" class="form-label"><b>Exp. STNK(5Thn)</b></label>
                        <input type="date" name="tgl_ex_stnk" id="tgl_ex_stnk" class="form-control">
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="tgl_ex_pajak_stnk" class="form-label"><b>Exp. STNK(1Thn)</b></label>
                        <input type="date" name="tgl_ex_pajak_stnk" id="tgl_ex_pajak_stnk" class="form-control">
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="tgl_ex_kir" class="form-label"><b>Exp. KIR(6Thn)</b></label>
                        <input type="date" name="tgl_ex_kir" id="tgl_ex_kir" class="form-control">
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="keterangan" class="form-label"><b>Keterangan</b></label>
                        <input type="text" name="keterangan" id="keterangan" class="form-control">
                    </div>
                    <hr>
                </div>
            </div>          
        
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="tambah-kendaraan" value="create">Tambah</button>
            </div>
        </form>
      </div>
    </div>
  </div>

  {{-- <div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="exampleModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">TAMBAH DATA KENDARAAN</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{ route('kendaraan.import-excel') }}" class="form-group" enctype="multipart/form-data" method="POST">
                @method('POST')
                @csrf
                <div class="form-group">
                    <label for="">Import</label>
                    <input type="file" name="import_file" class="form-control" id="import_file">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Import</button>
                </div>
            </form>
      </div>
    </div>
  </div> --}}


  


  






  

  <script type="text/javascript">
  $(document).ready(function () {      
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })

    $(".table-kendaraan").DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ route('kendaraan.index') }}",
            type: 'GET',
        },
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
            {data: 'nopol', name: 'nopol'},
            {data: 'jenis_kendaraan', name: 'jenis_kendaraan'},
            {data: 'warna_kendaraan', name: 'warna_kendaraan'},
            {data: 'tahun_kendaraan', name: 'tahun_kendaraan'},
            {data: 'no_rangka', name: 'no_rangka'},
            {data: 'no_mesin', name: 'no_mesin'},
            // {data: 'no_rangka', name: 'no_rangka'},
            // {data: 'tonase', name: 'tonase'},
            // {data: 'atas_nama', name: 'atas_nama'},
            // {data: 'pemakai_kendaraan_id', name: 'pemakai_kendaraan_id'},
            // {data: 'polis_asuransi', name: 'polis_asuransi'},
            // {data: 'tgl_ex_asuransi', name: 'tgl_ex_asuransi'},
            // {data: 'asuransi_id', name: 'asuransi_id'},
            // {data: 'tgl_ex_stnk', name: 'tgl_ex_stnk'},
            // {data: 'tgl_ex_pajak_stnk', name: 'tgl_ex_pajak_stnk'},
            // {data: 'tgl_ex_kir', name: 'tgl_ex_kir'},
            // {data: 'keterangan', name: 'keterangan'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
  });

  $("#btn-import").click(function(){
    $("#importModal").modal("show");
  });

  $("#tambah-btn-modal").click(function(){
    $("#tambah-kendaraan").val("create");
    $("#modal-title").text("TAMBAH DATA KENDARAAN");
    $("#tambah-kendaraan").text("Simpan");
    $("#form-tambah-edit").trigger("reset");
    $("#exampleModal").modal("show");
  });

  if($("#form-tambah-edit").length > 0){
      $("#form-tambah-edit").validate({
          submitHandler: function(){
              $.ajax({
                    url: "{{ route('kendaraan.store') }}",
                    method: "POST",
                    data: $("#form-tambah-edit").serialize(),
                    dataType: "JSON",
                    success: function(response){
                        if(response.success === true){
                            swal({
                                title: "Sukses!",
                                text: response.message,
                                icon: "success",
                                button: "Tutup",
                            });
                            $(".table-kendaraan").DataTable().ajax.reload();
                            $("#exampleModal").modal("hide");
                        }
                    },
                    error: function(xhr, status, error){
                        var error = xhr.responseJSON;
                        if($.isEmptyObject(error) == false){
                            $.each(error.errors, function(key, value){
                                $("."+key).text(value);
                            });
                        }
                    }
                });
          }
      })
    }

    $(".btn-fix").click(function(){
        swal({
            title: "Apakah anda yakin?",
            text: "Data ini akan diubah!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: "{{ route('kendaraan.delete_date') }}",
                    method: "POST",
                    dataType: "JSON",
                    success: function(response){
                        if(response.success === true){
                            swal({
                                title: "Sukses!",
                                text: response.message,
                                icon: "success",
                                button: "Tutup",
                            });
                            $(".table-kendaraan").DataTable().ajax.reload();
                            $("#exampleModal").modal("hide");
                        }
                    },
                    error: function(xhr, status, error){
                        var error = xhr.responseJSON;
                        if($.isEmptyObject(error) == false){
                            $.each(error.errors, function(key, value){
                                $("."+key).text(value);
                            });
                        }
                    }
                });
            } else {
                swal("Data tidak jadi diubah!");
            }
        });
    })

    $("body").on("click", ".edit", function(e){
        e.preventDefault();
        var id = $(this).data('id');
        console.log(id);

        $.ajax({
            url: "{{ url('kendaraan') }}" + '/' + id + "/edit",
            method: "GET",
            dataType: "JSON",
            success: function(data){
                console.log(data);
                $("#exampleModal").modal('show');
                $("#tambah-kendaraan").html("Update Data")
                $("#modal-title").text("EDIT DATA KENDARAAN");
                $("#tambah-kendaraan").val("update");
                $("#id_kendaraan").val(data.id_kendaraan);
                $("#nopol").val(data.nopol);
                $("#jenis_kendaraan").val(data.jenis_kendaraan);
                $("#tahun_kendaraan").val(data.tahun_kendaraan);
                $("#warna_kendaraan").val(data.warna_kendaraan);
                $("#no_mesin").val(data.no_mesin);
                $("#no_rangka").val(data.no_rangka);
                $("#tonase").val(data.tonase);
                $("#atas_nama").val(data.atas_nama);
                $("#pemakai_kendaraan_id").val(data.pemakai_kendaraan_id);
                $("#polis_asuransi").val(data.polis_asuransi);
                $("#tgl_ex_asuransi").val(data.tgl_ex_asuransi);
                $("#asuransi_id").val(data.asuransi_id);
                $("#tgl_ex_stnk").val(data.tgl_ex_stnk);
                $("#tgl_ex_pajak_stnk").val(data.tgl_ex_pajak_stnk);
                $("#tgl_ex_kir").val(data.tgl_ex_kir);
                $("#keterangan").val(data.keterangan);
            },
            error: function(xhr, status, error){
                console.log(error);
            }
        })
    })

    $("body").on("click", ".hapus", function(e){
        e.preventDefault();
        var id = $(this).data('id');
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
                    url: "/kendaraan/"+id+ "/delete",
                    method: "DELETE",
                    dataType: "JSON",
                    success: function(data){
                        swal("Sukses!", data.message, "success");
                        $(".table-kendaraan").DataTable().ajax.reload();
                    },
                    error: function(xhr, status, error){
                        console.log(error);
                    }
                })
            } else {
                swal("Data kendaraan tetap ada!");
            }
        });
    })

    $("body").on("click", ".detail", function(e){
        e.preventDefault()
        var id = $(this).data('id');
        // console.log(id);

        $.ajax({
            url: "{{ url('kendaraan') }}" + '/' + id + "/detail",
            method: "GET",
            dataType: "JSON",
            success: function(data){
                const pemakai = data.pemakai_kendaraan ? data.pemakai_kendaraan.nama_pemakai_kendaraan : "-";
                const asuransi = data.asuransi ? data.asuransi.nama_asuransi : "-";
                const tonase = data.tonase ? data.tonase : "-";
                const polis = data.polis_asuransi ? data.polis_asuransi : "-";
                const tgl_asuransi = data.tgl_ex_asuransi ? data.tgl_ex_asuransi : "-";
                const tgl_stnk = data.tgl_ex_stnk ? data.tgl_ex_stnk : "-";
                const tgl_pajak_stnk = data.tgl_ex_pajak_stnk ? data.tgl_ex_pajak_stnk : "-";
                const tgl_kir = data.tgl_ex_kir ? data.tgl_ex_kir : "-";
                const keterangan = data.keterangan ? data.keterangan : "-";

                console.log(data);
                $(".modal-detail").modal('show');
                $("#detail_nopol").val(data.nopol);
                $("#detail_jenis_kendaraan").val(data.jenis_kendaraan);
                $("#detail_tahun_kendaraan").val(data.tahun_kendaraan);
                $("#detail_warna_kendaraan").val(data.warna_kendaraan);
                $("#detail_no_rangka").val(data.no_rangka);
                $("#detail_no_mesin").val(data.no_mesin);
                $("#detail_tonase").val(tonase);
                $("#detail_atas_nama").val(data.atas_nama);
                $("#detail_pemakai_kendaraan").val(pemakai);
                $("#detail_polis_asuransi").val(polis);
                $("#detail_tgl_ex_asuransi").val(tgl_asuransi);
                $("#detail_asuransi").val(asuransi);
                $("#detail_tgl_ex_stnk").val(tgl_stnk);
                $("#detail_tgl_ex_pajak_stnk").val(tgl_pajak_stnk);
                $("#detail_tgl_ex_kir").val(tgl_kir);
                $("#detail_keterangan").val(keterangan);
            },
            error: function(error){
                console.log(error);
            }
        })
    })
  </script>
@endsection