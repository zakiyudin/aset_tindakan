<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnCodeTipeAset extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tipe_asset', function (Blueprint $table) {
            $table->string('code_tipe_asset', 10)->nullable()->after('id_tipe_asset');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tipe_asset', function (Blueprint $table) {
            $table->dropColumn('code_tipe_asset');
        });
    }
}
