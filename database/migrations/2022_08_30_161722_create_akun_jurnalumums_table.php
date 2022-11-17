<?php

use App\Models\Akun;
use App\Models\Jurnalumum;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAkunJurnalumumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('akun_jurnalumum', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Akun::class, 'akun_id');
            $table->foreignIdFor(Jurnalumum::class, 'jurnalumum_id');
            $table->string('posisi_akun');
            $table->bigInteger('nominal_jurnal');
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
        Schema::dropIfExists('akun_jurnalumum');
    }
}
