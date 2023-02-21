@extends('backend.dashboard.mastertemp')

@section('adminApproved')
    active
@endsection


@section('breadcrumb')
<h4>Income</h4>
<nav class="breadcrumb pd-0 mg-0 tx-12">
    <a class="breadcrumb-item" href="index.html">Dashboard</a>
    <a class="breadcrumb-item" href="#">Admin Approved</a>
    <span class="breadcrumb-item active text-success">Admin Approved</span>
  </nav>
  @endsection
@section('content')


              <h1 class="text-center text-info font-weight-bold ">Admin Approved System</h1>
              <hr class="bg-info mb-4">
                 <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="text-center text-info ">Show All User</h3>
                            </div>
                            <div class="card-body">
                                    <table id="AdminTable" class="table">
                                      <thead>
                                        <tr>
                                            <th class="wd-15p">SL</th>
                                            <th class="wd-15p">Name</th>
                                            <th class="wd-15p">Gmail</th>
                                            <th class="wd-15p">Status</th>
                                            <th class="wd-15p">Role</th>
                                            <th class="wd-15p">Action</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                     @forelse ($alluser as $key=>$user )
                                         <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>@if ($user ->status==1)
                                                <a class="btn btn-info text-white">Approved</a>
                                                
                                            @else
                                            <a class="btn btn-warning"> Not Approved</a>
                                            @endif</td>
                                            <td>@if ($user ->role==1)
                                                <a class=" text-success font-weight-bold">Admin</a>
                                                
                                            @else
                                            <p>User</p>
                                            @endif</td>
                                            <td>
                                          <a href="" class="btn btn-info text-white"> Edit</a>
                                          <a href="" class="btn btn-danger text-white"> Delete</a>

                                            </td>
                                            
                                         </tr>
                                     @empty
                                     <tr>
                                        <td colspan="5"> No Data found</td>
                                     </tr>

                                     @endforelse
                                      </tbody>
                                    </table>
                                    <a href="btn btn-success"></a>
                                  </div>
                        </div>
                    </div>
                 </div>
             
@endsection

@section('footer')
<script>
    $(document).ready( function () {
    $('#AdminTable').DataTable();
} );
</script>
@endsection

