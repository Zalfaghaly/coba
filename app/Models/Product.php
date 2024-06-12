<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Definisikan relasi ke model Pembayaran
    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class);
    }

    // Tentukan atribut default
    protected $attributes = [
        'original_imagename' => 'default_image.jpg',
        'encrypted_imagename' => 'default_encrypted_image.jpg', // Tambahkan atribut default
    ];
}
