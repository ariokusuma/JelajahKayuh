<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('landingpage');
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
Route::GET('dashboard-user', [DashboardController::class, 'getAllUserData']);
Route::GET('dashboard-items', [DashboardController::class, 'getAllItemsData']);
Route::GET('dashboard-orders', [DashboardController::class, 'getAllOrdersData']);

// Dashboard
Route::GET('add/items', [DashboardController::class, 'items'])->name('add_data');
Route::POST('add/items', [DashboardController::class, 'add_items'])->name('add_data.action');
