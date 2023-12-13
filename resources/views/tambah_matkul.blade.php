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
    <center><div class="card-header"><strong>Tambah Data Mata Kuliah</strong></div></center>
    <div class="card-body">
        <form action="/data_matakuliah/save_mk" method="POST">
            @csrf
            <div class="form-group">
                <label>Kode Mata Kuliah</label>
                <input type="text" name="kode_mk" class="form-control" placeholder="Masukkan Kode">
            </div>

            <div class="form-group">
                <label>Nama Mata Kuliah</label>
                <input type="text" name="nama_mk" class="form-control" placeholder="Masukkan Nama">
            </div>

            <div class="form-group">
                <label>Bobot SKS</label>
                <input type="number" name="bobot_sks" class="form-control" placeholder="Masukkan Bobot">
            </div>

            <div class="form-group">
                <label>Grup</label>
                <input type="text" name="grup" class="form-control" placeholder="Masukkan Grup">
            </div>

            <div class="form-group">
                <label>Waktu</label>
                <input type="text" name="waktu" class="form-control" placeholder="Masukkan Waktu">
            </div>

            <div class="form-group">
                <label>Ruang</label>
                <input type="text" name="ruang" class="form-control" placeholder="Masukkan Ruang">
            </div>

            <div class="form-group">
                <label>Dosen Pengampu</label>
                <input type="text" name="dosen_pengampu" class="form-control" placeholder="Masukkan Nama Dosen Pengampu">
            </div>

            <div class="form-group mt-4">
                <button type="submit" role="button" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection