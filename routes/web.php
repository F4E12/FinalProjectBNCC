<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
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

Route::get('/', function(){return view('loginpage');});
Route::get('/welcome', function(){return view('welcome');})->name('welcome');

//LOGIN
Route::get('/login', function(){return view('loginpage');})->name('loginpage');
Route::post('/login/auth', [AuthController::class, 'login'])->name('login');

//REGISTER
Route::get('/register', function(){return view('registerpage');})->name('registerpage');
Route::post('/register/auth', [AuthController::class, 'register'])->name('register');

//ADMIN CRUD
Route::get('/adminPage', [AdminController::class, 'viewItem'])->name('adminpage');
Route::post('/adminPage/additem', [AdminController::class, 'additem'])->name('additem');
Route::get('/adminPage/delete/{id}', [AdminController::class, 'deleteitem'])->name('deleteitem');
Route::get('/adminPage/update/{id}', [AdminController::class, 'updateitem'])->name('updateitem');
Route::post('/adminPage/saveupdate/{id}', [AdminController::class, 'saveitem'])->name('saveupdate');
