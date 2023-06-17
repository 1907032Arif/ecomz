<?php

use App\Http\Controllers\SslCommerzPaymentController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/home', function () {
    return redirect('/');
});

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('homee');

Route::get('/',  [HomeController::class, 'home'])->name('home');
Route::get('/admin-dashboard',  [HomeController::class, 'adminHome'])->name('admin.home');
Route::get('/user-dashboard',  [HomeController::class, 'userHome'])->name('user.home');
Route::get('/search',  [HomeController::class, 'search'])->name('search');

Route::get('/about-us',  [HomeController::class, 'aboutUS'])->name('about.us');
Route::get('/admin/aboutus/create', [\App\Http\Controllers\AdminController::class, 'aboutCreate'])->name('about.create');
Route::post('/admin/aboutus/save', [\App\Http\Controllers\AdminController::class, 'aboutSave'])->name('about.save');
Route::put('/admin/aboutus/put', [\App\Http\Controllers\AdminController::class, 'aboutPut'])->name('about.put');

Route::get('/contact',  [HomeController::class, 'contact'])->name('contact');
Route::get('/admin/contact/create', [\App\Http\Controllers\AdminController::class, 'contactCreate'])->name('contact.create');
Route::post('/admin/contact/save', [\App\Http\Controllers\AdminController::class, 'contactSave'])->name('contact.save');
Route::put('/admin/contact/put', [\App\Http\Controllers\AdminController::class, 'contactPut'])->name('contact.put');


//Route::get('/admin/product/create',  [ProductController::class, 'create'])->name('product.create');
//Route::get('/admin/products',  [ProductController::class, 'view'])->name('product.index');


Route::resource('/admin_products', ProductController::class);
Route::get('/change_status/{product}', [ProductController::class, 'change_status']);
Route::get('/product/popup/{id}', [ProductController::class, 'popup']);

Route::get('/shop', [\App\Http\Controllers\ShopController::class, 'index'])->name('shop');
Route::get('/shop/single/{id}', [\App\Http\Controllers\ShopController::class, 'shopSingle'])->name('shop.single');

Route::post('/add-to-cart', [\App\Http\Controllers\CartController::class, 'addCart']);
Route::get('/your-cart', [\App\Http\Controllers\CartController::class, 'viewCart'])->name('your.cart');
Route::post('cart/delete', [\App\Http\Controllers\CartController::class, 'deleteCart']);
Route::put('cart/update', [\App\Http\Controllers\CartController::class, 'updateCart']);
Route::post('cart/clear', [\App\Http\Controllers\CartController::class, 'clearCart']);


//Route::get('checkout', [\App\Http\Controllers\OrderController::class, 'checkout']);
Route::post('place-order', [\App\Http\Controllers\OrderController::class, 'placeOrder'])->name('place.order');


// SSLCOMMERZ Start
Route::get('/checkout', [SslCommerzPaymentController::class, 'exampleEasyCheckout'])->name('checkout');
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END






