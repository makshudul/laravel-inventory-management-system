<?php

namespace App\Http\Controllers;

use App\Models\Cost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.page.cost.cost');
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
            'branch_name'=>'required',
            'date'=>'required',
            'purpose'=>'required',
            'amount'=>'required',
            'remark'=>'required',
        ],[
            'branch_name.required'=>'Branch Name Field is Required',
            'date.required'=>'Date Field is Required',
            'purpose.required'=>'Purpose Field is Required',
            'amount.required'=>'Amount Field is Required',
            'remark.required'=>'Remark Field is Required',
        ]);
        if($validator->fails()){
            return response()->json([
                 "msg"=>'faild',
                 "errors"=>$validator->messages(),
            ]);
        }
        else{
            $datainsert=new Cost();
            $datainsert->branch_name = $request->branch_name;
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
     * @param  \App\Models\Cost  $cost
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data = Cost::all();
        return response()->json([
            'data'=>$data

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cost  $cost
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Cost::find($id);
        return response()->json([
            'data'=>$data

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cost  $cost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator= validator::make($request->all(),[
            'branch_name'=>'required',
            'date'=>'required',
            'purpose'=>'required',
            'amount'=>'required',
            'remark'=>'required',
        ],[
            'branch_name.required'=>'Branch Name Field is Required',
            'date.required'=>'Date Field is Required',
            'purpose.required'=>'Purpose Field is Required',
            'amount.required'=>'Amount Field is Required',
            'remark.required'=>'Remark Field is Required',
        ]);
        if($validator->fails()){
            return response()->json([
                 "msg"=>'faild',
                 "errors"=>$validator->messages(),
            ]);
        }
        else{
            $datainsert= Cost::find($id);
            $datainsert->branch_name = $request->branch_name;
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
     * @param  \App\Models\Cost  $cost
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cost::find($id)->delete();
        return response()->json([
            'msg'=>'success'

        ]);
    }
}
