<?php

use Illuminate\Support\Facades\Auth;
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
//route hiển thị view danh mục electronic store
Route::get('/shop-category/{category_id}','Frontend\CategoryController@index');
//route hiển thị view nhà sản xuất electronic store
Route::get('/shop-manufacturer/{manufacturer_id}','Frontend\ManufacturerController@index');

Route::prefix('admin')->group(function() {
    // Gom nhóm các route cho phần admin

    //Route đăng nhập, đăng ký cho admin


    Route::get('/', 'Backend\DashboardController@index')->name('admin.dashboard');

    // View đăng nhập thành công

    Route::get('/dashboard', 'Backend\DashboardController@index')->name('admin.dashboard');

    Route::get('/register', 'Backend\DashboardController@register');
    Route::get('/login', 'Backend\DashboardController@login');
    Route::get('/logout', 'Backend\DashboardController@logout');

    Route::post('/register', 'Backend\DashboardController@registerAdmin');
    Route::post('/login', 'Backend\DashboardController@loginAdmin');



    //route hiển thị category
    Route::get('/product_category', 'Backend\CategoryProductController@index');
    Route::get('/product_category/create', 'Backend\CategoryProductController@createpage');
    Route::get('/product_category/edit/{category_id}', 'Backend\CategoryProductController@editpage');
    //route hiển thị product
    Route::get('/product', 'Backend\ProductController@index');
    Route::get('/product/create', 'Backend\ProductController@createpage');
    Route::get('/product/edit/{product_id}', 'Backend\ProductController@editpage');
    //route hiển thị manufacturer
    Route::get('/manufacturer', 'Backend\ManufacturerController@index');
    Route::get('/manufacturer/create', 'Backend\ManufacturerController@createpage');
    Route::get('/manufacturer/edit/{manufacturer_id}', 'Backend\ManufacturerController@editpage');
    //route hiển thị thuộc tính sản phẩm
    Route::get('/attribute', 'Backend\AttributeController@index');
    Route::get('/attribute/create', 'Backend\AttributeController@createpage');
    Route::get('/attribute/edit/{attribute_id}', 'Backend\AttributeController@editpage');

    //route chức năng category
    Route::post('/product_category/create', 'Backend\CategoryProductController@create');
    Route::post('/product_category/edit/{category_id}', 'Backend\CategoryProductController@edit');
    Route::delete('/product_category/delete/{category_id}', 'Backend\CategoryProductController@delete');
    //route chức năng product
    Route::post('/product/create', 'Backend\ProductController@create');
    Route::post('/product/edit/{product_id}', 'Backend\ProductController@edit');
    Route::delete('/product/delete/{product_id}', 'Backend\ProductController@delete');
    //route chức năng manufacturer
    Route::post('/manufacturer/create', 'Backend\ManufacturerController@create');
    Route::post('/manufacturer/edit/{manufacturer_id}', 'Backend\ManufacturerController@edit');
    Route::delete('/manufacturer/delete/{manufacturer_id}', 'Backend\ManufacturerController@delete');
    //route chức năng thuộc tính sản phẩm
    Route::post('/attribute/create', 'Backend\AttributeController@create');
    Route::post('/attribute/edit/{attribute_id}', 'Backend\AttributeController@edit');
    Route::delete('/attribute/delete/{attribute_id}', 'Backend\AttributeController@delete');
    //
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


