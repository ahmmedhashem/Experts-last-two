<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\ExpertsDataController;
use App\Http\Controllers\Admin\TermsController;



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

define('PAGINATION_COUNT', 8);



Route::group(['namespace' => 'Admin','prefix' => 'admin'], function() {

    Route::group(['middleware' => 'guest:admin'],function() {
        Route::get('login', [LoginController::class, 'getLogin']) -> name('admin.login');
        Route::post('login', [LoginController::class, 'Login']) -> name('admin.post.login');
    });

    Route::group(['middleware' => 'auth:admin'],function() {
        Route::get('/', [DashboardController::class, 'index']) -> name('admin.dashboard');
        Route::get('logout', [LoginController::class, 'logout']) -> name('admin.logout');

        Route::group(['prefix' => 'profile'],function() {
            Route::get('edit', [ProfileController::class, 'edit']) -> name('edit.profile');
            Route::put('update', [ProfileController::class, 'update']) -> name('update.profile');
        });

        Route::group(['prefix' => 'categories'],function() {
            Route::get('/', [CategoriesController::class,'index'])->name('admin.categories');
            Route::get('create', [CategoriesController::class,'create'])->name('admin.create.category');
            Route::post('store', [CategoriesController::class,'store'])->name('admin.store.category');
            Route::get('edit/{id}', [CategoriesController::class,'edit'])->name('admin.edit.category');
            Route::put('update/{id}', [CategoriesController::class,'update'])->name('admin.update.category');
            Route::get('delete/{id}', [CategoriesController::class,'delete'])->name('admin.delete.category');
        });

        Route::group(['prefix' => 'data'],function() {
            Route::get('/', [ExpertsDataController::class,'index'])->name('admin.experts.data');
        });
        Route::group(['prefix' => 'experts'],function() {
            Route::get('/{id}', [ExpertsDataController::class,'getExpertByArea'])->name('admin.experts.by.area');
            Route::get('cv/{id}', [ExpertsDataController::class,'getExpertData'])->name('admin.experts.get.data');
            Route::post('cv-close', [ExpertsDataController::class,'closecv'])->name('close.cv');

        });

        Route::group(['prefix' => 'terms'],function() {
            Route::get('/', [TermsController::class,'index'])->name('admin.terms');
            Route::put('update/{id}', [TermsController::class,'update'])->name('admin.update.terms');
        });

    });

});

