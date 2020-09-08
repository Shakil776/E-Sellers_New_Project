@extends('admin.master')

@section('title')
	Edit Product
@endsection

@section('body')

	<div class="row" style="margin-top: 50px;">
		<div class="col-md-10 col-md-offset-1">
			@if(Session::get('message'))
				<div id="msg" class="alert alert-success left-icon-alert" role="alert">
	                <strong>Well done! &nbsp;</strong>{{ Session::get('message') }}
	            </div>
            @endif
			<div class="panel panel-default">
		    	<div class="panel-heading">
		    		<h4 class="text-center text-success">Update Product</h4>
		    	</div>
		    	<div class="panel-body">

		    		<form class="form-horizontal" action="{{ route('update') }}" method="POST" enctype="multipart/form-data" name="productEditForm">
		    			@csrf

		    			<div class="form-group">
						    <label class="control-label col-sm-2" for="category_name">Category Level Name</label>
						    <div class="col-sm-10">

						    	<select class="form-control" name="category_id">
						    		<?php echo $categories_dropdowns; ?>
						    	</select>

						    	<span class="text-danger">{{ $errors->has('category_name') ? $errors->first('category_name') : ' ' }}</span>
						    </div>
						</div>

						 <div class="form-group">
						    <label class="control-label col-sm-2" for="manufacturer_name">Manufacturer Name</label>
						    <div class="col-sm-10">
						    	<select class="form-control" name="manufacturer_id">
						    		
						    		@foreach($manufacturers as $manufacturer)
									<option value="{{ $manufacturer->id }}">{{ $manufacturer->manufacturer_name }}</option>
									@endforeach
						    	</select>
						    	<span class="text-danger">{{ $errors->has('manufacturer_name') ? $errors->first('manufacturer_name') : ' ' }}</span>
						    </div>
						 </div>


						 <div class="form-group">
						    <label class="control-label col-sm-2" for="product_name">Product Name</label>
						    <div class="col-sm-10">
						    
						    	<input type="text" id="product_name" class="form-control" name="product_name" value="{{ $productById->product_name }}">
								<input type="hidden" class="form-control" name="product_id" value="{{ $productById->id }}" />


						    	<span class="text-danger">{{ $errors->has('product_name') ? $errors->first('product_name') : ' ' }}</span>
						    </div>
						 </div>

						 <div class="form-group">
						    <label class="control-label col-sm-2" for="product_price">Product Price</label>
						    <div class="col-sm-10">
						    	<input type="number" class="form-control" name="product_price" id="product_price" value="{{ $productById->product_price }}">
						    	<span class="text-danger">{{ $errors->has('product_price') ? $errors->first('product_price') : ' ' }}</span>
						    </div>
						 </div> 

						 <div class="form-group">
						    <label class="control-label col-sm-2" for="product_code">Product Code</label>
						    <div class="col-sm-10">
						    	<input type="text" class="form-control" name="product_code" id="product_code" value="{{ $productById->product_code }}">
						    	<span class="text-danger">{{ $errors->has('product_code') ? $errors->first('product_code') : ' ' }}</span>
						    </div>
						 </div> 

						

						 <div class="form-group">
						    <label class="control-label col-sm-2" for="status_name">Product Status Name</label>
						    <div class="col-sm-10">
						    	<select class="form-control" name="status_id">
						    		
						    		@foreach($product_statuses as $product_status)
										<option value="{{ $product_status->id }}">{{ $product_status->status_name }}</option>
									@endforeach
						    	
						    	</select>
						    </div>
						 </div>

					 
						 <div class="form-group">
						    <label class="control-label col-sm-2" for="short_description">Short Description</label>
						    <div class="col-sm-10">
						    	<textarea name="short_description" class="form-control" id="short_description" rows="5">
						    		{{ $productById->short_description }}
						    	</textarea>
						    	<span class="text-danger">{{ $errors->has('short_description') ? $errors->first('short_description') : ' ' }}</span>
						    </div>
						 </div>

						 <div class="form-group">
						    <label class="control-label col-sm-2" for="long_description">Long Description</label>
						    <div class="col-sm-10">
						    	<textarea name="long_description" class="form-control" id="long_description" rows="5">
						    		{{ $productById->long_description }}
						    	</textarea>
						    	<span class="text-danger">{{ $errors->has('long_description') ? $errors->first('long_description') : ' ' }}</span>
						    </div>
						 </div>

						 <div class="form-group">
						    <label class="control-label col-sm-2" for="product_image">Product Image</label>
						    <div class="col-sm-10">
						    	<img src="{{ asset($productById->product_image) }}" alt="" height="150" width="150">
						    	<input type="file" accept="image/*" class="form-control" name="product_image" id="product_image" >
						    	<span class="text-danger">{{ $errors->has('product_image') ? $errors->first('product_image') : ' ' }}</span>
						    </div>
						 </div>

						 <div class="form-group">
						    <label class="control-label col-sm-2">Publication Status</label>
						    <div class="col-sm-10 radio">
						    	<label><input type="radio" {{ $productById->publication_status == 1 ? 'checked' : '' }} value="1" name="publication_status">Published</label>
						    	<label><input type="radio" {{ $productById->publication_status == 0 ? 'checked' : '' }} value="0" name="publication_status">Unpublished</label>
						    </div>
						 </div>


						<div class="form-group"> 
					    	<div class="col-sm-10 col-sm-offset-2">
					    		<input type="submit" name="btn" class="btn btn-success" value="Update">
					    	</div>
					    </div>
		    		</form>

		    	</div>
		 	</div>
		</div>
	</div>

	<script>
		document.forms['productEditForm'].elements['category_id'].value = '{{ $productById->category_id }}';
		document.forms['productEditForm'].elements['manufacturer_id'].value = '{{ $productById->manufacturer_id }}';
		document.forms['productEditForm'].elements['status_id'].value = '{{ $productById->status_id }}';
	</script>

@endsection