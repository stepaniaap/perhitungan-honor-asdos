<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asdos; 
use App\Matakuliah; 
use App\Presensi; 


class PageController extends Controller
{
    public function login(){
        return view('login');
    }

    public function main(){
        return view('layouts/main');
    }

    // HALAMAN ASDOS 
    public function halaman_asdos(){

        return view('halaman_asdos', ['key' => 'halaman_asdos']);
    }

    // ADMIN - CRUD MHS
    public function home_admin(){ //data mahasiswa
        $asd = Asdos::all();
        return view('home_admin', ['key' => 'home_admin', 'asd' => $asd]);

    }

    public function tambah_mhs(){
        return view('tambah_mhs', ['key' => 'tambah_mhs']);
    }

    public function save_mhs(Request $request){ 
       // $matkul=implode(',', $request->get('matakuliah')); 
        Asdos::create([ 
            'nim'=>$request->nim, 
            'nama'=>$request->nama, 
            'bank'=>$request->bank, 
            'no_rek'=>$request->no_rek, 
            'matakuliah'=>$request->matakuliah,
            'matakuliah2'=>$request->matakuliah2
        ]);
        return redirect('home_admin')->with('flash','Data berhasil disimpan')->with('flash_type', 'success');
        
        // return redirect('/home_admin')->with('flash','Data berhasil disimpan')->with('flash_type', 'success');
    
        
    }

    public function edit_mhs($id) { 
        $asd = Asdos::find($id); 
        return view('edit_mhs', ['key'=>'home_admin','asd'=>$asd]);
        //mhs untuk menampung data yang dipilih
    } 

    public function update_mhs($id, Request $request){ 
        //$minat=implode(',', $request->get('minat')); 
        $asd = Asdos::find($id); 
        $asd->nim= $request->nim;
        $asd->nama = $request->nama;
        $asd->bank = $request->bank;
        $asd->no_rek = $request->no_rek;
        $asd->matakuliah = $request->matakuliah;
        $asd->matakuliah2= $request->matakuliah2;
        $asd->save();

        return redirect('home_admin')->with('flash','Data berhasil diedit')->with('flash_type', 'info');;
    }

    public function delete_mhs($id){ 
        $asd = Asdos::find($id); 
        $asd->delete();

        return redirect('home_admin')->with('flash','Data berhasil dihapus')->with('flash_type', 'danger');
 
    }

    // ADMIN - CRUD MAKUL
    public function data_matakuliah(){ //data matakuliah
        $mk = Matakuliah::all();
        return view('data_matakuliah', ['key' => 'data_matakuliah', 'mk' => $mk]);
    }

    public function tambah_matkul(){
        return view('tambah_matkul', ['key' => 'tambah_matkul']);
    }

    public function edit_mk($id){
        $mk = Matakuliah::find($id); 
        return view('edit_mk', ['key' => 'data_matakuliah', 'mk' => $mk]);
    }

    public function save_mk(Request $request){ 
       Matakuliah::create([ 
            'kode_mk'=>$request->kode_mk, 
            'nama_mk'=>$request->nama_mk, 
            'bobot_sks'=>$request->bobot_sks, 
            'grup'=>$request->grup, 
            'ruang'=>$request->ruang, 
            'waktu'=>$request->waktu, 
            'dosen_pengampu'=>$request->dosen_pengampu, 
         
        ]);
        return redirect('data_matakuliah');
    }

    public function update_mk($id, Request $request){ 
        //$minat=implode(',', $request->get('minat')); 
        $mk = Matakuliah::find($id); 
        $mk->kode_mk = $request->kode_mk;
        $mk->nama_mk = $request->nama_mk;
        $mk->bobot_sks = $request->bobot_sks;
        $mk->grup = $request->grup;
        $mk->ruang = $request->ruang;
        $mk->waktu = $request->waktu;;
        $mk->dosen_pengampu = $request->dosen_pengampu;
        $mk->save();

        return redirect('data_matakuliah');

    
    }

    public function delete_mk($id){ 
        $mk = Matakuliah::find($id); 
        $mk->delete();

        return redirect('data_matakuliah')->with('flash','Data berhasil dihapus')->with('flash_type', 'danger');
 
    }

    public function validasi_kehadiran(){

        return view('validasi_kehadiran', ['key' => 'validasi_kehadiran']);
    }


    //BIRO
    public function home_biro(){
        $asd = Asdos::all();
        return view('home_biro', ['key' => 'home_biro', 'asd' => $asd]);
    }

    public function data_presensi(){
        return view('data_presensi', ['key' => 'data_presensi']);
    }

   

    
}
