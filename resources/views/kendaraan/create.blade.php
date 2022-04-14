@extends('layouts.app')

@section('title')
    Kendaraan
@endsection

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Tambah Data
            </div>
            <div class="card-body">
                <form action="#" method="POST">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="">NOPOL</label>
                                <input type="text" name="nopol" id="nopol" required class="form-control">
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="">JENIS KENDARAAN</label>
                                <input type="text" name="jenis_kendaraan" id="jenis_kendaraan" required class="form-control">
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="">TAHUN KENDARAAN</label>
                                <input type="text" name="nopol" id="nopol" required class="form-control">
                            </div>


                            <div class="form-group">
                                <label class="form-label" for="">WARNA KENDARAAN</label>
                                <input type="text" name="nopol" id="nopol" required class="form-control">
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="">NO. RANGKA</label>
                                <input type="text" name="nopol" id="nopol" required class="form-control">
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="">NO. MESIN</label>
                                <input type="text" name="nopol" id="nopol" required class="form-control">
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="">TONASE</label>
                                <input type="text" name="nopol" id="nopol" required class="form-control">
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="">ATAS NAMA</label>
                                <input type="text" name="nopol" id="nopol" required class="form-control">
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="">PEMAKAI</label>
                                <select name="pemakai_id" id="pemakai_id" class="form-control">
                                    <option value="">Pilih Pemakai</option>
                                    @foreach ($pemakai as $item)
                                        <option value="{{ $item->id_pemakai }}">{{ $item->nama_pemakai }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="">POLIS ASURANSI</label>
                                <input type="text" name="nopol" id="nopol" required class="form-control">
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="">EXP ASURANSI</label>
                                <input type="text" name="nopol" id="nopol" required class="form-control">
                            </div>


                            <div class="form-group">
                                <label class="form-label" for="">ASURANSI</label>
                                <input type="text" name="nopol" id="nopol" required class="form-control">
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="">EXP STNK(5 THN)</label>
                                <input type="text" name="nopol" id="nopol" required class="form-control">
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="">EXP STNK(1 THN)</label>
                                <input type="text" name="nopol" id="nopol" required class="form-control">
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="">EXP KIR(6 THN)</label>
                                <input type="text" name="nopol" id="nopol" required class="form-control">
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="">KETERANGAN</label>
                                <input type="text" name="nopol" id="nopol" required class="form-control">
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
        </div>
    </div>
@endsection