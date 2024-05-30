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
<h2><center>Data Matakuliah</center></h2>
<div class="card mt-4">
        <div class="card-header">
          <a href="/tambah_matkul" class="btn btn-primary" role="button"><i class="bi bi-plus-square-fill"></i> Matakuliah</a>
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
                $alertClass = 'alert-primary';
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
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endif  
        
<table class="table">
    <thead class="thead-dark">
      
      <tr>
        <!-- <th scope="col">#</th> -->
        <th scope="col">No</th>
        <th scope="col">Kode</th>
        <th scope="col">Nama</th>
        <th scope="col">Bobot SKS</th>
        <th scope="col">Grup</th>
        <th scope="col">Ruang</th>
        <th scope="col">Waktu</th>
        <th scope="col">Dosen Pengampu</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($mk as $m)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$m->kode_mk}}</td>
                  <td>{{$m->nama_mk}}</td>
                  <td>{{$m->bobot_sks}}</td>
                  <td>{{$m->grup}}</td>
                  <td>{{$m->ruang}}</td>
                  <td>{{$m->waktu}}</td>
                  <td>{{$m->dosen_pengampu}}</td>
                  <td>
                    <a href="/data_matakuliah/edit_mk/{{$m->id_makul}}" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>

                    
                    <a href="/data_matakuliah/delete_mk/{{$m->id_makul}}" class="btn btn-danger" onclick="return confirm('Apakah ada yakin ingin menghapus?')">
                      <i class="bi bi-trash-fill"></i></i></a>
                  </td>
                </tr>
              @endforeach
    </tbody>
  </table>
  <tbody>
    
  </tbody>
  
@endsection