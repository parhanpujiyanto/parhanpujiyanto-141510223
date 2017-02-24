<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return redirect('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::resource('/golongan', 'golonganController');
Route::resource('/jabatan', 'jabatanController');
Route::resource('/kategori', 'kategoriController');
Route::resource('/tunjangan', 'tunjanganController');
Route::resource('/pegawai', 'pegawaiController');
Route::resource('/lemburp','lemburpegawaiController');
Route::resource('/tunjanganp','tunjanganpController');
Route::resource('/penggajian','penggajianController');
Route::get('/akses', function () {
    return view('akses');
});


Route::group(['middleware' => ['api']], function () {
    Route::post('register', 'ApiController@register');
    Route::post('/', 'ApiController@login');
    Route::group(['middleware' => 'jwt-auth'], function () {
    	Route::post('get_user_details', 'ApiController@get_user_details');
    });
});

