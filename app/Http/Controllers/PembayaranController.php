<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Pembayaran;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PembayaranController extends Controller
{
    public function pembayaran(Request $request, string $id)
    {
        $Products = Product::find($id);
        $messages = [
            'required' => ':Attribute harus diisi.',
            'unic' => 'Isi :attribute dengan format yang benar',
            'numeric' => 'Isi :attribute dengan angka'
        ];

        $validator = Validator::make($request->all(), [
            'alamat' => 'required',
            'nama_penerima' => 'required',
            'no' => 'required|numeric',
            'jumlah' => 'required|numeric',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $phg = $Products->harga;
        $iuser = $request->iduser;
        $harga = $request->jumlah * $phg;
        $stock = $Products->stock - $request->jumlah;
        $Products->stock = $stock;
        $Products->save();
        $pembelian = New Pembayaran;
        $pembelian->nama_penerima = $request->nama_penerima;
        $pembelian->alamat = $request->alamat;
        $pembelian->no_hp = $request->no;
        $pembelian->jumlah = $request->jumlah;
        $pembelian->biaya = $harga;
        $pembelian->metode_id = $request->metode;
        $pembelian->statuse_id = 1;
        $pembelian->user_id = $iuser;
        $pembelian->product_id = $id;
        $pembelian->save();

        Alert::success('Pembelian Berhasil', 'Silahkan lanjutkan Pembayaran');

        return redirect()->route('history', [$iuser]);


    }
}
