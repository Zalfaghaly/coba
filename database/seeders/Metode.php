<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class Metode extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('metodes')->insert([
            [
                'kode' => '1',
                'metod' => 'Bank Mandiri',
                'deskripsis' => 'Pembayaran Melalui Mandiri'
            ],
            [
                'kode' => '2',
                'metod' => 'Bank BCA',
                'deskripsis' => 'Pembayaran Melalui BCA'
            ],
            [
                'kode' => '3',
                'metod' => 'Bank BNI',
                'deskripsis' => 'Pembayaran Melalui BNI'
            ],
            [
                'kode' => '4',
                'metod' => 'Bank BRI',
                'deskripsis' => 'Pembayaran Melalui BRI'
            ],
        ]);
    }
}
