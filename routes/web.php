<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MoMoController;
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
Route::get('cart',         [CartController::class, 'cart'])->name('cart')->middleware('auth');

Auth::routes();

Route::post('/apply-discount', [BookingController::class, 'applyDiscount'])->name('apply-discount');
Route::post('store', [BookingController::class, 'store'])->name('store');

Route::post('online_checkout', [MoMoController::class, 'online_checkout'])->name('online_checkout');

Route::get('thanks',         [HomeController::class, 'thanks'])->name('thanks');

// Route::get('thanks', function () {
// echo "thank công";
// });
