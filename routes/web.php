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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'RootController');

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::group(['prefix' => 'slip'], function () {
        Route::get('cards/exists', ['as' => 'admin.slip.cards.exists', 'uses' => 'Admin\Slip\CardsController@exists']);
        Route::post('cards/pdf', ['as' => 'admin.slip.cards.pdf', 'uses' => 'Admin\Slip\CardsController@pdf']);
        Route::post('cards/printed', ['as' => 'admin.slip.cards.printed', 'uses' => 'Admin\Slip\CardsController@printed']);
        Route::resource('cards', 'Admin\Slip\CardsController', ['as' => 'admin.slip']);

        Route::resource('dictionaries', 'Admin\Slip\DictionariesController', ['as' => 'admin.slip']);
    });
});
