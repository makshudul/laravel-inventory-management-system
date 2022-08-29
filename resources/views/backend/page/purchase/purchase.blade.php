@extends('backend.dashboard.mastertemp')

@section('purchase')
    active
@endsection



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
        <div class="br-pagebody">
            <div class="br-section-wrapper">
                <h3>Add Purchase</h3>
                 <div class="border border-danger p-4">
                     <div class="row">
                        <div class="col-sm-4 mt-3">
                            <select class="form-control branch_name" >
                                <option value="">------ Select Branch ------</option>
                              </select>
                              <span class="text-danger branch_name_error"></span>
                          </div>
                        <div class="col-sm-4 mt-3">
                        <input type="text" class="form-control company_id" placeholder="Enter Company ID " >
                        <span class="text-danger company_id_error"></span>
                        </div>
                        <div class="col-sm-4 mt-3">
                        <input type="text" class="form-control company_name" placeholder="Enter Company Name " value="" >
                        <span class="text-danger company_name_error"></span>
                        </div>
                        <div class="col-sm-4 mt-3">
                        <input type="date" class="form-control date">
                        <span class="text-danger date_error"></span>
                        </div>
                        <div class="col-sm-4 mt-3">
                        <input type="text" class="form-control company_invoice" placeholder="Enter Invoice Number " >
                        <span class="text-danger company_invoice_error"></span>
                        </div>
                        <div class="col-sm-4 mt-3">
                        <input type="text" class="form-control company_due" placeholder="Company Due" disabled >
                        </div>

                     </div>

                </div>
                         <!---  this is second section --->
                    <div class="border border-info p-4 mt-4">
                        <div class="row">
                           <div class="col-sm-4 mt-3">
                            <input type="number" class="form-control product_code" placeholder="Enter Barcode " >
                            <span class="text-danger product_code_error"></span>
                             </div>
                           <div class="col-sm-4 mt-3">
                           <input type="number" class="form-control cost_price " placeholder="Cost Price " disabled>
                           <span class="text-danger cost_price_error"></span>
                           </div>
                           <div class="col-sm-4 mt-3">
                           <input type="number" class="form-control stock " placeholder=" Stock " disabled >
                           </div>
                           <div class="col-sm-4 mt-3">
                           <input type="text" class="form-control product_name" placeholder="Product Name " disabled>
                           <span class="text-danger product_name_error"></span>
                           </div>
                           <div class="col-sm-4 mt-3">
                           <input type="number" class="form-control product_quantity" placeholder="Enter Quantity " >
                           <span class="text-danger product_quantity_error"></span>
                           </div>
                           <div class="col-sm-4 mt-3">
                           <input type="number" class="form-control product_total" placeholder="Total " disabled >
                           <span class="text-danger product_total_error"></span>
                           </div>
                           <div class="col-sm-4 mt-3">
                            <button class="btn btn-success AddItem"> Add Item </button>
                            </div>
                        </div>
                   </div>


               <!---  this is third section --->
               <div class="border border-success p-4 mt-4 ">
                <div class="row">
                <div class="col-md-8">
                  <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Branch Name</th>
                            <th>Company Name</th>
                            <th>Date</th>
                            <th>Product name</th>
                            <th>Cost Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                <tbody class="datashow">

                </tbody>

                  </table>
                </div>
                <div class="col-md-4">
                    <div class="">
                     <input type="number" class="form-control grand_quantity" placeholder="Total Quantity " disabled >
                     <span class="text-danger grand_quantity_error"></span>
                      </div>
                    <div class=" mt-3">
                    <input type="number" class="form-control grand_total_amount" placeholder="Total Amount" disabled  >
                    <span class="text-danger grand_total_amount_error"></span>
                    </div>
                    <div class="mt-3">
                    <input type="number" class="form-control grand_less_amount" placeholder="Less Amount " >
                    <span class="text-danger grand_less_amount_error"></span>
                    </div>
                    <div class=" mt-3">
                    <input type="number" class="form-control grand_total" placeholder="Grand Total " disabled  >
                    <span class="text-danger grand_total_error"></span>
                    </div>
                    <div class=" mt-3">
                    <input type="text" class="form-control grand_payment" placeholder="Payment " >
                    <span class="text-danger grand_payment_error"></span>
                    </div>
                    <div class=" mt-3">
                    <input type="text" class="form-control grand_due" placeholder="Due Amount" value="0" disabled >
                    </div>
                    <div class=" mt-3 text-center">
                        <button class="btn btn-success"> Print </button>
                     <button class="btn btn-info SavePurchase"> Save and Delete </button>
                     </div>
                 </div>
           </div>


           </div>
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
        jQuery(document).on('click','.AddItem',function(){
            showData();
         $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
                var branch_name = jQuery('.branch_name').val();
                var company_id = jQuery('.company_id').val();
                var company_name = jQuery('.company_name').val();
                var date = jQuery('.date').val();
                var company_invoice = jQuery('.company_invoice').val();
                var company_due = jQuery('.company_due').val();
                var product_code = jQuery('.product_code').val();
                var cost_price = jQuery('.cost_price').val();
                var stock = jQuery('.stock').val();
                var product_name = jQuery('.product_name').val();
                var product_quantity = jQuery('.product_quantity').val();
                var product_total = jQuery('.product_total').val();

            $.ajax({
                url:'/purchase/insert',
                type:'POST',
                dataType:'json',
                data:{
                    'company_id':company_id,
                    'branch_name':branch_name,
                    'company_name':company_name,
                    'date':date,
                    'company_invoice':company_invoice,
                    'company_due':company_due,
                    'product_code':product_code,
                    'cost_price':cost_price,
                    'stock':stock,
                    'product_name':product_name,
                    'product_quantity':product_quantity,
                    'product_total':product_total,
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
                        jQuery('.stock_error').text(result.errors.stock);
                        jQuery('.product_name_error').text(result.errors.product_name);
                        jQuery('.product_quantity_error').text(result.errors.product_quantity);
                        jQuery('.product_total_error').text(result.errors.product_total);
                    }
                    else if(result.msg=='update'){
                        showData();
                        $('#DataInsertModal').modal('hide');
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
                        title: ' Product Purchase Update And Insert Successfully'
                        })

                         jQuery('.product_code').val(null);
                         jQuery('.cost_price').val(null);
                         jQuery('.stock').val(null);
                         jQuery('.product_name').val(null);
                         jQuery('.product_quantity').val(null);
                         jQuery('.product_total').val(null);


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
                        title: ' Product Purchase Insert Successfully'
                        })
                        jQuery('.product_code').val(null);
                         jQuery('.cost_price').val(null);
                         jQuery('.stock').val(null);
                         jQuery('.product_name').val(null);
                         jQuery('.product_quantity').val(null);
                         jQuery('.product_total').val(null);

                }
                }

            });

         });
         // **********************************************End Data Insert ************************************

              //*****************************show Data ************************
              function showData(){
              $.ajax({
                url:'/purchase/show',
                type:'GET',
                dataType:'json',
                success:function(result){
                    var sl=1;
                    var total_Quantity=0;
                    var product_total=0;
                    jQuery('.datashow').html('');
                    $.each(result.data,function(key,item){
                      jQuery(".datashow").append('<tr>\
                            <td>'+sl+'</td>\
                            <td>'+item.branch_name+'</td>\
                            <td>'+item.company_name+'</td>\
                            <td> '+item.date+'</td>\
                            <td> '+item.product_name+'</td>\
                            <td> '+item.cost_price+'</td>\
                            <td> '+item.product_quantity+'</td>\
                            <td> '+item.product_total+'</td>\
                            <td>\
                                <button class="btn btn-sm btn-danger productdelete" value="'+item.slug+'"><i class="fa fa-trash"></i> Delete</button>\
                            </td>\
                           </tr>');
                           total_Quantity+=item.product_quantity;
                           product_total+=item.product_total;
                           sl++;
                    });
                    jQuery('.grand_quantity').val(total_Quantity);
                    jQuery('.grand_total_amount').val(product_total);
                }

            });

        }

        // ****************************** end show Data**************************

        // ****************************** Delete Data **************************
        jQuery(document).on('click','.productdelete',function(){
            var slug=jQuery(this).val();
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
                        url:'/purchase/delete/'+slug,
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
                url:'/purchase/branch/show',
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

        //***************************start company Id keyup code ********************
      jQuery(document).on('keyup','.company_id',function(event){
        var company_id=jQuery(this).val();
        var branch_name=jQuery('.branch_name').val();
        $.ajax({
            url:'/purchase/branch/company/show/'+company_id+'/'+branch_name,
            type:'GET',
            dataType:'JSON',
            success:function(response){
                $.each(response.company,function(key,item){
                    jQuery(".company_name").val(item.companyName);
                    jQuery(".company_due").val(item.due);
                });
            }
        });

      });


        //*******************************end compoany id keyup code **********

                //***************************start Product Id keyup code ********************
      jQuery(document).on('keyup','.product_code',function(event){
        var product_id=jQuery(this).val();
        var branch_name=jQuery('.branch_name').val();
        // alert(branch_name)
        $.ajax({
            url:'/purchase/product/show/'+product_id+'/'+branch_name,
            type:'GET',
            dataType:'JSON',
            success:function(response){
                $.each(response.product,function(key,item){
                    jQuery(".cost_price").val(item.cost_price);
                    jQuery(".product_name").val(item.name);
                });
                $.each(response.stock,function(key,item){
                    jQuery(".stock").val(item.quantity);
                });

                // jQuery('.company_due').val(response.data.due);


            }
        });

      });


        //*******************************end product id keyup code **********

                //***************************start Product Quantity  keyup code ********************
      jQuery(document).on('keyup','.product_quantity',function(event){
        var quantity=parseInt(jQuery(this).val());
        var cost_price=parseInt(jQuery('.cost_price').val());

        var result =quantity*cost_price;
        jQuery('.product_total').val(result);
      });


        //*******************************end Product Quantity keyup code **********

                //***************************start Grand Less  amount  keyup code ********************
      jQuery(document).on('keyup','.grand_less_amount',function(event){
        var les_amount=jQuery(this).val();
        var grand_total_amount=jQuery('.grand_total_amount').val();

        var result =grand_total_amount-les_amount;
        jQuery('.grand_total').val(result);
      });


        //*******************************end Product Quantity keyup code **********

                //***************************start Grand payment  keyup code ********************
      jQuery(document).on('keyup','.grand_payment',function(event){
        var grand_payment=jQuery(this).val();
        var grand_total=jQuery('.grand_total').val();

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


        //*******************************end Product Quantity keyup code **********

        //*********************************product purchase summaries *************************//
        jQuery(document).on('click','.SavePurchase',function(){
            showData();
         $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
                var branch_name = jQuery('.branch_name').val();
                var company_id = jQuery('.company_id').val();
                var date = jQuery('.date').val();
                var company_invoice = jQuery('.company_invoice').val();
                var grand_total_amount= jQuery('.grand_total_amount').val();
                var grand_quantity= jQuery('.grand_quantity').val();
                var grand_less_amount= jQuery('.grand_less_amount').val();
                var grand_total= jQuery('.grand_total').val();
                var grand_payment= jQuery('.grand_payment').val();
                var grand_due = jQuery('.grand_due').val();

            $.ajax({
                url:'/purchase/insert/summaries',
                type:'POST',
                dataType:'json',
                data:{
                    'company_id':company_id,
                    'branch_name':branch_name,
                    'date':date,
                    'company_invoice':company_invoice,
                    'grand_total_amount':grand_total_amount,
                    'grand_quantity':grand_quantity,
                    'grand_less_amount':grand_less_amount,
                    'grand_total':grand_total,
                    'grand_payment':grand_payment,
                    'grand_due':grand_due,

                },
                success:function(result){
                    if(result.msg == 'faild'){
                        jQuery('.company_id_error').text(result.errors.company_id);
                        jQuery('.branch_name_error').text(result.errors.branch_name);
                        jQuery('.date_error').text(result.errors.date);
                        jQuery('.company_invoice_error').text(result.errors.company_invoice);
                        jQuery('.grand_total_amount_error').text(result.errors.grand_total_amount);
                        jQuery('.grand_less_amount_error').text(result.errors.grand_less_amount);
                        jQuery('.grand_total_error').text(result.errors.grand_total);
                        jQuery('.grand_payment_error').text(result.errors.grand_payment);
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
                        title:' Purchase Summary Successfully'
                        })
                         jQuery('.branch_name').val(null);
                         jQuery('.company_id').val(null);
                         jQuery('.date').val(null);
                         jQuery('.company_invoice').val(null);
                         jQuery('.grand_total_amount').val(null);
                         jQuery('.grand_quantity').val(null);
                         jQuery('.grand_less_amount').val(null);
                         jQuery('.grand_total').val(null);
                         jQuery('.grand_payment').val(null);
                         jQuery('.grand_due').val(null);
                         jQuery('.company_due').val(null);
                         jQuery('.company_name').val(null);

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
