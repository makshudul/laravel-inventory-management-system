@extends('backend.dashboard.mastertemp')

@section('bank')
    active
@endsection


@section('breadcrumb')
<h4>Product</h4>
<nav class="breadcrumb pd-0 mg-0 tx-12">
    <a class="breadcrumb-item" href="index.html">Dashboard</a>
    <a class="breadcrumb-item" href="#">Bank Saving</a>
    <span class="breadcrumb-item active text-success">Bank Saving</span>
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
                            <h5 class="modal-title" id="exampleModalLabel">Bank Saving</h5>
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
                                <label for="">Branch Name</label>
                                <select class="form-control branch_name" >
                                  <option value="Bogura">------ Select Branch ------</option>
                                </select>
                                <span class="text-danger branch_name_error" ></span>
                              </div>
                            <div class="form-group">
                              <label for="">Date</label>
                              <input type="date" class="form-control date"  >
                              <span class="text-danger date_error"></span>
                            </div>
                            <div class="form-group">
                              <label for="">Purpose </label>
                              <textarea type="text" class="form-control purpose" placeholder="Enter Purpose"></textarea>
                              <span class="text-danger purpose_error"></span>
                            </div>
                            <div class="form-group">
                              <label for="">spender</label>
                              <input type="text" class="form-control spender" placeholder=" Enter spender">
                              <span class="text-danger amount_error"></span>
                            </div>
                            <div class="form-group">
                                <label for="">Debit & Credit</label>
                                <select class="form-control debit_credit">

                                  <option value="debit">debit</option>
                                  <option value="credit">credit</option>
                                </select>
                                <strong class="text-danger" id="debit_credit_error" ></strong>
                              </div>
                              <div class="form-group">
                                <label for="">Amount</label>
                                <input type="text" class="form-control amount" placeholder=" Enter amount">
                                <span class="text-danger amount_error"></span>
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
                                    <input type="number" class="form-control " id="id">
                                    <div class="form-group">
                                      <label for="">Bank Id</label>
                                      <input type="number" class="form-control " id="bankId" placeholder="Bank ID">
                                      <span class="text-danger bankId_error "></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Branch Name</label>
                                        <select class="form-control" id="branch_name" >
                                          <option value="">------ Select Branch ------</option>
                                        </select>
                                        <span class="text-danger branch_name_error" ></span>
                                      </div>
                                    <div class="form-group">
                                      <label for="">Date</label>
                                      <input type="date" class="form-control " id="date"  >
                                      <span class="text-danger date_error"></span>
                                    </div>
                                    <div class="form-group">
                                      <label for="">Purpose </label>
                                      <textarea type="text" class="form-control" id="purpose" placeholder="Enter Purpose"></textarea>
                                      <span class="text-danger purpose_error"></span>
                                    </div>
                                    <div class="form-group">
                                      <label for="">spender</label>
                                      <input type="text" class="form-control" id="spender" placeholder=" Enter spender">
                                      <span class="text-danger spender_error"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Debit & Credit</label>
                                        <select class="form-control " id="debit_credit">
                                          <option value="">------ Select Option  ------</option>
                                          <option value="debit">Debit</option>
                                          <option value="credit">Credit</option>
                                        </select>
                                        <strong class="text-danger" id="debit_credit_error" ></strong>
                                      </div>
                                      <div class="form-group">
                                        <label for="">Amount</label>
                                        <input type="text" class="form-control" id="amount" placeholder=" Enter amount">
                                        <span class="text-danger amount_error"></span>
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
                    <h4 class="br-section-label text-center">Company Information Table</h4>
                    <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#DataInsertModal"><i class="fas fa-plus"></i> Add Company </button>
                  <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                      <thead>
                        <tr>
                            <th class="wd-15p">SL</th>
                            <th class="wd-15p">Bank ID</th>
                            <th class="wd-15p">Branch Name</th>
                            <th class="wd-15p">Date</th>
                            <th class="wd-15p">Purpose</th>
                            <th class="wd-15p">spender</th>
                            <th class="wd-15p">Debit</th>
                            <th class="wd-15p">Credit</th>
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
</div>
@endsection

@section('footer')
<script>
    jQuery(document).ready(function(){
        showbranchEditData();
        showData();
            // *************************************** DataInsert section *********************
        jQuery(document).on('click','.SaveData',function(){
         $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
                var bankId = jQuery('.bankId').val();
                var branch_name = jQuery('.branch_name').val();
                var date = jQuery('.date').val();
                var purpose = jQuery('.purpose').val();
                var spender = jQuery('.spender').val();
                var debit_credit = jQuery('.debit_credit').val();
                var amount = jQuery('.amount').val();

            $.ajax({
                url:'/bank/saving/insert',
                type:'POST',
                dataType:'json',
                data:{
                    'bankId':bankId,
                    'branch_name':branch_name,
                    'date':date,
                    'purpose':purpose,
                    'spender':spender,
                    'debit_credit':debit_credit,
                    'amount':amount,
                },
                success:function(result){
                    if(result.msg == 'faild'){
                        jQuery('.bankId_error').text(result.errors.bankId);
                        jQuery('.branch_name_error').text(result.errors.branch_name);
                        jQuery('date_error').text(result.errors.date);
                        jQuery('.purpose_error').text(result.errors.purpose);
                        jQuery('.spender_error').text(result.errors.spender);
                        jQuery('.debit_credit_error').text(result.errors.debit_credit);
                        jQuery('.amount_error').text(result.errors.amount);
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
                        jQuery('.bankId').val(null);
                        jQuery('.branch_name').val(null);
                        jQuery('.date').val(null);
                        jQuery('.purpose').val(null);
                        jQuery('.spender').val(null);
                        jQuery('.debit_credit').val(null);
                        jQuery('.amount').val(null);

                    }
                }

            });

         });
         // **********************************************End Data Insert ************************************

              //*****************************show Data ************************
              function showData(){
              $.ajax({
                url:'/bank/saving/show',
                type:'GET',
                dataType:'json',
                success:function(result){
                    var sl=1;
                    jQuery('.datashow').html('');
                    $.each(result.data,function(key,item){
                      jQuery(".datashow").append('<tr>\
                            <td>'+sl+'</td>\
                            <td>'+item.bankId+'</td>\
                            <td>'+item.branch_name+'</td>\
                            <td>'+item.date+'</td>\
                            <td> '+item.purpose+'</td>\
                            <td> '+item.spender+'</td>\
                            <td> '+item.debit+'</td>\
                            <td> '+item.credit+'</td>\
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
               url:'/bank/saving/single/data/show/'+id,
               type:'GET',
               dataType:'json',
               success:function(result){
               jQuery('#id').val(result.data.id);
               jQuery('#bankId').val(result.data.bankId);
               jQuery('#branch_name').val(result.data.branch_name);
               jQuery('#date').val(result.data.date);
               jQuery('#purpose').val(result.data.purpose);
               jQuery('#spender').val(result.data.spender);
               if(result.data.debit==null){
                jQuery('#debit_credit').html('<option value="credit">Credit</option>');
                jQuery('#debit_credit').append('<option value="debit">Debit</option>');
               jQuery('#amount').val(result.data.credit);
               }
               else{
                jQuery('#debit_credit').html('<option value="debit">Debit</option>');
                jQuery('#debit_credit').append('<option value="credit">Credit</option>');
                jQuery('#amount').val(result.data.debit);
               }

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
                        url:'/bank/saving/delete/'+id,
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
                var branch_name = jQuery('#branch_name').val();
                var date = jQuery('#date').val();
                var purpose = jQuery('#purpose').val();
                var spender = jQuery('#spender').val();
                var debit_credit = jQuery('#debit_credit').val();
                var amount = jQuery('#amount').val();

            $.ajax({
                url:'/bank/saving/update/'+id,
                type:'POST',
                dataType:'json',
                data:{
                    'bankId':bankId,
                    'branch_name':branch_name,
                    'date':date,
                    'purpose':purpose,
                    'spender':spender,
                    'debit_credit':debit_credit,
                    'amount':amount,
                },
                success:function(result){
                    if(result.msg == 'faild'){
                        jQuery('#bankId_error').text(result.errors.bankId);
                        jQuery('#branch_name_error').text(result.errors.branch_name);
                        jQuery('#date_error').text(result.errors.date);
                        jQuery('#purpose_error').text(result.errors.purpose);
                        jQuery('#spender_error').text(result.errors.spender);
                        jQuery('#debit_credit_error').text(result.errors.debit_credit);
                        jQuery('#amount_error').text(result.errors.amount);
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
                        jQuery('#id').val(null);
                        jQuery('#branch_name').val(null);
                        jQuery('#date').val(null);
                        jQuery('#purpose').val(null);
                        jQuery('#spender').val(null);
                        jQuery('#debit_credit').val(null);
                        jQuery('#amount').val(null);

                    }
                }

            });

         });

         function showbranchEditData(){
              $.ajax({
                url:'/bank/saving/branch/show',
                type:'GET',
                dataType:'json',
                success:function(result){
                         jQuery('.branch_name').html('<option value="">------ Select Option  ------</option>');
                    $.each(result.data,function(key,item){
                        jQuery('.branch_name').append('\
                        <option value="'+item.branch_name+'">'+item.branch_name+'</option>\
                        ');
                    });
                    jQuery('#branch_name').html(' ');
                    $.each(result.data,function(key,item){
                        jQuery('#branch_name').append('\
                        <option value="'+item.branch_name+'">'+item.branch_name+'</option>\
                        ');
                    });

                }

            });
        }

        // ****************************** end Branch Show Data**************************
    });
</script>

    {{-- <script>
$(document).ready( function () {
    $('#datatable1').DataTable();
} );
    </script> --}}

@endsection
