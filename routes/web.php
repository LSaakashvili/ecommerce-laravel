<?php

use App\Http\Controllers\AddImageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SignUpController;
use Darryldecode\Cart\Cart;
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

Route::get('/', function () {
    return view('index');
});
Route::get('/', [MainController::class, 'view']);

Route::get('/signup', [SignUpController::class, 'view']);
Route::post('/signup', [SignUpController::class, 'SignUp']);
Route::get('/login', [LoginController::class, 'view']);
Route::post('/login', [LoginController::class, 'LogIn']);
Route::get('/logout', [LogoutController::class, 'LogOut']);

Route::get('/cart', [CartController::class, 'CartList']);
Route::get('/cart/add/{id}', [CartController::class, 'AddToCart']);
Route::get('/cart/remove/{id}', [CartController::class, 'RemoveCart']);
Route::get('/cart/clear', [CartController::class, 'ClearCart']);

Route::middleware('auth')->group(function() {
    Route::get('/cart/buy', [CartController::class, 'BuyCart']);
    Route::post('/cart/buy', [CartController::class, 'PostBuyCart']);
    Route::get('/cart/buy/{id}', [CartController::class, 'BuyProduct']);
    Route::post('/cart/buy/{id}', [CartController::class, 'PostBuyCartID']);
});

Route::middleware('admin')->group(function() {
    Route::get('/admin', [AdminController::class, 'Index']);
    Route::get('/admin/add/user', [AdminController::class, 'AddUser']);
    Route::post('/admin/add/user', [AdminController::class, 'PostAddUser']);
    Route::get('/admin/edit/user', [AdminController::class, 'EditUsers']);
    Route::get('/admin/user/remove/{id}', [AdminController::class, 'RemoveUser']);
    Route::get('/admin/user/edit/{id}', [AdminController::class, 'EditUser']);
    Route::post('/admin/user/edit/{id}', [AdminController::class, 'PostEditUser']);
    Route::get('/admin/add/product', [AdminController::class, 'AddProduct']);
    Route::post('/admin/add/product', [AdminController::class, 'PostAddProduct']);
    Route::get('/admin/edit/product', [AdminController::class, 'EditProducts']);
    Route::get('/admin/product/remove/{id}', [AdminController::class, 'RemoveProduct']);
    Route::get('/admin/product/edit/{id}', [AdminController::class, 'EditProduct']);
    Route::post('/admin/product/edit/{id}', [AdminController::class, 'PostEditProduct']);
    Route::get('/admin/orders', [AdminController::class, 'OrdersView']);
    Route::get('admin/order/completed/{id}', [AdminController::class, "CompleteOrder"]);
});