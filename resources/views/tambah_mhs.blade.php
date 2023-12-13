@extends('layouts.main')
@section('header')
<ul>
  <li><a {{$key=='home_admin'?'active':''}} href="/home_admin">Data Asisten Dosen</a></li>
  <li><a {{$key=='data_matakuliah'?'active':''}} href="/data_matakuliah">Data Matakuliah</a></li>
 <!-- <li><a {{$key=='tambah_mhs'?'active':''}} href="/tambah_mhs">Tambah Mahasiswa</a></li>
  <li><a {{$key=='tambah_matkul'?'active':''}} href="/tambah_matkul">Tambah Matakuliah</a></li>-->
  <li><a {{$key=='logout'?'active':''}} href="/logout">Logout</a></li>
</ul>
@endsection

@section('hero')
<div class="card mt-4">
    <center><div class="card-header"><strong>Tambah Data Asisten Dosen</strong></div></center>
    <div class="card-body">
        <form action="/home_admin/save_mhs" method="POST">
            @csrf
            <div class="form-group">
                <label>NIM</label>
                <input type="text" name="nim" class="form-control" placeholder="Masukkan NIM">
            </div>

            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Lengkap">
            </div>

            
            <label>Bank Tujuan</label>
            <div class="form-check">
                <input type="radio" name="bank" class="form-check-input" value="BCA">
                <label>BCA</label>
            </div>
            <div class="form-check">
                <input type="radio" name="bank" class="form-check-input" value="BNI">
                <label>BNI</label>
            </div>
            <div class="form-check">
                <input type="radio" name="bank" class="form-check-input" value="BRI">
                <label>BRI</label>
            </div>
            <div class="form-check">
                <input type="radio" name="bank" class="form-check-input" value="Mandiri">
                <label>Mandiri</label>
            </div>

            <div class="form-group">
                <label>No Rekening</label>
                <input type="text" name="no_rek" class="form-control" placeholder="Masukkan No Rekening">
            </div>

            <label> Matakuliah 1 </label>
            <div class="form-group">
                <select name="matakuliah" class="form-control">
                <option value="0">--Pilih Matakuliah 1--</option>
                    <option value="Aplikasi Berbasis Desktop (A) ">Aplikasi Berbasis Desktop (A) </option>
                    <option value="Aplikasi Berbasis Desktop (B) ">Aplikasi Berbasis Desktop (B) </option>
                    <option value="Dasar - Dasar Pemrograman (A)">Dasar - Dasar Pemrograman (A)</option>
                    <option value="Dasar - Dasar Pemrograman (B)">Dasar - Dasar Pemrograman (B)</option>
                    <option value="Jaringan Komputer (A) ">Jaringan Komputer (A) </option>
                    <option value="Jaringan Komputer (B)">Jaringan Komputer (B)</option>
                    <option value="Keamanan Teknologi Informasi (A)">Keamanan Teknologi Informasi (A)</option>
                    <option value="Manajemen Proses Bisnis (A) ">Manajemen Proses Bisnis (A) </option>
                    <option value="Manajemen Proses Bisnis (B)">Manajemen Proses Bisnis (B)</option>
                    <option value="Matrikulasi Logika Pemrograman (A)">Matrikulasi Logika Pemrograman (A)</option>
                    <option value="Matrikulasi Logika Pemrograman (B)">Matrikulasi Logika Pemrograman (B)</option>
                    <option value="Perancangan Basis Data (A) ">Perancangan Basis Data (A) </option>
                    <option value="Perancangan Basis Data (B) ">Perancangan Basis Data (B) </option>
                    <option value="Praktikum Aplikasi Berbasis Desktop (A) ">Praktikum Aplikasi Berbasis Desktop (A) </option>
                    <option value="Praktikum Aplikasi Berbasis Desktop (B) ">Praktikum Aplikasi Berbasis Desktop (B) </option>
                    <option value="Praktikum Dasar - Dasar Pemrograman (A)">Praktikum Dasar - Dasar Pemrograman (A)</option>
                    <option value="Praktikum Dasar - Dasar Pemrograman (B)">Praktikum Dasar - Dasar Pemrograman (B)</option>
                    <option value="Praktikum Perancangan Basis Data (A) ">Praktikum Perancangan Basis Data (A) </option>
                    <option value="Praktikum Perancangan Basis Data (B) ">Praktikum Perancangan Basis Data (B) </option>
                    <option value="Praktikum Rekayasa Perangkat Lunak (A)">Praktikum Rekayasa Perangkat Lunak (A)</option>
                    <option value="Praktikum Rekayasa Perangkat Lunak (B) ">Praktikum Rekayasa Perangkat Lunak (B) </option>
                    <option value="Rekayasa Perangkat Lunak (A)">Rekayasa Perangkat Lunak (A)</option>
                    <option value="Rekayasa Perangkat Lunak (B)">Rekayasa Perangkat Lunak (B)</option>
                </select>
            </div>

            <label> Matakuliah 2 </label>
            <div class="form-group">
                <select name="matakuliah2" class="form-control">
                    <option value="0">--Pilih Matakuliah 2--</option>
                    <option value="Aplikasi Berbasis Desktop (A) ">Aplikasi Berbasis Desktop (A) </option>
                    <option value="Aplikasi Berbasis Desktop (B) ">Aplikasi Berbasis Desktop (B) </option>
                    <option value="Dasar - Dasar Pemrograman (A)">Dasar - Dasar Pemrograman (A)</option>
                    <option value="Dasar - Dasar Pemrograman (B)">Dasar - Dasar Pemrograman (B)</option>
                    <option value="Jaringan Komputer (A) ">Jaringan Komputer (A) </option>
                    <option value="Jaringan Komputer (B)">Jaringan Komputer (B)</option>
                    <option value="Keamanan Teknologi Informasi (A)">Keamanan Teknologi Informasi (A)</option>
                    <option value="Manajemen Proses Bisnis (A) ">Manajemen Proses Bisnis (A) </option>
                    <option value="Manajemen Proses Bisnis (B)">Manajemen Proses Bisnis (B)</option>
                    <option value="Matrikulasi Logika Pemrograman (A)">Matrikulasi Logika Pemrograman (A)</option>
                    <option value="Matrikulasi Logika Pemrograman (B)">Matrikulasi Logika Pemrograman (B)</option>
                    <option value="Perancangan Basis Data (A) ">Perancangan Basis Data (A) </option>
                    <option value="Perancangan Basis Data (B) ">Perancangan Basis Data (B) </option>
                    <option value="Praktikum Aplikasi Berbasis Desktop (A) ">Praktikum Aplikasi Berbasis Desktop (A) </option>
                    <option value="Praktikum Aplikasi Berbasis Desktop (B) ">Praktikum Aplikasi Berbasis Desktop (B) </option>
                    <option value="Praktikum Dasar - Dasar Pemrograman (A)">Praktikum Dasar - Dasar Pemrograman (A)</option>
                    <option value="Praktikum Dasar - Dasar Pemrograman (B)">Praktikum Dasar - Dasar Pemrograman (B)</option>
                    <option value="Praktikum Perancangan Basis Data (A) ">Praktikum Perancangan Basis Data (A) </option>
                    <option value="Praktikum Perancangan Basis Data (B) ">Praktikum Perancangan Basis Data (B) </option>
                    <option value="Praktikum Rekayasa Perangkat Lunak (A)">Praktikum Rekayasa Perangkat Lunak (A)</option>
                    <option value="Praktikum Rekayasa Perangkat Lunak (B) ">Praktikum Rekayasa Perangkat Lunak (B) </option>
                    <option value="Rekayasa Perangkat Lunak (A)">Rekayasa Perangkat Lunak (A)</option>
                    <option value="Rekayasa Perangkat Lunak (B)">Rekayasa Perangkat Lunak (B)</option>
                </select>
            </div>

            <div class="form-group mt-4">
                <button type="submit" role="button" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection