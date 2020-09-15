@extends('admin.master')

@section('title')
	Manage Design Image
@endsection

@section('body')

	<div class="row">
		<div class="col-md-12">
            @if(Session::has('success'))
				<div id="msg" class="alert alert-success left-icon-alert" role="alert">
	                <strong>Well done! &nbsp;</strong>{{ Session::get('success') }}
	            </div>
            @endif
						<div class="panel panel-default">
		    	<div class="panel-heading">
		    		<h4 class="text-center text-success">Product Design Image</h4>
		    	</div>

	    		<div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables">
                        <thead>
                            <tr>
                                <th class="text-center" width="10%">Sl No.</th>
                                <th class="text-center" width="50%">Image</th>
                                <th class="text-center" width="20%">Status</th>
                                <th class="text-center" width="20%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php($i=1)
                        @foreach($designImage as $image)
                            <tr class="odd gradeX">
                                <td class="text-center">{{ $i++ }}</td>
                                
                                <td class="text-center"><img src="{{ asset($image->design_image) }}" alt="" width="100" height="100"></td>

								<td class="text-center">
									@if($image->status == 1)
                                        <a href="{{ url('update-design-status/'.$image->id.'/0') }}"><span style="color:green">Active</span></a>
                                    @else
                                        <a href="{{ url('update-design-status/'.$image->id.'/1') }}"><span style="color:red">Inactive</span></a>
                                    @endif
								</td>

                               	<td class="text-center">
                                	<a class="btn btn-danger btn-xs" href="{{ url('delete-design-image/'.$image->id) }}" onclick="return confirm('Are you sure to delete this design Image?');" title="Delete">
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