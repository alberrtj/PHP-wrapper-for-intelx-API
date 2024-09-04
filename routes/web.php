<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('logout', [App\Http\Controllers\Site\HomeController::class, 'anyLogout'])->name('logout');
Route::group(['middleware' => ['auth']], function () {
    Route::get('view-log', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
});

//---------------------------------------- Admin -------------------------------------------

Route::group(array('prefix' => config('site.admin')), function () {

    Route::get('login', [LoginController::class, 'getLogin'])->name('login');
    Route::post('login', [LoginController::class, 'postLogin'])->name('login');

    Route::group(array('middleware' => ['AdminPermission'], 'namespace' => 'Admin'), function () {
        Route::get('/', [HomeController::class, 'getIndex'])->name('admin.dashboard');
        Route::get('/read/{stId}/{syId}/{name}/{buck}', [HomeController::class, 'getRead'])->name('admin.read');
    });
});

Route::get('/', [App\Http\Controllers\Site\HomeController::class, 'getIndex'])->name('site.home');


