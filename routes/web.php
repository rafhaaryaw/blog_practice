<?php

use App\Http\Controllers\C_auth;
use App\Http\Controllers\C_blog;
use App\Http\Controllers\C_home;
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
    return view('login');
});

Route::get('login', [C_auth::class, 'index'])->name('login');
Route::post('login', [C_auth::class, 'login']);

Route::post('/registeract', [C_auth::class, 'regact']);
Route::get('register', [C_auth::class, 'register']);


Route::middleware(['notoken'])->group(function () {
    Route::get('showblog/{id}', [C_blog::class, 'index']);
    Route::get('addblog', [C_blog::class, 'addblog']);
    Route::get('updateget/{id}', [C_blog::class, 'updateget']);
    Route::put('update/{id}', [C_blog::class, 'update']);
    Route::post('create', [C_blog::class, 'store']);
    Route::post('logout', [C_auth::class, 'destroy']);
    Route::get('blog', [C_blog::class, 'show']);
    Route::get('dashboard', [C_home::class, 'index']);
    Route::delete('delete/{id}', [C_blog::class, 'delete']);
});
