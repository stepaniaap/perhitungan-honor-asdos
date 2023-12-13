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
<h2><center>Data Asisten Dosen</center></h2>
<div class="card mt-4">
        <div class="card-header">
          <a href="/tambah_mhs" class="btn btn-primary" role="button"><i class="bi bi-plus-square-fill"></i> Asisten Dosen</a>
        </div>
        <div class="card-body">
          @if (session('flash'))
          @php
          $flashType = session('flash_type');
          $alertClass = '';   
          switch($flashType){
            case 'success':
                $alertClass = 'alert-success';
                break;
            case 'primary' :
                $alertClass = 'alert-info';
                break;
            case 'danger' :
                $alertClass = 'alert-danger';
                break;
            default:
                $alertClass = 'alert-warning';
                break;
          }
          @endphp
          <div class="alert {{ $alertClass }} alert-dismissible fade show" role="alert">
            <strong>{{session('flash')}}</strong>
          </div>
          @endif  
<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">ID</th>
        <th scope="col">NIM</th>
        <th scope="col">Nama</th>
        <th scope="col">Bank</th>
        <th scope="col">No Rekening</th>
        <th scope="col">Matakuliah</th>
        <th scope="col">Matakuliah 2</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($asd as $a)
                <tr>
                  <td>{{$a->id}}</td>
                  <td>{{$a->nim}}</td>
                  <td>{{$a->nama}}</td>
                  <td>{{$a->bank}}</td>
                  <td>{{$a->no_rek}}</td>
                  <td>{{$a->matakuliah}}</td>
                  <td>{{$a->matakuliah2}}</td>
                  <td>
                    <a href="/home_admin/edit_mhs/{{$a->id}}" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>

                    
                    <a href="/home_admin/delete_mhs/{{$a->id}}" class="btn btn-danger" onclick="return confirm('Apakah ada yakin ingin menghapus?')">
                      <i class="bi bi-trash-fill"></i></i></a>
                  </td>
                </tr>
              @endforeach
    </tbody>
  </table>
  <tbody>
    
  </tbody>
  
@endsection