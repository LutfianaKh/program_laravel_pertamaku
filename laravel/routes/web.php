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

Route::get('/', 'MahasiswaController@welcome');
Route::get('biodata', 'MahasiswaController@biodata');
Route::get('mahasiswa/{jurusan}', 'MahasiswaController@mahasiswa');
Route::get('mahasiswa2/{jurusan?}', 'MahasiswaController@mahasiswa2');
Route::get('mahasiswa3/{jurusan?}', 'MahasiswaController@mahasiswa3');
Route::get('biodata2', 'MahasiswaController@biodata2');
Route::get('halaman_tersembunyi', 
            ['as' =>'rahasia',
            'uses' =>'MahasiswaController@halaman_tersembunyi']);
Route::get('tampilkan_halaman_tersembunyi', 'MahasiswaController@tampilkan_halaman_tersembunyi');

Route::group([], function()
    {
        Route::get('/pertama','MahasiswaController@pertama');
        Route::get('/kedua','MahasiswaController@kedua');
        Route::get('/ketiga','MahasiswaController@ketiga');
    });

Route::group(['prefix' => 'latihan'], function()
    {
        Route::get('/satu','MahasiswaController@satu');
        Route::get('/dua','MahasiswaController@dua');
        Route::get('/tiga','MahasiswaController@tiga');
    });

Route::group(['prefix' => 'admin'], function()
    {
        Route::get('posts_admin','MahasiswaController@posts_admin');
        Route::get('posts','MahasiswaController@posts');
        Route::get('posts_simpan','MahasiswaController@posts_simpan');
    });

Route::name('kuliah.')->group(function()
    {
        Route::get('teknik_informatika','MahasiswaController@kuliah')->name('teknik_informatika');
    });

Route::name('kuliah2')->group(function()
    {
        Route::get('teknik_informatika2','MahasiswaController@kuliah2');
    });

Route::group(array('prefix' => 'halaman_admin', 'before' => 'login'), function()
{
    Route::get('/', 'MahasiswaController@halaman_admin');
    Route::get('posts', 'MahasiswaController@halaman_posts');
    Route::get('posts_simpan', 'MahasiswaController@halaman_simpan');
});


Route::get('input', 'MahasiswaController@input');

Route::post('tampilkan', 'MahasiswaController@tampilkan');


Route::get('contohdata', function(){
    DB::table('biodata')->insert([
        [
            'nim' => '19870',
            'nama' => 'Lutfiana Khoirunnisa',
            'prodi' => 'Teknik Informatika',
            'tanggal_lahir' => '2000-05-20',
            'alamat' => 'Boyolali, Jawa Tengah',
            'hobi' => 'Mengaji',
            'quote' => 'Hidup Cuma Sekali',
        ],
    ]);
});


Route::get('tampilkan_biodata', 'MahasiswaController@tampilkan_biodata');

Route::get('tambah_biodata', 'MahasiswaController@tambah_biodata');

Route::post('store', 'MahasiswaController@store');

Route::get('detail_biodata/{biodata}', 'MahasiswaController@show');

Route::get('edit_biodata/{biodata}/edit','MahasiswaController@edit');

Route::put('update/{id}','MahasiswaController@update');

Route::get('hapus/{id}','MahasiswaController@delete');

Route::get('test_collection', 'MahasiswaController@test_collection');

Route::get('first_collection', 'MahasiswaController@first_collection');

Route::get('last_collection', 'MahasiswaController@last_collection');

Route::get('count_collection', 'MahasiswaController@count_collection');

Route::get('take_collection', 'MahasiswaController@take_collection');

Route::get('pluck_collection', 'MahasiswaController@pluck_collection');

Route::get('where_collection', 'MahasiswaController@where_collection');

Route::get('toarray_collection', 'MahasiswaController@toarray_collection');

Route::get('date_mutator', 'MahasiswaController@date_mutator');

Route::get('biodata/cari', 'MahasiswaController@cari');


// //Route::get('/', function () {
//  //   return view('welcome');
// //});
// Route::get('biodata', function () {
//     return 'Nama : (Lutfiana Khoirunnisa) <br>NIP : (3.34.18.1.14) <br>Alamat : (Boyolali,Jawa Tengah)<br> Hobi : Mengaji';
// });
// //oute::get('mahasiswa/{jurusan}', function($jurusan) {
//     //return 'Mahasiswa jurusan : '.$jurusan;
// //});
// Route::get('mahasiswa2/{jurusan?}', function($jurusan=null) {
//     if($jurusan == null)
//     return "Data jurusan mahasiswa kosong";
//     return "Mahasiswa jurusan : ".$jurusan;
// });
// Route::get('mahasiswa3/{jurusan?}', function($jurusan="Teknik Informatika") {
//     return 'Mahasiswa jurusan : '.$jurusan;
// });
// Route::get('biodata2', function () {
//     return view('biodata2');
// });
// Route::get('halaman_tersembunyi',['as' =>'rahasia', function(){
//     return 'Ini halaman yang disembunyikan';
// }]);
// Route::get('tampilkan_halaman_tersembunyi',['as' =>'rahasia', function(){
//     return redirect()->route('rahasia');
// }]);
// Route::group([], function()
// {
//     Route::get('/pertama',function()
//     {
//         echo "route pertama";
//     });
// Route::get('/kedua',function()
// {
//     echo "route kedua";
// });
// Route::get('/ketiga',function()
// {
//     echo "route ketiga";
// });
// });

// Route::group(['prefix' => 'latihan'], function()
// {
//     Route::get('/satu',function()
//     {
//         echo "latihan 1";
//     });
//     Route::get('/dua',function()
//     {
//         echo "latihan dua";
//     });
//     Route::get('/tiga',function()
//     {
//         echo "latihan tiga";
//     });
// });

// Route::group(array('prefix' => 'admin'),function()
// {
//     // home page route to the admin section
//     Route::get('posts_admin',function()
//     {
//         return 'Halaman Admin';
//     });

//     // route to the all posts listing
//     Route::get('posts', function()
//     {
//         return 'Halaman Dashboard';
//     });

//     // route to create a new blog post
//     Route::get('posts_simpan', function()
//     {
//         return 'Data berhasil disimpan';
//     });
// });

// Route::name('kuliah.')->group(function()
// {
//     Route::get('teknik_informatika', function()
    
//     {
//         return "Kuliah Teknik Informatika";
//     }) ->name('teknik_informatika');
// });

// Route::name('kuliah2')->group(function()
// {
//     Route::get('teknik_informatika2', function()
//     {
//         return "Kuliah Teknik Informatika juga";
//     });
// });

// Route::group(array('prefix'=>'halaman_admin','before'=>'login'), function()
// {
//     // home page route to the admin section
//     Route::get('/', function()
//     {
//         return 'Halaman Admin bisa diakses setelah login';
//     });

//     // Route to the all posts listing
//     Route::get('posts', function()
//     {
//         return 'Halaman Dashboard bisa diakses setelah login';
//     });

//     // Route to create a new blog post
//     Route::get('posts_simpan', function()
//     {
//         return 'Bisa menyimpan setelah setelah login';
//     });
// });


// Route::get('tugas2', function(){
//     return view('tugas2');
// });
// Route::get('tentang tugas2', function(){
//     return "Ini Tugas ke 2 pada hari jumat, 6 Maret 2020";
// });
// Route::get('tugas2latihan1/{nama}', function($nama){
//     return view('tugas2latihan1', ['nama'=>$nama]);
// });
// Route::get('tugas2latihan2/{nama}', function($nama){
//     return view('tugas2latihan2', ['nama'=>$nama]);
// });
// Route::get('daftar', function($nama){
//     return view('daftar');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('buat_pdf', 'MahasiswaController@buat_pdf');
