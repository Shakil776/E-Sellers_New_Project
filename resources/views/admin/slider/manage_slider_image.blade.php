@extends('admin.master')

@section('title')
	Manage Slider
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
		    		<h4 class="text-center text-success">Manage Slider Image</h4>
		    	</div>

	    		<div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables">
                        <thead>

                            <tr>
                                <th class="text-center" width="10%">Sl No.</th>
                                <th class="text-center" width="50%">Slider Image</th>
                                <th class="text-center" width="20%">Publication Status</th>
                                <th class="text-center" width="20%">Action</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                        @php($i=1)
                        @foreach($showSliders as $showSlider)
                            <tr class="odd gradeX">
                                <td class="text-center">{{ $i++ }}</td>

                                <td class="text-center">
                                    <img src="{{ asset($showSlider->slider_image) }}" alt="Product Image" height="100" width="500" >
                                </td>
                            
                                <td class="text-center">{{ $showSlider->publication_status == 1 ? 'Published' : 'Unpublished' }}</td>

                                <td class="text-center">
                                	@if($showSlider->publication_status == 1)
	                                	<a class="btn btn-info btn-xs" href="{{ route('unpublished-slider', ['id'=>$showSlider->id]) }}" onclick="return confirm('Are you sure to Unpublished this Slider Image?');" title="Unpublished">
	                                		<span class="glyphicon glyphicon-arrow-up"></span>
	                                	</a>
                                	@else
	                                	<a class="btn btn-warning btn-xs" href="{{ route('published-slider', ['id'=>$showSlider->id]) }}" onclick="return confirm('Are you sure to Published this Slider Image?');" title="Published">
	                                		<span class="glyphicon glyphicon-arrow-down"></span>
	                                	</a>
                                	@endif

                                	<a class="btn btn-danger btn-xs" href="{{ route('delete-slider', ['id'=>$showSlider->id]) }}" onclick="return confirm('Are you sure to delete this Slider Image?');" title="Delete">
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