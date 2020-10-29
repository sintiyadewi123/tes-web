<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Karyawan;
use App\Gaji;

class KaryawanController extends Controller
{
    public function index(Request $request){
         if($request->has('cari')){
            $karyawan = \App\Karyawan::with('gaji')->where('nama', 'like', '%'.$request->cari.'%')->orWhere('nip', 'like', '%'.$request->cari.'%')->orWhere('gender', 'like', '%'.$request->cari.'%')->orWhere('tanggal_lahir', 'like', '%'.$request->cari.'%')->orWhere('tanggal_masuk', 'like', '%'.$request->cari.'%')->orWhere('gaji_id', 'like', '%'.$request->cari.'%')->get();
        }else{
            $karyawan = \App\Karyawan::with('gaji')->get();
        }
    	return view('karyawan.index',compact(['karyawan']));
    }
    public function input(){
        $peg = Gaji::all();
        return view('karyawan.input-data', compact('peg'));
    }
    public function store(Request $request){
        Karyawan::create([
        'nip' => $request->nip,
        'nama'=> $request->nama,
        'gaji_id'=> $request->gaji_id,
        'gender' => $request->gender,
        'tanggal_lahir' => $request->tanggal_lahir,
        'tanggal_masuk' => $request->tanggal_masuk,
        ]);
        Session::flash('success','Data berhasil tersimpan');
        return redirect('/')->with('sukses','Data berhasil ditambahkan');
    }
    // public function create(Request $request){
    //     $this->validate($request,[
    //         'nip' => 'required',
    //         'nama' => 'required',
    //         'gender' => 'required',
    //         'tanggal_lahir' => 'required',
    //         'tanggal_masuk' =>'required',
           

    //     ]);
    //     $karyawan = new App\Karyawan;
    //     $karyawan->nip = $request->nip;
    //     $karyawan->nama= $request->nama;
    //     $karyawan->gender = $request->gender;
    //     $karyawan->tanggal_lahir = $request->tanggal_lahir;
    //     $karyawan->tanggal_masuk = $request->tanggal_masuk;
     
    //     $karyawan->save();
    	
    //     Session::flash('success','Data berhasil tersimpan');
    // 	return redirect('/')->with('sukses','Data berhasil ditambahkan');
    // }
    public function edit($id){
        $peg = Gaji::all();
    	$karyawan = \App\Karyawan::with('gaji')->find($id);
    	return view('karyawan.edit',compact(['karyawan','peg']));
    }
    public function update(Request $request, $id){
        
    	$karyawan = \App\Karyawan::find($id);
    	$karyawan->update($request->all());
        Session::flash('success','Data berhasil diupdate');
    	return redirect('/')->with('sukses','Data berhasil diupdate');
    }
    public function delete($id){
    	$karyawan = \App\Karyawan::find($id);
    	$karyawan->delete($karyawan);
        Session::flash('success','Data berhasil dihapus');
    	return back()->with('sukses','Data berhasil dihapus');
    }
    public function search(Request $request){
    	$search = $request->get('search');
    	$karyawan = DB::table('karyawan')->where('nama', 'like', '%'.$search.'%')->orWhere('nip', 'like', '%'.$search.'%')->orWhere('gender', 'like', '%'.$search.'%')->orWhere('tanggal_lahir', 'like', '%'.$search.'%')->orWhere('gaji_id->gaji_id', 'like', '%'.$search.'%')->get();

    	return view('karyawan.index',compact(['karyawan']));
    }
        public function periode(Request $request){
        try {
            $dari = $request->dari;
            $sampai = $request->sampai;
 
            $title = "Transaksi Pesanan dari $dari sampai $sampai";
 
            $karyawan = \App\Karyawan::whereDate('created_at','>=',$dari)->whereDate('created_at','<=',$sampai)->orderBy('created_at','desc')->get();
 
            return view('karyawan.index',compact('title','karyawan'));
        } catch (\Exception $e) {
           
 
            
        }
    }
 
}
