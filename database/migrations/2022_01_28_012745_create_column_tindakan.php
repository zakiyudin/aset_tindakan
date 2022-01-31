<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColumnTindakan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tindakan', function (Blueprint $table) {
            $table->id('id_tindakan');
            $table->string('nama_tindakan');
            $table->string('keterangan')->nullable();
            $table->date('tanggal_tindakan');
            $table->unsignedBigInteger('id');
            $table->foreign('id')->references('id')->on('table_tindakan_aset');
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
        Schema::dropIfExists('column_tindakan');
    }
}
