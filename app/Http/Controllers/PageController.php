<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Factory;
use Illuminate\Support\Facades\Session;
use App\User; 
use App\Matakuliah; 
use App\Presensi; 
use App\Pengambilan; 
use Carbon\Carbon;
use App\Gaji;
use PDF;


class PageController extends Controller
{
    public function login(){
        return view('login');
    }

    public function main(){
        return view('layouts/main');
    }


    //Pilih matkul #COBA#
    public function pilihMatakuliah(Request $request, $id_makul)
    {
        $matakuliah = Matakuliah::find($id_makul);

    // Simpan informasi matakuliah ke dalam sesi
        session(['matakuliah_terpilih' => $matakuliah]);

    // Redirect atau lakukan hal lain yang diperlukan
}



    // HALAMAN ASDOS 

    public function halaman_asdos()
    {

        // Ambil semua data matakuliah yang sudah dipilih oleh user
        $matakuliahTerpilih = Pengambilan::where('id', Auth::user()->id)->get();
        $presensi = Pengambilan::with(['user', 'matakuliah'])->where('id', Auth::user()->id)->get();

        
        return view('halaman_asdos',['key' => 'halaman_asdos', 'matakuliahTerpilih' => $matakuliahTerpilih, 'presensi'=>$presensi]);
    }
    

//     public function presensi_asdos(){
//         // $pengambilan = pengambilan::all();
//         $presensi = Presensi::all();
//         return view('presensi_asdos',['key' => 'presensi_asdos', 'presensi' => $presensi, 'pengambilan' => $pengambilan]);

//    }

    

//    public function showPresensiPage()
//    {
//        $id = auth()->user()->id;
//        $presensiData = Presensi::where('id_presensi', $id)->orderBy('created_at', 'desc')->get();
   
//        // Menentukan nilai $isCheckedIn berdasarkan status presensi terakhir
//        $latestPresensi = $presensiData->first();
//        $isCheckedIn = $latestPresensi && is_null($latestPresensi->check_out);
   
//        // Menentukan nilai $statusPresensi berdasarkan status presensi terakhir
//        $statusPresensi = $isCheckedIn ? 'Sedang Check-in' : 'Sedang Check-out';
   
//        // Pass variabel ke view
//        return view('presensi_asdos', [
//            'key' => 'presensi_asdos',
//            'isCheckedIn' => $isCheckedIn,
//            'statusPresensi' => $statusPresensi,
//            'presensiData' => $presensiData,
//        ]);
//    }
   
   public function checkIn(Request $request, $id)
   {
       $presensi = new Presensi();
       $presensi->id = $id;
       $presensi->check_in = now();
       $presensi->save();
   
       $request->validate([
           'id_makul' => 'required|bigInteger',
       ]);
   
       Presensi::create([
           'id_presensi' => auth()->user()->id,
           'id_makul' => $request->id_makul,
       ]);
       
       return redirect()->route('halaman_asdos')->with('success', 'Berhasil Check-in');
       Session::flash('alert', 'Check-in berhasil!');
   }
   
   public function checkOut(Request $request, $id)
   {
       $presensi = Presensi::where('id', $id)->latest()->first();
   
       if ($presensi) {
           $presensi->check_out = now();
           $presensi->duration = $presensi->check_out->diffInMinutes($presensi->check_in);
           $presensi->save();
       }
   
       return redirect()->route('halaman_asdos');
       Session::flash('alert', 'Check-Out berhasil!');
   }
   
    

    // ADMIN - CRUD MHS
    public function home_admin(){
        $user_id = Auth::user()->id;

        // Find the user by id
        $user = User::find($user_id);
        
        $asd = User::where('role', 'asdos')->get();
        //manggil data user yang login
        $dataAsdos = User::where('id', Auth::user()->id)->get();
        
        $data = User::leftJoin('pengambilan', 'users.id', '=', 'pengambilan.id')
    ->leftJoin('matakuliah', 'pengambilan.id_makul', '=', 'matakuliah.id_makul')
    ->where('users.role', '=', 'asdos')  // Hanya pengguna dengan peran "asdos"
    ->select('users.id', 'users.username', 'users.nama_lengkap','users.bank','users.no_rek', 'matakuliah.nama_mk')
    ->get();

 




    
    

        return view('home_admin', ['key' => 'home_admin', 'asd' => $asd, 'dataAsdos' => $dataAsdos,  'data' => $data]);

    }

    // public function tambah_mhs(){
    //     $matakuliahs = Matakuliah::all(); // Ambil semua `data matakuliah dari model
    //     return view('tambah_mhs', ['key' => 'tambah_matkul'], compact('matakuliahs'));
    // }

    public function edit_mhs($id) {
        $asd = User::find($id);
        $matakuliahs = Matakuliah::all(); // Ganti 'Asdos' dengan 'Matakuliah' atau sesuai dengan model yang sesuai
    
        return view('edit_mhs', ['key' => 'edit_mhs', 'asd' => $asd, 'matakuliahs' => $matakuliahs]);
    }
    
    public function update_mhs($id, Request $request)
    {
        // Simpan data melengkapi data pengguna
        $user = User::find($id);
        $user->bank = $request->bank;
        $user->no_rek = $request->no_rek;
        $user->save();
    
    
        return redirect('/home_admin')->with('success', 'Data berhasil dilengkapi');
    }

    public function edit_matakuliah($id) {
        $asd = User::find($id);
        $matakuliahs = Matakuliah::all(); // Ganti 'Asdos' dengan 'Matakuliah' atau sesuai dengan model yang sesuai
    
        return view('edit_matakuliah', ['key' => 'edit_mhs', 'asd' => $asd, 'matakuliahs' => $matakuliahs]);
    }

    public function update_matakuliah($id, Request $request)
    {
        $pengambilan = new Pengambilan();
        $pengambilan->id = $request->id; // Pastikan nilai ini valid
        $pengambilan->id_makul = $request->matakuliah; // Pastikan nilai ini valid
        $pengambilan->save();


    
        return redirect('/home_admin')->with('success', 'Data berhasil dilengkapi');
    }
    
    

    

    public function delete_mhs($id){ 
        $asd = User::find($id); 
        $asd->delete();

        return redirect('home_admin')->with('flash','Data berhasil dihapus')->with('flash_type', 'danger');
 
    }

    // ADMIN - CRUD MAKUL
    public function data_matakuliah(){ //data matakuliah
        $mk = Matakuliah::all();
        return view('data_matakuliah', ['key' => 'data_matakuliah', 'mk' => $mk]);
    }

    public function tambah_matkul(){
        return view('tambah_matkul', ['key' => 'tambah_matkul']);
    }

    public function edit_mk($id_makul){
        $mk = Matakuliah::find($id_makul); 
        return view('edit_mk', ['key' => 'data_matakuliah', 'mk' => $mk]);
    }


public function save_mk(Request $request){ 
    Matakuliah::create([ 
        'id' => Auth::user()->id,
        'kode_mk' => $request->kode_mk, 
        'nama_mk' => $request->nama_mk, 
        'bobot_sks' => $request->bobot_sks, 
        'grup' => $request->grup, 
        'ruang' => $request->ruang, 
        'waktu' => $request->waktu, 
        'dosen_pengampu' => $request->dosen_pengampu, 
    ]);
    
    return redirect('data_matakuliah');
}


    public function update_mk($id_makul, Request $request){ 
        //$minat=implode(',', $request->get('minat')); 
        $mk = Matakuliah::find($id_makul); 
        $mk->kode_mk = $request->kode_mk;
        $mk->nama_mk = $request->nama_mk;
        $mk->bobot_sks = $request->bobot_sks;
        $mk->grup = $request->grup;
        $mk->ruang = $request->ruang;
        $mk->waktu = $request->waktu;;
        $mk->dosen_pengampu = $request->dosen_pengampu;
        $mk->save();

        return redirect('data_matakuliah');

    
    }

    public function delete_mk($id_makul){ 
        $mk = Matakuliah::find($id_makul); 
        $mk->delete();

        return redirect('data_matakuliah')->with('flash','Data berhasil dihapus')->with('flash_type', 'danger');
 
    }

    public function tampil_presensi(){

        $presensi = Presensi::all();
        return redirect('tampil_presensi', ['presensi' => $presensi]);
    }

    public function validasi_presensi($id)
    {
        // Validasi presensi oleh Admin
        $presensi = Presensi::find($id);
        $presensi->status = 'valid'; // Ubah status presensi menjadi 'valid'
        $presensi->save();

        return view('tampil_presensi')->with('success', 'Presensi divalidasi.');
    }

    //BIRO
    public function home_biro(){
        $asd = User::where('role', "asdos")->get();
        return view('home_biro', ['key' => 'home_biro', 'asd' => $asd]);
    }

    public function data_presensi(){
        // $result = User::all();
        $presensi = presensi::all();
        $presensiToHandle = presensi::whereIn('status_presensi', ['Valid'])->get();
        return view('data_presensi', ['key' => 'data_presensi','presensi' => $presensi, 'presensiToHandle' => $presensiToHandle]);
    }

    public function validasiPresensi($id)
    {
        // Implementasi validasi presensi oleh Admin
        $presensi = Presensi::findOrFail($id);
        $presensi->status = 'valid';
        $presensi->save();

        return redirect()->back()->with('success', 'Presensi divalidasi');
    }

    public function aksiPresensi(Request $request, $id)
    {
        $presensi = Presensi::find($id);

        switch ($request->action) {
            case 'valid':
                $presensi->status_presensi = 'Valid';
                // Session::flash('alert', 'Status berhasil diubah!');
                break;
    
            default:
                break;
        }
    
        $presensi->save();
        return redirect('/data_presensi');
    }

    public function dataPresensiFix($id) {
        $status = "Valid";
        
        // Ambil data presensi dengan status_presensi valid untuk user tertentu
        $asd = Presensi::where(['id' => $id, 'status_presensi' => $status])->get();
        
        // Perhitungan untuk gaji perbulan
        $gaji_per_presensi = 55000;
        $potongan_tetap = 80000;
        $potongan_persen = 5 / 100;
        $tambahan_perbulan = 55000;
    
        // Kelompokkan data presensi per bulan
        $presensiPerBulan = $asd->groupBy(function ($item) {
            return Carbon::parse($item->tanggal)->format('Y-m');
        });
    
        // Ambil data gaji per bulan
        $gajiTotal = [];
    
        foreach ($presensiPerBulan as $bulan => $presensiBulanan) {
            $jumlahPresensiValid = $presensiBulanan->count();
            $total_gaji = ($jumlahPresensiValid * $gaji_per_presensi + $tambahan_perbulan + $potongan_tetap) - (($jumlahPresensiValid * $gaji_per_presensi + $tambahan_perbulan + $potongan_tetap) * $potongan_persen );
    
            $gajiTotal[] = (object) [
                
                'bulan' => $bulan,
                'gaji_total' => $total_gaji,
            ];
        }
    
        // Jangan diganggu gugat
        return view('dataPresensiFix', ['key' => 'dataPresensiFix', 'asd' => $asd, 'gajiTotal' => $gajiTotal]);
    }

    public function hitung($id) {
        $status = "Valid";
        
        // Ambil data presensi dengan status_presensi valid untuk user tertentu
        $asd = Presensi::where(['id' => $id, 'status_presensi' => $status])->get();
        
        // Perhitungan untuk gaji perbulan
        $gaji_per_presensi = 55000;
        $potongan_tetap = 80000;
        $potongan_persen = 5 / 100;
        $tambahan_perbulan = 55000;
    
        // Kelompokkan data presensi per bulan
        $presensiPerBulan = $asd->groupBy(function ($item) {
            return Carbon::parse($item->tanggal)->format('Y-m');
        });
    
        // Ambil data gaji per bulan
        $gajiTotal = [];
    
        foreach ($presensiPerBulan as $bulan => $presensiBulanan) {
            $jumlahPresensiValid = $presensiBulanan->count();
            $total_gaji = ($jumlahPresensiValid * $gaji_per_presensi + $tambahan_perbulan) - $potongan_tetap - (($jumlahPresensiValid * $gaji_per_presensi + $tambahan_perbulan) * $potongan_persen);
    
            $gajiTotal[] = (object) [
                
                'bulan' => $bulan,
                'gaji_total' => $total_gaji,
            ];
        }

        Gaji::create([
            'id' => $id, // Assuming there's a foreign key 'user_id' in your 'gaji' table
            'bulan' => $bulan,
            'gaji_total' => $total_gaji,
        ]);
    
    
        // Jangan diganggu gugat
        return view('dataPresensiFix', ['key' => 'dataPresensiFix', 'asd' => $asd, 'gajiTotal' => $gajiTotal]);
    }
    



    public function searchDataByMonth(Request $request)
{
    // Ambil nilai bulan dari permintaan GET
    $selectedMonth = $request->input('month');

    // Validasi nilai bulan
    if (!in_array($selectedMonth, range(1, 12))) {
        // Redirect dengan pesan kesalahan jika nilai bulan tidak valid
        return redirect()->back()->with('error', 'Bulan tidak valid.');
    }

    // Ambil data presensi berdasarkan bulan dari check_in
    $presensiData = Presensi::whereMonth('check_in', $selectedMonth)->get();

    // Kirim data presensi ke view
    return view('dataPresensiFix', ['key' => 'dataPresensiFix', 'presensiData' => $presensiData]);
}



public function rekap_gaji() {
    $status = "Valid";
    $id = Auth::id(); // Mendapatkan ID user yang sedang login
    
    // Ambil data presensi dengan status_presensi valid untuk user tertentu
    $asd = Presensi::where(['id' => $id, 'status_presensi' => $status])->get();

     // Perhitungan untuk gaji perbulan
     $gaji_per_presensi = 55000;
     $potongan_tetap = 80000;
     $potongan_persen = 5 / 100;
     $tambahan_perbulan = 55000;
 
     // Kelompokkan data presensi per bulan
     $presensiPerBulan = $asd->groupBy(function ($item) {
         return Carbon::parse($item->tanggal)->format('Y-m');
     });
 
     // Ambil data gaji per bulan
     $gajiTotal = [];
 
     foreach ($presensiPerBulan as $bulan => $presensiBulanan) {
         $jumlahPresensiValid = $presensiBulanan->count();
         $total_gaji = ($jumlahPresensiValid * $gaji_per_presensi + $tambahan_perbulan) - $potongan_tetap - (($jumlahPresensiValid * $gaji_per_presensi + $tambahan_perbulan) * $potongan_persen);
 
         $gajiTotal[] = (object) [
             'bulan' => $bulan,
             'gaji_total' => $total_gaji,
         ];
     }


    // Jangan diganggu gugat
    return view('rekap_gaji', ['key' => 'rekap_gaji', 'asd' => $asd, 'gajiTotal' => $gajiTotal]);
}

  //print data
  public function print_slipgaji()
  {

      // Ambil data gaji berdasarkan id user yang sedang login

      $gaji = Gaji::where('id', Auth::user()->id)->get();

      // Load view print_slipgaji.blade.php dan passing data

      $pdf = PDF::loadView('print_slipgaji', compact('gaji'));

      // Atur nama file PDF yang akan dihasilkan

      $filename = 'slip_gaji' . date('YmdHis') . '.pdf';

      // Download file PDF atau tampilkan di browser

      return $pdf->download($filename);

  }

    
}
