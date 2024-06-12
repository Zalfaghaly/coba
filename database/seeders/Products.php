<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Products extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'kodeproduk' => 'ME1',
                'namaproduk' => 'Meo Kitten ',
                'harga' => '21000',
                'stock' => '15',
                'deskripsi' => 'Makanan khusus kucing umur 2-4 bulan',
                'original_imagename' => 'meo_kitten.jpg',
                'encrypted_imagename' => 'encrypted_meo_kitten.jpg'
            ],
            [
                'kodeproduk' => 'MK1',
                'namaproduk' => 'Pasir Kucing',
                'harga' => '20000',
                'stock' => '3',
                'deskripsi' => 'Pasir kucing berkualitas',
                'original_imagename' => 'pasir_kucing.jpg',
                'encrypted_imagename' => 'encrypted_pasir_kucing.jpg'
            ],
            [
                'kodeproduk' => 'SE1',
                'namaproduk' => 'felibite Dewasa',
                'harga' => '17000',
                'stock' => '2',
                'deskripsi' => 'Makanan kucing untuk umur 11 bulan-1 tahun',
                'original_imagename' => 'felibite_dewasa.jpg',
                'encrypted_imagename' => 'encrypted_felibite_dewasa.jpg',
            ],
        ]);

    }
}
