@extends('admin.master')

@section('title')
	Manage Manufacturer
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
		    		<h4 class="text-center text-success">Manage Manufacturer</h4>
		    	</div>

	    		<div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables">
                        <thead>
                            <tr>
                                <th class="text-center" width="10%">Sl No.</th>
                                <th class="text-center" width="15%">Manufacturer Name</th>
                                <th class="text-center" width="10%">URL</th>
                                <th class="text-center" width="30%">Description</th>
                                <th class="text-center" width="20%">Publication Status</th>
                                <th class="text-center" width="15%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php($i=1)
                        @foreach($manufacturers as $manufacturer)
                            <tr class="odd gradeX">
                                <td>{{ $i++ }}</td>
                                <td>{{ $manufacturer->manufacturer_name }}</td>
                                <td>{{ $manufacturer->url }}</td>
                                <td>{{ $manufacturer->manufacturer_description }}</td>
                                <td>{{ $manufacturer->publication_status == 1 ? 'Published' : 'Unpublished' }}</td>
                                <td class="text-center">
                                	@if($manufacturer->publication_status == 1)
	                                	<a class="btn btn-info btn-xs" href="{{ route('unpublished-manufacturer', ['id'=>$manufacturer->id]) }}" onclick="return confirm('Are you sure to Unpublished this manufacturer?');" title="Unpublished">
	                                		<span class="glyphicon glyphicon-arrow-up"></span>
	                                	</a>
                                	@else
	                                	<a class="btn btn-warning btn-xs" href="{{ route('published-manufacturer', ['id'=>$manufacturer->id]) }}" onclick="return confirm('Are you sure to Published this manufacturer?');" title="Published">
	                                		<span class="glyphicon glyphicon-arrow-down"></span>
	                                	</a>
                                	@endif
                                	<a class="btn btn-success btn-xs" href="{{ route('edit-manufacturer', ['id'=>$manufacturer->id]) }}" title="Edit">
                                		<span class="glyphicon glyphicon-edit"></span>
                                	</a>
                                	<a class="btn btn-danger btn-xs" href="{{ route('delete-manufacturer', ['id'=>$manufacturer->id]) }}" onclick="return confirm('Are you sure to delete this manufacturer?');" title="Delete">
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