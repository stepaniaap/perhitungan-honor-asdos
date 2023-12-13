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
        <form action="/home_admin/update_mhs/{{$asd->id}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>NIM</label>
                <input type="text" name="nim" class="form-control" value="{{$asd->nim}}"readonly>
            </div>

            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="nama" class="form-control" value="{{$asd->nama}}">
            </div>

            <label>Bank Tujuan</label>
            <div class="form-check">
                <input type="radio" name="bank" class="form-check-input" value="BCA"{{($asd->bank == 'BCA')?'checked':''}}>
                <label>BCA</label>
            </div>

            <div class="form-check">
                <input type="radio" name="bank" class="form-check-input" value="BNI"{{($asd->bank == 'BNI')?'checked':''}}>
                <label>BNI</label>
            </div>

            <div class="form-check">
                <input type="radio" name="bank" class="form-check-input" value="BRI"{{($asd->bank == 'BRI')?'checked':''}}>
                <label>BRI</label>
            </div>

            <div class="form-check">
                <input type="radio" name="bank" class="form-check-input" value="Mandiri"{{($asd->bank == 'Mandiri')?'checked':''}}>
                <label>Mandiri</label>
            </div>

            <div class="form-group">
                <label>No Rekening</label>
                <input type="text" name="no_rek" class="form-control" value="{{$asd->no_rek}}">
            </div>

            <label>Matakuliah 1</label>
            <div class="form-group">
                <select name="matakuliah" class="form-control">
                    <option value="0">--Pilih Matakuliah 1--</option>
                    <option value="Aplikasi Berbasis Desktop (A)" {{($asd->matakuliah=='Aplikasi Berbasis Desktop (A) ')?'selected':''}}>Aplikasi Berbasis Desktop (A) </option>
                    <option value="Aplikasi Berbasis Desktop (B)" {{($asd->matakuliah=='Aplikasi Berbasis Desktop (B) ')?'selected':''}}>Aplikasi Berbasis Desktop (B)</option>
                    <option value="Dasar - Dasar Pemrograman (A)" {{($asd->matakuliah=='Dasar - Dasar Pemrograman (A)')?'selected':''}}>Dasar - Dasar Pemrograman (A)</option>
                    <option value="Dasar - Dasar Pemrograman (B)" {{($asd->matakuliah=='Dasar - Dasar Pemrograman (B)')?'selected':''}}>Dasar - Dasar Pemrograman (B)</option>
                    <option value="Jaringan Komputer (A) " {{($asd->matakuliah=='Jaringan Komputer (A)')?'selected':''}}>Jaringan Komputer (A)</option>
                    <option value="Jaringan Komputer (B) " {{($asd->matakuliah=='Jaringan Komputer (B)')?'selected':''}}>Jaringan Komputer (B)</option>
                    <option value="Keamanan Teknologi Informasi (A)" {{($asd->matakuliah=='Keamanan Teknologi Informasi (A)')?'selected':''}}>Keamanan Teknologi Informasi (A)</option>
                    <option value="Manajemen Proses Bisnis (A) " {{($asd->matakuliah=='Manajemen Proses Bisnis (A) ')?'selected':''}}>Manajemen Proses Bisnis (A) </option>
                    <option value="Manajemen Proses Bisnis (B) " {{($asd->matakuliah=='Manajemen Proses Bisnis (B)')?'selected':''}}>Manajemen Proses Bisnis (B)</option>
                    <option value="Matrikulasi Logika Pemrograman (A)" {{($asd->matakuliah=='Sistem Informasi')?'selected':''}}>Sistem Informasi</option>
                    <option value="Matrikulasi Logika Pemrograman (B)" {{($asd->matakuliah=='Sistem Informasi')?'selected':''}}>Sistem Informasi</option>
                   <!-- <option value="Perancangan Basis Data (A) " {{($asd->matakuliah=='Sistem Informasi')?'selected':''}}>Sistem Informasi</option>
                    <option value="Perancangan Basis Data (B) " {{($asd->matakuliah=='Sistem Informasi')?'selected':''}}>Sistem Informasi</option>
                    <option value="Praktikum Aplikasi Berbasis Desktop (A)" {{($asd->matakuliah=='Sistem Informasi')?'selected':''}}>Sistem Informasi</option>
                    <option value="Praktikum Aplikasi Berbasis Desktop (B)" {{($asd->matakuliah=='Sistem Informasi')?'selected':''}}>Sistem Informasi</option>
                    <option value="Praktikum Dasar - Dasar Pemrograman (A)" {{($asd->matakuliah=='Sistem Informasi')?'selected':''}}>Sistem Informasi</option>
                    <option value="Praktikum Dasar - Dasar Pemrograman (B)" {{($asd->matakuliah=='Sistem Informasi')?'selected':''}}>Sistem Informasi</option>
                    <option value="Praktikum Perancangan Basis Data (A) " {{($asd->matakuliah=='Sistem Informasi')?'selected':''}}>Sistem Informasi</option>
                    <option value="Praktikum Perancangan Basis Data (B) " {{($asd->matakuliah=='Sistem Informasi')?'selected':''}}>Sistem Informasi</option>
                    <option value="Praktikum Rekayasa Perangkat Lunak (A)" {{($asd->matakuliah=='Sistem Informasi')?'selected':''}}>Sistem Informasi</option>
                    <option value="Praktikum Rekayasa Perangkat Lunak (B) " {{($asd->matakuliah=='Sistem Informasi')?'selected':''}}>Sistem Informasi</option>
                    <option value="Rekayasa Perangkat Lunak (A)" {{($asd->matakuliah=='Sistem Informasi')?'selected':''}}>Sistem Informasi</option>
                    <option value="Rekayasa Perangkat Lunak (B)" {{($asd->matakuliah=='Sistem Informasi')?'selected':''}}>Sistem Informasi</option>-->
                 </select>
            </div> 


            <label>Matakuliah 2</label>
            <div class="form-group">
                <select name="matakuliah2" class="form-control">
                    <option value="0">--Pilih Matakuliah 2--</option>
                    <option value="Sistem Informasi" {{($asd->matakuliah2=='Aplikasi Berbasis Desktop (A) ')?'selected':''}}>Aplikasi Berbasis Desktop (A) </option>
                    <option value="Sistem Informasi" {{($asd->matakuliah2=='Aplikasi Berbasis Desktop (B) ')?'selected':''}}>Sistem Informasi</option>
                    <option value="Dasar - Dasar Pemrograman (A)" {{($asd->matakuliah2=='Dasar - Dasar Pemrograman (A)')?'selected':''}}>Dasar - Dasar Pemrograman (A)</option>
                    <option value="Dasar - Dasar Pemrograman (B)" {{($asd->matakuliah2=='Dasar - Dasar Pemrograman (B)')?'selected':''}}>Dasar - Dasar Pemrograman (B)</option>
                    <option value="Jaringan Komputer (A) " {{($asd->matakuliah2=='Jaringan Komputer (A)')?'selected':''}}>Jaringan Komputer (A)</option>
                    <option value="Jaringan Komputer (B) " {{($asd->matakuliah2=='Jaringan Komputer (B)')?'selected':''}}>Jaringan Komputer (B)</option>
                    <option value="Keamanan Teknologi Informasi (A)" {{($asd->matakuliah2=='Keamanan Teknologi Informasi (A)')?'selected':''}}>Keamanan Teknologi Informasi (A)</option>
                    <option value="Manajemen Proses Bisnis (A) " {{($asd->matakuliah2=='Manajemen Proses Bisnis (A) ')?'selected':''}}>Manajemen Proses Bisnis (A) </option>
                    <option value="Manajemen Proses Bisnis (B) " {{($asd->matakuliah2=='Manajemen Proses Bisnis (B)')?'selected':''}}>Manajemen Proses Bisnis (B)</option>
                    <option value="Matrikulasi Logika Pemrograman (A)" {{($asd->matakuliah2=='Sistem Informasi')?'selected':''}}>Sistem Informasi</option>
                    <option value="Matrikulasi Logika Pemrograman (B)" {{($asd->matakuliah2=='Sistem Informasi')?'selected':''}}>Sistem Informasi</option>
                   <!-- <option value="Perancangan Basis Data (A) " {{($asd->matakuliah=='Sistem Informasi')?'selected':''}}>Sistem Informasi</option>
                    <option value="Perancangan Basis Data (B) " {{($asd->matakuliah=='Sistem Informasi')?'selected':''}}>Sistem Informasi</option>
                    <option value="Praktikum Aplikasi Berbasis Desktop (A)" {{($asd->matakuliah=='Sistem Informasi')?'selected':''}}>Sistem Informasi</option>
                    <option value="Praktikum Aplikasi Berbasis Desktop (B)" {{($asd->matakuliah=='Sistem Informasi')?'selected':''}}>Sistem Informasi</option>
                    <option value="Praktikum Dasar - Dasar Pemrograman (A)" {{($asd->matakuliah=='Sistem Informasi')?'selected':''}}>Sistem Informasi</option>
                    <option value="Praktikum Dasar - Dasar Pemrograman (B)" {{($asd->matakuliah=='Sistem Informasi')?'selected':''}}>Sistem Informasi</option>
                    <option value="Praktikum Perancangan Basis Data (A) " {{($asd->matakuliah=='Sistem Informasi')?'selected':''}}>Sistem Informasi</option>
                    <option value="Praktikum Perancangan Basis Data (B) " {{($asd->matakuliah=='Sistem Informasi')?'selected':''}}>Sistem Informasi</option>
                    <option value="Praktikum Rekayasa Perangkat Lunak (A)" {{($asd->matakuliah=='Sistem Informasi')?'selected':''}}>Sistem Informasi</option>
                    <option value="Praktikum Rekayasa Perangkat Lunak (B) " {{($asd->matakuliah=='Sistem Informasi')?'selected':''}}>Sistem Informasi</option>
                    <option value="Rekayasa Perangkat Lunak (A)" {{($asd->matakuliah=='Sistem Informasi')?'selected':''}}>Sistem Informasi</option>
                    <option value="Rekayasa Perangkat Lunak (B)" {{($asd->matakuliah=='Sistem Informasi')?'selected':''}}>Sistem Informasi</option>
--> 
                    </select>
                 </div>
                    
                 <div class="form-group mt-4">
                <button type="submit" role="button" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection