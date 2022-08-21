@extends('backend.dashboard.mastertemp');
@section('breadcrumb')
<h4>Category</h4>
<nav class="breadcrumb pd-0 mg-0 tx-12">
    <a class="breadcrumb-item" href="index.html">Bracket</a>
    <a class="breadcrumb-item" href="#">Tables</a>
    <span class="breadcrumb-item active">Data Table</span>
  </nav>
@endsection
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
                                <!-- Button trigger modal -->
                        <!-- Modal -->
                        <div class="modal fade" id="SaveModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Product Code </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                    <label for="">Product Name</label>
                                    <input type="text" class="form-control product_name" placeholder="Enter Product Name" >
                                    <strong class="text-danger"></strong>
                                   </div>
                                    <div class="form-group">
                                    <label for="">Product Code</label>
                                    <input type="number" class="form-control product_code" placeholder="Enter the Category Name">
                                    <strong class="text-danger"></strong>
                                   </div>
                               </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary SaveData">Save changes</button>
                        </div>
                        </div>
                    </div>
                    </div>
                   <!-- End Modal -->
                {{-- this is table information section    --}}
                <div class="br-pagebody">
                    <div class="br-section-wrapper">
                        <h4 class="br-section-label text-center">Product Information Table</h4>
                        <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#SaveModal"><i class="fas fa-plus"></i> Add Product Code </button>
                    <div class="table-wrapper">
                        <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                            <tr>
                            <th class="wd-15p">First name</th>
                            <th class="wd-15p">Last name</th>
                            <th class="wd-20p">Position</th>
                            <th class="wd-15p">Start date</th>
                            <th class="wd-10p">Salary</th>
                            <th class="wd-25p">E-mail</th>
                            <th class="wd-25p">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <td>Tiger</td>
                            <td>Nixon</td>
                            <td>System Architect</td>
                            <td>2011/04/25</td>
                            <td>$320,800</td>
                            <td>t.nixon@datatables.net</td>
                            <td>
                                <button class="btn btn-info btn-sm editmodal" data-toggle="modal" data-target="#editmodel"><i class="fa fa-edit"></i></button>
                                <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                            </td>
                            </tr>
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
            // DataInsert section
        jQuery(document).on('click','.SaveData',function(){
         var product_name = jQuery('.product_name').val();
         var product_code = jQuery('.product_code').val();
         $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url:'/product/code/insert',
                type:'POST',
                dataType:'JSON',
                data:{
                    product_name:product_name,
                    product_code:product_code,
                },
                success:function(result){
                  if(result.msg=="success"){
                    $('#SaveModal').modal('hide');
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
                        title: 'Signed in successfully'
                        })
                        jQuery('.product_name').val(null);
                        jQuery('.product_code').val(null);

                  }
                  else{
                    Toast.fire({
                        icon: 'error',
                        title: 'Signed in successfully'
                        })
                  }

                }

            });

        });

    });
</script>
    <script>
$(document).ready( function () {
    $('#datatable1').DataTable();
} );
    </script>

@endsection
