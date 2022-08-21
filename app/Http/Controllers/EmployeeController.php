<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.page.employee.employee');
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
            'emId'=>'required|unique:employees,emId|integer|min:4',
            'name'=>'required',
            'fName'=>'required',
            'mName'=>'required',
            'sex'=>'required',
            'nid'=>'required|integer',
            'address'=>'required',
            'phone'=>'required|integer|min:11',
            'email'=>'required|email',
            'saleryRange'=>'required|integer'
        ]);
        if($validator->fails()){
            return response()->json([
                 "msg"=>'faild',
                 "errors"=>$validator->messages(),
            ]);
        }
        else{
            $datainsert=new Employee();
            $datainsert->emId = $request->emId;
            $datainsert->name = $request->name;
            $datainsert->fName = $request->fName;
            $datainsert->mName = $request->mName;
            $datainsert->sex = $request->sex;
            $datainsert->nid = $request->nid;
            $datainsert->address = $request->address;
            $datainsert->phone = $request->phone;
            $datainsert->email = $request->email;
            $datainsert->saleryRange = $request->saleryRange;
            $datainsert->save();
            return response()->json([
                "msg"=>'success',

            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data = Employee::all();
        return response()->json([
            'data'=>$data

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Employee::find($id);
        return response()->json([
             'data'=>$data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator= validator::make($request->all(),[
            'emId'=>'required|unique:employees,emId,'.$id,
            'name'=>'required',
            'fName'=>'required',
            'mName'=>'required',
            'sex'=>'required',
            'nid'=>'required',
            'address'=>'required',
            'phone'=>'required',
            'email'=>'required|email',
            'saleryRange'=>'required'
        ]);
        if($validator->fails()){
            return response()->json([
                 "msg"=>'faild',
                 "errors"=>$validator->messages(),
            ]);
        }
        else{
            $datainsert= Employee::find($id);
            $datainsert->emId = $request->emId;
            $datainsert->name = $request->name;
            $datainsert->fName = $request->fName;
            $datainsert->mName = $request->mName;
            $datainsert->sex = $request->sex;
            $datainsert->nid = $request->nid;
            $datainsert->address = $request->address;
            $datainsert->phone = $request->phone;
            $datainsert->email = $request->email;
            $datainsert->saleryRange = $request->saleryRange;
            $datainsert->update();
            return response()->json([
                "msg"=>'success',

            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employee::find($id)->delete();
        return response()->json([
            'msg'=>'success'

        ]);
    }
}
