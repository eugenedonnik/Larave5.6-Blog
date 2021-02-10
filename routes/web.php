<?php

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

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/themes', function(){
//    return view('themes');
//});

Route::get('/themes', 'ThemeController@index');
Route::post('/themes', 'ThemeController@addTheme')->name('theme.add');

Route::get('/start', 'StartController@index');

//Route::get('/start/get-json', 'StartController@getJson');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/home', 'HomeController@addTheme')->name('home.themeadd');
//Route::post('/home', [\App\Http\Controllers\HomeController::class, 'addTheme'])->name('home.themeadd');
Route::get('/home/{id}', 'HomeController@deleteTheme');

Route::get('/home/new-blog', 'HomeController@newBlog')->name('home.newblog');
Route::post('/home/delete-blog', 'HomeController@deleteTheme');



