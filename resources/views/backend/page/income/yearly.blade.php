@extends('backend.dashboard.mastertemp')

@section('income')
    active
@endsection
@section('yearlyincome')
    active
@endsection


@section('breadcrumb')
<h4>Income</h4>
<nav class="breadcrumb pd-0 mg-0 tx-12">
    <a class="breadcrumb-item" href="index.html">Dashboard</a>
    <a class="breadcrumb-item" href="#">Yearly Income</a>
    <span class="breadcrumb-item active text-success">Yearly Income</span>
  </nav>
  @endsection
@section('content')
@php
    $toalamountsale=0;
    $totalpurchse=0;
    $toalotherCost=0;
@endphp

                    <h1 class=" text-center text-info font-weight-bold ">Yearly income Deteils</h1>
                   <hr class="bg-info mb-4">
                   <div class="row">
                    <div class="col-md-6">
                        <div class="card item-center">
                            <div class="card-header">
                                <h3 class="text-center text-info ">Form  Year </h3>
                            </div>
                            <div class="card-body">
                                <input type="date" class="form-control col-md-10 font-weight-bold text-success">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card item-center">
                            <div class="card-header">
                                <h3 class="text-center text-info ">To  Year </h3>
                            </div>
                            <div class="card-body">
                                <input type="date" class="form-control col-md-10 font-weight-bold text-success">
                            </div>
                        </div>
                    </div>
                   </div>
                   <hr class="bg-warning">
                 <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="text-center text-info ">Yearly Sales</h3>
                            </div>
                            <div class="card-body">
                                    <table id="Salestable" class="table">
                                      <thead>
                                        <tr>
                                            <th class="wd-15p">SL</th>
                                            <th class="wd-15p">Date</th>
                                            <th class="wd-15p">Invoice</th>
                                            <th class="wd-15p">C.name</th>
                                            <th class="wd-15p">Total</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                     @forelse ($sales as $key=>$sale )
                                         <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $sale->date }}</td>
                                            <td>{{ $sale->invoice_number }}</td>
                                            <td>{{ $sale->client_name }}</td>
                                            <td>{{ $sale->grand_total_amount }}</td>
                                         </tr>
                                         @php
                                         $toalamountsale += $sale->grand_total_amount
                                          @endphp
                                     @empty
                                     <tr>
                                        <td colspan="5"> No Data found</td>
                                     </tr>

                                     @endforelse
                                      </tbody>
                                      @php
                                          echo $toalamountsale;
                                      @endphp
                                    </table>
                                  </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="text-center text-info ">Yearly Purchase</h3>
                            </div>
                            <div class="card-body">
                                    <table id="Purchasetable" class="table">
                                      <thead>
                                        <tr>
                                            <th class="wd-15p">SL</th>
                                            <th class="wd-15p">Branch Name</th>
                                            <th class="wd-15p">Date </th>
                                            <th class="wd-15p">Invoice</th>
                                            <th class="wd-15p">Total</th>
                                            <th class="wd-15p">Grand Total</th>
                                        </tr>
                                      </thead>

                                      <tbody>
                                        @forelse ($purchse as $key=>$purchse )
                                        <tr>
                                           <td>{{ $key+1 }}</td>
                                           <td>{{ $purchse->branch_name }}</td>
                                           <td>{{ $purchse->date }}</td>
                                           <td>{{ $purchse->invoice_number }}</td>
                                           <td>{{ $purchse->total_amount }}</td>
                                           <td>{{ $purchse->grand_total }}</td>
                                        </tr>
                                        @php
                                             $totalpurchse += $purchse->grand_total
                                        @endphp
                                    @empty
                                    <tr>
                                       <td colspan="5"> No Data found</td>
                                    </tr>

                                    @endforelse
                                      </tbody>
                                      @php
                                          echo $totalpurchse
                                      @endphp
                                    </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="text-center text-info ">Yearly Other Cost</h3>
                            </div>
                            <div class="card-body">
                                    <table id="otherCost" class="table table-striped">
                                      <thead>
                                        <tr>
                                            <th class="wd-15p">SL</th>
                                            <th class="wd-15p">Branch Name</th>
                                            <th class="wd-15p">Date </th>
                                            <th class="wd-15p">Remark</th>
                                            <th class="wd-15p">Amount</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        @forelse ($othercost as $key=>$cost )
                                        <tr>
                                           <td>{{ $key+1 }}</td>
                                           <td>{{ $cost->branch_name }}</td>
                                           <td>{{ $cost->date }}</td>
                                           <td>{{ $cost->remark }}</td>
                                           <td>{{ $cost->amount }}</td>
                                        </tr>
                                        @php
                                        $toalotherCost += $cost->amount
                                         @endphp
                                    @empty
                                    <tr>
                                       <td colspan="5"> No Data found</td>
                                    </tr>

                                    @endforelse
                                      </tbody>
                                      @php
                                    echo  $toalotherCost
                                       @endphp
                                    </table>
                            </div>
                        </div>
                    </div>

                 </div>
                 <hr class="bg-info">
                 <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="text-center text-info">Sales && Purchase && Cost Amount</h2>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                <div class="col-md-4">
                                    <h5 class="text-center text-success">Yearly Sales Amount</h5>
                                    <input type="text" value="{{$toalamountsale  }}" class="form-control text-dark font-weight-bold text-center" placeholder="Total Sales" disabled>
                                </div>
                                <div class="col-md-4">
                                    <h5 class="text-center text-success">Yearly Purchase Amount</h5>
                                    <input type="text" value="{{ $totalpurchse }}" class="form-control text-dark font-weight-bold text-center" placeholder="Total Purchase Amount" disabled>
                                </div>
                                <div class="col-md-4">
                                    <h5 class="text-center text-success">Yearly Cost Amount</h5>
                                    <input type="text" value="{{ $toalotherCost }}" class="form-control text-dark font-weight-bold text-center" placeholder="Total Cost Amount" disabled >
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="text-info text-center">Yearly Total Income </h2>
                            </div>
                            @php
                                $totalincome=$toalamountsale-($totalpurchse+$toalotherCost);
                            @endphp
                            <div class="card-body text-center">
                               <h5 class="text-success">Total Amount : </h5> <br>
                                  <h4 class="text-info"><span class="text-danger">{{ $totalincome }}</span> </h4>
                            </div>
                        </div>
                    </div>
                   </div>
@endsection

@section('footer')
<script>
    $(document).ready( function () {
    $('#otherCost').DataTable();
} );
</script>
<script>
    $(document).ready( function () {
    $('#Purchasetable').DataTable();
} );
</script>
<script>
    $(document).ready( function () {
    $('#Salestable').DataTable();
} );
</script>
@endsection

