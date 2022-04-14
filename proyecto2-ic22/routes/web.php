<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
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

//Route::resource('user', UserController::class);
//Route::resource('admin', AdminController::class);

//Admin

//Route::get('admin', AdminController::class, 'index')-> name('Dashboard-Admin / N-Noticias');
//Route::get('admin/create', AdminController::class,'create')-> name('Create - Category / N-Noticias');
//Route::get('admin/logout', [AdminController::class, 'logout']);
Route::resource('admin', AdminController::class);



//User
Route::get('register', [UserController::class, 'register'])-> name('Registro / N-Noticias');
Route::get('login', [UserController::class, 'index'])-> name('Login / N-Noticias');
Route::get('/', [UserController::class, 'index'])-> name('Login / N-Noticias');

Route::post('login',[UserController::class, 'validateLogin']);
Route::post('register', [UserController::class, 'registerAction']);


