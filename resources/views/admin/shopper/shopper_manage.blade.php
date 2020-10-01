@extends('admin.master')

@section('title')
	Manage Shopper
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
		    		<h4 class="text-center text-success">Manage Shopper</h4>
		    	</div>

	    		<div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables">
                        <thead>

                            <tr>
                                <th class="text-center" >Sl No.</th>
                                <th class="text-center" >Owner Name</th>
                                <th class="text-center" >Email</th>
                                <th class="text-center" >shop_name</th>
                                <th class="text-center" >Mobile</th>
                                <th class="text-center" >NID/Passport/Birth</th>
                                <th class="text-center" >Address</th>
                                <th class="text-center" >Service Provide</th>
                                <th class="text-center" >Exp. Level</th>
                                <th class="text-center" >Status</th>
                                <th class="text-center" width="10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php($i=1)
                        @foreach($shoppers as $shopper)
                            <tr class="odd gradeX">
                                <td>{{ $i++ }}</td>
                                <td>{{ $shopper->owner_name }}</td>
                                <td>{{ $shopper->email }}</td>
                                <td>{{ $shopper->shop_name }}</td>
                                <td>{{ $shopper->mobile }}</td>
                                
                                <td>
                                  @if(!empty($shopper->nid_image))
                                  <img src="{{ asset($shopper->nid_image) }}" alt="Image" height="100" width="100" >
                                  @endif
                                </td>
                                
                                <td>{{ $shopper->state }}, {{ $shopper->city }}, {{ $shopper->address }}</td>
                                <td>{{ $shopper->service_provide }}</td>
                                <td>{{ $shopper->level }}</td>
                                <td>{{ $shopper->status == 1 ? 'Active' : 'Deactive' }}</td>

                                <td class="text-center">

                                	@if($shopper->status == 1)
	                                	<a class="btn btn-info btn-xs" href="{{ route('deactive-shopper', ['id'=>$shopper->id]) }}" onclick="return confirm('Are you sure to Deactive this shopper?');" title="Deactive">
                                            <span class="glyphicon glyphicon-arrow-up"></span>
	                                	</a>
                                	@else
	                                	<a class="btn btn-warning btn-xs" href="{{ route('active-shopper', ['id'=>$shopper->id]) }}" onclick="return confirm('Are you sure to Active this shopper?');" title="Active">
                                            <span class="glyphicon glyphicon-arrow-down"></span>
	                                	</a>
                                	@endif


                                	<a class="btn btn-danger btn-xs" href="{{ route('delete-shopper', ['id'=>$shopper->id]) }}" onclick="return confirm('Are you sure to delete this shopper?');" title="Delete">
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