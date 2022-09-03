<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;
use App\Models\StockAndNeedbuy;

class StockAndNeedbuyController extends Controller
{
    public function index(){
        $stockdata=Stock::all();
        return view('backend.page.stock.stock')->with(compact('stockdata'));
    }
    public function BuyNeed(){
        $buydata=Stock::where('quantity','<','5')->get();
        return view('backend.page.stock.BuyNeed')->with(compact('buydata'));
    }
}
