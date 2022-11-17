<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSaldoAkunToAkunsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('akuns', function (Blueprint $table) {
            $table->bigInteger('saldo_akun')->after('sub_sub_kode_rekening_id')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('akuns', function (Blueprint $table) {
            $table->dropColumn('saldo_akun');
        });
    }
}
