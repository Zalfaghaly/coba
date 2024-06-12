<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Pembayaran;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class CatalogController extends Controller
{
    public function catalog()
    {
        $pageTitle = 'Product';
        $Products = Product::where("stock",">", '1')->get();
        return view('product', [
        'pageTitle' => $pageTitle,
        'Products' => $Products
    ]);

    }
}
