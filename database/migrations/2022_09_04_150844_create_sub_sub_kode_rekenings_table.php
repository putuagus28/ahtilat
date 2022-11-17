<?php

use App\Models\SubKodeRekening;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubSubKodeRekeningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_sub_kode_rekenings', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(SubKodeRekening::class, 'sub_kode_rekening_id');
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
        Schema::dropIfExists('sub_sub_kode_rekenings');
    }
}
