@extends('layouts.main')
@section('header')
<ul>
    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
    <li><a class="nav-link scrollto" href="#about">Logout</a></li>
  </ul>
@endsection

@section('hero')
<div class="card w-90">
    <div class="card-body">
      <h5 class="card-title">Pemrograman Berbasis Web</h5>
      <p class="card-text">Lakukan presensi disini!</p>
      <a href="#" class="btn btn-primary">Check-in</a>
      <a href="#" class="btn btn-primary">Check-out</a>
    </div>
  </div>

  
  <div class="card w-90">
    <div class="card-body">
      <h5 class="card-title">Praktikum Pemrograman Berbasis Web</h5>
      <p class="card-text">Lakukan presensi disini!</p>
      <a href="#" class="btn btn-primary">Check-in</a>
      <a href="#" class="btn btn-primary">Check-out</a>
    </div>
  </div>
@endsection
