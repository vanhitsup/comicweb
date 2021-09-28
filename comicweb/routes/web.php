<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatecomicController;
use App\Http\Controllers\ComicController;
use App\Http\Controllers\ChapterController;

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
    return view('layout');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//
Route::resource('category',CatecomicController::class);
Route::resource('comic',ComicController::class);
Route::resource('chapter',ChapterController::class);
