<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');

});

Route::group(['middleware' => ['guest']], function(){
Route::get('/login', 'AuthController@login')->middleware('guest')->name('login');
Route::post('/ceklogin', 'AuthController@ceklogin');
Route::get('/home', 'Controller@home');
Route::get('/register', 'AuthController@register');
});

//route asisten
Route::get('/halaman_asdos', 'PageController@halaman_asdos')->name('halaman_asdos');
Route::get('/presensi_asdos', 'PageController@presensi_asdos');
Route::get('/presensi_asdos/{id}', 'PageController@showPresensiPage');
Route::post('/checkIn/{id}/action', 'PageController@checkIn')->name('checkIn.action');
Route::post('/checkOut/{id}/action', 'PageController@checkOut')->name('checkOut.action');
//route admin
Route::get('/home_admin', 'PageController@home_admin')->name('home_admin');
Route::get('/tambah_mhs', 'PageController@tambah_mhs');
Route::get('/home_admin/edit_mhs/{id}', 'PageController@edit_mhs')->name('edit_mhs');
Route::get('/home_admin/edit_matakuliah/{id}', 'PageController@edit_matakuliah')->name('edit_matakuliah');
Route::put('/home_admin/update_mhs/{id}', 'PageController@update_mhs')->name('update_mhs');
Route::put('/home_admin/update_matakuliah/{id}', 'PageController@update_matakuliah')->name('update_matakuliah');
Route::post('/presensi/{id}/action', 'PageController@aksiPresensi')->name('presensi.action');
Route::get('/home_admin/delete_mhs/{id}', 'PageController@delete_mhs')->name('delete_mhs');
Route::get('/print_slipgaji','PageController@print_slipgaji');


//CRUD MATAKULIAH
Route::get('/data_matakuliah', 'PageController@data_matakuliah');
Route::get('/tambah_matkul', 'PageController@tambah_matkul');
Route::post('/data_matakuliah/save_mk', 'PageController@save_mk');
Route::get('/data_matakuliah/edit_mk/{id_makul}', 'PageController@edit_mk');
Route::put('/data_matakuliah/update_mk/{id_makul}', 'PageController@update_mk');
Route::get('/data_matakuliah/delete_mk/{id_makul}', 'PageController@delete_mk');

//Validasi Kehadiran 
Route::get('/validasi_kehadiran', 'PageController@validasi_kehadiran');



//route biro2
Route::get('/home_biro', 'PageController@home_biro');
Route::get('/data_presensi', 'PageController@data_presensi');
Route::get('/dataPresensiFix/{id}', 'PageController@dataPresensiFix');
Route::get('/rekap_gaji','PageController@rekap_gaji')->name('rekap_gaji');
Route::get('/searchDataByMonth', 'PageController@searchDataByMonth');

// Route::post('/validasi_presensi', 'PageController@validasi_presensi');

Route::post('/simpan','AuthController@simpan');

Route::get('/hitung/{id}', 'PageController@hitung');
Route::get('/logout', 'AuthController@logout');



