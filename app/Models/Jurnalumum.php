<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Jurnalumum extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal_jurnal',
        'keterangan_jurnal',
        'total_jurnal',
        'jenis_aktivitas',
    ];

    protected $dates = ['tanggal_jurnal'];

    public function akuns()
    {
        return $this->belongsToMany(Akun::class);
    }

    public function akunjurnalumums()
    {
        return $this->hasMany(AkunJurnalumum::class);
    }
}
