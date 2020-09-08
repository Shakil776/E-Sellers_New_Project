@extends('admin.master')

@section('title')
	Add Product Image
@endsection

@section('body')

	<div class="row" style="margin-top: 50px;">
		<div class="col-md-12">
			@if(Session::has('success'))
				<div id="msg" class="alert alert-success left-icon-alert" role="alert">
	                <strong>Well done! &nbsp;</strong>{{ Session::get('success') }}
	            </div>
	        @elseif(Session::get('error'))
	        <div id="msg" class="alert alert-danger left-icon-alert" role="alert">
	                <strong>Oppps! &nbsp;</strong>{{ Session::get('error') }}
	            </div>
            @endif


			<div class="panel panel-default">
		    	<div class="panel-heading">
		    		<h4 class="text-center text-success">Add Product Alternate Image</h4>
		    	</div>
		    	<div class="panel-body">
		    		<form class="form-horizontal" action="{{ url('add-image/'.$productDetails->id) }}" method="POST" enctype="multipart/form-data">
		    			@csrf
						<div class="row">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-sm-4">Product Name: </label>
											<label class="control-label ">{{ $productDetails->product_name }}</label>
										</div>

										<div class="form-group">
											<label class="control-label col-sm-4">Product Code: </label>
											<label class="control-label ">{{ $productDetails->product_code }}</label>
										</div> 

										<div class="form-group">
											<label class="control-label col-sm-4">Product Price: </label>
											<label class="control-label ">TK. {{ $productDetails->product_price}}</label>
										</div>

										<div class="form-group">
											<label class="control-label col-sm-4">Upload Image: </label>
											<input type="file" accept="image/*" multiple="" name="images[]" id="images" required="">
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-sm-4">Product Main Image: </label>
											<label class="control-label"><img src="{{ asset($productDetails->product_image) }}" alt="" class="img-thumbnail" width="200"></label>
										</div>
									</div>
								</div>

								
							</div>
						</div>

						<div class="form-group"> 
					    	<div class="col-sm-6 col-sm-offset-3">
					    		<input type="submit" name="btn" class="btn btn-success" value="Upload">
					    	</div>
					    </div>

		    		</form>
		    	</div>
		 	</div>
		</div>
	</div>

	{{-- show attribute --}}
	<div class="row">
		<div class="col-md-12">
						<div class="panel panel-default">
		    	<div class="panel-heading">
		    		<h4 class="text-center text-success">Product Alternate Image</h4>
		    	</div>

	    		<div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables">
                        <thead>
                            <tr>
                                <th class="text-center" width="10%">Sl No.</th>
                                <th class="text-center" width="50%">Image</th>
                                <th class="text-center" width="20%">Status</th>
                                <th class="text-center" width="20%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php($i=1)
                        @foreach($productDetails['images'] as $image)
                            <tr class="odd gradeX">
                                <td class="text-center">{{ $i++ }}</td>
                                
                                <td class="text-center"><img src="{{ asset($image->image) }}" alt="" width="100" height="100"></td>

								<td class="text-center">
									@if($image->status == 1)
                                        <a href="{{ url('update-image-status/'.$image->id.'/0') }}"><span style="color:green">Active</span></a>
                                    @else
                                    <a href="{{ url('update-image-status/'.$image->id.'/1') }}"><span style="color:red">Inactive</span></a>
                                    @endif
								</td>

                               	<td class="text-center">
                                	<a class="btn btn-danger btn-xs" href="{{ url('delete-image-status/'.$image->id) }}" onclick="return confirm('Are you sure to delete this alternate Image?');" title="Delete">
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