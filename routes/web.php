<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RolController;
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

Route::get('/', function () {
    return view('inicio');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'edit')->name('profile.edit');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
    });

    Route::controller(UserController::class)->group(function () {
        Route::get('/users', 'index')->name('users');
        Route::get('/user/{id}', 'show')->name('user');
        Route::get('/delete/{id}', 'destroy');
        Route::get('/retrieve/{id}', 'retrieve');
        Route::post('/crear', 'store' )->name('crear');
        Route::post('/actualiar', 'update' )->name('Actualiar');
        Route::post('/authUpdate', 'authUpdate' )->name('authUpdate');


        Route::post('/ingersar', 'store' )->name('ingersar');
        Route::get('/updateById/{id}', 'showById' );
    });



});




require __DIR__ . '/auth.php';
