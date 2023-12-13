@extends('layouts.main')
@section('header')
<ul>
  <li><a {{$key=='home_biro'?'active':''}} href="/home_biro">Daftar Kelas</a></li>
  <li><a {{$key=='logout'?'active':''}} href="/logout">Logout</a></li>
</ul>
@endsection

@section('hero')
<h2><center>DAFTAR KELAS</center></h2>
<div class="card">
  <div class="card-body">
    <h5 class="card-title">Rekayasa Perangkat Lunak Grup A (3 SKS)</h5>
    <p class="card-text">Selasa, 10.30 - 13.20 WIB</p>
    <a href="/data_presensi" class="btn btn-primary">Cek Presensi</a>
  </div>
</div>

<div class="card">
  <div class="card-body">
    <h5 class="card-title">Manajemen Proses Bisnis Grup A (3 SKS) </h5>
    <p class="card-text">Rabu, 10.30 - 13.20 WIB</p>
    <a href="data_presensi" class="btn btn-primary">Cek Presensi</a>
  </div>
</div>

        
<!--<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">ID</th>
        <th scope="col">NIM</th>
        <th scope="col">Nama</th>
        <th scope="col">Matakuliah</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($asd as $a)
                <tr>
                  <td>{{$a->id}}</td>
                  <td>{{$a->nim}}</td>
                  <td>{{$a->nama}}</td>
                  <td>{{$a->matakuliah}}</td>
                </tr>
              @endforeach
    </tbody>
  </table>
  <tbody>
    
  </tbody>-->
  
@endsection