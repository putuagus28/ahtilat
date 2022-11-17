<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubSubKodeRekening extends Model
{
    use HasFactory;

    public function subkoderekenings()
    {
        return $this->belongsTo(SubKodeRekening::class, 'sub_kode_rekening_id');
    }

    public function akuns()
    {
        return $this->hasMany(Akun::class);
    }
}
