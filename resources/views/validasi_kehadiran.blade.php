@extends('layouts.main')
@section('header')
<ul>
  <li><a {{$key=='home_admin'?'active':''}} href="/home_admin">Data Asisten Dosen</a></li>
  <li><a {{$key=='data_matakuliah'?'active':''}} href="/data_matakuliah">Data Matakuliah</a></li>
  <li><a {{$key=='validasi_kehadiran'?'active':''}} href="/validasi_kehadiran">Data Presensi</a></li>
 <!-- <li><a {{$key=='tambah_mhs'?'active':''}} href="/tambah_mhs">Tambah Mahasiswa</a></li>
  <li><a {{$key=='tambah_matkul'?'active':''}} href="/tambah_matkul">Tambah Matakuliah</a></li>-->
  <li><a {{$key=='logout'?'active':''}} href="/logout">Logout</a></li>
</ul>
@endsection

@section('hero')
<h2><center>Data Presensi</center></h2>

  
@endsection