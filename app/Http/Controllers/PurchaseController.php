<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Illuminate\Http\Request;
use App\Models\Branch;
use App\Models\Company;
use App\Models\Product;
use App\Models\PurchaseDeteils;
use App\Models\Stock;
use App\Models\temporaryPurchase;
use Illuminate\Support\Facades\Validator;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.page.purchase.purchase');
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
            'company_id'=>'required',
            'branch_name'=>'required',
            'company_name'=>'required',
            'date'=>'required',
            'company_invoice'=>'required',
            'product_code'=>'required',
            'cost_price'=>'required',
            'product_name'=>'required',
            'product_quantity'=>'required',
            'product_total'=>'required'
        ]);
        if($validator->fails()){
            return response()->json([
                 "msg"=>'faild',
                 "errors"=>$validator->messages(),
            ]);
        }
        else{

               if(Stock::Where('branch_id','=',$request->branch_name)->Where('product_code','=',$request->product_code)->exists()){
                Stock::Where('branch_id','=',$request->branch_name)->Where('product_code','=',$request->product_code)->increment('quantity',$request->product_quantity);

                $PurDetils=new PurchaseDeteils();
                 $PurDetils->company_id=$request->company_id;
                 $PurDetils->branch_name=$request->branch_name;
                 $PurDetils->company_name=$request->company_name;
                 $PurDetils->date=$request->date;
                 $PurDetils->company_invoice=$request->company_invoice;
                 $PurDetils->product_code=$request->product_code;
                 $PurDetils->cost_price=$request->cost_price;
                 $PurDetils->stock=$request->stock;
                 $PurDetils->product_name=$request->product_name;
                 $PurDetils->product_quantity=$request->product_quantity;
                 $PurDetils->product_total=$request->product_total;
                 $PurDetils->save();
                    // this is temporary Purhcase section
                 $Purtem=new temporaryPurchase();
                 $Purtem->company_id=$request->company_id;
                 $Purtem->branch_name=$request->branch_name;
                 $Purtem->company_name=$request->company_name;
                 $Purtem->date=$request->date;
                 $Purtem->invoice_number=$request->company_invoice;
                 $Purtem->product_code=$request->product_code;
                 $Purtem->cost_price=$request->cost_price;
                 $Purtem->stock=$request->stock;
                 $Purtem->product_name=$request->product_name;
                 $Purtem->product_quantity=$request->product_quantity;
                 $Purtem->product_total=$request->product_total;
                 $Purtem->save();

                 $product_quantity=temporaryPurchase::sum('product_quantity');

                return response()->json([
                    'msg'=>'update',
                    'product_quantity'=>$product_quantity
                 ]);
            }
               else{
                $stockInsert=new Stock();
                $stockInsert->branch_id=$request->branch_name;
                $stockInsert->product_code=$request->product_code;
                $stockInsert->quantity=$request->product_quantity;
                $stockInsert->save();
                // purchaseDeteils Insert Code
                $PurDetils=new PurchaseDeteils();
                $PurDetils->company_id=$request->company_id;
                $PurDetils->branch_name=$request->branch_name;
                $PurDetils->company_name=$request->company_name;
                $PurDetils->date=$request->date;
                $PurDetils->company_invoice=$request->company_invoice;
                $PurDetils->product_code=$request->product_code;
                $PurDetils->cost_price=$request->cost_price;
                $PurDetils->stock=$request->stock;
                $PurDetils->product_name=$request->product_name;
                $PurDetils->product_quantity=$request->product_quantity;
                $PurDetils->product_total=$request->product_total;
                $PurDetils->save();
                   // this is temporary Purhcase section
                $Purtem=new temporaryPurchase();
                $Purtem->company_id=$request->company_id;
                $Purtem->branch_name=$request->branch_name;
                $Purtem->company_name=$request->company_name;
                $Purtem->date=$request->date;
                $Purtem->invoice_number=$request->company_invoice;
                $Purtem->product_code=$request->product_code;
                $Purtem->cost_price=$request->cost_price;
                $Purtem->stock=$request->stock;
                $Purtem->product_name=$request->product_name;
                $Purtem->product_quantity=$request->product_quantity;
                $Purtem->product_total=$request->product_total;
                $Purtem->save();
                $product_quantity=temporaryPurchase::sum('product_quantity');
                      return response()->json([
                            "msg"=>'success',
                            'product_quantity'=>$product_quantity

                        ]);

               }

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data=temporaryPurchase::all();
        return response()->json([
                'data'=>$data
        ]);
    }
    public function CompanyItemShow($company_id,$branch_name){

        $company = Company::Where('company_id','=',$company_id)->where('branch_name','=',$branch_name)->get();
        // $company = Company::Where('company_id','=',$company_id)->get();
        return response()->json([
            'company'=>$company

        ]);
    }
    public function ProductItemShow($product_id,$branch_name){
        $stock=Stock::Where('product_code','=',$product_id)->Where('branch_id','=',$branch_name)->get();
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
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function edit(Purchase $purchase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Purchase $purchase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purchase $purchase)
    {
        //
    }
}
