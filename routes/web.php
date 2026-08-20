<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;

// Ubah halaman awal agar langsung diarahkan ke daftar inventaris
Route::get('/', function () {
    return redirect()->route('items.index');
});

// Route untuk semua fungsi CRUD barang
Route::resource('items', ItemController::class);
