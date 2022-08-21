@extends('backend.dashboard.mastertemp')

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
                                  <option value="debit">------ Select Option  ------</option>
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
                                      <textarea type="text" class="form-control purpose" placeholder="Enter Purpose"></textarea>
                                      <span class="text-danger purpose_error"></span>
                                    </div>
                                    <div class="form-group">
                                      <label for="">spender</label>
                                      <input type="text" class="form-control amount" placeholder=" Enter spender">
                                      <span class="text-danger amount_error"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Debit & Credit</label>
                                        <select class="form-control debit_credit">
                                          <option value="debit">------ Select Option  ------</option>
                                          <option value="debit">debit</option>
                                          <option value="credit">credit</option>
                                        </select>
                                        <strong class="text-danger" id="debit_credit_error" ></strong>
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
                var company_id = jQuery('.company_id').val();
                var companyName = jQuery('.companyName').val();
                var companyAddress = jQuery('.companyAddress').val();
                var companyEmail = jQuery('.companyEmail').val();
                var companyPhNO = jQuery('.companyPhNO').val();
                var companyManagerName = jQuery('.companyManagerName').val();
                var due = jQuery('.due').val();

            $.ajax({
                url:'/company/insert',
                type:'POST',
                dataType:'json',
                data:{
                    'company_id':company_id,
                    'companyName':companyName,
                    'companyAddress':companyAddress,
                    'companyEmail':companyEmail,
                    'companyPhNO':companyPhNO,
                    'companyManagerName':companyManagerName,
                    'due':due
                },
                success:function(result){
                    if(result.msg == 'faild'){
                        jQuery('.company_id_error').text(result.errors.company_id);
                        jQuery('.companyName_error').text(result.errors.companyName);
                        jQuery('.companyAddress_error').text(result.errors.companyAddress);
                        jQuery('.companyEmail_error').text(result.errors.companyEmail);
                        jQuery('.companyPhNO_error').text(result.errors.companyPhNO);
                        jQuery('.companyManagerName_error').text(result.errors.companyManagerName);
                        jQuery('.due_error').text(result.errors.due);
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
                        jQuery('.company_id').val(null);
                        jQuery('.companyName').val(null);
                        jQuery('.companyAddress').val(null);
                        jQuery('.companyEmail').val(null);
                        jQuery('.companyPhNO').val(null);
                        jQuery('.companyManagerName').val(null);
                        jQuery('.due').val(null);

                    }
                }

            });

         });
         // **********************************************End Data Insert ************************************

              //*****************************show Data ************************
              function showData(){
              $.ajax({
                url:'/company/show',
                type:'GET',
                dataType:'json',
                success:function(result){
                    var sl=1;
                    jQuery('.datashow').html('');
                    $.each(result.data,function(key,item){
                      jQuery(".datashow").append('<tr>\
                            <td>'+sl+'</td>\
                            <td>'+item.company_id+'</td>\
                            <td>'+item.companyName+'</td>\
                            <td>'+item.companyAddress+'</td>\
                            <td> '+item.companyEmail+'</td>\
                            <td> '+item.companyPhNO+'</td>\
                            <td> '+item.companyManagerName+'</td>\
                            <td> '+item.due+'</td>\
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
               url:'/company/single/data/show/'+id,
               type:'GET',
               dataType:'json',
               success:function(result){
               jQuery('#id').val(result.data.id);
               jQuery('#company_id').val(result.data.company_id);
               jQuery('#companyName').val(result.data.companyName);
               jQuery('#companyAddress').val(result.data.companyAddress);
               jQuery('#companyEmail').val(result.data.companyEmail);
               jQuery('#companyPhNO').val(result.data.companyPhNO);
               jQuery('#companyManagerName').val(result.data.companyManagerName);
               jQuery('#due').val(result.data.due);
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
                        url:'/company/delete/'+id,
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
                var company_id = jQuery('#company_id').val();
                var companyName = jQuery('#companyName').val();
                var companyAddress = jQuery('#companyAddress').val();
                var companyEmail = jQuery('#companyEmail').val();
                var companyPhNO = jQuery('#companyPhNO').val();
                var companyManagerName = jQuery('#companyManagerName').val();
                var due = jQuery('#due').val();

            $.ajax({
                url:'/company/update/'+id,
                type:'POST',
                dataType:'json',
                data:{
                    'company_id':company_id,
                    'companyName':companyName,
                    'companyAddress':companyAddress,
                    'companyEmail':companyEmail,
                    'companyPhNO':companyPhNO,
                    'companyManagerName':companyManagerName,
                    'due':due
                },
                success:function(result){
                    if(result.msg == 'faild'){
                        jQuery('#company_id_error').text(result.errors.company_id);
                        jQuery('#companyName_error').text(result.errors.companyName);
                        jQuery('#companyAddress_error').text(result.errors.companyAddress);
                        jQuery('#companyEmail_error').text(result.errors.companyEmail);
                        jQuery('#companyPhNO_error').text(result.errors.companyPhNO);
                        jQuery('#companyManagerName_error').text(result.errors.companyManagerName);
                        jQuery('#due_error').text(result.errors.due);
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
                         jQuery('#id').val(null);
                         jQuery('#company_id').val(null);
                         jQuery('#companyName').val(null);
                         jQuery('#companyAddress').val(null);
                         jQuery('#companyEmail').val(null);
                         jQuery('#companyPhNO').val(null);
                         jQuery('#companyManagerName').val(null);
                         jQuery('#due').val(null);

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
