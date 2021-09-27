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

Route::get('/', 'HomeController@home')->name('home');
Route::get('/vk', function () {
    return redirect('https://vk.com/yakushinilya');
})->name('vk');
Route::get('/blog', 'Blog/PostController@getAll')->name('blog');
Route::get('/business', 'Pages/BusinessController@getAll')->name('business');
Route::get('/tariffs', 'Pages/PageController@getAll')->name('tariffs');
Route::get('/contacts', 'Pages/PageController@getAll')->name('contacts');


Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin'
], function(){
    Route::get('/', 'AdminController@getIndex')->name('admin');

    //Навигация
    Route::get('/navigation', 'NavigationController@index')->name('admin.navigation');
    Route::match(['get', 'post'],'/navigation/add', 'NavigationController@create')->name('admin.navigation.add');
    Route::match(['get', 'put'], '/navigation/edit/{id}', 'NavigationController@update')->name('admin.navigation.edit');
    Route::delete('/navigation/drop/{id}', 'NavigationController@delete')->name('admin.navigation.drop');
});
