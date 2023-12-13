<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Factory;

class AuthController extends Controller
{
    public function register(){
        return view('register');
    }

    public function simpan(Request $request){
        User::create([
            'nama_lengkap'=> $request->nama_lengkap,
            'no_tlp'=> $request->no_tlp,
            'email'=> $request->email,
            'username'=>$request->username,
            'password'=> bcrypt($request->password),
            'role'=> $request->role
        ]);
        return redirect('login')->with('flash', 'YEY BERHASIL')->with('flash_type', 'success');
    }


    public function login(){
        return view('login');
    }

    public function ceklogin(Request $request){
       

        // validate input request
        $datalogin = [
            'username' => $request -> username,
            'password' => $request -> password,
        ];
        if(Auth::attempt($datalogin)){ 
            //hak akses
            if(Auth::user()->role == 'mahasiswa'){
                return redirect('/halaman_asdos');
            } 
            elseif(Auth::user()->role == 'admin'){
                return redirect('/home_admin');
            }
            elseif(Auth::user()->role == 'biro2'){
                return redirect('/home_biro');
            }
        }
        else{
            return redirect('/login')->withErrors('Email atau Password tidak sesuai!')->withInput();
        }
    }
    

 

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
