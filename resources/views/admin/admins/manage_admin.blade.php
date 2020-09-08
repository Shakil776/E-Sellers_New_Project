@extends('admin.master')

@section('title')
	Manage Admin
@endsection

@section('body')

	<div class="row" style="margin-top: 50px;">
		<div class="col-md-12">
			@if(Session::has('success'))
				<div id="msg" class="alert alert-success left-icon-alert" role="alert">
	                <strong>Well done! &nbsp;</strong>{{ session('success') }}
	            </div>
            @endif

			<div class="panel panel-default">
		    	<div class="panel-heading">
		    		<h4 class="text-center text-success">Manage Admin</h4>
		    	</div>

	    		<div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables">
                        <thead>

                            <tr>
                                <th class="text-center" >Sl No.</th>
                                <th class="text-center" >Name</th>
                                <th class="text-center" >Email</th>
                                <th class="text-center" >Mobile</th>
                                <th class="text-center" >Type</th>
                                <th class="text-center" >Roles</th>
                                <th class="text-center" >Status</th>
                                <th class="text-center" width="10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php($i=1)
                        @foreach($admins as $admin)
                            <?php
                                if($admin->type == "Admin"){
                                    $roles = "All";
                                }else{
                                    $roles = "";
                                    if($admin->customer_access == 1){
                                        $roles .= "Customer, ";
                                    }
                                    if($admin->categories_access == 1){
                                        $roles .= "Category, ";
                                    }
                                    if($admin->manufacturer_access == 1){
                                        $roles .= "Manufacturer, ";
                                    }
                                    if($admin->product_status_access == 1){
                                        $roles .= "Product Status, ";
                                    }
                                    if($admin->product_access == 1){
                                        $roles .= "Product, ";
                                    }
                                    if($admin->review_access == 1){
                                        $roles .= "Review, ";
                                    }
                                    if($admin->order_access == 1){
                                        $roles .= "Order, ";
                                    }
                                    if($admin->slider_access == 1){
                                        $roles .= "Slider, ";
                                    }
                                    if($admin->newsletter_access == 1){
                                        $roles .= "Newsletter, ";
                                    }
                                }
                            ?>

                            <tr class="odd gradeX">
                                <td>{{ $i++ }}</td>
                                <td>{{ $admin->name }}</td>
                                <td>{{ $admin->email }}</td>
                                <td>{{ $admin->mobile }}</td>
                                <td>{{ $admin->type }}</td>
                                <td>{{ $roles }}</td>
                                <td>
                                    @if($admin->status == 1)
                                        <a href="{{ url('update-admin-status/'.$admin->id.'/0') }}"><span style="color:green">Active</span></a>
                                    @else
                                        <a href="{{ url('update-admin-status/'.$admin->id.'/1') }}"><span style="color:red">Inactive</span></a>
                                    @endif
                                </td>

                                <td class="text-center">

                                	<a class="btn btn-info btn-xs" href="{{ url('edit-admin/'.$admin->id) }}" title="Edit">
                                		<span class="glyphicon glyphicon-edit"></span>
                                	</a>
                                    
                                    <a class="btn btn-danger btn-xs" href="{{ url('delete-admin/'.$admin->id) }}" onclick="return confirm('Are you sure to delete this Admin?');" title="Delete">
                                		<span class="glyphicon glyphicon-trash"></span>
                                	</a>
                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                </div>

		 	</div>
		</div>
	</div>


@endsection