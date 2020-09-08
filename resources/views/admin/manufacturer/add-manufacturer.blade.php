@extends('admin.master')

@section('title')
	Add Manufacturer
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
		    		<h4 class="text-center text-success">Add Manufacturer</h4>
		    	</div>
		    	<div class="panel-body">
		    		<form class="form-horizontal" action="{{ route('new-manufacturer') }}" method="POST">
		    			@csrf
						
		    			<div class="form-group">
						    <label class="control-label col-sm-2" for="manufacturer_name">Manufacturer Name</label>
						    <div class="col-sm-10">
						    	<input type="text" class="form-control" name="manufacturer_name" id="manufacturer_name" placeholder="Enter Manufacturer Name">
						    	<span class="text-danger">{{ $errors->has('manufacturer_name') ? $errors->first('manufacturer_name') : ' ' }}</span>
						    </div>
						 </div>

						 <div class="form-group">
						    <label class="control-label col-sm-2" for="url">Manufacturer URL</label>
						    <div class="col-sm-10">
						    	<input type="text" class="form-control" name="url" id="url" placeholder="Enter Manufacturer URL">
						    	<span class="text-danger">{{ $errors->has('url') ? $errors->first('url') : ' ' }}</span>
						    </div>
						 </div>

						 


						 <div class="form-group">
						    <label class="control-label col-sm-2" for="manufacturer_description">Manufacturer Description</label>
						    <div class="col-sm-10">
						    	<textarea name="manufacturer_description" class="form-control" id="manufacturer_description" placeholder="Enter Manufacturer Description" rows="5"></textarea>
						    	<span class="text-danger">{{ $errors->has('manufacturer_description') ? $errors->first('manufacturer_description') : ' ' }}</span>
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