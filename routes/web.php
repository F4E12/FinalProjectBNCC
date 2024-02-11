<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FrakturController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ViewController;
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

Route::get('/', function(){return view('loginpage');})->middleware('isGuest');
Route::get('/welcome', [ViewController::class, 'viewitem'])->name('welcome');

//LOGIN
Route::get('/login', function(){return view('loginpage');})->name('loginpage')->middleware('isGuest');
Route::post('/login/auth', [AuthController::class, 'login'])->name('login')->middleware('isGuest');;

//REGISTER
Route::get('/register', function(){return view('registerpage');})->name('registerpage')->middleware('isGuest');;
Route::post('/register/auth', [AuthController::class, 'register'])->name('register')->middleware('isGuest');;

//ADMIN CRUD
Route::get('/adminPage', [AdminController::class, 'viewItem'])->name('adminpage')->middleware('isAdmin');
Route::post('/adminPage/additem', [AdminController::class, 'additem'])->name('additem')->middleware('isAdmin');
Route::get('/adminPage/delete/{id}', [AdminController::class, 'deleteitem'])->name('deleteitem')->middleware('isAdmin');
Route::get('/adminPage/update/{id}', [AdminController::class, 'updateitem'])->name('updateitem')->middleware('isAdmin');
Route::post('/adminPage/saveupdate/{id}', [AdminController::class, 'saveitem'])->name('saveupdate')->middleware('isAdmin');

//USER CART
Route::get('/cartPage', [CartController::class, 'viewItem'])->name('cartpage')->middleware('isLogin')->middleware('isLogin');
Route::get('/cartPage/saveinvoice', [CartController::class, 'saveinvoice'])->name('saveinvoice')->middleware('isLogin')->middleware('isLogin');
Route::post('/cartPage/changeamount/{id}', [CartController::class, 'changeamount'])->name('changeamount')->middleware('isLogin')->middleware('isLogin');
Route::get('/cartPage/deletefromcart/{id}', [CartController::class, 'deletefromcart'])->name('deletefromcart')->middleware('isLogin')->middleware('isLogin');

//CATALOG
Route::get('/catalogPage', [ItemController::class, 'viewItem'])->name('catalogpage')->middleware('isLogin');
Route::get('/catalogPage/addtocart/{id}', [ItemController::class, 'addtocart'])->name('addtocart')->middleware('isLogin');

//LOGOUT
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('isLogin');

//FRAKTUR
Route::get('/frakturPage', [FrakturController::class, 'viewItem'])->name('frakturpage')->middleware('isLogin');
Route::post('/frakturPage/vaildate', [FrakturController::class, 'validatecart'])->name('validatecart')->middleware('isLogin');
Route::get('/frakturPage/printfraktur', [FrakturController::class, 'printfraktur'])->name('printfraktur')->middleware('isLogin');

//ERROR
Route::get('/error', function(){return view('error');});
