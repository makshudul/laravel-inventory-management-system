<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;

use App\Models\Sales;
use Illuminate\Http\Request;
use App\Models\Branch;
use App\Models\Stock;
use App\Models\Product;
use App\Models\PurchaseSummary;
use App\Models\SaleSummmary;
use PDF;
use Symfony\Component\CssSelector\Node\FunctionNode;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $saleinvoce=SaleSummmary::max('invoice_number');
        if($saleinvoce==null){
            $saleinvoce=202201;
        }
        else{
            $saleinvoce=$saleinvoce+1;
        }
        return view('backend.page.sales.sales',compact('saleinvoce'));
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
            'invoice'=>'required',
            'date'=>'required',
            'client_name'=>'required',
            'phone_number'=>'required',
            'product_name'=>'required',
            'product_code'=>'required',
            'sale_price'=>'required',
            'product_quantity'=>'required',
            'product_total'=>'required',
            'productgrand_total'=>'required',
        ]);
        if($validator->fails()){
            return response()->json([
                 "msg"=>'faild',
                 "errors"=>$validator->messages(),
            ]);
        }
        else{
                 $slug=rand(1,90000000000);
               if(Stock::Where('branch_name','=',$request->branch_name)->Where('product_code','=',$request->product_code)->exists()){
                Stock::Where('branch_name','=',$request->branch_name)->Where('product_code','=',$request->product_code)->decrement('quantity',$request->product_quantity);

                $salesdeties=new Sales();
                $salesdeties->branch_name=$request->branch_name;
                $salesdeties->date=$request->date;
                 $salesdeties->invoice_number=$request->invoice;
                 $salesdeties->client_name=$request->client_name;
                 $salesdeties->clientPhNo=$request->phone_number;
                 $salesdeties->product_code=$request->product_code;
                 $salesdeties->product_name=$request->product_name;
                 $salesdeties->sale_price=$request->sale_price;
                 $salesdeties->quantity=$request->product_quantity;
                 $salesdeties->total=$request->product_total;
                 $salesdeties->discount=$request->discount;
                 $salesdeties->grand_total=$request->productgrand_total;
                 $salesdeties->slug=$slug;
                 $salesdeties->save();
                return response()->json([
                    'msg'=>'success',
                 ]);
            }

        }
    }
    public function storeSummary(Request $request){

        $validator= validator::make($request->all(),[
            'branch_name'=>'required',
            'invoice'=>'required',
            'date'=>'required',
            'client_name'=>'required',
            'phone_number'=>'required',
            'grand_quantity'=>'required',
            'grand_total_amount'=>'required',
            'grand_payment'=>'required',
        ]);
        if($validator->fails()){
            return response()->json([
                 "msg"=>'faild',
                 "errors"=>$validator->messages(),
            ]);
        }
        else{
                $salesSummary=new SaleSummmary();
                 $salesSummary->branch_name=$request->branch_name;
                 $salesSummary->date=$request->date;
                 $salesSummary->invoice_number=$request->invoice;
                 $salesSummary->client_name=$request->client_name;
                 $salesSummary->clientPhNo=$request->phone_number;
                 $salesSummary->grand_total_quantity=$request->grand_quantity;
                 $salesSummary->grand_total_amount=$request->grand_total_amount;
                 $salesSummary->payment_amount=$request->grand_payment;
                 $salesSummary->save();
                return response()->json([
                    'msg'=>'success',
                 ]);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function show($invoice)
    {
        $data=Sales::where('invoice_number','=',$invoice)->get();
        return response()->json([
                'data'=>$data,
        ]);
    }
    public function ProductItemShow($product_id,$branch_name){
        $stock=Stock::Where('product_code','=',$product_id)->Where('branch_name','=',$branch_name)->get();
        $product = Product::Where('product_code','=',$product_id)->get();
        return response()->json([
            'product'=>$product,
            'stock'=>$stock

        ]);
    }

    public function showbranchName(){
        $data=Branch::all();
        return response()->json([
            'data'=>$data

        ]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function edit(Sales $sales)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sales $sales)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data= Sales::find($id);
         $product_code=$data->product_code;
         $branch_name=$data->branch_name;
         $quantity=$data->quantity;
                      // delete code and product
        Stock::Where('product_code','=',$product_code)->Where('branch_name','=',$branch_name)->increment('quantity',$quantity);
        // delete find Id
        Sales::find($id)->delete();
       return response()->json([
        'msg'=>'success'

    ]);

    }
    public function invoice($invoice){

        $saledeteils=Sales::where('invoice_number','=',$invoice)->get();
        $salesSummary=SaleSummmary::where('invoice_number','=',$invoice)->get();
      $data=[
          'salesSummary'=>$salesSummary,
          'saledeteils'=>$saledeteils,
      ];
        return view('backend.page.invoice.invoice',$data);
        // $pdf = PDF::loadView('frontend.invoice', $data);
        // return $pdf->download('invoice.pdf');

    }
}
