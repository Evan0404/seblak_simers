<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::group(['middleware' => 'auth'], function() {
    Route::get('/home', App\Http\Livewire\Home::class,);
    Route::get('/menu', App\Http\Livewire\Menuu::class,);
    Route::get('/kasir', App\Http\Livewire\Kasirr::class,);
    Route::get('/pembelian', App\Http\Livewire\Pembelian::class,);

});
