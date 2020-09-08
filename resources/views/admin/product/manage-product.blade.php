@extends('admin.master')

@section('title')
	Manage Product
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
		    		<h4 class="text-center text-success">Manage Product</h4>
		    	</div>

	    		<div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables">
                        <thead>

                            <tr>
                                <th class="text-center" >Sl No.</th>
                                <th class="text-center" >Product Name</th>
                                <th class="text-center" >Rating</th>
                                <th class="text-center" >Rating Count</th>
                                <th class="text-center" >Product Code</th>
                                <th class="text-center" >Price</th>
                                <th class="text-center" >Image</th>
                                <th class="text-center" width="20%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php($i=1)
                        @foreach($products as $product)
                            <tr class="odd gradeX">
                                <td>{{ $i++ }}</td>
                                <td>{{ $product->product_name }}</td>
                                <td>{{ $product->rating }}</td>
                                <td>{{ $product->rating_count }}</td>
                                <td>{{ $product->product_code }}</td>
                                <td>{{ $product->product_price }}</td>

                                <td>
                                    <img src="{{ asset($product->product_image) }}" alt="Product Image" height="100" width="100" >
                                </td>

                                <td class="text-center">

                                    <a class="btn btn-success btn-xs" href="#" data-toggle="modal" data-target="#myModal{{ $product->id }}" title="View Details">
                                        <span class="glyphicon glyphicon-zoom-in"></span>
                                    </a>


                                	@if($product->publication_status == 1)
	                                	<a class="btn btn-info btn-xs" href="{{ route('unpublished-product', ['id'=>$product->id]) }}" onclick="return confirm('Are you sure to Unpublished this Product?');" title="Unpublished">
	                                		<span class="glyphicon glyphicon-arrow-up"></span>
	                                	</a>
                                	@else
	                                	<a class="btn btn-warning btn-xs" href="{{ route('published-product', ['id'=>$product->id]) }}" onclick="return confirm('Are you sure to Published this Product?');" title="Published">
	                                		<span class="glyphicon glyphicon-arrow-down"></span>
	                                	</a>
                                	@endif

                                  <a class="btn btn-primary btn-xs" href="{{ url('add-image/'.$product->id) }}" title="Add Alternate Image">
                                		<span class="glyphicon glyphicon-picture"></span>
                                	</a>

                                	<a class="btn btn-success btn-xs" href="{{ route('edit-product', ['id'=>$product->id]) }}" title="Edit">
                                		<span class="glyphicon glyphicon-edit"></span>
                                	</a>
                                    <a class="btn btn-primary btn-xs" href="{{ route('add-attribute', ['id'=>$product->id]) }}" title="Add Attribute">
                                        <span class="glyphicon glyphicon-plus"></span>
                                    </a>
                                	<a class="btn btn-danger btn-xs" href="{{ route('delete-product', ['id'=>$product->id]) }}" onclick="return confirm('Are you sure to delete this product?');" title="Delete">
                                		<span class="glyphicon glyphicon-trash"></span>
                                	</a>
                                </td>
                            </tr>

                                <!-- Modal -->
                                <div id="myModal{{ $product->id }}" class="modal fade" role="dialog">
                                  <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title"><strong>{{ $product->product_name }}</strong> Full Details</h4>
                                      </div>

                                      <div class="modal-body">

                                        <strong>Product Name: </strong><span>{{ $product->product_name }}</span><br>
                                        <strong>Category Name: </strong><span>{{ $product->category_name }}</span><br>
                                        <strong>Brand Name: </strong><span>{{ $product->manufacturer_name }}</span><br>
                                        <strong>Product Price: </strong><span>{{ $product->product_price }}</span><br>
                                       {{--  <strong>Product Color: </strong><span>{{ $product->product_color }}</span><br> --}}
                                        <strong>Product Code: </strong><span>{{ $product->product_code }}</span><br>
                                        <strong>Product Status Name: </strong><span>{{ $product->status_name }}</span><br>
                                        <strong>Rating: </strong><span>{{ $product->rating }}</span><br>
                                        <strong>Total rating: </strong><span>{{ $product->rating_count }}</span><br>
                                        <strong>Publication Status: </strong><span>{{ $product->publication_status == 1 ? 'Published' : 'Unpublished' }}</span><br>
                                        <strong>Product Image: </strong><span><img src="{{ asset($product->product_image) }}" alt="Product Image" height="100" width="100" ></span><br>
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