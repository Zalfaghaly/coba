<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Pembayaran;
use App\Models\Statuse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DatapembayarExport;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class DatapembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = 'List Pembayaran';
        return view('pembayaran.listpembayaran', compact('pageTitle'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pageTitle = 'Pembayaran';
        $bayar= Pembayaran::find($id);
        $status= Statuse::all();
        return view('pembayaran.veriy', [
        'pageTitle' => $pageTitle,
        'bayar' => $bayar,
        'status' => $status
    ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $bayar= Pembayaran::find($id);
        $bayar->statuse_id = $request->status;
        $bayar->save();
        Alert::success('Verifikasi Berhasil', 'Bukti Pembayaran Telah di verifikasi');
        return redirect()->route('databayar.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $bayar= Pembayaran::find($id);
        if ($bayar->encrypted_filename) {
            $encrypted_buktiimage = 'public/files/bukti/' . $bayar->encrypted_buktiimage;
            Storage::delete($encrypted_buktiimage);
            $bayar->delete();
        }
        else{
            $bayar->delete();
        }
        Alert::success('Deleted Berhasil', 'Data Pembayaran telah terhapus');
        return redirect()->route('databayar.index');
    }

        public function getData(Request $request)
        {
            $listpembayaran = Pembayaran::where('statuse_id', '2')->with('metode')->with('statuse')->with('product')->with('user');
            if ($request->ajax()) {
                return datatables()->of($listpembayaran)
                    ->addIndexColumn()
                    ->addColumn('menuadmin2', function($listpembayaran) {
                        return view('layouts.menuadmin2', compact('listpembayaran'));
                    })
                    ->toJson();
            }
        }

    public function exindex()
    {
        $pageTitle = 'List Expired Pembayaran';
        return view('pembayaran.listpembayaran2', compact('pageTitle'));
    }

    public function exgetData(Request $request)
        {
            $listpembayaran = Pembayaran::where('statuse_id', '1')->whereDate('created_at', '<', date('Y-m-d'))->with('metode')->with('statuse')->with('product')->with('user');
            if ($request->ajax()) {
                return datatables()->of($listpembayaran)
                    ->addIndexColumn()
                    ->addColumn('menuadmin4', function($listpembayaran) {
                        return view('layouts.menuadmin4', compact('listpembayaran'));
                    })
                    ->toJson();
            }
        }

    public function exdestroy(string $id)
    {
        $bayar= Pembayaran::find($id);
        if ($bayar->encrypted_filename) {
            $encrypted_buktiimage = 'public/files/bukti/' . $bayar->encrypted_buktiimage;
            Storage::delete($encrypted_buktiimage);
            $bayar->delete();
        }
        else{
            $bayar->delete();
        }
        return redirect()->route('databayar.exindex');
    }

    public function seindex()
    {
        $pageTitle = 'List Selesai Pembayaran';
        return view('pembayaran.listpembayaran3', compact('pageTitle'));
    }

    public function segetData(Request $request)
        {
            $listpembayaran = Pembayaran::where('statuse_id', '3')->with('metode')->with('statuse')->with('product')->with('user');
            if ($request->ajax()) {
                return datatables()->of($listpembayaran)
                    ->addIndexColumn()
                    ->addColumn('menuadmin4', function($listpembayaran) {
                        return view('layouts.menuadmin2', compact('listpembayaran'));
                    })
                    ->toJson();
            }
        }

    public function exportPdfbayar()
    {
        $bayar = Pembayaran::where('statuse_id', '3')->get();

        $pdf = PDF::loadView('pembayaran.pembayaran_pdf', compact('bayar'));

        return $pdf->download('databayar.pdf');
    }

    public function exportEcelDatapembayar()
    {
        return Excel::download(new DatapembayarExport, 'Datapembayar.xlsx');
    }
}
