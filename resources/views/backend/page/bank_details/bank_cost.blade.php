
@extends('backend.dashboard.mastertemp')

@section('breadcrumb')
<h4>Product</h4>
<nav class="breadcrumb pd-0 mg-0 tx-12">
    <a class="breadcrumb-item" href="index.html">Dashboard</a>
    <a class="breadcrumb-item" href="#">Bank Cost </a>
    <span class="breadcrumb-item active text-success">Bank Cost  </span>
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
                            <h5 class="modal-title" id="exampleModalLabel">Bank Cost Information</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                         </div>
                         <div class="modal-body">
                            <div class="form-group">
                              <label for="">Bank Id</label>
                              <input type="number" class="form-control bankId" placeholder="Bank ID">
                              <span class="text-danger bankId_error "></span>
                            </div>
                            <div class="form-group">
                              <label for="">Date</label>
                              <input type="date" class="form-control date"  >
                              <span class="text-danger date_error"></span>
                            </div>
                            <div class="form-group">
                              <label for="">Purpose </label>
                              <input type="text" class="form-control purpose" placeholder="Enter Purpose">
                              <span class="text-danger purpose_error"></span>
                            </div>
                            <div class="form-group">
                              <label for="">Amount </label>
                              <input type="number" class="form-control amount" placeholder=" Enter Amount">
                              <span class="text-danger amount_error"></span>
                            </div>
                            <div class="form-group">
                              <label for=""> Remark </label>
                              <input type="text" class="form-control remark" placeholder="Remark">
                              <span class="text-danger remark_error"></span>
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
                                <h5 class="modal-title" id="staticBackdropLabel">Data Show  </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <input type="number" class="form-control " id="id">
                                      <label for="">Bank Id</label>
                                      <input type="number" class="form-control " id="bankId" placeholder="Bank ID">
                                      <span class="text-danger " id="bankId_error"></span>
                                    </div>
                                    <div class="form-group">
                                      <label for="">Date</label>
                                      <input type="date" class="form-control" id="date"  >
                                      <span class="text-danger" id="date_error"></span>
                                    </div>
                                    <div class="form-group">
                                      <label for="">Purpose </label>
                                      <input type="text" class="form-control " id="purpose" placeholder="Enter Purpose">
                                      <span class="text-danger" id="purpose_error"></span>
                                    </div>
                                    <div class="form-group">
                                      <label for="">Amount </label>
                                      <input type="number" class="form-control " id="amount" placeholder=" Enter Amount">
                                      <span class="text-danger" id="amount_error"></span>
                                    </div>
                                    <div class="form-group">
                                      <label for=""> Remark </label>
                                      <input type="text" class="form-control " id="remark" placeholder="Remark">
                                      <span class="text-danger" id="remark_error"></span>
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
                    <h4 class="br-section-label text-center">Bank Cost  Information Table</h4>
                    <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#DataInsertModal"><i class="fas fa-plus"></i> Bank Cost  </button>
                  <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                      <thead>
                        <tr>
                          <th class="wd-15p">SL</th>
                          <th class="wd-15p">Bank ID</th>
                          <th class="wd-15p">Date</th>
                          <th class="wd-15p">Purpose</th>
                          <th class="wd-15p">amount</th>
                          <th class="wd-15p">remark</th>
                          <th class="wd-25p">Action</th>
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
                var bankId = jQuery('.bankId').val();
                var date = jQuery('.date').val();
                var purpose = jQuery('.purpose').val();
                var amount = jQuery('.amount').val();
                var remark = jQuery('.remark').val();

            $.ajax({
                url:'/bank/cost/insert',
                type:'POST',
                dataType:'json',
                data:{
                    'bankId':bankId,
                    'date':date,
                    'purpose':purpose,
                    'amount':amount,
                    'remark':remark
                },
                success:function(result){
                    if(result.msg == 'faild'){
                        jQuery('.bankId_error').text(result.errors.bankId);
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
                        title: ' Bank Cost Insert Successfully'
                        })
                        jQuery('.bankId').val(null);
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
                url:'/bank/cost/show',
                type:'GET',
                dataType:'json',
                success:function(result){
                    var sl=1;
                    jQuery('.datashow').html('');
                    $.each(result.data,function(key,item){
                      jQuery(".datashow").append('<tr>\
                            <td>'+sl+'</td>\
                            <td>'+item.bankId+'</td>\
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
               url:'/bank/cost/single/data/show/'+id,
               type:'GET',
               dataType:'json',
               success:function(result){
               jQuery('#id').val(result.data.id);
               jQuery('#bankId').val(result.data.bankId);
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
                        url:'/bank/cost/delete/'+id,
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
                var bankId = jQuery('#bankId').val();
                var date = jQuery('#date').val();
                var purpose = jQuery('#purpose').val();
                var amount = jQuery('#amount').val();
                var remark = jQuery('#remark').val();

            $.ajax({
                url:'/bank/cost/update/'+id,
                type:'POST',
                dataType:'json',
                data:{
                    'bankId':bankId,
                    'date':date,
                    'purpose':purpose,
                    'amount':amount,
                    'remark':remark
                },
                success:function(result){
                    if(result.msg == 'faild'){
                        jQuery('#bankId_error').text(result.errors.bankId);
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
                        title: 'Product Update Successfully'
                        })
                        jQuery('#bankId').val(null);
                        jQuery('#date').val(null);
                        jQuery('#purpose').val(null);
                        jQuery('#amount').val(null);
                        jQuery('#remark').val(null);

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
