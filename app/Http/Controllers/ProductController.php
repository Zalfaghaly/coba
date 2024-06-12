<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Pembayaran;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductExport;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = 'Product';
        $Products = Product::all();
        return view('admin.product', [
        'pageTitle' => $pageTitle,
        'Products' => $Products
    ]);

    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle = 'Tambah Product';

        return view('admin.add', ['pageTitle' => $pageTitle]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => ':harus diisi.',
            'unic' => 'Isi :attribute dengan format yang benar',
            'numeric' => 'Isi :attribute dengan angka',
        ];

        $validator = Validator::make($request->all(), [
            'Nama_Product' => 'required',
            'Code' => 'required',
            'Deskripsi' => 'required',
            'Harga' => 'required|numeric',
            'Stock' => 'required|numeric',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $file = $request->file('imgproduct');
        $originalimagename = $file->getClientOriginalName();
        $encryptedimagename = $file->hashName();
        //Store File
        $file->store('public/files/img');


        $Product = New Product;
        $Product->kodeproduk = $request->Code;
        $Product->namaproduk = $request->Nama_Product;
        $Product->harga = $request->Harga;
        $Product->stock = $request->Stock;
        $Product->deskripsi = $request->Deskripsi;
        $Product->original_imagename = $originalimagename;
        $Product->encrypted_imagename = $encryptedimagename;
        $Product->save();
        Alert::success('Berhasil di Tambahkan', 'Product Telah di Tambahkan Ke Catalog');
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pageTitle = 'Edit Product';
        $Products = Product::find($id);
        return view('admin.editproduct', [
        'pageTitle' => $pageTitle,
        'Products' => $Products
    ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id )
    {
        $messages = [
            'required' => ':harus diisi.',
            'unic' => 'Isi :attribute dengan format yang benar',
            'numeric' => 'Isi :attribute dengan angka',
        ];

        $validator = Validator::make($request->all(), [
            'Nama_Product' => 'required',
            'Code' => 'required',
            'Deskripsi' => 'required',
            'Harga' => 'required|numeric',
            'Stock' => 'required|numeric',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $Product = Product::find($id);
        $file = $request->file('imgproduct');
        if ($file == null) {
            $originalimagename = $Product->original_imagename;
            $encryptedimagename = $Product->encrypted_imagename;
        }
        elseif($file != null) {
            $originalimagename = $file->getClientOriginalName();
            $encryptedimagename = $file->hashName();
            $file->store('public/files/img');
        }
        $Product->kodeproduk = $request->Code;
        $Product->namaproduk = $request->Nama_Product;
        $Product->harga = $request->Harga;
        $Product->stock = $request->Stock;
        $Product->deskripsi = $request->Deskripsi;
        $Product->original_imagename = $originalimagename;
        $Product->encrypted_imagename = $encryptedimagename;
        $Product->save();
        Alert::success('Berhasil', 'Data Product Telah di ubah');
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Product = Product::find($id);
        Storage::delete('public/files/img/' . $Product->encrypted_imagename);
        $Product->delete();
        Alert::success('Deleted Berhasil', 'Product telah terhapus');
        return redirect()->route('product.index');
    }

    public function getDataproduct(Request $request)
        {
            $listproduct = Product::all();
            if ($request->ajax()) {
                return datatables()->of($listproduct)
                    ->addIndexColumn()
                    ->addColumn('menuadmin', function($listproduct) {
                        return view('layouts.menuadmin', compact('listproduct'));
                    })
                    ->toJson();
            }
        }

    public function exportPdfproduct()
    {
        $Product = Product::all();

        $pdf = PDF::loadView('admin.product_pdf', compact('Product'));

        return $pdf->download('product.pdf');
    }

    public function exportEcelproduct()
    {
        return Excel::download(new ProductExport, 'Product.xlsx');
    }

}
