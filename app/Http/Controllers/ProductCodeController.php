<?php

namespace App\Http\Controllers;

use App\Models\ProductCode;
use Illuminate\Http\Request;

class ProductCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('backend.page.product.add_product_code');
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
        $insertData=new ProductCode();
        $insertData->product_name=$request->product_name;
        $insertData->product_code=$request->product_code;
        $insertData->save();
        if($insertData){
            return response()->json([
                "msg"=>'success'
            ]);
        }
        else{
            return response()->json([
                "msg"=>'404'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductCode  $productCode
     * @return \Illuminate\Http\Response
     */
    public function show(ProductCode $productCode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductCode  $productCode
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductCode $productCode)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductCode  $productCode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductCode $productCode)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductCode  $productCode
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductCode $productCode)
    {
        //
    }
}
