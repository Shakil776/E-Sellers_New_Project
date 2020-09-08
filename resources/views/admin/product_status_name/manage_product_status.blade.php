@extends('admin.master')

@section('title')
	Manage Product Status Name
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
		    		<h4 class="text-center text-success">Manage Product Status Name</h4>
		    	</div>

	    		<div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables">
                        <thead>
                            <tr>
                                <th class="text-center" width="15%">Sl No.</th>
                                <th class="text-center" width="40%">Product Status Name</th>
                                <th class="text-center" width="20%">Publication Status</th>
                                <th class="text-center" width="25%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php($i=1)
                        @foreach($product_statuses as $product_status)
                            <tr class="odd gradeX">
                                <td>{{ $i++ }}</td>
                                <td>{{ $product_status->status_name }}</td>
                                <td>{{ $product_status->publication_status == 1 ? 'Published' : 'Unpublished' }}</td>
                                <td class="text-center">
                                	@if($product_status->publication_status == 1)
	                                	<a class="btn btn-info btn-xs" href="{{ route('unpublished-product-status', ['id'=>$product_status->id]) }}" onclick="return confirm('Are you sure to Unpublished this product status name?');" title="Unpublished">
	                                		<span class="glyphicon glyphicon-arrow-up"></span>
	                                	</a>
                                	@else
	                                	<a class="btn btn-warning btn-xs" href="{{ route('published-product-status', ['id'=>$product_status->id]) }}" onclick="return confirm('Are you sure to Published this product status name?');" title="Published">
	                                		<span class="glyphicon glyphicon-arrow-down"></span>
	                                	</a>
                                	@endif
                                	<a class="btn btn-success btn-xs" href="{{ route('edit-product-status', ['id'=>$product_status->id]) }}" title="Edit">
                                		<span class="glyphicon glyphicon-edit"></span>
                                	</a>
                                	<a class="btn btn-danger btn-xs" href="{{ route('delete-product-status', ['id'=>$product_status->id]) }}" onclick="return confirm('Are you sure to delete this product status name?');" title="Delete">
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