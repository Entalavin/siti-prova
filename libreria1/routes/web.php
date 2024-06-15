<?php

use App\Http\Controllers\LibroController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/homepage', function () { //statica
    return view('home');
})->name('homepage');

Route::get('/contatti', function () { //statica
    return view('contatti');
})->name('contatti');

Route::get('/libri', [LibroController::class, 'index'])  //ha un controller
->name('libri.index');

Route::get('/libri/{libro}', [LibroController::class, 'show'])->name('libri.show');

// admin

Route::get('/admin/lista-libri', [LibroController::class, 'index_admin'])->name('admin.libri.index');

Route::get('/admin/create-libro', [LibroController::class, 'create'])->name('admin.libri.create');

Route::post('/admin/libri', [LibroController::class, 'store'])->name('admin.libri.store');
