<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Akun extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = [
        'no_akun',
        'nama_akun',
        'kode_rekening_id',
        'sub_kode_rekening_id',
        'sub_sub_kode_rekening_id',
        'saldo_akun',
    ];

    public function jurnalumums()
    {
        return $this->belongsToMany(Jurnalumum::class);
    }

    public function akunjurnalumums()
    {
        return $this->hasMany(AkunJurnalumum::class);
    }

    public function subsubkoderekenings()
    {
        return $this->belongsTo(SubSubKodeRekening::class, 'sub_sub_kode_rekening_id');
    }
}
