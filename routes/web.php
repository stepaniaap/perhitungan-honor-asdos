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
//Route::get('/home', 'Controller@home');
Route::get('/register', 'AuthController@register');
});

//route asisten
Route::get('/halaman_asdos', 'PageController@halaman_asdos');

//route admin
Route::get('/home_admin', 'PageController@home_admin');
Route::get('/tambah_mhs', 'PageController@tambah_mhs');
Route::post('/home_admin/save_mhs', 'PageController@save_mhs');
Route::get('/home_admin/edit_mhs/{id}', 'PageController@edit_mhs');
Route::put('/home_admin/update_mhs/{id}', 'PageController@update_mhs');
Route::get('/home_admin/delete_mhs/{id}', 'PageController@delete_mhs');


//CRUD MATAKULIAH
Route::get('/data_matakuliah', 'PageController@data_matakuliah');
Route::get('/tambah_matkul', 'PageController@tambah_matkul');
Route::post('/data_matakuliah/save_mk', 'PageController@save_mk');
Route::get('/data_matakuliah/edit_mk/{id}', 'PageController@edit_mk');
Route::put('/data_matakuliah/update_mk/{id}', 'PageController@update_mk');
Route::get('/data_matakuliah/delete_mk/{id}', 'PageController@delete_mk');

//Validasi Kehadiran 
Route::get('/validasi_kehadiran', 'PageController@validasi_kehadiran');



//route biro2
Route::get('/home_biro', 'PageController@home_biro');
Route::get('/data_presensi', 'PageController@data_presensi');


Route::post('/simpan','AuthController@simpan');

Route::get('/logout', 'AuthController@logout');



