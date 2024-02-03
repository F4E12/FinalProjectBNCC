<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ItemController;
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

Route::get('/', function(){return view('loginpage');})->middleware('isGuest');;
Route::get('/welcome', function(){return view('welcome');})->name('welcome');

//LOGIN
Route::get('/login', function(){return view('loginpage');})->name('loginpage')->middleware('isGuest');
Route::post('/login/auth', [AuthController::class, 'login'])->name('login')->middleware('isGuest');;

//REGISTER
Route::get('/register', function(){return view('registerpage');})->name('registerpage')->middleware('isGuest');;
Route::post('/register/auth', [AuthController::class, 'register'])->name('register')->middleware('isGuest');;

//ADMIN CRUD
Route::get('/adminPage', [AdminController::class, 'viewItem'])->name('adminpage')->middleware('isAdmin');
Route::post('/adminPage/additem', [AdminController::class, 'additem'])->name('additem')->middleware('isAdmin');;
Route::get('/adminPage/delete/{id}', [AdminController::class, 'deleteitem'])->name('deleteitem')->middleware('isAdmin');;
Route::get('/adminPage/update/{id}', [AdminController::class, 'updateitem'])->name('updateitem')->middleware('isAdmin');;
Route::post('/adminPage/saveupdate/{id}', [AdminController::class, 'saveitem'])->name('saveupdate')->middleware('isAdmin');;

//USER CART
Route::get('/cartPage', [CartController::class, 'viewItem'])->name('cartpage');

//CATALOG
Route::get('/catalogPage', [ItemController::class, 'viewItem'])->name('catalogpage');
Route::get('/catalogPage/addtocart/{id}', [ItemController::class, 'addtocart'])->name('addtocart');

//LOGOUT
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
