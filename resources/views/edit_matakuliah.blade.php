<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    {{-- @extends('layouts.main')
    @section('header')
    <ul>
      <li><a {{$key=='home_admin'?'active':''}} href="/home_admin">Data Asisten Dosen</a></li>
      <li><a {{$key=='data_matakuliah'?'active':''}} href="/data_matakuliah">Data Matakuliah</a></li>
     <!-- <li><a {{$key=='tambah_mhs'?'active':''}} href="/tambah_mhs">Tambah Mahasiswa</a></li>
      <li><a {{$key=='tambah_matkul'?'active':''}} href="/tambah_matkul">Tambah Matakuliah</a></li>-->
      <li><a {{$key=='logout'?'active':''}} href="/logout">Logout</a></li>
    </ul>
    @endsection --}}
 <br>
 <br>
 <br>
 <br>
 <a href="/home_admin" class="btn btn-outline-secondary btn-sm">Kembali</a>
    {{-- @section('hero') --}}
    <div class="container">
    <div class="card mt-4">
        <div class="card-header"><strong>Edit Data Matakuliah</strong></div>
        <div class="card-body">
            <form action="{{ route('update_matakuliah', ['id' => $asd->id]) }}" method="POST">
                @csrf
                @method('PUT')
    
               <!-- Dropdown untuk matakuliah -->
    <label>Matakuliah</label>
    <div class="form-group">
        <select name="matakuliah" id="matakuliah">
            @foreach ($matakuliahs as $matakuliah)
                <option value="{{ $matakuliah->id_makul }}">{{ $matakuliah->nama_mk}}</option>
            @endforeach
        </select>
    </div>
                     <div class="form-group mt-4">
                    <button type="submit" role="button" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
    {{-- @endsection --}}
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
