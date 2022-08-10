<?php

use App\Http\Controllers\OuterController;
use App\Http\Controllers\UserController;
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
// Home page
Route::controller(OuterController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/post/{id}', 'post_detail')->name('post_detail');
    Route::get('/about', 'about_me')->name('about_me');
    Route::post('/search', 'search_post')->name('search_post');
});

Route::middleware(['guest'])->group(function () {
    Route::controller(UserController::class)->group(function () {
        Route::get('/login', 'login_form')->name('login_form');
        Route::post('/login', 'login_validate')->name('login_action');

        Route::get('/admin', 'register_form')->name('register_form');
        Route::post('/admin', 'register_action')->name('register_action');
    });
});

// User page
Route::middleware(['auth'])->group(function () {

    Route::controller(UserController::class)->group(function () {
        Route::get('/post/edit/{id}', 'post_edit_form')->name('post_edit_form');
        Route::post('/post/update', 'post_update_action')->name('post_update_action');
        Route::post('/post/add', 'post_add')->name('post_add');
        Route::post('/post/delete', 'post_delete_action')->name('post_delete_action');

        Route::get('/dashboard', 'dashboard_index')->name('dashboard_index');
        Route::post('/dashboard', 'dashboard_logout')->name('dashboard_logout');
    });
});