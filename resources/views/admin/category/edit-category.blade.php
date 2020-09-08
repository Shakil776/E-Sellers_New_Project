@extends('admin.master')

@section('title')
	Edit Category
@endsection

@section('body')

	<div class="row" style="margin-top: 50px;">
		<div class="col-md-10 col-md-offset-1">
			@if(Session::get('message'))
				<div class="alert alert-success left-icon-alert" role="alert">
	                <strong>Well done! &nbsp;</strong>{{ Session::get('message') }}
	            </div>
            @endif
			<div class="panel panel-default">
		    	<div class="panel-heading">
		    		<h4 class="text-center text-success">Edit Category</h4>
		    	</div>
		    	<div class="panel-body">
		    		<form class="form-horizontal" action="{{ route('update-category') }}" method="POST" enctype="multipart/form-data">
		    			@csrf
		    			<div class="form-group">
						    <label class="control-label col-sm-2" for="category_name">Category Name</label>
						    <div class="col-sm-10">
						    	<input type="text" class="form-control" name="category_name" id="category_name" value="{{ $category->category_name }}">
						    	<input type="hidden" class="form-control" name="category_id" value="{{ $category->id }}">
						    </div>
						 </div>

						 <div class="form-group">
						    <label class="control-label col-sm-2" for="url">Category URL</label>
						    <div class="col-sm-10">
						    	<input type="text" class="form-control" name="url" id="url" value="{{ $category->url }}">
						    </div>
						 </div>

						 <div class="form-group">
						    <label class="control-label col-sm-2" for="category_description">Category Description</label>
						    <div class="col-sm-10">
						    	<textarea name="category_description" class="form-control" id="category_description" rows="5">{{ $category->category_description }}</textarea>
						    </div>
						 </div>

						 <div class="form-group">
						    <label class="control-label col-sm-2" for="category_icon">Category Icon</label>
						    <div class="col-sm-10">
						    	<img src="{{ asset($category->category_icon) }}" alt="" height="150" width="150">
						    	<input type="file" accept="image/*" class="form-control" name="category_icon" id="category_icon" >
						    	<span class="text-danger">{{ $errors->has('category_icon') ? $errors->first('category_icon') : ' ' }}</span>
						    </div>
						 </div>

						 <div class="form-group">
						    <label class="control-label col-sm-2">Publication Status</label>
						    <div class="col-sm-10 radio">
						    	<label><input type="radio" {{ $category->publication_status == 1 ? 'checked' : '' }} value="1" name="publication_status">Published</label>
						    	<label><input type="radio" {{ $category->publication_status == 0 ? 'checked' : '' }} value="0" name="publication_status">Unpublished</label>
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

@endsection