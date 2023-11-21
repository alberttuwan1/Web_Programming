<?php

use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [MahasiswaController::class, 'read']);

Route::get('/insert_mahasiswa', [MahasiswaController::class, 'create']);
Route::post('/insert_mahasiswa', [MahasiswaController::class, 'insert']);

Route::post('/delete_mahasiswa', [MahasiswaController::class, 'delete']);

