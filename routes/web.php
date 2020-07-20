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


// Authentication Routes...
Route::get('$d_3c0mm3rc3_login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('$d_3c0mm3rc3_login', 'Auth\LoginController@login');
Route::post('$d_3c0mm3rc3_logout', 'Auth\LoginController@logout')->name('logout');

Route::get('$d_3c0mm3rc3_register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('$d_3c0mm3rc3_register', 'Auth\RegisterController@register');

Route::get('$d_3c0mm3rc3_password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('$d_3c0mm3rc3_password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('$d_3c0mm3rc3_password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::post('$d_3c0mm3rc3_password/reset', 'Auth\ResetPasswordController@reset');

// Dashboard Routes...


    // SHOP
Route::get('/$d_3c0mm3rc3/shop', 'DashboardController@shop')->name('dashboardShop');
Route::get('/$d_3c0mm3rc3/shop/category/add', 'DashboardController@addCategory')->name('addCategory');
Route::post('/$d_3c0mm3rc3/category/save', 'DashboardController@saveCategory')->name('saveCategory');
Route::get('/$d_3c0mm3rc3/shop/item/add', 'DashboardController@addItem')->name('addItem');
Route::post('/$d_3c0mm3rc3/shop/item/saveItem', 'DashboardController@saveItem')->name('saveItem');
Route::post('/$d_3c0mm3rc3/shop/item/saveItemImages', 'DashboardController@saveItemImages')->name('saveItemImages');
Route::get('/$d_3c0mm3rc3/shop/{item}/edit', 'DashboardController@editItem')->name('editItem');
Route::post('/$d_3c0mm3rc3/shop/{item}/updateItem', 'DashboardController@updateItem')->name('updateItem');
Route::delete('/$d_3c0mm3rc3/shop/{item}/deleteImage', 'DashboardController@deleteItemImage')->name('deleteItemImage');
Route::post('/$d_3c0mm3rc3/shop/{item}/saveItemEditImages', 'DashboardController@saveItemEditImages')->name('saveItemEditImages');
Route::post('/$d_3c0mm3rc3/shop/{item}/updateItemAll', 'DashboardController@updateItemAll')->name('updateItemAll');
Route::delete('/$d_3c0mm3rc3/shop/{item}/delete', 'DashboardController@deleteItem')->name('deleteItem');