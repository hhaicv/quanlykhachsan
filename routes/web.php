<?php

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

Route::get('/', function () {
    $rooms = \App\Models\room::query()->get();
    $service = \App\Models\Service::query()->get();
    return view('client.home.index', compact('service', 'rooms'));
});

Route::prefix('client')
    ->as('client.')
    ->group(function () {
        Route::prefix('home')
            ->as('home.')
            ->group(function () {
                Route::get('{id}/show',         [HomeController::class, 'show'])->name('show');
            });
    });

Auth::routes();

// Route::get('/', function () {

//     return view('welcome');
// });

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
