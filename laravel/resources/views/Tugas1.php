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
    return view('welcome');
});
Route::get('biodata', function () {
    return 'Nama : (Lutfiana Khoirunnisa) <br>NIP : (3.34.18.1.14) <br>Alamat : (Boyolali,Jawa Tengah)<br> Hobi : Mengaji';
});
Route::get('Lutfiana/{Teknik Informatika}', function($jurusan) {
    return 'Mahasiswa jurusan : '.$jurusan;
});
Route::get('Lutfiana2/{Teknik Informatika?}', function($jurusan=null) {
    if($jurusan == null)
    return "Data jurusan mahasiswa kosong";
    return "Mahasiswa jurusan : ".$jurusan;
});
Route::get('Lutfiana3/{Teknik Informatika}', function($jurusan="Teknik Informatika") {
    return 'Mahasiswa jurusan : '.$jurusan;
});
Route::get('biodata2', function () {
    return view('biodata2');
});
Route::get('halaman_tersembunyi',['as' =>'rahasia', function(){
    return 'Ini halaman yang disembunyikan';
}]);
Route::get('tampilkan_halaman_tersembunyi',['as' =>'rahasia', function(){
    return redirect()->route('rahasia');
}]);
Route::group([], function()
{
    Route::get('/pertama',function()
    {
        echo "route pertama";
    });
Route::get('/kedua',function()
{
    echo "route kedua";
});
Route::get('/ketiga',function()
{
    echo "route ketiga";
});
});

Route::group(['prefix' => 'latihan'], function()
{
    Route::get('/satu',function()
    {
        echo "latihan 1";
    });
    Route::get('/dua',function()
    {
        echo "latihan dua";
    });
    Route::get('/tiga',function()
    {
        echo "latihan tiga";
    });
});

Route::group(array('prefix' => 'admin'),function()
{
    // home page route to the admin section
    Route::get('/',function()
    {
        return 'Halaman Admin';
    });

    // route to the all posts listing
    Route::get('posts', function()
    {
        return 'Halaman Dashboard';
    });

    // route to create a new blog post
    Route::get('posts/simpan', function()
    {
        return 'Data berhasil disimpan';
    });
});
