<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableKendaraan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kendaraan', function (Blueprint $table) {
            $table->id('id_kendaraan');
            $table->string('nopol');
            $table->string('jenis_kendaraan');
            $table->string('tahun_kendaraan');
            $table->string('warna_kendaraan');
            $table->string('no_rangka');
            $table->string('no_mesin');
            $table->float('tonase');
            $table->string('atas_nama');
            $table->unsignedBigInteger('pemakai_kendaraan_id');
            $table->foreign('pemakai_kendaraan_id')->references('id_pemakai_kendaraan')->on('pemakai_kendaraan');
            $table->string('polis_asuransi');
            $table->date('tgl_ex_asuransi');
            $table->unsignedBigInteger('asuransi_id');
            $table->foreign('asuransi_id')->references('id_asuransi')->on('asuransi');
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
        Schema::dropIfExists('kendaraan');
    }
}
