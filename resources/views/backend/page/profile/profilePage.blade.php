@extends('backend.dashboard.mastertemp');

@section('breadcrumb')
<h4>Branch</h4>
<nav class="breadcrumb pd-0 mg-0 tx-12">
    <a class="breadcrumb-item" href="index.html">Dashboard</a>
    <a class="breadcrumb-item" href="#">Profile</a>
    <span class="breadcrumb-item active">Profile </span>
  </nav>
@endsection
@section('content')
<div class="br-profile-page">
<div class="card shadow-base bd-0 rounded-0 widget-4">
    <div class="card-header ht-75">
      <div class="hidden-xs-down">
      </div>
      <div class="tx-24 hidden-xs-down">
      </div>
    </div><!-- card-header -->
    <div class="card-body">
      <div class="card-profile-img">
        <img src="https://via.placeholder.com/500" alt="">
      </div><!-- card-profile-img -->
      <h4 class="tx-normal tx-roboto tx-white">{{ Auth::user()->name }}</h4>
      <p class="mg-b-25">{{ Auth::user()->email }}</p>

      <p class="wd-md-500 mg-md-l-auto mg-md-r-auto mg-b-25">You Must be Change your Name, Password and Profile Image <div class=""><span class="text-danger">N:B - </span>You Don't Change Email</div></p>

      <p class="mg-b-0 tx-24">
        <a href="" class="tx-white-8 mg-r-5"><i class="fab fa-facebook-official"></i></a>
        <a href="" class="tx-white-8 mg-r-5"><i class="fab fa-twitter"></i></a>
        <a href="" class="tx-white-8 mg-r-5"><i class="fab fa-pinterest"></i></a>
        <a href="" class="tx-white-8"><i class="fab fa-instagram"></i></a>
      </p>
      <hr class="bg-warning">
      <div class="row mt-5">
            <div class="form-group col-md-4 text-left">
                <label for="">Enter Your Name : </label>
                <input type="text" class="form-control " placeholder="Enter your Name">
            </div>
            <div class="form-group col-md-4 text-left">
                <label for="">Enter Old Password : </label>
                <input type="text" class="form-control " placeholder="Enter Old Password">
            </div>
            <div class="form-group col-md-4 text-left">
                <label for="">Enter Your Password : </label>
                <input type="text" class="form-control " placeholder="Enter New Password">
            </div>
            <div class="form-group col-md-4 text-left">
                <label for="">Enter Your Confrom Password : </label>
                <input type="text" class="form-control " placeholder="Enter your Name">
            </div>
            <div class="form-group col-md-4 text-left">
                <label for="">Enter Your Image : </label>
                <input type="file" class="form-control " placeholder="Enter your Name">
            </div>
            <div class="col-md-4 text-left mt-4">
              <button class="btn btn-success">Submit</button>
            </div>
        </div>
      </div>
    </div><!-- card-body -->
  </div><!-- card -->

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
    <script>
$('#datatable1').DataTable({
  bLengthChange: false,
  searching: false,
  responsive: true
});
    </script>

@endsection
