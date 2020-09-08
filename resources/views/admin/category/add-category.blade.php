@extends('admin.master')

@section('title')
	Add Category
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
		    		<h4 class="text-center text-success">Add Category</h4>
		    	</div>
		    	<div class="panel-body">
		    		<form class="form-horizontal" action="{{ route('new-category') }}" method="POST" enctype="multipart/form-data">
		    			@csrf
		    			<div class="form-group">
						    <label class="control-label col-sm-2" for="category_name">Category Name</label>
						    <div class="col-sm-10">
						    	<input type="text" class="form-control" name="category_name" id="category_name" placeholder="Enter Category Name">
						    </div>
						 </div>

						 <div class="form-group">
						    <label class="control-label col-sm-2" for="category_name">Category Level</label>
						    <div class="col-sm-10">
						    	<select class="form-control" name="parent_id">
									  <option>-- Select Category Level --</option>

									  <optgroup label="Parent Category">
									  		<option value="0">Main Category</option>
									  </optgroup>

									  
									    @foreach($categories as $category)

						    				
									  		<option value="{{ $category->id }}">
									  			- {{ $category->category_name }}
									  		</option>
										
										    @foreach($category->categories as $subCat)
										   
							    				<option value="{{ $subCat->id }}">
							    					----- {{ $subCat->category_name }}
							    				</option>
							    			@endforeach
											  
						    			@endforeach
									  

									  
								</select>

						    </div>
						 </div>

						 <div class="form-group">
						    <label class="control-label col-sm-2" for="url">URL</label>
						    <div class="col-sm-10">
						    	<input type="text" class="form-control" name="url" id="url" placeholder="Enter Category URL">
						    </div>
						 </div>

						 <div class="form-group">
						    <label class="control-label col-sm-2" for="category_icon">Main Category Icon</label>
						    <div class="col-sm-10">
						    	<input type="file" accept="image/*" class="form-control" name="category_icon" id="category_icon" >
						    	<span class="text-danger">{{ $errors->has('category_icon') ? $errors->first('category_icon') : ' ' }}</span>
						    </div>
						 </div>

						 <div class="form-group">
						    <label class="control-label col-sm-2" for="category_description">Category Description</label>
						    <div class="col-sm-10">
						    	<textarea name="category_description" class="form-control" id="category_description" placeholder="Enter Category Description" rows="5"></textarea>
						    </div>
						 </div>

						 <div class="form-group">
						    <label class="control-label col-sm-2">Publication Status</label>
						    <div class="col-sm-10 radio">
						    	<label><input type="radio" value="1" name="publication_status">Published</label>
						    	<label><input type="radio" value="0" name="publication_status">Unpublished</label>
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