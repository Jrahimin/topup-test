<?php

use App\Models\DiaryTaken;
use App\Models\EraserTaken;
use App\Models\PenTaken;
use Illuminate\Support\Facades\DB;
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

Route::get('test', function () {
    $buyers = \App\Models\Buyer::with('diaries', 'pens', 'erasers')->get()->sortByDesc(function ($item){
        return $item->erasers->sum('amount') + $item->pens->sum('amount') + $item->diaries->sum('amount');
    });

    dd($buyers->skip(1)->take(1)->first());

    $pen = PenTaken::selectRaw('buyer_id, SUM(amount) as amount')->groupBy('buyer_id');
    $eraser = EraserTaken::selectRaw('buyer_id, SUM(amount) as amount')->groupBy('buyer_id');
    $diary = DiaryTaken::selectRaw('buyer_id, SUM(amount) as amount')->groupBy('buyer_id');
    //$all = DB::table('diary_taken')->selectRaw('buyer_id, SUM(amount) as amount')->unionAll($pen)->unionAll($eraser)->union($diary)->groupBy('buyer_id')->get();


    $buyers = DB::table('buyers')->selectRaw('id, name')->unionAll($pen)->unionAll($eraser)->unionAll($diary)->get();
    dd($buyers->get()->toArray());

    \App\Models\Buyer::select('id as buyer_id');
    $all = DiaryTaken::select('buyer_id', DB::raw('SUM(amount) as amount'))->union($pen)->union($eraser)->groupBy('buyer_id')->get();
    dd($all->toArray());
    return "this is test";
});

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

Route::get('/', function () {
    return view('welcome');
});
