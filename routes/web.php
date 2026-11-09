
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;

Route::get('/', fn () => redirect()->route('siswa.index'));

Route::resource('kelas', KelasController::class);
Route::resource('siswa', SiswaController::class);
