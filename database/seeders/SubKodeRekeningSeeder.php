<?php

namespace Database\Seeders;

use App\Models\SubKodeRekening;
use Illuminate\Database\Seeder;

class SubKodeRekeningSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubKodeRekening::create([
            'kode_rekening_id' => 1,
            'no_akun' => '1.1',
            'nama_akun' => 'Aktiva Lancar'
        ]);
        SubKodeRekening::create([
            'kode_rekening_id' => 1,
            'no_akun' => '1.2',
            'nama_akun' => 'Investasi Jangka Panjang'
        ]);
        SubKodeRekening::create([
            'kode_rekening_id' => 1,
            'no_akun' => '1.3',
            'nama_akun' => 'Aktiva Tetap Berwujud'
        ]);
        SubKodeRekening::create([
            'kode_rekening_id' => 1,
            'no_akun' => '1.4',
            'nama_akun' => 'Aktiva Tetap Tidak Berwujud'
        ]);
        SubKodeRekening::create([
            'kode_rekening_id' => 1,
            'no_akun' => '1.5',
            'nama_akun' => 'Aktiva Lain-Lain'
        ]);
        SubKodeRekening::create([
            'kode_rekening_id' => 2,
            'no_akun' => '2.1',
            'nama_akun' => 'Hutang Lancar'
        ]);
        SubKodeRekening::create([
            'kode_rekening_id' => 2,
            'no_akun' => '2.2',
            'nama_akun' => 'Hutang Jangka Panjang'
        ]);
        SubKodeRekening::create([
            'kode_rekening_id' => 3,
            'no_akun' => '3.1',
            'nama_akun' => 'Modal'
        ]);
        SubKodeRekening::create([
            'kode_rekening_id' => 4,
            'no_akun' => '4.1',
            'nama_akun' => 'Pendapatan'
        ]);
        SubKodeRekening::create([
            'kode_rekening_id' => 5,
            'no_akun' => '5.1',
            'nama_akun' => 'Beban Pemasaran'
        ]);
        SubKodeRekening::create([
            'kode_rekening_id' => 5,
            'no_akun' => '5.2',
            'nama_akun' => 'Beban Administrasi dan Umum'
        ]);

    }
}
