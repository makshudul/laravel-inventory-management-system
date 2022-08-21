@extends('backend.dashboard.mastertemp')

@section('breadcrumb')
<h4>Product</h4>
<nav class="breadcrumb pd-0 mg-0 tx-12">
    <a class="breadcrumb-item" href="index.html">Dashboard</a>
    <a class="breadcrumb-item" href="#">Insert & Show Table</a>
    <span class="breadcrumb-item active">Insert & Show Table</span>
  </nav>
  @endsection
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
                    <!-- Modal -->
                    <div class="modal fade" id="DataInsertModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                         <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Product Modal</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                         </div>

                         <div class="modal-body">
                            <div class="form-group">
                              <label for="">Product Code</label>
                              <input type="number" class="form-control product_code">
                              <span class="text-danger product_code_error "></span>
                            </div>
                            <div class="form-group">
                              <label for="">Product Name</label>
                              <input type="text" class="form-control name" placeholder="Enter the Product Name" >
                              <span class="text-danger name_error"></span>
                            </div>
                            <div class="form-group">
                              <label for="">Description</label>
                              <textarea type="text" class="form-control des" placeholder="Enter the Descrition"></textarea>
                              <span class="text-danger des_error"></span>
                            </div>
                            <div class="form-group">
                              <label for="">Size</label>
                              <select class="form-control size ">
                                <option value="Unknow">------ Select Size ------</option>
                                <option value="M">M</option>
                                <option value="XL">XL</option>
                                <option value="XXL">XXL</option>
                              </select>
                              <span class="text-danger size_error"></span>
                            </div>
                            <div class="form-group">
                              <label for="">Color</label>
                              <input type="text" class="form-control color" placeholder="Enter Color" >
                              <span class="text-danger color_error"></span>
                            </div>
                            <div class="form-group">
                              <label for="">Cost Price</label>
                              <input type="number" class="form-control cost_price" placeholder="Enter Cost Price" >
                              <span class="text-danger cost_price_error"></span>
                            </div>
                            <div class="form-group">
                              <label for="">Sales Price</label>
                              <input type="number" class="form-control sale_price" placeholder="Enter Sales Price" >
                              <span class="text-danger sale_price_error"></span>
                            </div>
                       </div>

                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success SaveData">Data Submit</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End Modal -->
                                                        {{-- this is edit modal  --}}
                                                        <!-- Modal -->
                        <div class="modal fade" id="EditCategory" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Single Data Show </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <input type="text" class="form-control " id="id">
                                      <label for="">Product Code</label>
                                      <input type="text" class="form-control " id="product_code">
                                      <span class="text-danger  " id="product_code_error"></span>
                                    </div>
                                    <div class="form-group">
                                      <label for="">Product Name</label>
                                      <input type="text" class="form-control "id="name" placeholder="Enter the Product Name" >
                                      <span class="text-danger" id="name_error"></span>
                                    </div>
                                    <div class="form-group">
                                      <label for="">Description</label>
                                      <input type="text" class="form-control " id="des" placeholder="Enter the Descrition">
                                      <span class="text-danger" id="des_error"></span>
                                    </div>
                                    <div class="form-group">
                                      <label for="">Size</label>
                                      <select class="form-control " id="size">
                                        <option value="Unknow">------ Select Size ------</option>
                                        <option value="M">M</option>
                                        <option value="XL">XL</option>
                                        <option value="XXL">XXL</option>
                                      </select>
                                      <strong class="text-danger " id="size_error"></strong>
                                    </div>
                                    <div class="form-group">
                                      <label for="">Color</label>
                                      <input type="text" class="form-control" id="color" placeholder="Enter Color" >
                                      <span class="text-danger color_error"></span>
                                    </div>
                                    <div class="form-group">
                                      <label for="">Cost Price</label>
                                      <input type="text" class="form-control" id="cost_price" placeholder="Enter Cost Price" >
                                      <span class="text-danger" id="cost_price_error"></span>
                                    </div>
                                    <div class="form-group">
                                      <label for="">Sales Price</label>
                                      <input type="text" class="form-control" id="sale_price" placeholder="Enter Sales Price" >
                                      <span class="text-danger" id="sale_price_error"></span>
                                    </div>
                               </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-success updatemodal">Update</button>
                                </div>
                            </div>
                            </div>
                        </div>
            {{-- this is table information section    --}}
            <div class="br-pagebody">
                <div class="br-section-wrapper">
                    <h4 class="br-section-label text-center">Product Information Table</h4>
                    <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#DataInsertModal"><i class="fas fa-plus"></i> Add Product </button>
                  <div class="table-wrapper">
                    <table id="datatable1" class="table display ">
                      <thead>
                        <tr>
                          <th class="wd-15p">SL</th>
                          <th class="wd-15p">Product Code</th>
                          <th class="wd-15p">Product Name</th>
                          <th class="wd-20p">Description</th>
                          <th class="wd-15p">Size</th>
                          <th class="wd-15p">Color</th>
                          <th class="wd-15p">Cost Price</th>
                          <th class="wd-15p">Sales Price</th>
                          <th class="wd-25p">Action</th>
                          <th class="wd-25p">**</th>
                        </tr>
                      </thead>
                      <tbody class="datashow">
                      </tbody>
                    </table>
                  </div><!-- table-wrapper -->
            </div>
    </div>
</div>
@endsection

@section('footer')
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
         var product_code = jQuery('.product_code').val();
         var name = jQuery('.name').val();
         var des = jQuery('.des').val();
         var size = jQuery('.size').val();
         var color = jQuery('.color').val();
         var cost_price = jQuery('.cost_price').val();
         var sale_price = jQuery('.sale_price').val();

            $.ajax({
                url:'/product/insert',
                type:'POST',
                dataType:'json',
                data:{
                    'product_code':product_code,
                    'name':name,
                    'des':des,
                    'size':size,
                    'color':color,
                    'cost_price':cost_price,
                    'sale_price':sale_price
                },
                success:function(result){
                    if(result.msg == 'faild'){
                        jQuery('.product_code_error').text(result.errors.product_code);
                        jQuery('.name_error').text(result.errors.name);
                        jQuery('.des_error').text(result.errors.des);
                        jQuery('.color_error').text(result.errors.color);
                        jQuery('.cost_price_error').text(result.errors.cost_price);
                        jQuery('.sale_price_error').text(result.errors.sale_price);
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
                        title: 'Product Insert Successfully'
                        })
                          jQuery('.product_code').val(null);
                          jQuery('.name').val(null);
                          jQuery('.des').val(null);
                          jQuery('.size').val(null);
                          jQuery('.color').val(null);
                          jQuery('.cost_price').val(null);
                          jQuery('.sale_price').val(null);

                    }
                }

            });

         });
         // **********************************************End Data Insert ************************************

              //*****************************show Data ************************
              function showData(){
              $.ajax({
                url:'/product/show',
                type:'GET',
                dataType:'json',
                success:function(result){
                    var sl=1;
                    jQuery('.datashow').html('');
                    $.each(result.data,function(key,item){
                      jQuery(".datashow").append('<tr>\
                            <td>'+sl+'</td>\
                            <td>'+item.product_code+'</td>\
                            <td>'+item.name+'</td>\
                            <td>'+item.des+'</td>\
                            <td> '+item.size+'</td>\
                            <td> '+item.color+'</td>\
                            <td> '+item.cost_price+'</td>\
                            <td> '+item.sale_price+'</td>\
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
               url:'/product/single/data/show/'+id,
               type:'GET',
               dataType:'json',
               success:function(result){
                 jQuery('#id').val(result.data.id);
                 jQuery('#product_code').val(result.data.product_code);
                 jQuery('#name').val(result.data.name);
                 jQuery('#des').val(result.data.des);
                 jQuery('#size').val(result.data.size);
                 jQuery('#color').val(result.data.color);
                 jQuery('#cost_price').val(result.data.cost_price);
                 jQuery('#sale_price').val(result.data.sale_price);
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
                        url:'/product/delete/'+id,
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
                var id=jQuery('#id').val();
                var product_code = jQuery('#product_code').val();
                var name = jQuery('#name').val();
                var des = jQuery('#des').val();
                var size = jQuery('#size').val();
                var color = jQuery('#color').val();
                var cost_price = jQuery('#cost_price').val();
                var sale_price = jQuery('#sale_price').val();

            $.ajax({
                url:'/product/update/'+id,
                type:'POST',
                dataType:'json',
                data:{
                    'product_code':product_code,
                    'name':name,
                    'des':des,
                    'size':size,
                    'color':color,
                    'cost_price':cost_price,
                    'sale_price':sale_price
                },
                success:function(result){
                    if(result.msg == 'faild'){
                        jQuery('#product_code_error').text(result.errors.product_code);
                        jQuery('#name_error').text(result.errors.name);
                        jQuery('#des_error').text(result.errors.des);
                        jQuery('#color_error').text(result.errors.color);
                        jQuery('#cost_price_error').text(result.errors.cost_price);
                        jQuery('#sale_price_error').text(result.errors.sale_price);
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
                        title: 'Product Update Successfully'
                        })
                          jQuery('#product_code').val(null);
                          jQuery('#name').val(null);
                          jQuery('#des').val(null);
                          jQuery('#size').val(null);
                          jQuery('#color').val(null);
                          jQuery('#cost_price').val(null);
                          jQuery('#sale_price').val(null);

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

@endsection
