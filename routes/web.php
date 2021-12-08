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
Route::get('/blog', 'PostsController@getAll')->name('blog');
Route::get('/category/{id}', 'CategoriesController@getId')->name('category');

//Авторизация
Route::group([
    'prefix' => 'user',
    'namespace' => 'Auth',
], function(){
    Route::post('/register', 'RegisterController@register')->name('register');
    Route::get('/registration', 'RegisterController@registration')->name('registration');

    Route::get('/auth', 'AuthController@auth')->name('auth');
    Route::post('/login', 'AuthController@login')->name('login');

    Route::get('/logout', 'AuthController@logout')->name('logout');
});

/*Route::get('/vk', function () {
    return redirect('https://vk.com/yakushinilya');
})->name('vk');
Route::get('/business', 'Pages/BusinessController@getAll')->name('business');
Route::get('/tariffs', 'Pages/PageController@getAll')->name('tariffs');
Route::get('/contacts', 'Pages/PageController@getAll')->name('contacts');*/


Route::group([
    'prefix'     => 'admin',
    'namespace'  => 'Admin',
    'middleware' => ['auth', 'admin'],
], function(){
    Route::get('/', 'AdminController@getIndex')->name('admin');

    //Навигация
    Route::get('/navigations', 'NavigationController@index')->name('admin.navigation');
    Route::match(['get', 'post'],'/navigation/add', 'NavigationController@create')->name('admin.navigation.add');
    Route::match(['get', 'put'], '/navigation/edit/{id}', 'NavigationController@update')->name('admin.navigation.edit');
    Route::delete('/navigation/drop/{id}', 'NavigationController@delete')->name('admin.navigation.drop');

    //Виджеты
    Route::get('/widgets', 'WidgetController@index')->name('admin.widget');
    Route::match(['get', 'post'],'/widget/add', 'WidgetController@create')->name('admin.widget.add');
    Route::match(['get', 'put'], '/widget/edit/{id}', 'WidgetController@update')->name('admin.widget.edit');
    Route::delete('/widget/drop/{id}', 'WidgetController@delete')->name('admin.widget.drop');

    //Страницы
    Route::get('/pages', 'PageController@index')->name('admin.page');
    Route::match(['get', 'post'],'/page/add', 'PageController@create')->name('admin.page.add');
    Route::match(['get', 'put'], '/page/edit/{id}', 'PageController@update')->name('admin.page.edit');
    Route::delete('/page/drop/{id}', 'PageController@delete')->name('admin.page.drop');

    //Статьи
    Route::get('/posts', 'PostController@index')->name('admin.post');
    Route::match(['get', 'post'],'/post/add', 'PostController@create')->name('admin.post.add');
    Route::match(['get', 'put'], '/post/edit/{id}', 'PostController@update')->name('admin.post.edit');
    Route::delete('/post/drop/{id}', 'PostController@delete')->name('admin.post.drop');

    //Категории
    Route::get('/categories', 'CategoryController@index')->name('admin.category');
    Route::match(['get', 'post'],'/category/add', 'CategoryController@create')->name('admin.category.add');
    Route::match(['get', 'put'], '/category/edit/{id}', 'CategoryController@update')->name('admin.category.edit');
    Route::delete('/category/drop/{id}', 'CategoryController@delete')->name('admin.category.drop');

    //Теги
    Route::get('/tags', 'TagController@index')->name('admin.tag');
    Route::match(['get', 'post'],'/tag/add', 'TagController@create')->name('admin.tag.add');
    Route::match(['get', 'put'], '/tag/edit/{id}', 'TagController@update')->name('admin.tag.edit');
    Route::delete('/tag/drop/{id}', 'TagController@delete')->name('admin.tag.drop');
});

Route::get('/{route}', 'PagesController@getRoute')->name('page');
Route::get('/blog/{route}', 'PostsController@getRoute')->name('post');
