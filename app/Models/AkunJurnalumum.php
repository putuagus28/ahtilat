<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AkunJurnalumum extends Model
{
    use HasFactory;

    protected $table = 'akun_jurnalumum';

    protected $fillable = [
        'akun_id',
        'jurnalumum_id',
        'posisi_akun',
        'nominal_jurnal',
    ];

    public function jurnals()
    {
        return $this->belongsTo(Jurnalumum::class, 'jurnalumum_id');
    }

    public function akuns()
    {
        return $this->belongsTo(Akun::class, 'akun_id');
    }
}
