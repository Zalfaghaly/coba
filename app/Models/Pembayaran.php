<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    public function Product()
    {
        return $this->belongsTo(Product::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Statuse()
    {
        return $this->belongsTo(Statuse::class);
    }

    public function Metode()
    {
        return $this->belongsTo(Metode::class);
    }

}
