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
})->middleware('role');
Route::get('/pemesanan', function () {
    return view('pemesanan');
})->middleware('role');
Route::get('/profiluser', function () {
    return view('profiluser');
})->middleware('role');


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
Route::GET('dashboard', [DashboardController::class, 'sumData'])->middleware('role', 'admin');
Route::GET('dashboard-user', [DashboardController::class, 'getAllUserData'])->name('dashboardUsers')->middleware('role', 'admin');
Route::GET('dashboard-items', [DashboardController::class, 'getAllItemsData'])->name('dashboardItems')->middleware('role', 'admin');
Route::GET('dashboard-items/cari', [DashboardController::class, 'cari'])->name('cari')->middleware('role', 'admin');
Route::GET('dashboard-category', [DashboardController::class, 'getAllCategoryData'])->name('dashboardCategory')->middleware('role', 'admin');
Route::GET('dashboard-orders', [DashboardController::class, 'getAllOrdersData'])->name('dashboardOrders')->middleware('role', 'admin');
Route::GET('dashboard-penalty', [DashboardController::class, 'getAllPenaltyData'])->name('dashboardPenalty')->middleware('role', 'admin');



// Items
Route::GET('/', [ItemsController::class, 'getAllItemsData'])->middleware('role');

Route::GET('/myprofile', [OrdersController::class, 'getAllOrdersData'])->middleware('role');
Route::get('/pemesanan/{id}', [OrdersController::class, 'getdetailpemesanan'])->middleware('role');
Route::post('/pemesanan/{id}', [OrdersController::class, 'postdetailpemesanan'])->name('pesan');
Route::post('/bukti/{id}', [OrdersController::class, 'bukti'])->name('bukti')->middleware('role');
Route::get('/pembayaran/{id}' , [OrdersController::class , 'payment'])->name('payment')->middleware('role');


Route::put('/transactions/{id}', [OrdersController::class, 'update'])->name('transactions.update')->middleware('role');
Route::delete('/transactions/{id}', [OrdersController::class, 'destroy'])->name('transactions.destroy')->middleware('role');



// ================================== Route Dashboard ==================================
Route::middleware(['role'])->group(function () {

    // CRUD Users
    Route::GET('add/user', [DashboardController::class, 'add_user'])->name('add_user')->middleware('role', 'admin');
    Route::POST('add/user', [DashboardController::class, 'add_user_action'])->name('add_user_action')->middleware('role', 'admin');
    Route::put('update/user/{id}', [DashboardController::class, 'edit_user'])->name('update_user')->middleware('role', 'admin');
    Route::get('/delete/{id}', [DashboardController::class, 'delete_user'])->name('delete_user')->middleware('role', 'admin');


    // CRUD Item
    Route::GET('add/items', [DashboardController::class, 'items'])->name('add_data')->middleware('role', 'admin');
    Route::POST('add/items', [DashboardController::class, 'add_items'])->name('add_data.action')->middleware('role', 'admin');
    Route::put('update/item/{id}', [DashboardController::class, 'edit_items'])->name('update_item')->middleware('role', 'admin');
    Route::GET('/deleteitem/{id}', [DashboardController::class, 'delete_item'])->name('delete_item')->middleware('role', 'admin');

    // CRUD Orders
    Route::GET('add/order', [DashboardController::class, 'order'])->name('add_order')->middleware('role', 'admin');
    Route::POST('add/order', [DashboardController::class, 'add_order'])->name('add_order_action')->middleware('role', 'admin');
    Route::put('update_order/{id}', [DashboardController::class, 'update_order'])->name('update_order')->middleware('role', 'admin');


    // CRUD Categories
    // Route::GET('add/category', [DashboardController::class, 'items'])->name('add_category');
    Route::POST('add/category', [DashboardController::class, 'add_category'])->name('add_category')->middleware('role', 'admin');
    Route::put('update/category/{id}', [DashboardController::class, 'edit_category'])->name('update_category')->middleware('role', 'admin');
    Route::GET('/delete/category/{id}', [DashboardController::class, 'delete_category'])->name('delete_category')->middleware('role', 'admin');


});




Route::GET('/myprofile', [OrdersController::class, 'getAllOrdersData'])->middleware('role');
// Route::GET('/myprofile/edit', [OrdersController::class, 'edit_user']);
Route::put('myprofile/edit/{id}', [OrdersController::class, 'edit_user'])->name('edit_rofile')->middleware('role');

Route::get('/pemesanan/{id}', [OrdersController::class, 'getdetailpemesanan'])->middleware('role');
Route::post('/pemesanan/{id}', [OrdersController::class, 'postdetailpemesanan'])->name('pesan')->middleware('role');
Route::put('/myprofile/{id}', [OrdersController::class, 'update_order_user'])->name('update_order_user')->middleware('role');
Route::post('/bukti/{id}', [OrdersController::class, 'bukti'])->name('bukti')->middleware('role');
// Dashboard

Route::GET('add/items', [ItemsController::class, 'items'])->name('add_data')->middleware('role');
Route::POST('add/items', [ItemsController::class, 'add_items'])->name('add_data.action')->middleware('role');



