<?php

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
Route::get('/login/oath', [App\Http\Controllers\Auth\LoginController::class,'redirectToGoogle']);

Route::get('/login/google',[App\Http\Controllers\Auth\LoginController::class,'handleGoogleCallback']);

Route::get('/', [App\Http\Controllers\ArtworkController::class, 'index'])->name('index');
Route::get('/home', [App\Http\Controllers\ArtworkController::class, 'index'])->name('home');

Auth::routes();
Route::resource('profile','\App\Http\Controllers\ProfileController');
Route::resource('artwork','\App\Http\Controllers\ArtworkController');
Route::resource('comments','\App\Http\Controllers\CommentController');
Route::resource('likes','\App\Http\Controllers\LikeController');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('search_filter/{name}', [App\Http\Controllers\ArtworkController::class, 'viewSearch'])->name('home');
Route::get('search/{title}', [App\Http\Controllers\ArtworkController::class, 'search'])->name('home');

Route::put('updateComment/{id}','\App\Http\Controllers\CommentController@updateComment');

Route::delete('deleteComment/{id}','\App\Http\Controllers\CommentController@destroy');
