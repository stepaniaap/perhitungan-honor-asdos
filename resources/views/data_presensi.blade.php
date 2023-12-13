@extends('layouts.main')
@section('header')
<ul>
  <li><a {{$key=='home_admin'?'active':''}} href="/home_biro">Daftar Kelas</a></li>
  <li><a {{$key=='logout'?'active':''}} href="/logout">Logout</a></li>
</ul>
@endsection

@section('hero')
<h2><center>Data Presensi</center></h2>
        
<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">ID</th>
        <th scope="col">NIM</th>
        <th scope="col">Nama</th>
        <th scope="col">Check In</th>
        <th scope="col">Check Out</th>
        <th scope="col">Total Durasi</th>
      </tr>
    </thead>
    <tbody>
   
  </table>
  <tbody>
    
  </tbody>
  
@endsection