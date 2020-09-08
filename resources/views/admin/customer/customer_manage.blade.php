@extends('admin.master')

@section('title')
	Manage Customer
@endsection

@section('body')

	<div class="row" style="margin-top: 50px;">
		<div class="col-md-12">
			@if(Session::get('message'))
				<div id="msg" class="alert alert-success left-icon-alert" role="alert">
	                <strong>Well done! &nbsp;</strong>{{ Session::get('message') }}
	            </div>
            @endif
			<div class="panel panel-default">
		    	<div class="panel-heading">
		    		<h4 class="text-center text-success">Manage Customer</h4>
		    	</div>

	    		<div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables">
                        <thead>

                            <tr>
                                <th class="text-center" >Sl No.</th>
                                <th class="text-center" >Name</th>
                                <th class="text-center" >Email</th>
                                <th class="text-center" >Mobile</th>
                                <th class="text-center" >Image</th>
                                <th class="text-center" >Address</th>
                                <th class="text-center" >Status</th>
                                <th class="text-center" width="10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php($i=1)
                        @foreach($customers as $customer)
                            <tr class="odd gradeX">
                                <td>{{ $i++ }}</td>
                                <td>{{ $customer->name }}</td>
                                <td>{{ $customer->email }}</td>
                                <td>{{ $customer->mobile }}</td>
                                
                                <td>
                                  @if(!empty($customer->user_profile_photo))
                                  <img src="{{ asset($customer->user_profile_photo) }}" alt="Profile Image" height="100" width="100" >
                                  @endif
                                </td>
                                

                                <td>{{ $customer->address }}</td>
                                <td>{{ $customer->status == 1 ? 'Active' : 'Deactive' }}</td>

                                
                                <td class="text-center">
                                    <a class="btn btn-success btn-xs" href="#" data-toggle="modal" data-target="#myCustomerModal{{ $customer->id }}" title="View Details">
                                        <span class="glyphicon glyphicon-zoom-in"></span>
                                    </a>


                                	@if($customer->status == 1)
	                                	<a class="btn btn-info btn-xs" href="{{ route('deactive-customer', ['id'=>$customer->id]) }}" onclick="return confirm('Are you sure to Deactive this Customer?');" title="Deactive">
                                            <span class="glyphicon glyphicon-arrow-up"></span>
	                                	</a>
                                	@else
	                                	<a class="btn btn-warning btn-xs" href="{{ route('active-customer', ['id'=>$customer->id]) }}" onclick="return confirm('Are you sure to Active this Customer?');" title="Active">
                                            <span class="glyphicon glyphicon-arrow-down"></span>
	                                	</a>
                                	@endif


                                	<a class="btn btn-danger btn-xs" href="{{ route('delete-customer', ['id'=>$customer->id]) }}" onclick="return confirm('Are you sure to delete this Customer?');" title="Delete">
                                		<span class="glyphicon glyphicon-trash"></span>
                                	</a>
                                </td>
                            </tr>

                                <!-- Modal -->
                                <div id="myCustomerModal{{ $customer->id }}" class="modal fade" role="dialog">
                                  <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title"><strong>{{ $customer->name }}</strong> Full Details</h4>
                                      </div>

                                      <div class="modal-body">

                                        <strong>Customer Name: </strong><span>{{ $customer->name }}</span><br>
                                        <strong>Email: </strong><span>{{ $customer->email }}</span><br>
                                        <strong>Mobile: </strong><span>{{ $customer->mobile }}</span><br>
                                        <strong>Address: </strong><span>{{ $customer->address }}</span><br>
                                        @if (!empty($customer->user_profile_photo))
                                             <strong>Profile Photo: </strong><span><img src="{{ asset($customer->user_profile_photo) }}" alt="NID Image" height="100" width="100" ></span><br>
                                        @endif
                                       
                                        <strong>Status: </strong><span>{{ $customer->status == 1 ? 'Active' : 'Deactive' }}</span><br>

                                      </div>

                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                      </div>
                                    </div>

                                  </div>
                                </div>

                        @endforeach
                        </tbody>
                    </table>
                </div>

		 	</div>
		</div>
	</div>


@endsection