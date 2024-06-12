<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UserExport;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = 'Userlist';
        return view('user.userlist', compact('pageTitle'));
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
        {
            $user = User::find($id);
            $user->delete();
            Alert::success('Deleted Berhasil', 'User telah terhapus');
            return redirect()->route('users.index');
        }

    public function getDatauser(Request $request)
        {
            $listuser = User::all();
            if ($request->ajax()) {
                return datatables()->of($listuser)
                    ->addIndexColumn()
                    ->addColumn('menuadmin3', function($listuser) {
                        return view('layouts.menuadmin3', compact('listuser'));
                    })
                    ->toJson();
            }
        }

    public function exportPdfuser()
        {
            $user = User::all();

            $pdf = PDF::loadView('user.user_pdf', compact('user'));

            return $pdf->download('user.pdf');
        }

    public function exportEceluser()
        {
            return Excel::download(new UserExport, 'User.xlsx');
        }
}
