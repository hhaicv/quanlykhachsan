<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
//     $rooms = \App\Models\room::query()->get();
//     $service = \App\Models\Service::query()->get();
//     return view('client.home.index', compact('service', 'rooms'));
// });
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('/');
Route::get('{id}/show',         [HomeController::class, 'show'])->name('show');
Route::get('room',         [HomeController::class, 'room'])->name('room');
Route::get('cart',         [CartController::class, 'cart'])->name('cart');
// Route::get('booking',         [HomeController::class, 'booking'])->name('booking');

Auth::routes();

// Route::get('/', function () {

//     return view('welcome');
// });
