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
    Route::resource('clients', 'Admin\ClientsController', ['as' => 'admin', 'except' => 'destroy']);
    Route::resource('estimates', 'Admin\EstimatesController', ['as' => 'admin']);
    Route::resource('invoices', 'Admin\InvoicesController', ['as' => 'admin']);
});

// Localization
// @SEE https://medium.com/@serhii.matrunchyk/using-laravel-localization-with-javascript-and-vuejs-23064d0c210e
Route::get('/js/lang.js', function () {
    $strings = Cache::rememberForever('lang.js', function () {
        $lang = config('app.locale');

        $files   = glob(resource_path('lang/' . $lang . '/*.php'));
        $strings = [];

        foreach ($files as $file) {
            $name           = basename($file, '.php');
            $strings[$name] = require $file;
        }

        return $strings;
    });

    header('Content-Type: text/javascript');
    echo('window.i18n = ' . json_encode($strings) . ';');
    exit();
})->name('assets.lang');
