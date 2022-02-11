<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnImgAtTableTindakanAset extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('table_tindakan_aset', function (Blueprint $table) {
            $table->string('gambar_aset')->nullable();
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
            $table->dropColumn('gambar_aset');
        });
    }
}
