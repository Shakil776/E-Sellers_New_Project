@extends('admin.master')

@section('title')
	Add Design Image
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
		    		<h4 class="text-center text-success">Add Product Design Image</h4>
		    	</div>
		    	<div class="panel-body">
		    		<form class="form-horizontal" action="{{ url('add-design-image') }}" method="POST" enctype="multipart/form-data">
		    			@csrf
						<div class="row">
							<div class="col-md-12">
								
                                <div class="form-group">
                                    <label class="control-label col-sm-4">Upload Image: </label>
                                    <input type="file" accept="image/*" multiple="" name="images[]" id="images" required="">
                                </div>

                                <div class="form-group"> 
                                    <div class="col-sm-6 col-sm-offset-3">
                                        <input type="submit" name="btn" class="btn btn-success" value="Upload">
                                    </div>
                                </div>
									
							</div>
						</div>

		    		</form>
		    	</div>
		 	</div>
		</div>
	</div>


@endsection