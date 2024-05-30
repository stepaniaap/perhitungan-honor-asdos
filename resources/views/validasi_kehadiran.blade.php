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
<h2><center>Validasi Data Presensi</center></h2>

<!-- admin/presensi/index.blade.php -->
@foreach ($presensiList as $presensi)
    <p>Matakuliah: {{ $presensi->matakuliah->nama_mk }}</p>
    <p>Asisten Dosen: {{ $presensi->asdos->nama }}</p>
    <p>Tanggal Presensi: {{ $presensi->created_at->format('Y-m-d') }}</p>
    <p>Waktu Check-in: {{ $presensi->check_in ? $presensi->check_in->format('H:i:s') : 'Belum check-in' }}</p>
    <p>Waktu Check-out: {{ $presensi->check_out ? $presensi->check_out->format('H:i:s') : 'Belum check-out' }}</p>
    <p>Status: {{ $presensi->validated ? 'Valid' : 'Belum divalidasi' }}</p>
    <form action="/home_admin/presensi/validate/{{ $presensi->id }}" method="post">
        @csrf
        <button type="submit" class="btn btn-primary">Validasi</button>
    </form>
    <hr>
@endforeach
  
@endsection