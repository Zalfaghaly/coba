<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class Statuse extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('statuses')->insert([
            [
                'code' => 'Bayar',
                'proses' => 'Dalam Pembayaran',
                'deskripsis' => 'User sedang melakukan Pembayaran'
            ],
            [
                'code' => 'Verifikasi',
                'proses' => 'Dalam Peroses Verifikasi',
                'deskripsis' => 'Admin sedang memverifikasi'
            ],
            [
                'code' => 'Done',
                'proses' => 'Selesai',
                'deskripsis' => 'Selesai'
            ],
        ]);
    }
}
