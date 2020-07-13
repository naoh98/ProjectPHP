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
//route hiển thị view electronic store
Route::get('/','Frontend\IndexController@index')->name('homepage');


Route::prefix('admin')->group(function() {
    // Gom nhóm các route cho phần admin

    //Route đăng nhập, đăng ký cho admin


    Route::get('/', 'Backend\DashboardController@index')->name('admin.dashboard');

    // View đăng nhập thành công

    Route::get('/dashboard', 'Backend\DashboardController@index')->name('admin.dashboard');

    Route::get('/register', 'Backend\DashboardController@register');
    Route::get('/login', 'Backend\DashboardController@login');


    Route::post('/register', 'Backend\DashboardController@registerAdmin');
    Route::post('/login', 'Backend\DashboardController@loginAdmin');
    Route::post('/logout', 'Backend\DashboardController@logout');


    //route hiển thị category
    Route::get('/product_category', 'Backend\CategoryProductController@index');
    Route::get('/product_category/create', 'Backend\CategoryProductController@createpage');
    Route::get('/product_category/edit/{category_id}', 'Backend\CategoryProductController@editpage');
    Route::get('/product_category/delete/{category_id}', 'Backend\CategoryProductController@delpage');
    //route hiển thị product
    Route::get('/product', 'Backend\ProductController@index');
    Route::get('/product/create', 'Backend\ProductController@createpage');
    Route::get('/product/edit/{product_id}', 'Backend\ProductController@editpage');
    Route::get('/product/delete/{product_id}', 'Backend\ProductController@delpage');

    //route chức năng category
    Route::post('/product_category/create', 'Backend\CategoryProductController@create');
    Route::post('/product_category/edit/{category_id}', 'Backend\CategoryProductController@edit');
    Route::post('/product_category/delete/{category_id}', 'Backend\CategoryProductController@delete');
    //route chức năng product
    Route::post('/product/create', 'Backend\ProductController@create');
    Route::post('/product/edit/{product_id}', 'Backend\ProductController@edit');
    Route::post('/product/delete/{product_id}', 'Backend\ProductController@delete');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
