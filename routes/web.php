<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\adminController;
use App\Http\Controllers\catagoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubCatagoryController;
use App\Http\Controllers\SuperadminController;
use App\Models\SubCatagory;

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

//Admin Route
Route::get('/admin/dashboard',[SuperadminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/user/dashboard',[SuperadminController::class, 'dashboard'])->name('user.dashboard');
// Route::get('/login', [adminController::class, 'login']);
// Route::post('/admin-auth', [adminController::class, 'auth']);
// Route::get('/logout', [SuperadminController::class, 'logout']);
// Route::get('/welcome_admin', [adminController::class, 'index']);

//Catagory routes
Route::resource('/catagories', catagoryController::class);
Route::get('/cat-status{catagory}', [catagoryController::class, 'change_status']);

//SubCatagory routes
Route::resource('/sub-catagories', SubCatagoryController::class);
Route::get('/cat-status{subcatagory}', [SubCatagoryController::class, 'change_status']);




// Route::view('/master', 'frontend.master');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/',  [HomeController::class, 'guestHome'])->name('guest.home');
Route::get('/admin-dashboard',  [HomeController::class, 'adminHome'])->name('admin.home');
Route::get('/user-dashboard',  [HomeController::class, 'userHome'])->name('user.home');


Route::get('/admin/product/create',  [ProductController::class, 'create'])->name('product.create');
Route::get('/admin/products',  [ProductController::class, 'view'])->name('product.index');



