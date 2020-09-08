@extends('admin.master')

@section('title')
	Add Product Status Name
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
		    		<h4 class="text-center text-success">Add Product Status Name</h4>
		    	</div>
		    	<div class="panel-body">
		    		<form class="form-horizontal" action="{{ route('save-product-status') }}" method="POST">
		    			@csrf
		    			<div class="form-group">
						    <label class="control-label col-sm-2" for="status_name">Product Status Name</label>
						    <div class="col-sm-10">
						    	<input type="text" class="form-control" name="status_name" id="status_name" placeholder="Enter Product Status Name">
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