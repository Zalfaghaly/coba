<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class AdminController extends Controller
{
    public function admin()
    {
        $pageTitle = 'Admin';

        return view('admin.login', ['pageTitle' => $pageTitle]);
    }


    public function homeadmin()
    {
        $pageTitle = 'Home';

        return view('admin.homeadmin', ['pageTitle' => $pageTitle]);
    }
}
