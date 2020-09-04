<?php

namespace App\Http\Controllers;

use App\Models\Buyer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BuyerController extends Controller
{
    protected $exceptionMessage;

    public function __construct()
    {
        $this->exceptionMessage = "Something went wrong. Please try again later.";
    }

    public function getSecBuyerEloq(Request $request)
    {

        try {
            $buyers = Buyer::with('diaries', 'pens', 'erasers')->get()->sortByDesc(function ($item){
                return $item->erasers->sum('amount') + $item->pens->sum('amount') + $item->diaries->sum('amount');
            })->skip(1)->take(1);

            $heading = 'Second Buyer With Eloquent';

            return view('buyer', compact('buyers','heading'));
        } catch (\Exception $ex) {
            Log::error('[Class => ' . __CLASS__ . ", function => " . __FUNCTION__ . " ]" . " @ " . $ex->getFile() . " " . $ex->getLine() . " " . $ex->getMessage());
            return redirect()->back()->withErrors($this->exceptionMessage);
        }
    }

    public function getSecBuyerWithoutEloq(Request $request)
    {

        try {
            $buyerData = DB::select('select buyer_id,sum(amount) total from ( select buyer_id,amount from pen_taken union all select buyer_id,amount from eraser_taken union all select buyer_id,amount from diary_taken ) t group by buyer_id ORDER BY total DESC LIMIT 1, 1')[0];
            $buyers = Buyer::where('buyers.id', $buyerData->buyer_id)->with('diaries', 'pens', 'erasers')->get();

            $heading = 'Second Buyer Without Eloquent';

            return view('buyer', compact('buyers','heading'));
        } catch (\Exception $ex) {
            Log::error('[Class => ' . __CLASS__ . ", function => " . __FUNCTION__ . " ]" . " @ " . $ex->getFile() . " " . $ex->getLine() . " " . $ex->getMessage());
            return redirect()->back()->withErrors($this->exceptionMessage);
        }
    }

    public function getBuyersEloq(Request $request)
    {

        try {
            $buyers = Buyer::with('diaries', 'pens', 'erasers')->get()->sortByDesc(function ($item){
                return $item->erasers->sum('amount') + $item->pens->sum('amount') + $item->diaries->sum('amount');
            });

            $heading = 'Purchase List With Eloquent';

            return view('buyer', compact('buyers','heading'));
        } catch (\Exception $ex) {
            Log::error('[Class => ' . __CLASS__ . ", function => " . __FUNCTION__ . " ]" . " @ " . $ex->getFile() . " " . $ex->getLine() . " " . $ex->getMessage());
            return redirect()->back()->withErrors($this->exceptionMessage);
        }
    }

    public function getBuyersWithoutEloq(Request $request)
    {

        try {
            $buyerData = DB::select('select buyer_id,sum(amount) total from ( select buyer_id,amount from pen_taken union all select buyer_id,amount from eraser_taken union all select buyer_id,amount from diary_taken ) t group by buyer_id ORDER BY total DESC');

            $buyers = [];
            foreach ($buyerData as $buyer)
            {
                $buyers[] = Buyer::where('buyers.id', $buyer->buyer_id)->with('diaries', 'pens', 'erasers')->first();
            }

            $heading = 'Purchase List Without Eloquent';

            return view('buyer', compact('buyers','heading'));
        } catch (\Exception $ex) {
            Log::error('[Class => ' . __CLASS__ . ", function => " . __FUNCTION__ . " ]" . " @ " . $ex->getFile() . " " . $ex->getLine() . " " . $ex->getMessage());
            return redirect()->back()->withErrors($this->exceptionMessage);
        }
    }
}
