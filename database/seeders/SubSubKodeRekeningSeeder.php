<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SubSubKodeRekening;

class SubSubKodeRekeningSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubSubKodeRekening::create([
            'sub_kode_rekening_id' => 1,
            'no_akun' => '1.1.1',
            'nama_akun' => 'Kas'
        ]);
        SubSubKodeRekening::create([
            'sub_kode_rekening_id' => 1,
            'no_akun' => '1.1.2',
            'nama_akun' => 'Surat Berharga'
        ]);
        SubSubKodeRekening::create([
            'sub_kode_rekening_id' => 1,
            'no_akun' => '1.1.3',
            'nama_akun' => 'Piutang'
        ]);
        SubSubKodeRekening::create([
            'sub_kode_rekening_id' => 1,
            'no_akun' => '1.1.4',
            'nama_akun' => 'Perlengkapan'
        ]);
        SubSubKodeRekening::create([
            'sub_kode_rekening_id' => 1,
            'no_akun' => '1.1.5',
            'nama_akun' => 'Persekot (Uang Muka)'
        ]);

        SubSubKodeRekening::create([
            'sub_kode_rekening_id' => 2,
            'no_akun' => '1.2.1',
            'nama_akun' => 'Investasi Jangka Panjang'
        ]);

        SubSubKodeRekening::create([
            'sub_kode_rekening_id' => 3,
            'no_akun' => '1.3.1',
            'nama_akun' => 'Harga Pokok Aktiva Tetap'
        ]);
        SubSubKodeRekening::create([
            'sub_kode_rekening_id' => 3,
            'no_akun' => '1.3.2',
            'nama_akun' => 'Akumulasi Penyusutan Aktiva Tetap'
        ]);

        SubSubKodeRekening::create([
            'sub_kode_rekening_id' => 4,
            'no_akun' => '1.4.1',
            'nama_akun' => 'Aktiva Tetap Tidak Berwujud'
        ]);

        SubSubKodeRekening::create([
            'sub_kode_rekening_id' => 5,
            'no_akun' => '1.5.1',
            'nama_akun' => 'Aktiva Lain-Lain'
        ]);

        SubSubKodeRekening::create([
            'sub_kode_rekening_id' => 6,
            'no_akun' => '2.1.1',
            'nama_akun' => 'Hutang Lancar'
        ]);

        SubSubKodeRekening::create([
            'sub_kode_rekening_id' => 7,
            'no_akun' => '2.2.1',
            'nama_akun' => 'Hutang Jangka Panjang'
        ]);

        SubSubKodeRekening::create([
            'sub_kode_rekening_id' => 8,
            'no_akun' => '3.1.1',
            'nama_akun' => 'Modal'
        ]);

        SubSubKodeRekening::create([
            'sub_kode_rekening_id' => 9,
            'no_akun' => '4.1.1',
            'nama_akun' => 'Pendapatan'
        ]);

        SubSubKodeRekening::create([
            'sub_kode_rekening_id' => 10,
            'no_akun' => '5.1.1',
            'nama_akun' => 'Beban Pemasaran'
        ]);

        SubSubKodeRekening::create([
            'sub_kode_rekening_id' => 11,
            'no_akun' => '5.2.1',
            'nama_akun' => 'Beban Administrasi dan Umum'
        ]);
    }
}
