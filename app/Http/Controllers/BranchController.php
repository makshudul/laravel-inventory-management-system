<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.page.branch.branch');
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
            'manager'=>'required',
            'phone'=>'required',
            'email'=>'required|email',
        ],[
            'branch_name.required'=>'Branch Name Field is Required',
            'manager.required'=>'Manager Name Field is Required',
        ]);
        if($validator->fails()){
            return response()->json([
                 "msg"=>'faild',
                 "errors"=>$validator->messages(),
            ]);
        }
        else{
            $datainsert=new Branch();
            $datainsert->branch_name = $request->branch_name;
            $datainsert->manger_name = $request->manager;
            $datainsert->phone = $request->phone;
            $datainsert->email = $request->email;
            $datainsert->save();
            return response()->json([
                "msg"=>'success',

            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data = Branch::all();
        return response()->json([
            'data'=>$data

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Branch::find($id);
        return response()->json([
            'data'=>$data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator= validator::make($request->all(),[
            'branch_name'=>'required',
            'manager'=>'required',
            'phone'=>'required',
            'email'=>'required|email',
        ],[
            'branch_name.required'=>'Branch Name Field is Required',
            'manager.required'=>'Manager Name Field is Required',
            'phone.required'=>'Phone Field is Required',
            'email.required'=>'Email Name Field is Required',
        ]);
        if($validator->fails()){
            return response()->json([
                 "msg"=>'faild',
                 "errors"=>$validator->messages(),
            ]);
        }
        else{
            $datainsert= Branch::find($id);
            $datainsert->branch_name = $request->branch_name;
            $datainsert->manger_name = $request->manager;
            $datainsert->phone = $request->phone;
            $datainsert->email = $request->email;
            $datainsert->update();
            return response()->json([
                "msg"=>'success',

            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Branch::find($id)->delete();
        return response()->json([
            'msg'=>'success'

        ]);
    }
}
