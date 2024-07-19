<?php

use App\Http\Controllers\HomeController;
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
    $data = \App\Models\RoomType::query()->latest('id')->get();
    $service = \App\Models\Service::query()->get();
    return view('client.home.index', compact('data','service'));
});

// Route::prefix('client')
//     ->as('client.')
//     ->group(function () {
//         Route::get('/', function () {
//             return view('client.index');
//         })->name('index');
        // Route::prefix('room_types')
        //     ->as('room_types.')
        //     ->group(function () {
        //         Route::get('/',                 [RoomTypeController::class, 'index'])->name('index');
        //         Route::get('create',            [RoomTypeController::class, 'create'])->name('create');
        //         Route::post('store',            [RoomTypeController::class, 'store'])->name('store');
        //         Route::get('{id}/edit',         [RoomTypeController::class, 'edit'])->name('edit');
        //         Route::put('{id}/update',       [RoomTypeController::class, 'update'])->name('update');
        //         Route::get('{id}/destroy',      [RoomTypeController::class, 'destroy'])->name('destroy');
        //     });
    // });
