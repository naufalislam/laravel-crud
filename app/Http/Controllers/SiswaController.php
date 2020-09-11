<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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
        // $this->validate($request,[
        //     'nama' => 'required' ,
        //     'email' => 'required|email|unique::users',
        //     'jenis_kelamin' => 'required',
        //     'agama' => 'required',
        //     'avatar' => 'mimes:jpg,png'
        // ]);
        $siswa = \App\Siswa::create($request->all());
        if ($request->hasFile('avatar')) {
            $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }
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
        if ($request->hasFile('avatar')) {
            $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }
        return redirect('/siswa')->with('sukses','Data Berhasil Diupdate');
    }
    public function delete($id)
    {
        $siswa = \App\siswa::find($id);
        $siswa->delete($siswa);
        return redirect('/siswa')->with('sukses','Data Berhasil Dihapus');
    }
    public function profile($id)
    {
        $siswa = \App\Siswa::find($id);
        $matapelajaran = \App\Mapel::all();

        // Menyiapkan Data Untuk Chart
        $categories = [];
        $data = [];
        foreach($matapelajaran as $mp){
            if ($siswa->mapel()->wherePivot('mapel_id',$mp->id)->first()) {
                
                $categories[] = $mp->nama;
                $data[] = $siswa->mapel()->wherePivot('mapel_id',$mp->id)->first()->pivot->nilai; 
                
            }
        } 
        // dd(($categories));
        // dd(json_encode($categories));
        // dd(($data));

        return view('siswa.profile',['siswa'=>$siswa,'matapelajaran'=>$matapelajaran,'categories'=>$categories,'data'=>$data]);
    }
    
    public function addnilai(Request $request,$idsiswa)
    {
        // dd($request->all());
        $siswa = \App\Siswa::find($idsiswa);
        if ($siswa->mapel()->where('mapel_id',$request->mapel)->exists()) {
            return redirect('siswa/'.$idsiswa.'/profile')->with('error','Data nilai sudah ada');
        }
        $siswa->mapel()->attach($request->mapel,['nilai' => $request->nilai,'update_at' => Carbon::now()]);
        

        return redirect('siswa/'.$idsiswa.'/profile')->with('sukses','Data nilai berhasil dimasukan');
    }

    public function deletenilai($idsiswa, $idmapel)
    {
        $siswa = \App\Siswa::find($idsiswa);
        $siswa->mapel()->detach($idmapel);
        return redirect()->back()->with('sukses','Data Nilai Berhasil dihapus');
    }
} 
