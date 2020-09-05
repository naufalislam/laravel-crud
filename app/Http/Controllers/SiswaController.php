<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        // dd($request->all());
        if ($request->has('cari')) {
            $data_siswa = \App\Siswa::where('nama','LIKE','%%'.$request->cari.'%%')->get();
        }else{
            $data_siswa =\App\Siswa::All();
        } 
        return view('siswa.index',['data_siswa' => $data_siswa]);
    }
    public function create(Request $request)
    {
        \App\Siswa::create($request->all());
        return redirect('/siswa')->with('sukses','Data Berhasil Diinput');
    }
    public function edit($id)
    {
        $siswa = \App\siswa::find($id);
        // dd($siswa);
        return view('siswa/edit',['siswa' => $siswa]);
    }
    public function update(Request $request,$id)
    {
        $siswa = \App\siswa::find($id);
        // dd($siswa);
        $siswa->update($request->all());
        return redirect('/siswa')->with('sukses','Data Berhasil Diupdate');
    }
    public function delete($id)
    {
        $siswa = \App\siswa::find($id);
        $siswa->delete($siswa);
        return redirect('/siswa')->with('sukses','Data Berhasil Dihapus');
    }
} 
