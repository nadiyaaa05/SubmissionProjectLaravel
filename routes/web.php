<?php

use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function(){
    return "Hello Laravel!!!";
});

Route::get('/mahasiswa', function(){
    return view("mahasiswa", ['title' => 'Mahasiswa']);
});

Route::get('/playlist', function(){
    return view("playlist", ['title' => 'PlaySpoty']);
});

// praktikum
// route sederhana (clouser)
Route::get('/halo', function(){
    return 'Halo, selamat datang di Laravel 13!';
});

Route::get('/waktu', fn () => now()->format('d-m-Y H:i:s'));

// Route dengan parameter
Route::get('/profil/{nama}', function (string $nama){
    return "Halo, {$nama}!";
});

Route::get('/kategori/{nama}', function (?string $nama = 'semua'){
    return "Menampilkan kategori: {$nama}";
});

Route::get('/kelas/{kode}/mahasiswa/{nim}', function (string $kode, string $nim){
    return "Kelas {$kode}, NIM {$nim}";
});

// Pembatasan parameter (constraint)
Route::get('/artikel/{id}', function (int $id){
    return "Artikel nomor {$id}";
})->whereNumber('id');

Route::get('/pengguna/{username}', function (string $username){
    return "Pengguna: {$username}";
})->whereAlpha('username');

Route::get('/kode/{kode}', function (string $kode){
    return "Kode: {$kode}";
})->where('kode', '[A-Z]{3}[0-9]{2}');

// Route langsung ke View dan named route
Route::view('/tentang', 'tentang')->name('tentang');

Route::get('/kontak', function(){
    return view('kontak', ['email' => 'info@kampus.ac.id']);
})->name('kontak');

// Route Group dan prefix
Route::prefix('admin')->name('admin')->group(function(){
    Route::get('/dashboard', fn() => 'Dashboard Admin')
        ->name('dashboard');

    Route::get('/pengaturan', fn () => 'Pengaturan Admin')
        ->name('pengaturan');
});

// Redirect dan fallback
Route::redirect('/beranda', '/');

Route::fallback(function(){
    return response('Halaman tidak ditemukan (kustom).', 404);
});

//praktikum 3
Route::get('/produk',[ProdukController::class,'index'])->name('produk.index');
Route::get('/produk/{id}',[ProdukController::class,'show'])->name('produk.show');
Route::resource('produk', ProdukController::class);

/*Route::get('/produk/{id}', function ($id) {
    return 'Produk #' . $id;
});*/

Route::get('/produk/{id}', [ProdukController::class,'show']);