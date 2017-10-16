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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('dokter')->group(function(){
	Route::get('/', 'DokterController@index')->name('dokter.index');
	Route::post('/prosestambah', 'DokterController@store')->name('dokter.prosestambah');
	Route::get('/lihat/{id}', 'DokterController@show')->name('dokter.lihat');
	Route::get('/edit/{id}', 'DokterController@edit')->name('dokter.edit');
	Route::post('/prosesedit/{id}', 'DokterController@update')->name('dokter.prosesedit');
	Route::get('/delete/{id}', 'DokterController@destroy')->name('dokter.delete');
});

Route::prefix('poliklinik')->group(function(){
	Route::get('/', 'PoliklinikController@index')->name('poliklinik.index');
	Route::post('/prosestambah', 'PoliklinikController@store')->name('poliklinik.prosestambah');
	Route::get('/lihat/{id}', 'PoliklinikController@show')->name('poliklinik.lihat');
	Route::get('/edit/{id}', 'PoliklinikController@edit')->name('poliklinik.edit');
	Route::post('/prosesedit/{id}', 'PoliklinikController@update')->name('poliklinik.prosesedit');
	Route::get('/delete/{id}', 'PoliklinikController@destroy')->name('poliklinik.delete');
});

Route::prefix('pasien')->group(function(){
	Route::get('/', 'PasienController@index')->name('pasien.index');
	Route::post('/prosestambah', 'PasienController@store')->name('pasien.prosestambah');
	Route::get('/lihat/{id}', 'PasienController@show')->name('pasien.lihat');
	Route::get('/edit/{id}', 'PasienController@edit')->name('pasien.edit');
	Route::post('/prosesedit/{id}', 'PasienController@update')->name('pasien.prosesedit');
	Route::get('/delete/{id}', 'PasienController@destroy')->name('pasien.delete');
});

Route::prefix('resep')->group(function(){
	Route::get('/', 'ResepController@index')->name('resep.index');
	Route::post('/prosestambah', 'ResepController@store')->name('resep.prosestambah');
	Route::get('/lihat/{id}', 'ResepController@show')->name('resep.lihat');
	Route::get('/edit/{id}', 'ResepController@edit')->name('resep.edit');
	Route::post('/prosesedit/{id}', 'ResepController@update')->name('resep.prosesedit');
	Route::get('/delete/{id}', 'ResepController@destroy')->name('resep.delete');
});
