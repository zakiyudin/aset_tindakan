<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePemakaiKendaraan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemakai_kendaraan', function (Blueprint $table) {
            $table->id('id_pemakai_kendaraan');
            $table->string('nama_pemakai_kendaraan');
            $table->unsignedBigInteger('divisi_id');
            $table->foreign('divisi_id')->references('id_divisi')->on('divisi');
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
        Schema::dropIfExists('pemakai_kendaraan');
    }
}
