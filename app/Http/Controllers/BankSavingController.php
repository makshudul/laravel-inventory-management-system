<?php

namespace App\Http\Controllers;

use App\Models\BankSaving;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Branch;

class BankSavingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.page.bank_details.bank_saving');
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
        $validator= validator::make($request->all(),[
            'bankId'=>'required',
            'branch_name'=>'required',
            'date'=>'required|date',
            'purpose'=>'required',
            'spender'=>'required',
            'amount'=>'required|integer',
            'debit_credit'=>'required',
        ]);
        if($validator->fails()){
            return response()->json([
                 "msg"=>'faild',
                 "errors"=>$validator->messages(),
            ]);
        }
        else{
            $datainsert=new BankSaving();
            $datainsert->bankId = $request->bankId;
            $datainsert->branch_name = $request->branch_name;
            $datainsert->date = $request->date;
            $datainsert->purpose = $request->purpose;
            $datainsert->spender = $request->spender;
           if ($request->debit_credit=="debit") {
              $datainsert->debit=$request->amount;
           }
           else if($request->debit_credit=="credit") {
             $datainsert->credit=$request->amount;
           }

            $datainsert->save();
            return response()->json([
                "msg"=>'success',

            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BankSaving  $bankSaving
     * @return \Illuminate\Http\Response
     */
    public function show(BankSaving $bankSaving)
    {
        $data = BankSaving::all();
        return response()->json([
            'data'=>$data

        ]);

    }
    public function showbranchName()
    {
        $data = Branch::all();
        return response()->json([
            'data'=>$data

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BankSaving  $bankSaving
     * @return \Illuminate\Http\Response
     */
    public function edit(BankSaving $bankSaving)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BankSaving  $bankSaving
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BankSaving $bankSaving)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BankSaving  $bankSaving
     * @return \Illuminate\Http\Response
     */
    public function destroy(BankSaving $bankSaving)
    {
        //
    }
}
