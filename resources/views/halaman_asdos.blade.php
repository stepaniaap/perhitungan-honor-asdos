@extends('layouts.main')

@section('header')
    <ul>
        <li><a {{$key=='rekap_gaji'?'active':''}} href="/rekap_gaji">Rekap Gaji</a></li>
        <li><a {{$key=='logout'?'active':''}} href="/logout">Logout</a></li>
    </ul>
@endsection

@section('hero')
    @foreach ($presensi as $matakuliah)
        <div class="card w-100 mb-1">
            <div class="card-body">
                <h7>Mengasodsi Matkul :</h7>
           <h5 class="card-title"><strong>{{ $matakuliah->matakuliah->nama_mk }}</strong></h5>
                <br>
                <div class="row">
                    <div class="col-md-5">                  
                        <form method="post" action="{{ url('/checkIn/' . Auth::user()->id . '/action') }}">
                            @csrf
                            @php
                                $presensi = App\Presensi::where('id', Auth::user()->id)
                                                           ->whereDate('check_in', Carbon\Carbon::today())
                                                           ->first();
                            @endphp
                            @if(!$presensi)
                                <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-person-arms-up">Check In</i></button>
                            @endif
                        </form>
                    </div>
                    <div class="col-md-5"> 
                        <form method="post" action="{{ url('/checkOut/' . Auth::user()->id . '/action') }}">
                            @csrf
                            @php
                                $presensi = App\Presensi::where('id', Auth::user()->id)
                                                           ->whereDate('check_in', Carbon\Carbon::today())
                                                           ->whereNull('check_out')
                                                           ->first();
                            @endphp
                            @if($presensi)
                                <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-person-arms-up">Check Out</i></button>
                            @endif
                        </form>
                    </div>
                </div>
                
                <!-- Tampilkan hasil check-in dan check-out -->
                <div>
                    @php
                        $presensi = App\Presensi::where('id', Auth::user()->id)
                           ->orderBy('check_in', 'desc')
                           ->first();
                    @endphp
                
                    @if($presensi)
                    <div class="row">
                        <div class="col-md-5">
                            <p>Last Check-in: {{ $presensi->check_in ? $presensi->check_in : 'Not Checked In Today'  }}</p>
                    </div>
                    <div class="col-md-5">
                        <p>Last Check-out: {{ $presensi->check_out ? $presensi->check_out : 'Not Checked Out Today' }}</p>
                    </div>
                    @else
                        <p>Last Check-in: Not Checked In</p>
                        <p>Last Check-out: Not Checked Out</p>
                    @endif
                </div>
                </div>
            </div>
        </div>
    @endforeach
<!-- Di dalam template Blade view Anda -->
@if(Session::has('alert'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        // Tampilkan SweetAlert saat halaman dimuat
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: "{{ Session::get('alert') }}",
            confirmButtonText: 'OK'
        });
    </script>
@endif

@endsection
