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

Auth::routes();

Route :: get('/dashboard', function(){
    return view('admin.umum.dashboard');
});

Route :: get('/notifikasi', function(){
    return view('admin.peserta.notifikasiforda');
});

Route :: get('/upcoming_peserta', function(){
    return view('admin.peserta.upcoming');
});

Route :: get('/lupa_password', function(){
    return view('admin.peserta.lupapassword');
});

Route :: get('/bukti_pembayaran', function(){
    return view('admin.peserta.buktipembayaran');
});

Route :: get('/profil', function(){
    return view('admin.peserta.profil');
});

Route :: get('/atur_kalender', function(){
    return view ('admin.superuser.atur_kalender');
});

// Route::get('/', function () {
//     return view('admin.umum.dashboard');
// })->name('admin.umum.dashboard')->middleware('auth');

// Auth::routes();

Route::get('/',function(){
    return view('login');
});
Route::get('/register','AuthController@HalamanRegister');

Route::get('/logout', function(){
    return view('auth.login');
});

//Route::get('/home', 'HomeController@index')->name('home');


//POST
Route::post('/proses_register','AuthController@ProsesRegister');
Route::post('/proses_login','AuthController@ProsesLogin');
