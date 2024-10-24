<?php

use App\Http\Middleware\admin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginRegisterController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
    return view('welcome');
})->name('home');

Route::controller(LoginRegisterController::class)->group(function(){
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->name('logout');
    Route::get('/dashboard_admin', 'test')->name('dashboard_admin'); // Corrected here
});

// Route::get(Dashboard)
// Route::get('restricted', function () {
//     return 'You are an admin!';
// })->middleware('admin'); 

// Route::middleware(['auth'])->group(function() {
//     Route::get('/dashboard', [LoginRegisterController::class, 'dashboard'])->name('dashboard');
//     Route::get('/logout', [LoginRegisterController::class, 'logout']);
//     Route::post('/logout', [LoginRegisterController::class, 'logout'])->name('logout');
    
//     // Route dengan middleware admin
//     Route::middleware(['admin'])->group(function() {
//         Route::get('//dashboard_admin', [LoginRegisterController::class, '/dashboard_admin'])->name('dashboard_admin');
// });
// });
