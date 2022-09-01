@extends('backend.dashboard.mastertemp')

@section('sales')
    active
@endsection



@section('breadcrumb')
<h4>Sales</h4>
<nav class="breadcrumb pd-0 mg-0 tx-12">
    <a class="breadcrumb-item" href="index.html">Dashboard</a>
    <a class="breadcrumb-item" href="#">Sales</a>
    <span class="breadcrumb-item active text-success">Sales</span>
  </nav>
  @endsection
@section('content')
                <h1 class="text-center text-info">Sales</h1>
                 <div class="border border-danger p-3 mt-3">
                     <div class="row">
                        <div class="form-group form-inline p-2">
                                <label class="text-dark font-weight-bold" for=""> Branch Name : </label>
                                <select class="form-control branch_name mx-sm-3" >
                                    <option value="">------ Select Branch ------</option>
                                </select>
                                <span class="text-danger branch_name_error"></span>
                          </div>
                        <div class="form-group form-inline p-2">
                            <label class="text-dark font-weight-bold" for="">Date :</label>
                            <input type="date" class="form-control mx-sm-3  date">
                            <span class="text-danger date_error"></span>
                        </div>
                        <div class="form-group  form-inline p-2">
                            <label class="text-dark font-weight-bold" for="" class="control-label">Invoice : </label>
                            <input type="text" class="form-control mx-sm-3 invoice" placeholder="Enter Invoice Number " value="{{ $saleinvoce }}" disabled >
                            <span class="text-danger invoice_error"></span>
                          </div>
                        <div class="form-group  form-inline p-2">
                            <label class="text-dark font-weight-bold" for="" class="control-label">Client Name : </label>
                            <input type="text" class="form-control mx-sm-3  client_name" placeholder="Client Name "  >
                            <span class="text-danger client_name_error"></span>
                          </div>
                        <div class="form-group  form-inline p-2">
                            <label class="text-dark font-weight-bold" for="" class="control-label">Phone Number : </label>
                            <input type="number" class="form-control mx-sm-3  phone_number" placeholder="Phone Number "  >
                            <span class="text-danger phone_number_error"></span>
                          </div>
                     </div>

                </div>
                         <!---  this is second section --->
                    <div class="border border-info p-4 mt-4">
                        <div class="row">
                           <div class="form-group form-inline p-1">
                                <label for="" class="text-dark font-weight-bold">Product Code : </label>
                                <input type="number" class="form-control mx-sm-3 product_code" placeholder="Enter Barcode " >
                                <span class="text-danger product_code_error"></span>
                             </div>
                           <div class="form-group form-inline p-1">
                                <label for="" class="text-dark font-weight-bold">Product Name : </label>
                                <input type="text" class="form-control mx-sm-3 product_name" placeholder="Product Name" disabled>
                                <span class="text-danger product_name_error"></span>
                             </div>
                                <div class="form-group form-inline p-1">
                                    <label for="" class="text-dark font-weight-bold">Sales Price :</label>
                                    <input type="number" class="form-control mx-sm-3  sale_price " placeholder="Sale Price " disabled>
                                    <span class="text-danger sale_price_error"></span>
                               </div>

                               <div class="form-group form-inline p-1">
                                <label for="" class="text-dark font-weight-bold">Stock :</label>
                               <input type="text" class="form-control p mx-sm-3 stock" placeholder="Stock " disabled>
                               <span class="text-danger stock_error"></span>
                               </div>

                           <div class="form-group form-inline p-1">
                                <label for="" class="text-dark font-weight-bold">Quantity :</label>
                                <input type="number" class="form-control mx-sm-3  product_quantity" placeholder="Enter Quantity " >
                                <span class="text-danger product_quantity_error"></span>
                           </div>
                           <div class="form-group form-inline p-1">
                                <label for="" class="text-dark font-weight-bold">Total :</label>
                                <input type="number" class="form-control mx-sm-3  product_total" placeholder="Total " disabled >
                                <span class="text-danger product_total_error"></span>
                           </div>

                           <div class="form-group form-inline p-1">
                            <label for="" class="text-dark font-weight-bold">Discount :</label>
                           <input type="number" class="form-control mx-sm-3  discount " placeholder=" Discount " value="0" >
                           <span class="text-danger discount_error"></span>
                           </div>
                           <div class="form-group form-inline p-1">
                            <label for="" class="text-dark font-weight-bold">Grand Total :</label>
                           <input type="number" class="form-control mx-sm-3  productgrand_total" placeholder="Total " disabled >
                           <span class="text-danger productgrand_total_total_error"></span>
                           </div>
                           <div class="form-group p-2">
                            <button class="btn btn-success AddsalesItem " > Add Item </button>
                            </div>
                        </div>
                   </div>


               <!---  this is third section --->
               <div class="border border-success mt-3 ">
                   <div class="row">
                <div class="col-md-8 mt-2 col-xl-8 p-4">
                    <h3 class="text-center mb-2 font-weight-bold text-info">Sales History </h3>
                    <hr class="bg-warning">
                  <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>B.Name</th>
                            <th>Invoice</th>
                            <th>Date</th>
                            <th>C.Name</th>
                            <th>P.Name</th>
                            <th>P.Code</th>
                            <th>Q.</th>
                            <th>Total</th>
                            <th>%</th>
                            <th>G.Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                <tbody class="sales-datashow">

                </tbody>

                  </table>
                </div>
                <div class="col-md-4 col-xl-4  p-4">
                    <h3 class="text-center mb-2 font-weight-bold text-info">Total Calculation </h3>
                    <hr class="bg-warning">
                    <div class="form-group">
                        <label for="" class="text-dark font-weight-bold">Total Quantity</label>
                     <input type="number" class="form-control grand_quantity" placeholder="Total Quantity " disabled >
                     <span class="text-danger grand_quantity_error"></span>
                      </div>
                    <div class=" form-group mt-3">
                        <label for="" class="text-dark font-weight-bold">Total Amount</label>
                    <input type="number" class="form-control grand_total_amount" placeholder="Total Amount" disabled  >
                    <span class="text-danger grand_total_amount_error"></span>
                    </div>
                    <div class=" form-group mt-3">
                        <label for="" class="text-dark font-weight-bold">Payment</label>
                    <input type="text" class="form-control grand_payment" placeholder="Payment" >
                    <span class="text-danger grand_payment_error"></span>
                    </div>
                    <div class=" form-group mt-3">
                        <label for="" class="text-dark font-weight-bold">Customer Back</label>
                    <input type="text" class="form-control grand_due" placeholder="Due Amount" value="0" disabled >
                    </div>
                    <div class=" form-group mt-3 text-center">
                        <a href="{{ route('invoice',$saleinvoce) }}" class="btn btn-info saleTotalCal" target="_blank" >Print And Save</a>
                     {{-- <button class="btn btn-info "> Save and Delete </button> --}}
                     </div>
                 </div>
           </div>
     </div>


@endsection
@section('footer')
<script>
    jQuery(document).ready(function(){

        showbranchEditData();
        showData();
            // *************************************** DataInsert section *********************
        jQuery(document).on('click','.AddsalesItem',function(){
            showData();
         $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
                var branch_name = jQuery('.branch_name').val();
                var invoice = jQuery('.invoice').val();
                var date = jQuery('.date').val();
                var client_name = jQuery('.client_name').val();
                var phone_number = jQuery('.phone_number').val();
                var product_code = jQuery('.product_code').val();
                var product_name = jQuery('.product_name').val();
                var sale_price = jQuery('.sale_price').val();
                var product_quantity = jQuery('.product_quantity').val();
                var product_total = jQuery('.product_total').val();
                var discount = jQuery('.discount').val();
                var productgrand_total = jQuery('.productgrand_total').val();

            $.ajax({
                url:'/sales/insert',
                type:'POST',
                dataType:'json',
                data:{
                    'branch_name':branch_name,
                    'invoice':invoice,
                    'date':date,
                    'client_name':client_name,
                    'phone_number':phone_number,
                    'product_code':product_code,
                    'product_name':product_name,
                    'sale_price':sale_price,
                    'product_quantity':product_quantity,
                    'product_total':product_total,
                    'discount':discount,
                    'productgrand_total':productgrand_total,
                },
                success:function(result){
                    if(result.msg == 'faild'){
                        jQuery('.company_id_error').text(result.errors.company_id);
                        jQuery('.branch_name_error').text(result.errors.branch_name);
                        jQuery('.company_name_error').text(result.errors.company_name);
                        jQuery('.date_error').text(result.errors.date);
                        jQuery('.company_invoice_error').text(result.errors.company_invoice);
                        jQuery('.product_code_error').text(result.errors.product_code);
                        jQuery('.cost_price_error').text(result.errors.cost_price);
                        jQuery('.invoice_error').text(result.errors.invoice);
                        jQuery('.product_name_error').text(result.errors.product_name);
                        jQuery('.product_quantity_error').text(result.errors.product_quantity);
                        jQuery('.product_total_error').text(result.errors.product_total);
                    }
                    else if(result.msg=='success'){
                        showData();
                      const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                        })

                        Toast.fire({
                        icon: 'success',
                        title: 'Product Sales Successfolly'
                        })
                    }
                }

            });

         });
         // ***********
        // ***********************************End Data Insert ************************************

              //*****************************show Data ************************
              function showData(){
                var invoice=jQuery('.invoice').val();
                $.ajax({
                url:'/sales/show/'+invoice,
                type:'GET',
                dataType:'json',
                success:function(result){
                    var sl=1;
                    var total_Quantity=0;
                    var product_total=0;
                    jQuery('.sales-datashow').html('');
                    $.each(result.data,function(key,item){
                      jQuery(".sales-datashow").append('<tr>\
                            <td>'+sl+'</td>\
                            <td>'+item.branch_name+'</td>\
                            <td>'+item.invoice_number+'</td>\
                            <td> '+item.date+'</td>\
                            <td> '+item.client_name+'</td>\
                            <td> '+item.product_name+'</td>\
                            <td> '+item.product_code+'</td>\
                            <td> '+item.quantity+'</td>\
                            <td> '+item.total+'</td>\
                            <td> '+item.discount+'</td>\
                            <td> '+item.grand_total+'</td>\
                            <td>\
                                <button class="btn btn-sm btn-danger salesdelete" value="'+item.id+'"><i class="fa fa-trash"></i> Delete</button>\
                            </td>\
                           </tr>');
                           total_Quantity+=item.quantity;
                           product_total+=item.grand_total;
                           sl++;
                    });
                    jQuery('.grand_quantity').val(total_Quantity);
                    jQuery('.grand_total_amount').val(product_total);
                }

            });

        }

        // ****************************** end show Data**************************

        // ****************************** Delete Data **************************
        jQuery(document).on('click','.salesdelete',function(){
            var id=jQuery(this).val();
            Swal.fire({
                    title: 'Are you sure?',
                    text: "Please check your data , this data is deleted",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                        url:'/sales/delete/'+id,
                        type:'GET',
                        dataType:'JSON',
                        success:function(response){
                     if(response.msg=='success'){
                        showData();
                    Swal.fire(
                        'Deleted!',
                        'Your Data has been deleted.',
                        'success'
                        )
                  }
                  else{
                    Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                            footer: '<a href="">Why do I have this issue?</a>'
                            })

                  }
                }

            });

                    }
                    })

        });
         // ****************************** End Delete Data **************************

         //************************************ start branch show Data ***********************
         function showbranchEditData(){
              $.ajax({
                url:'/sales/branch/show',
                type:'GET',
                dataType:'json',
                success:function(result){
                    var sl=1;
                         jQuery('.branch_name').html('<option value="">------ Select Branch ------</option> ');
                    $.each(result.data,function(key,item){
                        jQuery('.branch_name').append('\
                        <option value="'+item.branch_name+'">'+item.branch_name+'</option>\
                        ');
                           sl++;
                    });

                }

            });
        }

        // ****************************** end Branch Show Data**************************

                //***************************start Product Id keyup code ********************
      jQuery(document).on('keyup','.product_code',function(event){
        var product_id=jQuery(this).val();
        var branch_name=jQuery('.branch_name').val();
        if(product_id==''){
            jQuery('.sale_price').val(null);
            jQuery('.product_name').val(null);
            jQuery('.stock').val(null);
            jQuery('.product_quantity').val(null);
            jQuery('.discount').val(null);
            jQuery('.productgrand_total').val(null);
            jQuery('.product_total').val(null);
        }
        else{
        $.ajax({
            url:'/sales/product/show/'+product_id+'/'+branch_name,
            type:'GET',
            dataType:'JSON',
            success:function(response){
                $.each(response.product,function(key,item){
                    jQuery(".sale_price").val(item.sale_price);
                    jQuery(".product_name").val(item.name);
                });
                $.each(response.stock,function(key,item){
                   var stock= jQuery(".stock").val(item.quantity);
                });



            }
        });
    }

      });


        //*******************************end product id keyup code **********

                //***************************start Product Quantity  keyup code ********************
      jQuery(document).on('keyup','.product_quantity',function(event){
        var stock=jQuery('.stock').val();
        var quantity=parseInt(jQuery(this).val());
        var sale_price=parseInt(jQuery('.sale_price').val());
        if(stock < quantity){
            Swal.fire('Stock is not Available')
            jQuery('.product_quantity').val(null);
            jQuery('.product_total').val(null);
            jQuery('.productgrand_total').val(null);
        }
        else if(stock==0){
            Swal.fire('Stock is null')
        }
        else{
         var result =quantity*sale_price;
        jQuery('.product_total').val(result);
        jQuery('.productgrand_total').val(result);
        }
    });

        //*******************************end Product Quantity keyup code **********

                //***************************start Discount  keyup code ********************
      jQuery(document).on('keyup','.discount',function(event){
        var discount=jQuery(this).val();
        var product_total=jQuery('.product_total').val();

        var discount_total=(product_total*discount)/100;
        var result=product_total-discount_total;

        jQuery('.productgrand_total').val(Math.ceil(result));

      });


        //*******************************end Product Discount keyup code **********

                //***************************start Grand payment  keyup code ********************
      jQuery(document).on('keyup','.grand_payment',function(event){
        var grand_payment=jQuery(this).val();
        var grand_total=jQuery('.grand_total_amount').val();

        var result =grand_total-grand_payment;
        jQuery('.grand_due').val(result);
      });


        //*******************************end Product Quantity keyup code **********

                //***************************start Grand payment  keyup code ********************
      jQuery(document).on('keyup','.grand_due',function(event){
        var grand_due=parseInt(jQuery(this).val());
        var company_due=parseInt(jQuery('.company_due').val());

        var result =grand_due+company_due;
        jQuery('.company_grand_due').val(result);
      });

        //*********************************product purchase summaries *************************//
        jQuery(document).on('click','.saleTotalCal',function(){
            showData();
         $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
                var branch_name = jQuery('.branch_name').val();
                var invoice = jQuery('.invoice').val();
                var date = jQuery('.date').val();
                var client_name = jQuery('.client_name').val();
                var phone_number = jQuery('.phone_number').val();
                var grand_quantity= jQuery('.grand_quantity').val();
                var grand_total_amount= jQuery('.grand_total_amount').val();
                var grand_payment= jQuery('.grand_payment').val();
            $.ajax({
                url:'/sales/insert/summaries',
                type:'POST',
                dataType:'json',
                data:{
                    'branch_name':branch_name,
                    'invoice':invoice,
                    'date':date,
                    'client_name':client_name,
                    'phone_number':phone_number,
                    'grand_quantity':grand_quantity,
                    'grand_total_amount':grand_total_amount,
                    'grand_payment':grand_payment,

                },
                success:function(result){
                    if(result.msg == 'faild'){
                        jQuery('.branch_name_error').text(result.errors.branch_name);
                        jQuery('.invoice_error').text(result.errors.invoice);
                        jQuery('.date_error').text(result.errors.date);
                        jQuery('.client_name_error').text(result.errors.client_name);
                        jQuery('.phone_number_error').text(result.errors.phone_number);
                        jQuery('.grand_quantity_error').text(result.errors.grand_quantity);
                        jQuery('.grand_total_amount_error').text(result.errors.grand_total_amount);
                    }
                    else{
                        showData();
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                        })

                        Toast.fire({
                        icon: 'success',
                        title:' Sales Summary Successfully'
                        })

                     location.reload();
                }
                }

            });

         });
        //*********************************end product purchase summaries *************************//

    });
</script>

    {{-- <script>
$(document).ready( function () {
    $('#datatable1').DataTable();
} );
    </script> --}}

@endsection
