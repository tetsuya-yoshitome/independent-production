<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Item;
use public\js\sample;

class samplecontroller extends Controller
{
    public function find(Request $request)
    {
        return view('sample.find');
    }
    
    public function serch(Request $request)
    {
            $select = $_POST["select"];
            $items = item::where($select, $request->input)->get();
            $param = ['input' => $request->input,'items'=>$items];
            return view('sample.find',$param);
    }

    public function sell(Request $request,$sell_day)
    {
        $results = item::whereDate('sell',$sell_day)->get();
        $items = item::where('sell',$sell_day)
            ->selectRaw('SUM(price) as max_price')
            ->get();
                    
        return view('sample.sell',['results'=>$results],['items'=>$items]);
    }
}