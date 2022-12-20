<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\mast_lelang;
use App\user_lelang;


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
    
    public function user_lelang()
    {
        $user_lelang = user_lelang::all();

        return view('Admin.user_lelang', ['user_lelang' => $user_lelang]) ;
        // return view('Admin.user_lelang') ;
        // return view('Admin.manlelang', ['mast_lelang' => $mast_lelang]);
    }

    public function userlelang_store(Request $request)
    {
        // dd($request);
        $this->validate($request, [
            // 'id' => 'required',
            'id_user' => 'required',
            'email' => 'required',
            'nama_perusahaan' => 'required',
            'alamat' => 'required',
            'telp' => 'required',
            'no_nib' => 'required',
            'file' => 'nullable',
           
        ]);

        user_lelang::create([
            // 'id' => $request->id,
            'id_user' =>$request->id_user,
            'email' => Auth::user()->email,
            'nama_perusahaan' => $request->nama_perusahaan,
            'alamat' => $request->alamat,
            'telp' => $request->telp,
            'no_nib' => $request->no_nib,
            'file' => $request->file,
           
        ]);

        return redirect('/user_lelang');
    }

}