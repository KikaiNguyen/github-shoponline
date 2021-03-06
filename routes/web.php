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

Route::get('/home', function () {
    return view('home');
});
Route::prefix('admin')->group(function () {
    Route::get('/', [
        'as' => 'admin.login',
        'uses' => 'AdminController@loginAdmin'
    ]);
    Route::post('/', [
        'as' => 'admin.post-login',
        'uses' => 'AdminController@postLoginAdmin'
    ]);
    Route::prefix('categories')->group(function () {
        Route::get('/',  [
            'as' => 'categories.index',
            'uses' => 'AdminCategoryController@index'
        ]);
        Route::get('/create',  [
            'as' => 'categories.create',
            'uses' => 'AdminCategoryController@create'
        ]);
        Route::post('/store',  [
            'as' => 'categories.store',
            'uses' => 'AdminCategoryController@store'
        ]);
        Route::get('/edit/{id}',  [
            'as' => 'categories.edit',
            'uses' => 'AdminCategoryController@edit'
        ]);
        Route::post('/update/{id}',  [
            'as' => 'categories.update',
            'uses' => 'AdminCategoryController@update'
        ]);
        Route::get('/delete/{id}',  [
            'as' => 'categories.delete',
            'uses' => 'AdminCategoryController@delete'
        ]);
    });
    Route::prefix('menus')->group(function () {
        Route::get('/',  [
            'as' => 'menus.index',
            'uses' => 'AdminMenuController@index'
        ]);
        Route::get('/create',  [
            'as' => 'menus.create',
            'uses' => 'AdminMenuController@create'
        ]);
        Route::post('/store',  [
            'as' => 'menus.store',
            'uses' => 'AdminMenuController@store'
        ]);
        Route::get('/edit/{id}',  [
            'as' => 'menus.edit',
            'uses' => 'AdminMenuController@edit'
        ]);
        Route::post('/update/{id}',  [
            'as' => 'menus.update',
            'uses' => 'AdminMenuController@update'
        ]);
        Route::get('/delete/{id}',  [
            'as' => 'menus.delete',
            'uses' => 'AdminMenuController@delete'
        ]);
    });
    Route::prefix('products')->group(function () {
        Route::get('/',  [
            'as' => 'products.index',
            'uses' => 'AdminProductController@index'
        ]);
        Route::get('/create',  [
            'as' => 'products.create',
            'uses' => 'AdminProductController@create'
        ]);
        Route::post('/store',  [
            'as' => 'products.store',
            'uses' => 'AdminProductController@store'
        ]);
        Route::get('/edit/{id}',  [
            'as' => 'products.edit',
            'uses' => 'AdminProductController@edit'
        ]);
        Route::post('/update/{id}',  [
            'as' => 'products.update',
            'uses' => 'AdminProductController@update'
        ]);
        Route::get('/delete/{id}',  [
            'as' => 'products.delete',
            'uses' => 'AdminProductController@delete'
        ]);
    });
    Route::prefix('sliders')->group(function () {
        Route::get('/',  [
            'as' => 'sliders.index',
            'uses' => 'AdminSliderController@index'
        ]);
        Route::get('/create',  [
            'as' => 'sliders.create',
            'uses' => 'AdminSliderController@create'
        ]);
        Route::post('/store',  [
            'as' => 'sliders.store',
            'uses' => 'AdminSliderController@store'
        ]);
        Route::get('/edit/{id}',  [
            'as' => 'sliders.edit',
            'uses' => 'AdminSliderController@edit'
        ]);
        Route::post('/update/{id}',  [
            'as' => 'sliders.update',
            'uses' => 'AdminSliderController@update'
        ]);
        Route::get('/delete/{id}',  [
            'as' => 'sliders.delete',
            'uses' => 'AdminSliderController@delete'
        ]);
    });
    Route::prefix('settings')->group(function () {
        Route::get('/',  [
            'as' => 'settings.index',
            'uses' => 'AdminSettingController@index'
        ]);
        Route::get('/create',  [
            'as' => 'settings.create',
            'uses' => 'AdminSettingController@create'
        ]);
        Route::post('/store',  [
            'as' => 'settings.store',
            'uses' => 'AdminSettingController@store'
        ]);
        Route::get('/edit/{id}',  [
            'as' => 'settings.edit',
            'uses' => 'AdminSettingController@edit'
        ]);
        Route::post('/update/{id}',  [
            'as' => 'settings.update',
            'uses' => 'AdminSettingController@update'
        ]);
        Route::get('/delete/{id}',  [
            'as' => 'settings.delete',
            'uses' => 'AdminSettingController@delete'
        ]);
    });
});
Route::prefix('website')->group(function () {

    Route::get('/', [
        'as' => 'website.index',
        'uses' => 'WebsiteHomeController@index'
    ]);
    Route::prefix('product')->group(function () {
        Route::get('/', [
            'as' => 'product.list',
            'uses' => 'WebsiteProductController@list'
        ]);
        Route::get('/category-product/{slug}/{id}', [
            'as' => 'product.category',
            'uses' => 'WebsiteProductController@category'
        ]);
        Route::get('/detail-product/{slug}/{id}', [
            'as' => 'product.detail',
            'uses' => 'WebsiteProductController@detail'
        ]);
    });

});
