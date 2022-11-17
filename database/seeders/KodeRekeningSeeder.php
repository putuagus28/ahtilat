<?php

namespace Database\Seeders;

use App\Models\KodeRekening;
use Illuminate\Database\Seeder;

class KodeRekeningSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        KodeRekening::create([
            'no_akun' => '1',
            'nama_akun' => 'Aktiva'
        ]);
        KodeRekening::create([
            'no_akun' => '2',
            'nama_akun' => 'Hutang'
        ]);
        KodeRekening::create([
            'no_akun' => '3',
            'nama_akun' => 'Modal'
        ]);
        KodeRekening::create([
            'no_akun' => '4',
            'nama_akun' => 'Pendapatan'
        ]);
        KodeRekening::create([
            'no_akun' => '5',
            'nama_akun' => 'Beban'
        ]);
    }
}
