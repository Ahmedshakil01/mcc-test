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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
});

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');



Route::group(['middleware' => ['auth']], function () {
    Route::get('/like/{userId}', 'ActivityController@like')->name('activity.like');
    Route::get('/dislike/{userId}', 'ActivityController@dislike')->name('activity.dislike');
    Route::get('users/map', 'ActivityController@map')->name('activity.map');

    Route::get('home-users', 'HomeController@userList')->name('home.userList');

});

require __DIR__.'/auth.php';
