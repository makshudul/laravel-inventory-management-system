<?php

namespace App\Http\Controllers;

use App\Models\BankCost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BankCostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.page.bank_details.bank_cost');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
            'bankId'=>'required|unique:bank_costs,bankId',
            'date'=>'required|date',
            'purpose'=>'required',
            'amount'=>'required|integer',
            'remark'=>'required',
        ]);
        if($validator->fails()){
            return response()->json([
                 "msg"=>'faild',
                 "errors"=>$validator->messages(),
            ]);
        }
        else{
            $datainsert=new BankCost();
            $datainsert->bankId = $request->bankId;
            $datainsert->date = $request->date;
            $datainsert->purpose = $request->purpose;
            $datainsert->amount = $request->amount;
            $datainsert->remark = $request->remark;
            $datainsert->save();
            return response()->json([
                "msg"=>'success',

            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BankCost  $bankCost
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data = BankCost::all();
        return response()->json([
            'data'=>$data

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BankCost  $bankCost
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=BankCost::find($id);
        return response()->json([
             'data'=>$data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BankCost  $bankCost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator= validator::make($request->all(),[
            'bankId'=>'required|unique:bank_costs,bankId,'.$id,
            'date'=>'required|date',
            'purpose'=>'required',
            'amount'=>'required|integer',
            'remark'=>'required',
        ]);
        if($validator->fails()){
            return response()->json([
                 "msg"=>'faild',
                 "errors"=>$validator->messages(),
            ]);
        }
        else{
            $datainsert=BankCost::find($id);
            $datainsert->bankId = $request->bankId;
            $datainsert->date = $request->date;
            $datainsert->purpose = $request->purpose;
            $datainsert->amount = $request->amount;
            $datainsert->remark = $request->remark;
            $datainsert->update();
            return response()->json([
                "msg"=>'success',

            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BankCost  $bankCost
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    BankCost::find($id)->delete();
    return response()->json([
        'msg'=>'success'
    ]);
    }
}
