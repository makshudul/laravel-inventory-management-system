@extends('backend.dashboard.mastertemp')

@section('breadcrumb')
<h4>Product</h4>
<nav class="breadcrumb pd-0 mg-0 tx-12">
    <a class="breadcrumb-item" href="index.html">Dashboard</a>
    <a class="breadcrumb-item" href="#">Company Information</a>
    <span class="breadcrumb-item active text-success">Company Information</span>
  </nav>
  @endsection
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
                    <!-- Modal -->
                    <div class="modal fade" id="EMDataInsertModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                         <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Employee</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                         </div>
                         <div class="modal-body">
                            <div class="form-group">
                              <label for="">Employee Id</label>
                              <input type="number" class="form-control emId" placeholder="Enter Employee ID">
                              <span class="text-danger emId_error "></span>
                            </div>
                            <div class="form-group">
                              <label for="">Employee Name</label>
                              <input type="text" class="form-control name" placeholder=" Name" >
                              <span class="text-danger name_error"></span>
                            </div>
                            <div class="form-group">
                              <label for="">Employee Father Name</label>
                              <input type="text" class="form-control fName" placeholder="Enter Father Name" >
                              <span class="text-danger fName_error"></span>
                            </div>
                            <div class="form-group">
                              <label for="">Employee Mother Name</label>
                              <input type="text" class="form-control mName" placeholder="Enter Mother Name" >
                              <span class="text-danger mName_error"></span>
                            </div>
                            <div class="form-group">
                                <label for="">Gender</label>
                                <select class="form-control sex">
                                  <option value="Unknow">------ Select Gender ------</option>
                                  <option value="Male">Male</option>
                                  <option value="Female">Female</option>
                                  <option value="Other">Other</option>
                                </select>
                                <strong class="text-danger sex_error" ></strong>
                              </div>
                            <div class="form-group">
                              <label for="">Employee NID</label>
                              <input type="number" class="form-control nid" placeholder="Enter NID Number" >
                              <span class="text-danger nid_error"></span>
                            </div>
                            <div class="form-group">
                              <label for="">Employee Address  </label>
                              <textarea type="text" class="form-control address" placeholder="Enter Address"></textarea>
                              <span class="text-danger address_error"></span>
                            </div>
                            <div class="form-group">
                              <label for="">Employee Phone </label>
                              <input type="number" class="form-control phone" placeholder="Enter Phone Number">
                              <span class="text-danger phone_error"></span>
                            </div>
                            <div class="form-group">
                              <label for="">Employee Email </label>
                              <input type="email" class="form-control email" placeholder="Enter Email">
                              <span class="text-danger email_error"></span>
                            </div>
                            <div class="form-group">
                              <label for="">Employee Salery Range </label>
                              <input type="number" class="form-control saleryRange " placeholder="Enter Salery Range">
                              <span class="text-danger saleryRange_error"></span>
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
                                      <label for="">Employee Id</label>
                                      <input type="number" class="form-control" id="emId">
                                      <span class="text-danger " id="emId_error"></span>
                                    </div>
                                    <div class="form-group">
                                      <label for="">Employee Name</label>
                                      <input type="text" class="form-control " id="name" placeholder=" Name" >
                                      <span class="text-danger " id="name_error"></span>
                                    </div>
                                    <div class="form-group">
                                      <label for="">Employee Father Name</label>
                                      <input type="text" class="form-control" id="fName" placeholder="Enter Father Name" >
                                      <span class="text-danger" id="fName_error"></span>
                                    </div>
                                    <div class="form-group">
                                      <label for="">Employee Mother Name</label>
                                      <input type="text" class="form-control" id="mName" placeholder="Enter Mother Name" >
                                      <span class="text-danger" id="mName_error"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Gender</label>
                                        <select class="form-control " id="sex">
                                          <option value="Unknow">------ Select Gender ------</option>
                                          <option value="Male">Male</option>
                                          <option value="Female">Female</option>
                                          <option value="Other">Other</option>
                                        </select>
                                        <strong class="text-danger" id="sex_error" ></strong>
                                      </div>
                                    <div class="form-group">
                                      <label for="">Employee NID</label>
                                      <input type="number" class="form-control" id="nid" placeholder="Enter NID Number" >
                                      <span class="text-danger" id="nid_error"></span>
                                    </div>
                                    <div class="form-group">
                                      <label for="">Employee Address  </label>
                                      <textarea type="text" class="form-control" id="address" placeholder="Enter Address"></textarea>
                                      <span class="text-danger" id="address_error"></span>
                                    </div>
                                    <div class="form-group">
                                      <label for="">Employee Phone </label>
                                      <input type="number" class="form-control" id="phone" placeholder="Enter Phone Number">
                                      <span class="text-danger" id="phone_error"></span>
                                    </div>
                                    <div class="form-group">
                                      <label for="">Employee Email </label>
                                      <input type="email" class="form-control" id="email" placeholder="Enter Email">
                                      <span class="text-danger" id="email_error"></span>
                                    </div>
                                    <div class="form-group">
                                      <label for="">Employee Salery Range </label>
                                      <input type="text" class="form-control " id="saleryRange" placeholder="Enter Salery Range">
                                      <span class="text-danger " id="saleryRange_error"></span>
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
                    <h4 class="br-section-label text-center">Employee Information Table</h4>
                    <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#EMDataInsertModal"><i class="fas fa-plus"></i> Add Employee </button>
                  <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                      <thead>
                        <tr>
                          <th class="wd-15p">SL</th>
                          <th class="wd-15p">Employee ID</th>
                          <th class="wd-15p"> Name</th>
                          <th class="wd-15p"> Father Name</th>
                          <th class="wd-15p"> Mother Name</th>
                          <th class="wd-15p"> Gender</th>
                          <th class="wd-15p"> NID</th>
                          <th class="wd-15p">Address</th>
                          <th class="wd-15p">phone</th>
                          <th class="wd-15p">email</th>
                          <th class="wd-15p">Salery Range</th>
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
                var emId = jQuery('.emId').val();
                var name = jQuery('.name').val();
                var fName = jQuery('.fName').val();
                var mName = jQuery('.mName').val();
                var sex = jQuery('.sex').val();
                var nid = jQuery('.nid').val();
                var address = jQuery('.address').val();
                var phone = jQuery('.phone').val();
                var email = jQuery('.email').val();
                var saleryRange = jQuery('.saleryRange').val();

            $.ajax({
                url:'/employee/insert',
                type:'POST',
                dataType:'json',
                data:{
                    'emId':emId,
                    'name':name,
                    'fName':fName,
                    'mName':mName,
                    'sex':sex,
                    'nid':nid,
                    'address':address,
                    'phone':phone,
                    'email':email,
                    'saleryRange':saleryRange
                },
                success:function(result){
                    if(result.msg == 'faild'){
                        jQuery('.emId_error').text(result.errors.emId);
                        jQuery('.name_error').text(result.errors.name);
                        jQuery('.fName_error').text(result.errors.fName);
                        jQuery('.mName_error').text(result.errors.mName);
                        jQuery('.sex_error').text(result.errors.sex);
                        jQuery('.nid_error').text(result.errors.nid);
                        jQuery('.address_error').text(result.errors.address);
                        jQuery('.phone_error').text(result.errors.phone);
                        jQuery('.email_error').text(result.errors.email);
                        jQuery('.saleryRange_error').text(result.errors.saleryRange);
                    }
                    else{
                        showData();
                        $('#EMDataInsertModal').modal('hide');
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
                        title: 'Employee Insert Successfully'
                        })
                         jQuery('.emId').val(null);
                         jQuery('.name').val(null);
                         jQuery('.fName').val(null);
                         jQuery('.mName').val(null);
                         jQuery('.sex').val(null);
                         jQuery('.nid').val(null);
                         jQuery('.address').val(null);
                         jQuery('.phone').val(null);
                         jQuery('.email').val(null);
                         jQuery('.saleryRange').val(null);

                    }
                }

            });

         });
         // **********************************************End Data Insert ************************************

              //*****************************show Data ************************
              function showData(){
              $.ajax({
                url:'/employee/show',
                type:'GET',
                dataType:'json',
                success:function(result){
                    var sl=1;
                    jQuery('.datashow').html('');
                    $.each(result.data,function(key,item){
                      jQuery(".datashow").append('<tr>\
                            <td>'+sl+'</td>\
                            <td>'+item.emId+'</td>\
                            <td>'+item.name+'</td>\
                            <td>'+item.fName+'</td>\
                            <td> '+item.mName+'</td>\
                            <td> '+item.sex+'</td>\
                            <td> '+item.nid+'</td>\
                            <td> '+item.address+'</td>\
                            <td> '+item.phone+'</td>\
                            <td> '+item.email+'</td>\
                            <td> '+item.saleryRange+'</td>\
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
               url:'/employee/single/data/show/'+id,
               type:'GET',
               dataType:'json',
               success:function(result){
                 jQuery('#id').val(result.data.id);
                 jQuery('#emId').val(result.data.emId);
                 jQuery('#name').val(result.data.name);
                 jQuery('#fName').val(result.data.fName);
                 jQuery('#mName').val(result.data.mName);
                 jQuery('#sex').val(result.data.sex);
                 jQuery('#nid').val(result.data.nid);
                 jQuery('#address').val(result.data.address);
                 jQuery('#phone').val(result.data.phone);
                 jQuery('#email').val(result.data.email);
                 jQuery('#saleryRange').val(result.data.saleryRange);
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
                        url:'/employee/delete/'+id,
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
                var emId = jQuery('#emId').val();
                var name = jQuery('#name').val();
                var fName = jQuery('#fName').val();
                var mName = jQuery('#mName').val();
                var sex = jQuery('#sex').val();
                var nid = jQuery('#nid').val();
                var address = jQuery('#address').val();
                var phone = jQuery('#phone').val();
                var email = jQuery('#email').val();
                var saleryRange = jQuery('#saleryRange').val();

            $.ajax({
                url:'/employee/update/'+id,
                type:'POST',
                dataType:'json',
                data:{
                    'emId':emId,
                    'name':name,
                    'fName':fName,
                    'mName':mName,
                    'sex':sex,
                    'nid':nid,
                    'address':address,
                    'phone':phone,
                    'email':email,
                    'saleryRange':saleryRange
                },
                success:function(result){
                    if(result.msg == 'faild'){
                        jQuery('#emId_error').text(result.errors.emId);
                        jQuery('#name_error').text(result.errors.name);
                        jQuery('#fName_error').text(result.errors.fName);
                        jQuery('#mName_error').text(result.errors.mName);
                        jQuery('#sex_error').text(result.errors.sex);
                        jQuery('#nid_error').text(result.errors.nid);
                        jQuery('#address_error').text(result.errors.address);
                        jQuery('#phone_error').text(result.errors.phone);
                        jQuery('#email_error').text(result.errors.email);
                        jQuery('#saleryRange_error').text(result.errors.saleryRange);
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
                        title: 'Employee Update Successfully'
                        })
                         jQuery('#id').val(null);
                         jQuery('#emId').val(null);
                         jQuery('#name').val(null);
                         jQuery('#fName').val(null);
                         jQuery('#mName').val(null);
                         jQuery('#sex').val(null);
                         jQuery('#nid').val(null);
                         jQuery('#address').val(null);
                         jQuery('#phone').val(null);
                         jQuery('#email').val(null);
                         jQuery('#saleryRange').val(null);

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
