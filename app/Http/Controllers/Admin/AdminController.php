<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\mast_lelang;


class AdminController extends Controller
{

    public function manlelang()
    {
        $mast_lelang = mast_lelang::all();

        return view('Admin.manlelang', ['mast_lelang' => $mast_lelang]) ;
        // return view('Admin.manlelang', ['mast_lelang' => $mast_lelang]);
    }
    


}