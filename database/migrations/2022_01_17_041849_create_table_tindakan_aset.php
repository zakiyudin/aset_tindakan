<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTindakanAset extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_tindakan_aset', function (Blueprint $table) {
            $table->id();
            $table->string('nama_aset');
            $table->date('tanggal_pembelian');
            $table->date('tanggal_tindakan');
            $table->string('nama_tindakan');
            $table->unsignedBigInteger('id_divisi');
            $table->foreign('id_divisi')->references('id_divisi')->on('divisi');
            $table->unsignedBigInteger('id_tipe_asset');
            $table->foreign('id_tipe_asset')->references('id_tipe_asset')->on('tipe_asset');
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
        Schema::dropIfExists('table_tindakan_aset');
    }
}
