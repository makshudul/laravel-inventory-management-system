<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.page.product.product');
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
            'product_code'=>'required|unique:products,product_code',
            'name'=>'required',
            'des'=>'required',
            'color'=>'required',
            'cost_price'=>'required',
            'sale_price'=>'required',
        ]);
        if($validator->fails()){
            return response()->json([
                 "msg"=>'faild',
                 "errors"=>$validator->messages(),
            ]);
        }
        else{
            $datainsert=new Product();
            $datainsert->product_code = $request->product_code;
            $datainsert->name = $request->name;
            $datainsert->des = $request->des;
            $datainsert->size = $request->size;
            $datainsert->color = $request->color;
            $datainsert->cost_price = $request->cost_price;
            $datainsert->sale_price = $request->sale_price;
            $datainsert->save();
            return response()->json([
                "msg"=>'success',

            ]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data = Product::all();
        return response()->json([
            'data'=>$data

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Product::find($id);
        return response()->json([
             'data'=>$data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator= validator::make($request->all(),[
            'product_code'=>'required|unique:products,product_code,'.$id,
            'name'=>'required',
            'des'=>'required',
            'color'=>'required',
            'cost_price'=>'required',
            'sale_price'=>'required',
        ]);
        if($validator->fails()){
            return response()->json([
                 "msg"=>'faild',
                 "errors"=>$validator->messages(),
            ]);
        }
        else{
            $datainsert= Product::find($id);
            $datainsert->product_code = $request->product_code;
            $datainsert->name = $request->name;
            $datainsert->des = $request->des;
            $datainsert->size = $request->size;
            $datainsert->color = $request->color;
            $datainsert->cost_price = $request->cost_price;
            $datainsert->sale_price = $request->sale_price;
            $datainsert->update();
            return response()->json([
                "msg"=>'success',

            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
        return response()->json([
            'msg'=>'success'

        ]);
    }
}
