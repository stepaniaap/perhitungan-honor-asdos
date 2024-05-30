@extends('layouts.main')
@section('header')
    <ul>
        <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
        <li><a {{$key=='logout'?'active':''}} href="/logout">Logout</a></li>
    </ul>
@endsection

@section('hero')
    <h1>Presensi Disini Yaa</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <p>Status Presensi: {{ $statusPresensi }}</p>

    @if($isCheckedIn)
        <form method="post" action="/checkOut">
            @csrf
            <button type="submit" class="btn btn-danger">Check-out</button>
        </form>
    @else
        <form method="post" action="/checkIn">
            @csrf
            <button type="submit" class="btn btn-success">Check-in</button>
        </form>
    @endif


    @if(!empty($presensiData))
        <h2>Daftar Presensi</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Waktu Check-in</th>
                    <th>Waktu Check-out</th>
                    <th>Total Durasi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($presensiData as $key => $presensi1)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $presensi1->check_in }}</td>
                        <td>{{ $presensi1->check_out }}</td>
                        <td>{{ $presensi1->duration }} menit</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    <a href="/halaman_asdos" class="btn btn-outline-secondary btn-sm">Kembali</a>
    
@endsection

