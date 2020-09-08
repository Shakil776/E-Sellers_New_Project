@extends('admin.master')

@section('title')
	Add Slider Image
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
		    		<h4 class="text-center text-success">Add Slider Image</h4>
		    	</div>
		    	<div class="panel-body">
		    		<form class="form-horizontal" action="{{ route('save_slider_image') }}" method="POST" enctype="multipart/form-data">
		    			@csrf

						 <div class="form-group">
						    <label class="control-label col-sm-2" for="slider_image">Slider Image</label>
						    <div class="col-sm-10">
						    	<input type="file" accept="image/*" class="form-control" name="slider_image" id="slider_image">
						    	<span class="text-danger">{{ $errors->has('slider_image') ? $errors->first('slider_image') : ' ' }}</span>
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
					    		<input type="submit" name="btn" class="btn btn-success" value="Upload">
					    	</div>
					    </div>
		    		</form>
		    	</div>
		 	</div>
		</div>
	</div>

@endsection