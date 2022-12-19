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

    public function store(Request $request)
    {
        // dd($req  uest);
        $this->validate($request, [
            // 'id' => 'required',
            'created_by' => 'required',
            'nama_lelang' => 'required',
            'tgl_mulai' => 'required',
            'tgl_akhir' => 'required',
            'desc' => 'required',
            'scope' => 'required',
            'harga' => 'required',
           
        ]);

        mast_lelang::create([
            // 'id' => $request->id,
            'created_by' => $request->created_by,
            'nama_lelang' => $request->nama_lelang,
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_akhir' => $request->tgl_akhir,
            'desc' => $request->desc,
            'scope' => $request->scope,
            'harga' => $request->harga,
            
        ]);

        return redirect('/manlelang');
    }
    
   

}