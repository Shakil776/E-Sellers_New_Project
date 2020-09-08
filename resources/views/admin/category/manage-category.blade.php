@extends('admin.master')

@section('title')
	Manage Category
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
		    		<h4 class="text-center text-success">Manage Category</h4>
		    	</div>

	    		<div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables">
                        <thead>
                            <tr>
                                <th class="text-center" width="10%">Sl No.</th>
                                <th class="text-center" width="15%">Category Name</th>
                                <th class="text-center" width="15%">Category Icon</th>
                                <th class="text-center" width="25%">Category Description</th>
                                <th class="text-center" width="20%">Publication Status</th>
                                <th class="text-center" width="15%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php($i=1)
                        @foreach($categories as $category)
                            <tr class="odd gradeX">
                                <td>{{ $i++ }}</td>
                                <td>{{ $category->category_name }}</td>
                                <td>
								@if(!empty($category->category_icon))
									<img src="{{ asset($category->category_icon) }}" width="50px" height="50px" alt="">
								@endif
								</td>
                                <td>{{ $category->category_description }}</td>
                                <td>{{ $category->publication_status == 1 ? 'Published' : 'Unpublished' }}</td>
                                <td class="text-center">
                                	@if($category->publication_status == 1)
	                                	<a class="btn btn-info btn-xs" href="{{ route('unpublished-category', ['id'=>$category->id]) }}" onclick="return confirm('Are you sure to Unpublished this category?');" title="Unpublished">
	                                		<span class="glyphicon glyphicon-arrow-up"></span>
	                                	</a>
                                	@else
	                                	<a class="btn btn-warning btn-xs" href="{{ route('published-category', ['id'=>$category->id]) }}" onclick="return confirm('Are you sure to Published this category?');" title="Published">
	                                		<span class="glyphicon glyphicon-arrow-down"></span>
	                                	</a>
                                	@endif
                                	<a class="btn btn-success btn-xs" href="{{ route('edit-category', ['id'=>$category->id]) }}" title="Edit">
                                		<span class="glyphicon glyphicon-edit"></span>
                                	</a>
                                	<a class="btn btn-danger btn-xs" href="{{ route('delete-category', ['id'=>$category->id]) }}" onclick="return confirm('Are you sure to delete this category?');" title="Delete">
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