<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\SubKodeRekening;
use App\Models\KodeRekening;

class AddSubKodeRekeningIdToAkunsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('akuns', function (Blueprint $table) {
            $table->foreignIdFor(KodeRekening::class, 'kode_rekening_id')->after('nama_akun');
            $table->foreignIdFor(SubKodeRekening::class, 'sub_kode_rekening_id')->after('kode_rekening_id');
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
            $table->dropColumn('kode_rekening_id');
            $table->dropColumn('sub_kode_rekening_id');
        });
    }
}
