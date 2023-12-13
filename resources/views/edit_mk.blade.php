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
    <div class="card-header"><strong>Edit Data Matakuliah</strong></div>
    <div class="card-body">
    <form action="/data_matakuliah/update_mk/{{$mk->id}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Kode Matakuliah</label>
                <input type="text" name="kode_mk" class="form-control" value="{{$mk->kode_mk}}"readonly>
            </div>

            <div class="form-group">
                <label>Nama Matakuliah</label>
                <input type="text" name="nama_mk" class="form-control" value="{{$mk->nama_mk}}">
            </div>

            <div class="form-group">
                <label>Bobot SKS</label>
                <input type="number" name="bobot_sks" class="form-control" value="{{$mk->bobot_sks}}">
            </div>

            <div class="form-group">
                <label>Grup</label>
                <input type="text" name="grup" class="form-control" value="{{$mk->grup}}">
            </div>

            <div class="form-group">
                <label>Ruang</label>
                <input type="text" name="ruang" class="form-control" value="{{$mk->ruang}}">
            </div>

            <div class="form-group">
                <label>Waktu</label>
                <input type="text" name="waktu" class="form-control" value="{{$mk->waktu}}">
            </div>

            <div class="form-group">
                <label>Dosen Pengampu</label>
                <input type="text" name="dosen_pengampu" class="form-control" value="{{$mk->dosen_pengampu}}">
            </div>

            <div class="form-group mt-4">
                <button type="submit" role="button" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>

@endsection