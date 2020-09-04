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

Route::get('home', function () {
    return view('home');
});

Route::get('record-transfer', 'RecordController@transfer');

Route::get('second-buyer-eloquent', 'BuyerController@getSecBuyerEloq');
Route::get('second-buyer-no-eloquent', 'BuyerController@getSecBuyerWithoutEloq');

Route::get('purchase-list-eloquent', 'BuyerController@getBuyersEloq');
Route::get('purchase-list-no-eloquent', 'BuyerController@getBuyersWithoutEloq');

Route::get('define-callback-js', function () {
    return view('check-age');
});

Route::get('animation', function () {
    return view('animation');
});

Route::get('foreach-js', function () {
    $heading = 'Example of Foreach function';
    $task = 'foreach';
    return view('js-example', compact('task','heading'));
});

Route::get('sort-js', function () {
    $heading = 'Example of Sort function';
    $task = 'sort';
    return view('js-example', compact('task','heading'));
});

Route::get('filter-js', function () {
    $heading = 'Example of Filter function';
    $task = 'filter';
    return view('js-example', compact('task','heading'));
});

Route::get('map-js', function () {
    $heading = 'Example of Map function';
    $task = 'map';
    return view('js-example', compact('task','heading'));
});

Route::get('reduce-js', function () {
    $heading = 'Example of Reduce function';
    $task = 'reduce';
    return view('js-example', compact('task','heading'));
});

Route::get('i-m-funny', function () {
    return view('answers');
});

Route::get('/', function () {
    return view('welcome');
});
