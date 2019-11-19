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

Route :: get('/dashboard', function(){
    return view('admin.umum.dashboard');
})->middleware('CekLogin');

Route :: get('/notifikasi', function(){
    return view('admin.peserta.notifikasiforda');
})->middleware('CekLogin');

Route :: get('/upcoming_peserta', 'PesertaController@HalamanEvent')->middleware('CekLogin');

Route :: get('/lupa_password', function(){
    return view('admin.peserta.lupapassword');
})->middleware('CekLogin');

Route :: get('/bukti_pembayaran','PesertaController@HalamanBukti')->middleware('CekLogin');

Route :: get('/profil', function(){
    return view('admin.peserta.profil');
})->middleware('CekLogin');

Route :: get('/atur_kalender', function(){
    return view ('admin.superuser.atur_kalender');
})->middleware('CekLogin');

Route::get('/konfirmasi_berkas','FordaController@HalamanBerkas')->middleware('CekLogin','CekStatusForda');
// Route::get('/', function () {
//     return view('admin.umum.dashboard');
// })->name('admin.umum.dashboard')->middleware('auth');

// Auth::routes();

Route::get('/',function(){
    if(Session::get('login'))
    return redirect('/dashboard');
    return view('login');
});
Route::get('/register','AuthController@HalamanRegister');

Route::post('/logout', function(){
    Session::flush();
    return redirect('/');
});

//Route::get('/home', 'HomeController@index')->name('home');


//POST
Route::post('/proses_register','AuthController@ProsesRegister');
Route::post('/proses_login','AuthController@ProsesLogin');
Route::post('/proses_upload_berkas','PesertaController@ProsesUploadBukti');
