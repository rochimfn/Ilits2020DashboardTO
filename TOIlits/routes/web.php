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

// Auth::routes();

Route::get('/dashboard', function () {
    return view('admin.umum.dashboard');
})->middleware('CekLogin');

Route::get('/notifikasi', function () {
    return view('admin.peserta.notifikasiforda');
})->middleware('CekLogin');

Route::get('/upcoming_peserta', 'PesertaController@HalamanEvent')->middleware('CekLogin','CekStatusPeserta');

Route::get('/lupa_password', function () {
    return view('admin.peserta.lupapassword');
})->middleware('CekLogin');

Route::get('/bukti_pembayaran', 'PesertaController@HalamanBukti')->middleware('CekLogin','CekStatusPeserta');

Route::get('/profil', function () {
    return view('admin.peserta.profil');
})->middleware('CekLogin');

Route::get('/atur_kalender', 'AdminController@HalamanAturKalender')->middleware('CekLogin','CekStatusAdmin');

Route::get('/konfirmasi_berkas', 'FordaController@HalamanBerkas')->middleware('CekLogin', 'CekStatusForda');
// Route::get('/', function () {
//     return view('admin.umum.dashboard');
// })->name('admin.umum.dashboard')->middleware('auth');

// Auth::routes();

Route::get('/', function () {
    if (Session::get('login'))
        return redirect('/dashboard');
    return view('login');
});
Route::get('/register', 'AuthController@HalamanRegister');

Route::post('/logout', function () {
    Session::flush();
    return redirect('/');
});
Route::get('/lupa_password','AuthController@HalamanLupaPassword');
Route::get('/reset_password','AuthController@HalamanResetPassword');
Route::get('/ganti_password','AuthController@HalamanGantiPassword')->middleware('CekLogin');
Route::get('/sendEmail',function(){
    return view('tesemail');
});
Route::get('/notifikasi','PesertaController@HalamanNotif')->middleware('CekLogin','CekStatusPeserta');
Route::get('/kelola_notifikasi','FordaController@HalamanNotif')->middleware('CekLogin', 'CekStatusForda');
Route::get('/cetak_absen','FordaController@CetakAbsen')->middleware('CekLogin', 'CekStatusForda');
//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/daftar_peserta','FordaController@HalamanDaftarPeserta')->middleware('CekLogin', 'CekStatusForda');
Route::get('/jumlah_peserta','PesertaController@HalamanJumlah');
Route::get('/get_location/{id}','AuthController@GetLocation');
Route::get('/under_construction',function(){
return view('/under_construction');
});
//POST
Route::post('/proses_register', 'AuthController@ProsesRegister');
Route::post('/proses_login', 'AuthController@ProsesLogin');
Route::post('/proses_upload_berkas', 'PesertaController@ProsesUploadBukti')->middleware('CekLogin','CekStatusPeserta');
Route::post('/tambah_event','AdminController@TambahEvent')->middleware('CekLogin','CekStatusAdmin');
Route::post('/edit_event','AdminController@EditEvent')->middleware('CekLogin','CekStatusAdmin');
Route::post('/hapus_event','AdminController@HapusEvent')->middleware('CekLogin','CekStatusAdmin');
Route::post('/proses_request_lupa_password','AuthController@ProsesRequestLupaPassword');
Route::post('/proses_reset_password','AuthController@ProsesResetPassword');
Route::post('/terima_berkas','FordaController@ProsesTerimaBerkas')->middleware('CekLogin','CekStatusForda');
Route::post('/tolak_berkas','FordaController@ProsesTolakBerkas')->middleware('CekLogin','CekStatusForda');
Route::post('/tambah_notif','FordaController@ProsesTambahNotif')->middleware('CekLogin','CekStatusForda');
Route::post('/edit_notif','FordaController@ProsesEditNotif')->middleware('CekLogin','CekStatusForda');
Route::post('/hapus_notif','FordaController@ProsesHapusNotif')->middleware('CekLogin','CekStatusForda');
Route::post('/proses_ganti_password','AuthController@ProsesGantiPassword')->middleware('CekLogin');
// Route::get('/sendEmail','MailController@KirimEmail');

