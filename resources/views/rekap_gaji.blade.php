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
  <li><a {{$key=='home_biro'?'active':''}} href="/home_biro">Daftar Kelas</a></li>
  <li><a {{$key=='logout'?'active':''}} href="/logout">Logout</a></li>
</ul>
@endsection --}}

{{-- @section('hero') --}}
<br>
<br>
<br>
<br>

<a href="/halaman_asdos" class="btn btn-outline-secondary btn-sm">Kembali</a>
<br>
<br>


{{-- <form method="get" action="{{ url('/searchDataByMonth') }}"> --}}
  <div class="input-group">
       <select name="month" class="form-control">
           <option value="">-- Pilih Bulan --</option>
           <option value="1">Januari</option>
           <option value="2">Februari</option>
           <option value="3">Maret</option>
           <option value="4">April</option>
           <option value="5">Mei</option>
           <option value="6">Juni</option>
           <option value="7">Juli</option>
           <option value="8">Agustus</option>
           <option value="9">September</option>
           <option value="10">Oktober</option>
           <option value="11">November</option>
           <option value="12">Desember</option>
       </select>
       <div class="input-group-append">
           <button type="submit" class="btn btn-primary">Cari</button>
       </div>
  </div>
 </form>
 <br>
 <br>
 <center><h2>Daftar Presensi</h2></center>
 <div class="container">
 <table class="table">
     <thead>
         <tr>
             <th>No</th>
             <th>Waktu Check-in</th>
             <th>Waktu Check-out</th>
             <th>Total Durasi</th>
             <th>Pembayaran / sekali pertemuan</th>
         </tr>
     </thead>
     <tbody>
         @foreach($asd as $key => $data)
             {{-- @php
                 $checkIn = Carbon\Carbon::parse($data->check_in);
                 $checkOut = Carbon\Carbon::parse($data->check_out);
             @endphp
             @if(request()->has('month') && request('month') == $checkIn->month) --}}
                 <tr> 
                     <td>{{ $key + 1 }}</td>
                     <td>{{ $data->check_in }}</td>
                     <td>{{ $data->check_out }}</td>
                     <td>{{ $data->duration }} menit</td>
                     <td>Rp55.000</td>
                 </tr>
             {{-- @endif --}}
         @endforeach
     </tbody>
 </table>

 <th>Gaji Untuk Bulan Ini :</th>
 <tr>
    @foreach($gajiTotal as $datagaji)
       <td><strong>Rp{{ number_format($datagaji->gaji_total, 0, ',', '.') }}</strong></td>
    @endforeach
 </tr>
 <br>
 <br>

 <a href="/print_slipgaji" class="btn btn-outline-primary"><i class="bi bi-printer"></i>Print Slip Gaji</a>
 </div>
{{-- @endsection --}}


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>