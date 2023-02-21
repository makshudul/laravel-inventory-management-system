<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Cost;
use App\Models\Income;
use App\Models\PurchaseSummary;
use App\Models\Sales;
use App\Models\SaleSummmary;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role == 1){
            $sales=SaleSummmary::where('date','=',Carbon::now()->today())->get();
            $purchse=PurchaseSummary::where('date','=',Carbon::now()->today())->get();
            $othercost=Cost::where('date','=',Carbon::now()->today())->get();
             return view('backend.page.income.todayincome',compact('sales','purchse','othercost'));
        }
        else{
           return view('backend.page.income.error');
        }
   
    }
    public function monthlyindex()
    {
        if(Auth::user()->role == 1){
            $sales=SaleSummmary::whereMonth('date','=',Carbon::now()->format('m'))->get();
            $purchse=PurchaseSummary::whereMonth('date','=',Carbon::now()->format('m'))->get();
            $othercost=Cost::whereMonth('date','=',Carbon::now()->format('m'))->get();
             return view('backend.page.income.monthincome',compact('sales','purchse','othercost'));
        }
        else{
            return view('backend.page.income.error');
        }
       
    }
    public function yearlyindex()
    {
        if(Auth::user()->role == 1){
            $sales=SaleSummmary::whereYear('date','=',Carbon::now()->format('Y'))->get();
            $purchse=PurchaseSummary::whereYear('date','=',Carbon::now()->format('Y'))->get();
            $othercost=Cost::whereYear('date','=',Carbon::now()->format('Y'))->get();
             return view('backend.page.income.yearly',compact('sales','purchse','othercost'));
        }
        else{
            return view('backend.page.income.error');
        }
   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function show(Income $income)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function edit(Income $income)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Income $income)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function destroy(Income $income)
    {
        //
    }
}
