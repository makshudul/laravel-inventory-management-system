@extends('backend.dashboard.mastertemp')

@section('stock')
    active
@endsection
@section('buy')
    active
@endsection


@section('breadcrumb')
<h4>Need Buy Product</h4>
<nav class="breadcrumb pd-0 mg-0 tx-12">
    <a class="breadcrumb-item" href="index.html">Dashboard</a>
    <a class="breadcrumb-item" href="#">Need Buy Product</a>
    <span class="breadcrumb-item active text-success">Need Buy Product</span>
  </nav>
  @endsection
@section('content')

                    <h1 class=" text-center text-info font-weight-bold ">Need Buy Product Table</h1>
                   <hr class="bg-info mb-4">
                  <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                      <thead>
                        <tr>
                            <th class="wd-15p">SL</th>
                            <th class="wd-15p">Branch Name</th>
                            <th class="wd-15p">Product Code </th>
                            <th class="wd-15p">Quantity</th>
                            <th class="wd-15p">Product Name</th>
                            <th class="wd-15p">Description</th>
                            <th class="wd-15p">Cost Price</th>
                            <th class="wd-15p">Sales Price</th>
                        </tr>
                      </thead>
                      <tbody class="datashow">
                      @foreach ($buydata as $key=>$buydata )
                      <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $buydata->branch_name}}</td>
                        <td>{{ $buydata->product_code }}</td>
                        <td>{{ $buydata->quantity }}</td>
                      <!------ this is relation Stock Model -->
                      <td>{{ $buydata->rel_to_product->name}}</td>
                      <td>{{ $buydata->rel_to_product->des}}</td>
                      <td>{{ $buydata->rel_to_product->cost_price}}</td>
                      <td>{{ $buydata->rel_to_product->sale_price}}</td>
                    </tr>
                      @endforeach
                      </tbody>
                    </table>
                  </div><!-- table-wrapper -->
@endsection

{{-- @section('footer')
<script>
    jQuery(document).ready(function(){
        showData();
            // *************************************** DataInsert section *********************
        jQuery(document).on('click','.SaveData',function(){
         $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
                var branch_name = jQuery('.branch_name').val();
                var date = jQuery('.date').val();
                var purpose = jQuery('.purpose').val();
                var amount = jQuery('.amount').val();
                var remark = jQuery('.remark').val();

            $.ajax({
                url:'/cost/insert',
                type:'POST',
                dataType:'json',
                data:{
                    'branch_name':branch_name,
                    'date':date,
                    'purpose':purpose,
                    'amount':amount,
                    'remark':remark
                },
                success:function(result){
                    if(result.msg == 'faild'){
                        jQuery('.branch_name_error').text(result.errors.branch_name);
                        jQuery('.date_error').text(result.errors.date);
                        jQuery('.purpose_error').text(result.errors.purpose);
                        jQuery('.amount_error').text(result.errors.amount);
                        jQuery('.remark_error').text(result.errors.remark);
                    }
                    else{
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
                        title: 'Cost Insert Successfully'
                        })
                        jQuery('.branch_name').val(null);
                        jQuery('.date').val(null);
                        jQuery('.purpose').val(null);
                        jQuery('.amount').val(null);
                        jQuery('.remark').val(null);

                    }
                }

            });

         });
         // **********************************************End Data Insert ************************************

              //*****************************show Data ************************
              function showData(){
              $.ajax({
                url:'/cost/show',
                type:'GET',
                dataType:'json',
                success:function(result){
                    var sl=1;
                    jQuery('.datashow').html('');
                    $.each(result.data,function(key,item){
                      jQuery(".datashow").append('<tr>\
                            <td>'+sl+'</td>\
                            <td>'+item.branch_name+'</td>\
                            <td>'+item.date+'</td>\
                            <td>'+item.purpose+'</td>\
                            <td> '+item.amount+'</td>\
                            <td> '+item.remark+'</td>\
                            <td>\
                                <button class="btn btn-sm btn-info productedit" data-target="#EditCategory"  data-toggle="modal" value="'+item.id+'"><i class="fa fa-edit"></i> Edit</button>\
                                <button class="btn btn-sm btn-danger productdelete" value="'+item.id+'"><i class="fa fa-trash"></i> Delete</button>\
                            </td>\
                           </tr>');
                           sl++;
                    });

                }

            });
        }

        // ****************************** end show Data**************************


        // ****************************** Single Data view then Update **************************
        jQuery(document).on('click','.productedit',function(){
            var id=jQuery(this).val();
            $.ajax({
               url:'/cost/single/data/show/'+id,
               type:'GET',
               dataType:'json',
               success:function(result){
               jQuery('#id').val(result.data.id);
               jQuery('#branch_name').val(result.data.branch_name);
               jQuery('#date').val(result.data.date);
               jQuery('#purpose').val(result.data.purpose);
               jQuery('#amount').val(result.data.amount);
               jQuery('#remark').val(result.data.remark);
               }

           });

        });
        // ****************************** End Single Data view then Update **************************

        // ****************************** Delete Data **************************
        jQuery(document).on('click','.productdelete',function(){
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
                        url:'/cost/delete/'+id,
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

         // ****************************** Update Data  *****************************
         jQuery(document).on('click','.updatemodal',function(){
         $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
                var id = jQuery('#id').val();
                var branch_name = jQuery('#branch_name').val();
                var date = jQuery('#date').val();
                var purpose = jQuery('#purpose').val();
                var amount = jQuery('#amount').val();
                var remark = jQuery('#remark').val();

            $.ajax({
                url:'/cost/update/'+id,
                type:'POST',
                dataType:'json',
                data:{
                    'branch_name':branch_name,
                    'date':date,
                    'purpose':purpose,
                    'amount':amount,
                    'remark':remark
                },
                success:function(result){
                    if(result.msg == 'faild'){
                        jQuery('#branch_name_error').text(result.errors.branch_name);
                        jQuery('#date_error').text(result.errors.date);
                        jQuery('#purpose_error').text(result.errors.purpose);
                        jQuery('#amount_error').text(result.errors.amount);
                        jQuery('#remark_error').text(result.errors.remark);
                    }
                   else{
                        showData();
                        $('#EditCategory').modal('hide');
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
                        title: 'Cost Update Successfully'
                        })
                        jQuery('#branch_name').val(null);
                        jQuery('#date').val(null);
                        jQuery('#purpose').val(null);
                        jQuery('#amount').val(null);
                        jQuery('#remark').val(null);
                        // this is error value null code
                        jQuery('#branch_name_error').text(null);
                        jQuery('#date_error').text(null);
                        jQuery('#purpose_error').text(null);
                        jQuery('#amount_error').text(null);
                        jQuery('#remark_error').text(null);

                    }
                }

            });

         });


    });
</script>

    {{-- <script>
$(document).ready( function () {
    $('#datatable1').DataTable();
} );
    </script> --}}

{{-- @endsection --}} --}}
