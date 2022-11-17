<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KodeRekening extends Model
{
    use HasFactory;

    public function subkoderekenings()
    {
        return $this->hasMany(SubKodeRekening::class);
    }
}
