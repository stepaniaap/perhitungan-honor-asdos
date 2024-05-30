@extends('layouts.main')
@section('header')
  <ul>
    <li><a {{$key=='home_admin'?'active':''}} href="/home_admin">Data Asisten Dosen</a></li>
    <li><a {{$key=='data_matakuliah'?'active':''}} href="/data_matakuliah">Data Matakuliah</a></li>
    <li><a {{$key=='data_presensi'?'active':''}} href="/data_presensi">Data Presensi</a></li>
   <!-- <li><a {{$key=='tambah_mhs'?'active':''}} href="/tambah_mhs">Tambah Mahasiswa</a></li>
    <li><a {{$key=='tambah_matkul'?'active':''}} href="/tambah_matkul">Tambah Matakuliah</a></li>-->
    <li><a {{$key=='logout'?'active':''}} href="/logout">Logout</a></li>
  </ul>
@endsection

@section('hero')
<h2><center>Data Presensi</center></h2>

<table class="table">
   <thead class="thead-dark">
      <tr>
         {{-- <th scope="col">ID</th> --}}
         <th scope="col">ID Asisten Dosen</th>
         {{-- <th scope="col">Nama</th> --}}
         <th scope="col">Check In</th>
         <th scope="col">Check Out</th>
         <th scope="col">Total Durasi</th>
         <th scope="col">Aksi</th>
         <th scope="col">Status</th>
      </tr>
   </thead>
   <tbody>
      @foreach($presensi as $tampil)
      <tr>
         {{-- <td>{{$tampil->users->username}}</td>
         <td>{{$tampil->users->nama_lengkap}}</td> --}}
         <td>{{$tampil->id}}</td>
         <td>{{$tampil->check_in}}</td>
         <td>{{$tampil->check_out}}</td>
         <td>{{$tampil->duration}} Menit</td>
         <td>
            <div class="btn-group" role="group" aria-label="aksi">
            <form method="post" action="{{url('/presensi/' . $tampil->id_presensi  . '/action') }}">
              @csrf
              <button type="submit" name="action" value="valid" class="btn btn-success btn-sm"><i class="bi bi-check-lg"></i>Acc </button>
            </form>
            </td>
         <td>{{$tampil->status_presensi}} </td>
      </tr>
      @endforeach
   </tbody>
</table>
@endsection
