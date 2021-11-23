<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatecomicController;
use App\Http\Controllers\ComicController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\IndexController;

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


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//

Route::resource('category',CatecomicController::class)->middleware('auth');
Route::resource('comic',ComicController::class);
Route::resource('chapter',ChapterController::class);
Route::resource('storytype',\App\Http\Controllers\StoryTypeController::class);

Route::get('/',[IndexController::class,'home']);
Route::get('view-comic/{slug}',[IndexController::class,'view_comic']);
Route::get('view-category/{slug}',[IndexController::class,'view_category']);
Route::get('view-chapter/{slug}',[IndexController::class,'view_chapter']);
Route::get('story-type/{slug}',[IndexController::class,'story_type']);
Route::get('search',[IndexController::class,'search']);
