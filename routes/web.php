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

Route::get('second-buyer-eloquent', 'BuyerController@getSecBuyerEloq')->name('sec_buy_eloq');
Route::get('second-buyer-no-eloquent', 'BuyerController@getSecBuyerWithoutEloq')->name('sec_buy');

Route::get('purchase-list-eloquent', 'BuyerController@getBuyersEloq')->name('purchase_eloq');
Route::get('purchase-list-no-eloquent', 'BuyerController@getBuyersWithoutEloq')->name('purchase');

Route::get('record-transfer', 'RecordController@transfer')->name('record');

Route::get('define-callback-js', function () {
    return view('check-age');
})->name('callback');

Route::get('foreach-js', function () {
    $heading = 'Example of Foreach function';
    $task = 'foreach';
    return view('js-example', compact('task','heading'));
})->name('foreach');

Route::get('sort-js', function () {
    $heading = 'Example of Sort function';
    $task = 'sort';
    return view('js-example', compact('task','heading'));
})->name('sort');

Route::get('filter-js', function () {
    $heading = 'Example of Filter function';
    $task = 'filter';
    return view('js-example', compact('task','heading'));
})->name('filter');

Route::get('map-js', function () {
    $heading = 'Example of Map function';
    $task = 'map';
    return view('js-example', compact('task','heading'));
})->name('map');

Route::get('reduce-js', function () {
    $heading = 'Example of Reduce function';
    $task = 'reduce';
    return view('js-example', compact('task','heading'));
})->name('reduce');

Route::get('animation', function () {
    return view('animation');
})->name('animate');

Route::get('i-m-funny', function () {
    return view('answers');
})->name('answer');

Route::get('/', function () {
    return view('welcome');
})->name('welcome');
