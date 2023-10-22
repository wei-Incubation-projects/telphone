<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix('back')->group(function () {

    Route::prefix('auth')->name('auth.')->controller(\App\Http\Controllers\Back\AuthController::class)->group(function () {
        Route::post('login', 'authenticate')->name('login');
        Route::post('info', 'myInfo')->name('info')->middleware('auth:sanctum');
        Route::post('menus', 'menus')->name('menus')->middleware('auth:sanctum');
        Route::post('password', 'password')->name('password')->middleware('auth:sanctum');
        Route::post('logout', 'logout')->name('logout')->middleware('auth:sanctum');
        Route::post('refresh', 'refresh')->name('refresh')->middleware('auth:sanctum');

    });

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::prefix('user')->name('user.')->middleware('auth:sanctum')
            ->controller(\App\Http\Controllers\Back\AdminUserController::class)->group(function () {
                Route::post('index', 'index')->name('index');
                Route::post('create', 'store')->name('create');
                Route::post('display', 'show')->name('display');
                Route::post('modify', 'update')->name('modify');
                Route::post('delete', 'destroy')->name('delete');
            });
        Route::prefix('role')->name('role.')->middleware('auth:sanctum')
            ->controller(\App\Http\Controllers\Back\AdminRoleController::class)->group(function () {
                Route::post('index', 'index')->name('index');
                Route::post('create', 'store')->name('create');
                Route::post('display', 'show')->name('display');
                Route::post('modify', 'update')->name('modify');
                Route::post('delete', 'destroy')->name('delete');
                Route::post('list', 'getAll')->name('list');
            });
        Route::prefix('menu')->name('menu.')->middleware('auth:sanctum')
            ->controller(\App\Http\Controllers\Back\AdminMenuController::class)->group(function () {
                Route::post('index', 'index')->name('index');
                Route::post('create', 'store')->name('create');
                Route::post('display', 'show')->name('display');
                Route::post('modify', 'update')->name('modify');
                Route::post('delete', 'destroy')->name('delete');
                Route::post('tree', 'tree')->name('tree');
            });

    });

    Route::prefix('phone')->name('phone.')->middleware('auth:sanctum')
        ->controller(\App\Http\Controllers\Back\PhoneController::class)->group(function () {
            Route::post('index', 'index')->name('index');
            Route::post('create', 'store')->name('create');
            Route::post('export', 'export')->name('export');
            Route::post('clear', 'clear')->name('clear');
            Route::post('delete', 'destroy')->name('delete');
            Route::post('upload', 'upload')->name('upload');
            Route::post('batch', 'batchs')->name('batch');
        });

    Route::prefix('member')->name('member.')->group(function () {
        Route::prefix('user')->name('user.')->middleware('auth:sanctum')
            ->controller(\App\Http\Controllers\Back\UserController::class)->group(function () {
                Route::post('index', 'index')->name('index');
                Route::post('create', 'store')->name('create');
                Route::post('display', 'show')->name('display');
                Route::post('modify', 'update')->name('modify');
                Route::post('delete', 'destroy')->name('delete');
                Route::post('batch', 'batch')->name('batch');
                Route::post('stat', 'stat')->name('stat');
            });
        Route::prefix('leader')->name('leader.')->middleware('auth:sanctum')
            ->controller(\App\Http\Controllers\Back\LeaderController::class)->group(function () {
                Route::post('index', 'index')->name('index');
                Route::post('create', 'store')->name('create');
                Route::post('display', 'show')->name('display');
                Route::post('modify', 'update')->name('modify');
                Route::post('delete', 'destroy')->name('delete');
                Route::post('list', 'all')->name('list');
                Route::post('stat', 'stat')->name('stat');
            });
    });

    Route::prefix('stat')->name('stat.')->middleware('auth:sanctum')
        ->controller(\App\Http\Controllers\Back\StatController::class)->group(function () {
            Route::post('summary', 'summary')->name('summary');
            Route::post('report', 'report')->name('report');
            Route::post('batch', 'batch')->name('batch');
        });
});
