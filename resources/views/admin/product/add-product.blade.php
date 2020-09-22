@extends('admin.master')

@section('title')
	Add Product
@endsection

@section('body')

	<div class="row" style="margin-top: 50px;">
		<div class="col-md-12">
			@if(Session::has('success'))
				<div id="msg" class="alert alert-success left-icon-alert" role="alert">
	                <strong>Well done! &nbsp;</strong>{{ Session::get('success') }}
	            </div>
            @endif

			<div class="panel panel-default">
		    	<div class="panel-heading">
		    		<h4 class="text-center text-success">Add Product</h4>
		    	</div>
		    	<div class="panel-body">
		    		<form class="form-horizontal" action="{{ route('new-product') }}" method="POST" enctype="multipart/form-data">
		    			@csrf
						<div class="form-group">
						    <label class="control-label col-sm-2" for="category_name">Category Level Name <span class="text-danger">(Required Only For ReadyMate Product)</span></label>
						    <div class="col-sm-10">

						    	<select class="form-control" name="category_id">
						    		<?php echo $categories_dropdowns; ?>
						    	</select>

						    	<span class="text-danger">{{ $errors->has('category_name') ? $errors->first('category_name') : ' ' }}</span>
						    </div>
						</div>

						<div class="form-group">
						    <label class="control-label col-sm-2" for="custom_category_name">Custom Category Name <span class="text-danger">(Required Only For Custom Product)</span></label>
						    <div class="col-sm-10">
						    	<select class="form-control" name="custom_category_id">
						    		<option value="">-- Select Custom Category Name --</option>
						    		@foreach($custom_categorys as $custom_category)
						    			<option value="{{ $custom_category->id }}">{{ $custom_category->category_name }}</option>
						    		@endforeach
						    	</select>
						    	
						    </div>
						 </div>

						 <div class="form-group">
						    <label class="control-label col-sm-2" for="manufacturer_name">Manufacturer Name</label>
						    <div class="col-sm-10">
						    	<select class="form-control" name="manufacturer_id">
						    		<option value="">-- Select Manufacturer Name --</option>
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
						    	<input type="text" class="form-control" name="product_name" id="product_name" placeholder="Enter Product Name">
						    	<span class="text-danger">{{ $errors->has('product_name') ? $errors->first('product_name') : ' ' }}</span>
						    </div>
						 </div>

						 <div class="form-group">
						    <label class="control-label col-sm-2" for="product_price">Product Price</label>
						    <div class="col-sm-10">
						    	<input type="number" class="form-control" name="product_price" id="product_price" placeholder="Enter Product Price">
						    	<span class="text-danger">{{ $errors->has('product_price') ? $errors->first('product_price') : ' ' }}</span>
						    </div>
						 </div> 

						  <div class="form-group">
						    <label class="control-label col-sm-2" for="product_code">Product Code</label>
						    <div class="col-sm-10">
						    	<input type="text" class="form-control" name="product_code" id="product_code" placeholder="Enter Product Code">
						    	<span class="text-danger">{{ $errors->has('product_code') ? $errors->first('product_code') : ' ' }}</span>
						    </div>
						 </div> 

						

						 <div class="form-group">
						    <label class="control-label col-sm-2" for="status_name">Product Status Name</label>
						    <div class="col-sm-10">
						    	<select class="form-control" name="status_id">
						    		<option value="">-- Select Product Status Name --</option>
						    		@foreach($product_statuses as $product_status)
						    			<option value="{{ $product_status->id }}">{{ $product_status->status_name }}</option>
						    		@endforeach
						    		
						    	</select>
						    	<span class="text-danger">{{ $errors->has('status_name') ? $errors->first('status_name') : ' ' }}</span>
						    </div>
						 </div>

						 
						 <div class="form-group">
						    <label class="control-label col-sm-2" for="short_description">Short Description</label>
						    <div class="col-sm-10">
						    	<textarea name="short_description" class="form-control" id="short_description" placeholder="Enter Product short Description" rows="5"></textarea>
						    	<span class="text-danger">{{ $errors->has('short_description') ? $errors->first('short_description') : ' ' }}</span>
						    </div>
						 </div>

						 <div class="form-group">
						    <label class="control-label col-sm-2" for="long_description">Long Description</label>
						    <div class="col-sm-10">
						    	<textarea name="long_description" class="form-control" id="long_description" placeholder="Enter Product long Description" rows="5"></textarea>
						    	<span class="text-danger">{{ $errors->has('long_description') ? $errors->first('long_description') : ' ' }}</span>
						    </div>
						 </div>

						 <div class="form-group">
						    <label class="control-label col-sm-2" for="product_image">Product Front Image</label>
						    <div class="col-sm-10">
						    	<input type="file" accept="image/*" class="form-control" name="product_image" id="product_image" >
						    	<span class="text-danger">{{ $errors->has('product_image') ? $errors->first('product_image') : ' ' }}</span>
						    </div>
						 </div>

						 <div class="form-group">
						    <label class="control-label col-sm-2" for="back_image">Product Back Image<span class="text-danger">(Not Required For Guage Fabric Product)</span></label>
						    <div class="col-sm-10">
						    	<input type="file" accept="image/*" class="form-control" name="back_image" id="back_image" >
						    	<span class="text-danger">{{ $errors->has('back_image') ? $errors->first('back_image') : ' ' }}</span>
						    </div>
						 </div>

						 <div class="form-group">
						    <label class="control-label col-sm-2" for="images">Product Design Image<span class="text-danger">(Required Only For Guage Fabric Product)</span></label>
						    <div class="col-sm-10">
						    	<input type="file" accept="image/*" class="form-control" name="images[]" multiple="" >
						    	<span class="text-danger">{{ $errors->has('images') ? $errors->first('images') : ' ' }}</span>
						    </div>
						 </div>


						 <div class="form-group">
						    <label class="control-label col-sm-2">Publication Status</label>
						    <div class="col-sm-10 radio">
						    	<label><input type="radio" value="1" name="publication_status">Published</label>
						    	<label><input type="radio" value="0" name="publication_status">Unpublished</label>
						    	<span class="text-danger">{{ $errors->has('publication_status') ? $errors->first('publication_status') : ' ' }}</span>
						    </div>
						 </div>

						<div class="form-group"> 
					    	<div class="col-sm-10 col-sm-offset-2">
					    		<input type="submit" name="btn" class="btn btn-success" value="Save">
					    	</div>
					    </div>
		    		</form>
		    	</div>
		 	</div>
		</div>
	</div>

@endsection