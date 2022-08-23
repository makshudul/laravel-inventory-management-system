@extends('backend.dashboard.mastertemp')

@section('breadcrumb')
<h4>Purchase</h4>
<nav class="breadcrumb pd-0 mg-0 tx-12">
    <a class="breadcrumb-item" href="index.html">Dashboard</a>
    <a class="breadcrumb-item" href="#">Purchase</a>
    <span class="breadcrumb-item active text-success">Purchase</span>
  </nav>
  @endsection
@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="br-pagebody">
            <div class="br-section-wrapper">
                 <div class="border border-warning p-4">
                     <div class="row">
                        <div class="col-sm-4 mt-3">
                            <select class="form-control branch_name" >
                                <option value="">------ Select Branch ------</option>
                              </select>
                          </div>
                        <div class="col-sm-4 mt-3">
                        <input type="number" class="form-control" placeholder="Enter Company ID " >
                        </div>
                        <div class="col-sm-4 mt-3">
                        <input type="text" class="form-control" placeholder="Enter Company Name " >
                        </div>
                        <div class="col-sm-4 mt-3">
                        <input type="date" class="form-control">
                        </div>
                        <div class="col-sm-4 mt-3">
                        <input type="text" class="form-control" placeholder="Enter Invoice Number " >
                        </div>
                        <div class="col-sm-4 mt-3">
                        <input type="text" class="form-control" placeholder="Stock" disabled >
                        </div>

                     </div>

                </div>
                         <!---  this is second section --->
                    <div class="border border-warning p-4 mt-4">
                        <div class="row">
                           <div class="col-sm-4 mt-3">
                            <input type="number" class="form-control" placeholder="Enter Product Code " >
                             </div>
                           <div class="col-sm-4 mt-3">
                           <input type="number" class="form-control" placeholder="Cost Price " disabled>
                           </div>
                           <div class="col-sm-4 mt-3">
                           <input type="number" class="form-control" placeholder="Enter Quantity " >
                           </div>
                           <div class="col-sm-4 mt-3">
                           <input type="number" class="form-control" placeholder="Enter Discount " >
                           </div>
                           <div class="col-sm-4 mt-3">
                           <input type="number" class="form-control" placeholder="Discount Amount " >
                           </div>
                           <div class="col-sm-4 mt-3">
                           <input type="number" class="form-control" placeholder="Total " disabled >
                           </div>
                           <div class="col-sm-4 mt-3">
                            <button class="btn btn-success">Submit</button>
                            </div>

                        </div>

                   </div>
          </div>
        </div>
      </div>
   </div>
</div>

@endsection
