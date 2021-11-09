<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\AdminController;

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
    return view('index')->with('index', ' ');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/menu', [BarangController::class, 'tampilkan'] );
Route::post('/menu', [BarangController::class, 'chat'] );

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/dashboard', [BarangController::class, 'dashboard'])->middleware('auth');

Route::get('/dashform', [BarangController::class, 'dashform'])->middleware('auth');
Route::post('/dashform', [BarangController::class, 'inputform'])->middleware('auth');

Route::get('/delete/{id}', [BarangController::class, 'delete'])->middleware('auth');

Route::get('/dashedit/{id}', [BarangController::class, 'dedit'])->middleware('auth');
// Route::get('/dashedit/{id}', [BarangController::class, 'delete'])->middleware('auth');

Route::get('login', [AdminController::class, 'login'])->name('login')->middleware('guest');
Route::post('login', [AdminController::class, 'authenticate']);

Route::get('logout', [AdminController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('register', [AdminController::class, 'form']); 
Route::post('register', [AdminController::class, 'store']);