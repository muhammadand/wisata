<?php
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TiketController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\WisataController;
use App\Http\Controllers\SejarahController;
use App\Http\Controllers\ProductCategoryController;
// routes/web.php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\SeniBudayaController;
use App\Http\Controllers\KulinerController;
use App\Http\Controllers\KomunitasController;
use App\Http\Controllers\FeedbackController;

Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');
Route::delete('/feedbacks/{id}', [FeedbackController::class, 'destroy'])->name('feedback.destroy');


Route::resource('komunitas', KomunitasController::class);
Route::get('/sejarah/pdf', [SejarahController::class, 'generatePdf'])->name('sejarah.pdf');


// Routes for Kuliner
Route::resource('kuliners', KulinerController::class);
Route::resource('seni_budaya', SeniBudayaController::class);
Route::resource('products', ProductController::class);
Route::resource('sejarah', SejarahController::class);
Route::get('category/{id}', [WisataController::class, 'categoryWisata'])->name('category.wisata');
Route::resource('categories', CategoryController::class);

Route::resource('wisata', WisataController::class);

// Route::prefix('wisata')->name('wisata.')->group(function () {
//     Route::get('/', [WisataController::class, 'index'])->name('index');
//     Route::get('/create', [WisataController::class, 'create'])->name('create');
//     Route::post('/', [WisataController::class, 'store'])->name('store');
//     Route::get('/{wisata}', [WisataController::class, 'show'])->name('show');
//     Route::get('/{wisata}/edit', [WisataController::class, 'edit'])->name('edit');
//     Route::put('/{wisata}', [WisataController::class, 'update'])->name('update');
//     Route::delete('/{wisata}', [WisataController::class, 'destroy'])->name('destroy');
// });



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
// home user
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('about', [HomeController::class, 'about'])->name('about');
Route::get('contact', [HomeController::class, 'contact'])->name('contact');

// home admin
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::get('/admin/orders', [AdminController::class, 'orders'])->name('admin.orders');
Route::get('/admin/orders', [AdminController::class, 'orders'])->name('admin.orders');


Route::get('register', [UserController::class, 'register'])->name('register');
Route::post('register', [UserController::class, 'register_action'])->name('register.action');
Route::get('login', [UserController::class, 'login'])->name('login');
Route::post('login', [UserController::class, 'login_action'])->name('login.action');
Route::get('password', [UserController::class, 'password'])->name('password');
Route::post('password', [UserController::class, 'password_action'])->name('password.action');
Route::get('logout', [UserController::class, 'logout'])->name('logout');


// tiket
Route::resource('tiket', TiketController::class);
Route::get('/tikets', [TiketController::class, 'index'])->name('tikets.index');
Route::put('/tikets/{tiket}', [TiketController::class, 'update'])->name('tikets.update');





// order
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::get('/orders/create/{tiket}', [OrderController::class, 'create'])->name('orders.create');
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
Route::resource('orders', OrderController::class);
