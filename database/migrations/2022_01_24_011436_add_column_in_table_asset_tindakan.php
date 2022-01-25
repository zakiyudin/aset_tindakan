<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnInTableAssetTindakan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('table_tindakan_aset', function (Blueprint $table) {
            $table->enum('status', ['sudah', 'belum'])->default('belum')->after('nama_tindakan');
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
            //
        });
    }
}
