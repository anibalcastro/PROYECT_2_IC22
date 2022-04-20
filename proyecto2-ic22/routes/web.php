<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
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



/*
Route::get('/editCategory', function () {
    return view('admin.editCategory');
});

Route::get('admin/dashboard',[AdminController::class,'index']);
Route::get('admin/createCategory',[AdminController::class,'create']);
*/

//Resource
//Route::resource('user', UserController::class);
//Route::resource('admin', AdminController::class);

//Admin \ Dashboard \ Create category \ Logout \ Edit \ Save category \ Update \ Delete
Route::get('admin', [AdminController::class, 'index'])-> name('Dashboard-Admin / N-Noticias');
Route::get('admin/create', [AdminController::class,'create'])-> name('Create - Category / N-Noticias');
Route::get('exit', [AdminController::class, 'exit']);
Route::get('admin/{admin}/edit', [AdminController::class, 'edit'])->name('Edit Categorie / N-Noticias');
Route::post('admin', [AdminController::class, 'store']);
Route::patch('admin/{admin}', [AdminController::class, 'update']);
Route::delete('admin/{admin}', [AdminController::class, 'destroy']);

//Source
Route::resource('source', SourceController::class);
Route::get('source/mysource', [SourceController::class,'sources'])-> name('My Source - Dashboard / N-Noticias');
/*
Route::get('source', [SourceController::class,'index'])-> name('Dashboard - Source / N-Noticias');
Route::get('source/create', [SourceController::class, 'create'])-> name('Create new source / N-Noticias');
Route::get('source/{source}/edit', [SourceController::class,'edit'])-> name('Edit source / N-Noticias');
Route::post('source', [SourceController::class,'store']);
Route::patch('source/{source}', [SourceController::class, 'update']);
Route::delete('source/{source}', [SourceController::class, 'destroy']);
*/


//User \ Register \ login \ validateLogin \ registerAction
Route::get('register', [UserController::class, 'register'])-> name('Registro / N-Noticias');
Route::get('login', [UserController::class, 'index'])-> name('Login / N-Noticias');
Route::get('/', [UserController::class, 'index'])-> name('Login / N-Noticias');

Route::post('login',[UserController::class, 'validateLogin']);
Route::post('register', [UserController::class, 'registerAction']);


