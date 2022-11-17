<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddJenisAktivitasToJurnalumumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jurnalumums', function (Blueprint $table) {
            $table->string('jenis_aktivitas')->after('total_jurnal');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jurnalumums', function (Blueprint $table) {
            $table->dropColumn('jenis_aktivitas');
        });
    }
}
