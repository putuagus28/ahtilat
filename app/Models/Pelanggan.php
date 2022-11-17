<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_pelanggan',
        'email',
        'nama_pelanggan',
        'notlp',
        'catatan',
    ];
}
