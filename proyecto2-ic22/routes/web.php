<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SourceController;

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

//Admin Routes
Route::get('admin', [AdminController::class, 'index'])-> name('Dashboard-Admin / N-Noticias');
Route::get('admin/create', [AdminController::class,'create'])-> name('Create - Category / N-Noticias');
Route::get('exit', [AdminController::class, 'exit']);
Route::get('admin/{admin}/edit', [AdminController::class, 'edit'])->name('Edit Categorie / N-Noticias');
Route::post('admin', [AdminController::class, 'store']);
Route::patch('admin/{admin}', [AdminController::class, 'update']);
Route::delete('admin/{admin}', [AdminController::class, 'destroy']);

//News routes
Route::get('news', [NewsController::class, 'index'])-> name('Dashboard-Source / N-Noticias');
Route::post('search', 'App\Http\Controllers\NewsController@searchNewByText');
Route::post('searchByCategories', 'App\Http\Controllers\NewsController@searchNewsByCategory');
Route::post('searchByTag', 'App\Http\Controllers\NewsController@searchNewsByTag');

//Source routes
Route::get('source/create', 'App\Http\Controllers\SourceController@create')-> name('Create new source / N-Noticias');
Route::get('source/{source}/edit','App\Http\Controllers\SourceController@edit')-> name('Edit source / N-Noticias');
Route::patch('source/{source}', 'App\Http\Controllers\SourceController@update');
Route::get('source/mysource','App\Http\Controllers\SourceController@sources')-> name('My Source - Dashboard / N-Noticias');
Route::delete('source/{source}', 'App\Http\Controllers\SourceController@destroy');
Route::post('source',[SourceController::class, 'store']);
Route::post('source', 'App\Http\Controllers\SourceController@store');


//User routes 
Route::get('register', [UserController::class, 'register'])-> name('Registro / N-Noticias');
Route::get('login', [UserController::class, 'index'])-> name('Login / N-Noticias');
Route::get('/', [UserController::class, 'index'])-> name('Login / N-Noticias');

Route::post('login',[UserController::class, 'validateLogin']);
Route::post('register', [UserController::class, 'registerAction']);


