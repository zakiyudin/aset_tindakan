<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnIdDivisiAndIdTipeAset extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('table_tindakan_aset', function (Blueprint $table) {
            $table->unsignedBigInteger('id_divisi')->nullable();
            $table->unsignedBigInteger('id_tipe_asset')->nullable();
            $table->foreign('id_divisi')->references('id_divisi')->on('divisi')->onDelete('cascade');
            $table->foreign('id_tipe_asset')->references('id_tipe_asset')->on('tipe_asset')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('table_tindakan_aset', function (Blueprint $table) {
            $table->dropColumn('id_divisi');
            $table->dropColumn('id_tipe_asset');
        });
    }
}
