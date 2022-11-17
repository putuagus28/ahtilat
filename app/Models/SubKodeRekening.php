<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubKodeRekening extends Model
{
    use HasFactory;

    public function koderekenings()
    {
        return $this->belongsTo(KodeRekening::class, 'kode_rekening_id');
    }

    public function subsubkoderekenings()
    {
        return $this->hasMany(SubSubKodeRekening::class);
    }
}
