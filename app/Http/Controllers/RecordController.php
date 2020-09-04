<?php

namespace App\Http\Controllers;

use App\Models\Record;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use PhpParser\Node\Stmt\Return_;

class RecordController extends Controller
{
    protected $exceptionMessage;

    public function __construct()
    {
        $this->exceptionMessage = "Something went wrong. Please try again later.";
    }

    public function transfer(Request $request)
    {

        try {
            if(Record::first()){
                $message = "Already inserted";
                return view('records', compact('message'));
            }

            $recordsData = json_decode(file_get_contents(storage_path('app/public/records.json')), true)['RECORDS'];

            DB::beginTransaction();
            $chunkSize = 500;
            foreach (array_chunk($recordsData,$chunkSize) as $record) {
                Record::insert($record);
            }
            DB::commit();

            $message = "Records are inserted";
            return view('records', compact('message'));
        } catch (\Exception $ex) {
            DB::rollBack();
            Log::error('[Class => ' . __CLASS__ . ", function => " . __FUNCTION__ . " ]" . " @ " . $ex->getFile() . " " . $ex->getLine() . " " . $ex->getMessage());
            $message = $this->exceptionMessage;
            return view('records', compact('message'));
        }
    }
}
