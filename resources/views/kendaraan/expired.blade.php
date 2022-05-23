@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row my-5">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3>Kendaraan Exp Asuransi</h3>
                </div>
                <div class="card-body">
                    <table class="table asuransi">
                        <thead>
                            <tr>
                                <th>No. Pol</th>
                                <th>Jenis</th>
                                <th>Tahun</th>
                                <th>Warna</th>
                                <th>No. Rangka</th>
                                <th>No. Mesin</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row my-5">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3>Kendaraan Exp STNK</h3>
                </div>
                <div class="card-body">
                    <table class="table stnk">
                        <thead>
                            <tr>
                                <th>No. Pol</th>
                                <th>Jenis</th>
                                <th>Tahun</th>
                                <th>Warna</th>
                                <th>No. Rangka</th>
                                <th>No. Mesin</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <div class="row my-5">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3>Kendaraan Exp Pajak STNK</h3>
                </div>
                <div class="card-body">
                    <table class="table pajak_stnk">
                        <thead>
                            <tr>
                                <th>No. Pol</th>
                                <th>Jenis</th>
                                <th>Tahun</th>
                                <th>Warna</th>
                                <th>No. Rangka</th>
                                <th>No. Mesin</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row my-5">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3>Kendaraan Exp KIR</h3>
                </div>
                <div class="card-body">
                    <table class="table kir">
                        <thead>
                            <tr>
                                <th>No. Pol</th>
                                <th>Jenis</th>
                                <th>Tahun</th>
                                <th>Warna</th>
                                <th>No. Rangka</th>
                                <th>No. Mesin</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
        $(".asuransi").DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('kendaraan.expired') }}",
                type: 'GET',
            },
            columns: [
                { data: 'nopol', name: 'nopol' },
                { data: 'jenis_kendaraan', name: 'jenis_kendaraan' },
                { data: 'tahun_kendaraan', name: 'tahun_kendaraan' },
                { data: 'warna_kendaraan', name: 'warna_kendaraan' },
                { data: 'no_rangka', name: 'no_rangka' },
                { data: 'no_mesin', name: 'no_mesin' },
                { data: 'action', name: 'action'}
            ]
        });

        $(".stnk").DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('kendaraan.expired_stnk') }}",
                type: 'GET',
            },
            columns: [
                { data: 'nopol', name: 'nopol' },
                { data: 'jenis_kendaraan', name: 'jenis_kendaraan' },
                { data: 'tahun_kendaraan', name: 'tahun_kendaraan' },
                { data: 'warna_kendaraan', name: 'warna_kendaraan' },
                { data: 'no_rangka', name: 'no_rangka' },
                { data: 'no_mesin', name: 'no_mesin' },
                { data: 'action', name: 'action'}
            ]
        });

        $(".pajak_stnk").DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('kendaraan.expired_pajak_stnk') }}",
                type: 'GET',
            },
            columns: [
                { data: 'nopol', name: 'nopol' },
                { data: 'jenis_kendaraan', name: 'jenis_kendaraan' },
                { data: 'tahun_kendaraan', name: 'tahun_kendaraan' },
                { data: 'warna_kendaraan', name: 'warna_kendaraan' },
                { data: 'no_rangka', name: 'no_rangka' },
                { data: 'no_mesin', name: 'no_mesin' },
                { data: 'action', name: 'action'}
            ]
        });

        $(".kir").DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('kendaraan.expired_kir') }}",
                type: 'GET',
            },
            columns: [
                { data: 'nopol', name: 'nopol' },
                { data: 'jenis_kendaraan', name: 'jenis_kendaraan' },
                { data: 'tahun_kendaraan', name: 'tahun_kendaraan', },
                { data: 'warna_kendaraan', name: 'warna_kendaraan' },
                { data: 'no_rangka', name: 'no_rangka' },
                { data: 'no_mesin', name: 'no_mesin' },
                { data: 'action', name: 'action'}
            ]
        })
    });
    

    $("body").on('click', '.tindak', function(e){
        e.preventDefault();
        var id = $(this).data('id');
        console.log(id);
    })
</script>
@endsection