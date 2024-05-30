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
                <input type="text" name="username" class="form-control" placeholder="Masukkan NIM">
            </div>

            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="nama_lengkap" class="form-control" placeholder="Masukkan Nama Lengkap">
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

            
            <div class="form-group">
            <label> Matakuliah </label>
                <select name="matakuliah" class="form-control">
                    <option value="">-- Pilih Matakuliah 1 --</option>
                        @foreach ($matakuliahs as $matakuliah)
                    <option value="{{ $matakuliah->id_makul}}">{{ $matakuliah->id_makul}}</option>
                        @endforeach
                </select>
            </div>

            <div class="form-group mt-4">
                <button type="submit" role="button" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection