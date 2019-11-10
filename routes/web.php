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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/siswa','SiswaController@index'); 
Route::post('/siswa/create','SiswaController@create'); 
Route::get('/siswa/{id}/edit','SiswaController@edit'); 
Route::post('/siswa/{id}/update','SiswaController@update'); 
Route::get('/siswa/{id}/delete','SiswaController@delete'); 

Route::get('/domain','DomainController@index'); 
Route::post('/domain/create','DomainController@create'); 
Route::get('/domain/{id}/edit','DomainController@edit'); 
Route::post('/domain/{id}/update','DomainController@update'); 
Route::get('/domain/{id}/delete','DomainController@delete'); 
Route::get('/rupiah/{angka}', function ($angka) {
    return Rupiah::getRupiah($angka);
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'KontakController@homepage')->name('home');
Route::resource('/tambah', 'KontakController');
