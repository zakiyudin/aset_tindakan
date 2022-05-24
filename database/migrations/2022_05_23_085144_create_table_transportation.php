<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTransportation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transportation', function (Blueprint $table) {
            $table->id('id_kendaraan');
            $table->string('nopol');
            $table->string('jenis_kendaraan');
            $table->string('tahun_kendaraan');
            $table->string('warna_kendaraan');
            $table->string('no_rangka');
            $table->string('no_mesin');
            $table->float('tonase');
            $table->string('atas_nama');
            $table->string('nama_pemakai_kendaraan');
            $table->string('polis_asuransi');
            $table->date('tgl_ex_asuransi');
            $table->string('asuransi');
            $table->date('tgl_ex_stnk');
            $table->date('tgl_ex_pajak_stnk');
            $table->date('tgl_ex_kir');
            $table->text('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_transportation');
    }
}
