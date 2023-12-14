<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\OrdersController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('landingpage');
// });
Route::get('/pembayaran', function () {
    return view('pembayaran');
});
Route::get('/pemesanan', function () {
    return view('pemesanan');
});
Route::get('/profiluser', function () {
    return view('profiluser');
});


// Route::get('/login', function () {
//     return view('auth.login');
// });

// Route::get('/register', function () {
//     return view('auth.register');
// });



// Auth
Route::GET('login', [UserController::class, 'login'])->name('login');
Route::POST('login', [UserController::class, 'login_action'])->name('login.action');

Route::GET('register', [UserController::class, 'register'])->name('register');
Route::POST('register', [UserController::class, 'register_action'])->name('register.action');

Route::GET('logout', [UserController::class, 'logout'])->name('logout');


// Dashboard

// Route:: GET('dashboard', function() {
//     return view('admin.dashboard');
// });
Route::GET('dashboard', [DashboardController::class, 'sumData']);
Route::GET('dashboard-user', [DashboardController::class, 'getAllUserData'])->name('dashboardUsers');
Route::GET('dashboard-items', [DashboardController::class, 'getAllItemsData'])->name('dashboardItems');
Route::GET('dashboard-orders', [DashboardController::class, 'getAllOrdersData']);



// Items
Route::GET('/', [ItemsController::class, 'getAllItemsData']);
Route::GET('/profiluser', [ItemsController::class, 'getAllOrdersData']);
Route::get('/pemesanan/{id}', [ItemsController::class, 'getdetailpemesanan']);
Route::post('/pemesanan/{id}', [ItemsController::class, 'postdetailpemesanan'])->name('pesan');
Route::post('/bukti/{id}', [ItemsController::class, 'bukti'])->name('bukti');



// ================================== Route Dashboard ==================================

// CRUD Users
Route::GET('add/user', [DashboardController::class, 'add_user'])->name('add_user');
Route::POST('add/user', [DashboardController::class, 'add_user_action'])->name('add_user_action');
Route::put('update/user/{id}', [DashboardController::class, 'edit_user'])->name('update_user');
Route::get('/delete/{id}', [DashboardController::class, 'delete_user'])->name('delete_user');


// CRUD Item
Route::GET('add/items', [DashboardController::class, 'items'])->name('add_data');
Route::POST('add/items', [DashboardController::class, 'add_items'])->name('add_data.action');
Route::put('update/item/{id}', [DashboardController::class, 'edit_items'])->name('update_item');
Route::GET('/deleteitem/{id}', [DashboardController::class, 'delete_item'])->name('delete_item');

// CRUD Orders
Route::GET('add/order', [DashboardController::class, 'order'])->name('add_order');
Route::POST('add/order', [DashboardController::class, 'add_order'])->name('add_order_action');


Route::GET('/myprofile', [OrdersController::class, 'getAllOrdersData']);
Route::get('/pemesanan/{id}', [OrdersController::class, 'getdetailpemesanan']);
Route::post('/pemesanan/{id}', [OrdersController::class, 'postdetailpemesanan'])->name('pesan');
Route::post('/bukti/{id}', [OrdersController::class, 'bukti'])->name('bukti');
// Dashboard

Route::GET('add/items', [ItemsController::class, 'items'])->name('add_data');
Route::POST('add/items', [ItemsController::class, 'add_items'])->name('add_data.action');


