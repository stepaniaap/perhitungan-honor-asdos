@extends('layouts.main')
@section('header')
<ul>
  <li><a {{$key=='home_biro'?'active':''}} href="/home_biro">Daftar Asdos</a></li>
  <li><a {{$key=='logout'?'active':''}} href="/logout">Logout</a></li>
</ul>
@endsection

@section('hero')
<h2><center>Daftar Asdos</center></h2>
@foreach($asd as $data)
<div class="card">
  <div class="card-body">
    <h5 class="card-title">{{$data->nama_lengkap}}</h5>
    <a href="/dataPresensiFix/{{$data->id}}" class="btn btn-primary">Lihat Data Presensi</a>
  </div>
</div>
@endforeach

        

  
@endsection