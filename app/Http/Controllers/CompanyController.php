<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.page.company.company');
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
            'company_id'=>'required|unique:companies,company_id|integer|min:4',
            'companyName'=>'required',
            'companyAddress'=>'required',
            'companyEmail'=>'required',
            'companyPhNO'=>'required|integer',
            'companyManagerName'=>'required',
            'due'=>'required',
        ]);
        if($validator->fails()){
            return response()->json([
                 "msg"=>'faild',
                 "errors"=>$validator->messages(),
            ]);
        }
        else{
            $datainsert=new Company();
            $datainsert->company_id = $request->company_id;
            $datainsert->companyName = $request->companyName;
            $datainsert->companyAddress = $request->companyAddress;
            $datainsert->companyEmail = $request->companyEmail;
            $datainsert->companyPhNO = $request->companyPhNO;
            $datainsert->companyManagerName = $request->companyManagerName;
            $datainsert->companyManagerName = $request->companyManagerName;
            $datainsert->due = $request->due;
            $datainsert->save();
            return response()->json([
                "msg"=>'success',

            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data = Company::all();
        return response()->json([
            'data'=>$data

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Company::find($id);
        return response()->json([
            'data'=>$data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $validator= validator::make($request->all(),[
            'company_id'=>'required|integer|min:4|unique:companies,company_id,'.$id,
            'companyName'=>'required',
            'companyAddress'=>'required',
            'companyEmail'=>'required',
            'companyPhNO'=>'required|integer',
            'companyManagerName'=>'required',
            'due'=>'required',
        ]);
        if($validator->fails()){
            return response()->json([
                 "msg"=>'faild',
                 "errors"=>$validator->messages(),
            ]);
        }
        else{
            $dataupdate= Company::find($id);
            $dataupdate->company_id = $request->company_id;
            $dataupdate->companyName = $request->companyName;
            $dataupdate->companyAddress = $request->companyAddress;
            $dataupdate->companyEmail = $request->companyEmail;
            $dataupdate->companyPhNO = $request->companyPhNO;
            $dataupdate->companyManagerName = $request->companyManagerName;
            $dataupdate->companyManagerName = $request->companyManagerName;
            $dataupdate->due = $request->due;
            $dataupdate->update();
            return response()->json([
                "msg"=>'success',

            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Company::find($id)->delete();
        return response()->json([
            'msg'=>'success'

        ]);
    }
}
