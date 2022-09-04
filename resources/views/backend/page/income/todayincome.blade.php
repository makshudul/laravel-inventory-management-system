@extends('backend.dashboard.mastertemp')

@section('income')
    active
@endsection
@section('todayincome')
    active
@endsection


@section('breadcrumb')
<h4>Income</h4>
<nav class="breadcrumb pd-0 mg-0 tx-12">
    <a class="breadcrumb-item" href="index.html">Dashboard</a>
    <a class="breadcrumb-item" href="#">Today Income</a>
    <span class="breadcrumb-item active text-success">Need Buy Product</span>
  </nav>
  @endsection
@section('content')

                    <h1 class=" text-center text-info font-weight-bold ">Today income Deteils</h1>
                   <hr class="bg-info mb-4">
                   <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="text-center text-info">Sales && Purchase && Cost Amount</h2>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                <div class="col-md-4">
                                    <h5 class="text-center text-success">Total Sales Amount</h5>
                                    <input type="text" value="556464" class="form-control text-dark font-weight-bold text-center" placeholder="Total Sales" disabled>
                                </div>
                                <div class="col-md-4">
                                    <h5 class="text-center text-success">Total Purchase Amount</h5>
                                    <input type="text" value="564646" class="form-control text-dark font-weight-bold text-center" placeholder="Total Purchase Amount" disabled>
                                </div>
                                <div class="col-md-4">
                                    <h5 class="text-center text-success">Total Cost Amount</h5>
                                    <input type="text" value="22555" class="form-control text-dark font-weight-bold text-center" placeholder="Total Cost Amount" disabled >
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="text-info text-center">Today Total Income </h2>
                            </div>
                            <div class="card-body text-center">
                               <h5 class="text-success">Total Amount : </h5> <br>
                                  <h4 class="text-info"><span class="text-danger">120056</span> </h4>
                            </div>
                        </div>
                    </div>
                   </div>
                   <hr class="bg-info">
                 <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="text-center text-info ">Today Sales</h3>
                            </div>
                            <div class="card-body">
                                    <table id="datatable1" class="table">
                                      <thead>
                                        <tr>
                                            <th class="wd-15p">SL</th>
                                            <th class="wd-15p">Date</th>
                                            <th class="wd-15p">Invoice</th>
                                            <th class="wd-15p">C.name</th>
                                            <th class="wd-15p">Total</th>
                                        </tr>
                                      </thead>
                                      <tbody class="datashow">
                                     @forelse ($sales as $key=>$sale )
                                         <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $sale->date }}</td>
                                            <td>{{ $sale->invoice_number }}</td>
                                            <td>{{ $sale->client_name }}</td>
                                            <td>{{ $sale->grand_total_amount }}</td>
                                         </tr>
                                     @empty
                                     <tr>
                                        <td colspan="5"> No Data found</td>
                                     </tr>

                                     @endforelse
                                      </tbody>
                                    </table>
                                  </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="text-center text-info ">Today Purchase</h3>
                            </div>
                            <div class="card-body">
                                    <table id="datatable1" class="table">
                                      <thead>
                                        <tr>
                                            <th class="wd-15p">SL</th>
                                            <th class="wd-15p">Branch Name</th>
                                            <th class="wd-15p">Date </th>
                                            <th class="wd-15p">Invoice</th>
                                            <th class="wd-15p">Total</th>
                                        </tr>
                                      </thead>
                                      <tbody class="datashow">
                                        @forelse ($purchse as $key=>$purchse )
                                        <tr>
                                           <td>{{ $key+1 }}</td>
                                           <td>{{ $purchse->branch_name }}</td>
                                           <td>{{ $purchse->date }}</td>
                                           <td>{{ $purchse->invoice_number }}</td>
                                           <td>{{ $purchse->grand_total }}</td>
                                           <td>{{ $purchse->grand_total_amount }}</td>
                                        </tr>
                                    @empty
                                    <tr>
                                       <td colspan="5"> No Data found</td>
                                    </tr>

                                    @endforelse
                                      </tbody>
                                    </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="text-center text-info ">Today Other Cost</h3>
                            </div>
                            <div class="card-body">
                                    <table id="datatable1" class="table ">
                                      <thead>
                                        <tr>
                                            <th class="wd-15p">SL</th>
                                            <th class="wd-15p">Branch Name</th>
                                            <th class="wd-15p">Date </th>
                                            <th class="wd-15p">Remark</th>
                                            <th class="wd-15p">Amount</th>
                                        </tr>
                                      </thead>
                                      <tbody class="datashow">
                                        @forelse ($othercost as $key=>$cost )
                                        <tr>
                                           <td>{{ $key+1 }}</td>
                                           <td>{{ $cost->branch_name }}</td>
                                           <td>{{ $cost->date }}</td>
                                           <td>{{ $cost->remark }}</td>
                                           <td>{{ $cost->amount }}</td>
                                        </tr>
                                    @empty
                                    <tr>
                                       <td colspan="5"> No Data found</td>
                                    </tr>

                                    @endforelse
                                      </tbody>
                                    </table>
                            </div>
                        </div>
                    </div>
                 </div>
@endsection

