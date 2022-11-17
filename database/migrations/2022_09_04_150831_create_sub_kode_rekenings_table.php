<?php

use App\Models\KodeRekening;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubKodeRekeningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_kode_rekenings', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(KodeRekening::class, 'kode_rekening_id');
            $table->string('no_akun')->unique();
            $table->string('nama_akun')->unique();
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
        Schema::dropIfExists('sub_kode_rekenings');
    }
}
