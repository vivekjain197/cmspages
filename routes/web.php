<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::get('/users/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('/users/logout', [App\Http\Controllers\AdminController::class, 'logout'])->name('logout');

        Route::get('/pages/manage', [App\Http\Controllers\PagesController::class, 'manage'])->name('manage');
        Route::get('/pages/create', [App\Http\Controllers\PagesController::class, 'create'])->name('create');
        Route::post('/pages/store', [App\Http\Controllers\PagesController::class, 'store'])->name('store');
        Route::get('/pages/edit/{id}', [App\Http\Controllers\PagesController::class, 'edit'])->name('edit');
        Route::post('/pages/update/{id}', [App\Http\Controllers\PagesController::class, 'update'])->name('update');
        Route::get('/pages/delete/{id}', [App\Http\Controllers\PagesController::class, 'delete'])->name('delete');

        Route::get('/categories/manage', [App\Http\Controllers\CategoriesController::class, 'manage'])->name('cmanage');
        Route::get('/categories/create', [App\Http\Controllers\CategoriesController::class, 'create'])->name('ccreate');
        Route::post('/categories/store', [App\Http\Controllers\CategoriesController::class, 'store'])->name('cstore');
        Route::get('/categories/edit/{id}', [App\Http\Controllers\CategoriesController::class, 'edit'])->name('cedit');
        Route::post('/categories/update/{id}', [App\Http\Controllers\CategoriesController::class, 'update'])->name('cupdate');
        Route::get('/categories/delete/{id}', [App\Http\Controllers\CategoriesController::class, 'delete'])->name('cdelete');
    });
    
});
Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/users/login', [App\Http\Controllers\AdminController::class, 'adminLogin'])->name('adminLogin');
    Route::post('/users/post_login', [App\Http\Controllers\AdminController::class, 'post_login'])->name('post_login');
});

Route::get('/', [App\Http\Controllers\PagesController::class, 'home'])->name('home');

Route::get('/{slug}', [App\Http\Controllers\PagesController::class, 'cmspage'])->where('slug', '.*');

// Route::get('/', function () {
//     return view('welcome');
// });
