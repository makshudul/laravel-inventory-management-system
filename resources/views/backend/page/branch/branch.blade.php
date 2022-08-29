@extends('backend.dashboard.mastertemp');
@section('branch')
    active
@endsection

@section('breadcrumb')
<h4>Branch</h4>
<nav class="breadcrumb pd-0 mg-0 tx-12">
    <a class="breadcrumb-item" href="index.html">Dashboard</a>
    <a class="breadcrumb-item" href="#">Branch</a>
    <span class="breadcrumb-item active">Branch</span>
  </nav>
@endsection
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
                                <!-- Button trigger modal -->
                        <!-- Modal -->
                        <div class="modal fade" id="DataInsertModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Branch </h5>
                            </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="">Branch Name</label>
                                        <input type="text" class="form-control branch_name" placeholder="Enter Branch Name" >
                                        <span class="text-danger branch_name_error"></span>
                                      </div>
                                    <div class="form-group">
                                        <label for="">Manager Name</label>
                                        <input type="text" class="form-control manager" placeholder="Enter Manager Name" >
                                        <span class="text-danger Manager_error"></span>
                                   </div>
                                    <div class="form-group">
                                        <label for="">Phone</label>
                                        <input type="number" class="form-control phone" placeholder="Enter the Phone Name">
                                        <span class="text-danger phone_error"></span>
                                   </div>
                                    <div class="form-group">
                                        <label for="">email</label>
                                        <input type="email" class="form-control email" placeholder="Enter Email">
                                        <span class="text-danger email_error"></span>
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


                                       <!-- Edit Modal -->
                                       <div class="modal fade" id="EditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Add Branch </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                                <div class="modal-body">
                                                    <input type="number" class="form-control " id="id"  >
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="Branch_name" placeholder="Enter Branch Name">
                                                        <span class="text-danger " id="branch_name_error"></span>
                                                      </div>
                                                    <div class="form-group">
                                                        <label for="">Manager Name</label>
                                                        <input type="text" class="form-control " id="manager" placeholder="Enter Manager Name" >
                                                        <span class="text-danger" id="Manager_error"></span>
                                                   </div>
                                                    <div class="form-group">
                                                        <label for="">Phone</label>
                                                        <input type="number" class="form-control" id="phone" placeholder="Enter the Phone Name">
                                                        <span class="text-danger" id="phone_error"></span>
                                                   </div>
                                                    <div class="form-group">
                                                        <label for="">email</label>
                                                        <input type="email" class="form-control" id="email" placeholder="Enter Email">
                                                        <span class="text-danger" id="email_error"></span>
                                                   </div>
                                               </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-success updateModal ">Update</button>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                   <!-- End Modal -->
                {{-- this is table information section    --}}
                <div class="br-pagebody">
                    <div class="br-section-wrapper">
                        <h4 class="br-section-label text-center">Product Information Table</h4>
                        <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#DataInsertModal"><i class="fas fa-plus"></i> Add Branch </button>
                    <div class="table-wrapper">
                        <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                            <tr>
                            <th class="wd-15p">Sl</th>
                            <th class="wd-15p">Branch Name</th>
                            <th class="wd-20p">Manager name</th>
                            <th class="wd-15p">Phone</th>
                            <th class="wd-10p">Email</th>
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
        showData();
            // *************************************** DataInsert section *********************
        jQuery(document).on('click','.SaveData',function(){
         $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

         var branch_name = jQuery('.branch_name').val();
         var manager = jQuery('.manager').val();
         var phone = jQuery('.phone').val();
         var email = jQuery('.email').val();

            $.ajax({
                url:'/branch/insert',
                type:'POST',
                dataType:'json',
                data:{
                    'branch_name':branch_name,
                    'manager':manager,
                    'phone':phone,
                    'email':email,
                },
                success:function(result){
                    if(result.msg == 'faild'){
                        jQuery('.branch_name_error').text(result.errors.branch_name);
                        jQuery('.manager_error').text(result.errors.manager);
                        jQuery('.phone_error').text(result.errors.phone);
                        jQuery('.email_error').text(result.errors.email);
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
                        jQuery('.branch_name').val(null);
                        jQuery('.manager').val(null);
                        jQuery('.phone').val(null);
                        jQuery('.email').val(null);

                    }
                }

            });

         });
         // **********************************************End Data Insert ************************************

              //*****************************show Data ************************
              function showData(){
              $.ajax({
                url:'/branch/show',
                type:'GET',
                dataType:'json',
                success:function(result){
                    var sl=1;
                    jQuery('.datashow').html('');
                    $.each(result.data,function(key,item){
                      jQuery(".datashow").append('<tr>\
                            <td>'+sl+'</td>\
                            <td>'+item.branch_name+'</td>\
                            <td>'+item.manger_name+'</td>\
                            <td>'+item.phone+'</td>\
                            <td> '+item.email+'</td>\
                            <td>\
                                <button class="btn btn-sm btn-info productedit" data-target="#EditModal"  data-toggle="modal" value="'+item.id+'"><i class="fa fa-edit"></i> Edit</button>\
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
               url:'/branch/single/data/show/'+id,
               type:'GET',
               dataType:'json',
               success:function(result){
                 jQuery('#id').val(result.data.id);
                 jQuery('#Branch_name').val(result.data.branch_name);
                 jQuery('#manager').val(result.data.manger_name);
                 jQuery('#phone').val(result.data.phone);
                 jQuery('#email').val(result.data.email);
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
                        url:'/branch/delete/'+id,
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
         jQuery(document).on('click','.updateModal',function(){
         $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var id=jQuery('#id').val();
            var branch_name = jQuery('#Branch_name').val();
            var manager = jQuery('#manager').val();
            var phone = jQuery('#phone').val();
            var email = jQuery('#email').val();

            $.ajax({
                url:'/branch/update/'+id,
                type:'POST',
                dataType:'json',
                data:{
                    'branch_name':branch_name,
                    'manager':manager,
                    'phone':phone,
                    'email':email,
                },
                success:function(result){
                    if(result.msg == 'faild'){
                        jQuery('#branch_name_error').text(result.errors.branch_name);
                        jQuery('#Manager_error').text(result.errors.manager);
                        jQuery('#phone_error').text(result.errors.phone);
                        jQuery('#email_error').text(result.errors.email);
                    }
                   else{
                        showData();
                        $('#EditModal').modal('hide');
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
                        jQuery('#Branch_name').val(null);
                        jQuery('#manager').val(null);
                        jQuery('#phone').val(null);
                        jQuery('#email').val(null);
                        // this is error message null code
                        jQuery('#branch_name_error').text(null);
                        jQuery('#Manager_error').text(null);
                        jQuery('#phone_error').text(null);
                        jQuery('#email_error').text(null);

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
