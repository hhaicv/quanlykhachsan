<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\PromotionController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')
    ->as('admin.')
    ->group(function () {
        Route::get('/', function () {
            return view('admin.dashboard');
        })->name('dashboard');
        Route::prefix('tags')
            ->as('tags.')
            ->group(function () {
                Route::get('/',                 [TagController::class, 'index'])->name('index');
                Route::get('create',            [TagController::class, 'create'])->name('create');
                Route::post('store',            [TagController::class, 'store'])->name('store');
                Route::get('{id}/edit',         [TagController::class, 'edit'])->name('edit');
                Route::put('{id}/update',       [TagController::class, 'update'])->name('update');
                Route::get('{id}/destroy',      [TagController::class, 'destroy'])->name('destroy');
            });
        Route::prefix('promotions')
            ->as('promotions.')
            ->group(function () {
                Route::get('/',                 [PromotionController::class, 'index'])->name('index');
                Route::get('create',            [PromotionController::class, 'create'])->name('create');
                Route::post('store',            [PromotionController::class, 'store'])->name('store');
                Route::get('{id}/edit',         [PromotionController::class, 'edit'])->name('edit');
                Route::put('{id}/update',       [PromotionController::class, 'update'])->name('update');
                Route::get('{id}/destroy',      [PromotionController::class, 'destroy'])->name('destroy');
            });

        Route::prefix('banners')
            ->as('banners.')
            ->group(function () {
                Route::get('/',                 [BannerController::class, 'index'])->name('index');
                Route::get('create',            [BannerController::class, 'create'])->name('create');
                Route::post('store',            [BannerController::class, 'store'])->name('store');
                Route::get('{id}/edit',         [BannerController::class, 'edit'])->name('edit');
                Route::put('{id}/update',       [BannerController::class, 'update'])->name('update');
                Route::get('{id}/destroy',      [BannerController::class, 'destroy'])->name('destroy');
            });

        Route::prefix('rooms')
            ->as('rooms.')
            ->group(function () {
                Route::get('/',                 [RoomController::class, 'index'])->name('index');
                Route::get('create',            [RoomController::class, 'create'])->name('create');
                Route::post('store',            [RoomController::class, 'store'])->name('store');
                Route::get('{id}/show',         [RoomController::class, 'show'])->name('show');
                Route::get('{id}/edit',         [RoomController::class, 'edit'])->name('edit');
                Route::put('{id}/update',       [RoomController::class, 'update'])->name('update');
                Route::get('{id}/destroy',      [RoomController::class, 'destroy'])->name('destroy');
            });
        Route::prefix('services')
            ->as('services.')
            ->group(function () {
                Route::get('/',                 [ServiceController::class, 'index'])->name('index');
                Route::get('create',            [ServiceController::class, 'create'])->name('create');
                Route::post('store',            [ServiceController::class, 'store'])->name('store');
                Route::get('{id}/show',         [ServiceController::class, 'show'])->name('show');
                Route::get('{id}/edit',         [ServiceController::class, 'edit'])->name('edit');
                Route::put('{id}/update',       [ServiceController::class, 'update'])->name('update');
                Route::get('{id}/destroy',      [ServiceController::class, 'destroy'])->name('destroy');
            });
        Route::resource('users', UserController::class);
        Route::prefix('users')
            ->as('users.')
            ->group(function () {
                Route::get('{id}/destroy',      [UserController::class, 'destroy'])->name('destroy');
            });
    });
