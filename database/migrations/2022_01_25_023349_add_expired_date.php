<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

class AddExpiredDate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('table_tindakan_aset', function (Blueprint $table) {
            $table->date('tanggal_expired')->default(Carbon::now()->addYear(1))->after('tanggal_pembelian');
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
            $table->dropColumn('tanggal_expired');
        });
    }
}
