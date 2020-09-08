@extends('admin.master')

@section('title')
	NewsLetter Subscriber
@endsection

@section('body')

	<div class="row" style="margin-top: 50px;">
		<div class="col-md-12">
			@if(Session::has('success'))
				<div id="msg" class="alert alert-success left-icon-alert" role="alert">
	                <strong>Well done! &nbsp;</strong>{{ Session::get('success') }}
	            </div>
            @endif

			<div class="panel panel-default">
		    	<div class="panel-heading">
                    <!-- <a href="{{ url('export-newsletter') }}" class="btn btn-primary btn-xs text-left">Export</a> -->
		    		<h4 class="text-center text-success">NewsLetter Subscriber</h4>
		    	</div>

	    		<div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables">
                        <thead>
                            <tr>
                                <th class="text-center">Sl No.</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Date</th>
                                <th class="text-center" width="20%">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                        @php($i=1)
                        @foreach($newsletters as $newsletter)
                            <tr class="odd gradeX">
                                <td>{{ $i++ }}</td>
                                <td>{{ $newsletter->email }}</td>
                                <td>
                                    @if($newsletter->status == 1)
                                        <a href="{{ url('update-newsletter-status/'.$newsletter->id.'/0') }}"><span style="color:green">Active</span></a>
                                    @else
                                    <a href="{{ url('update-newsletter-status/'.$newsletter->id.'/1') }}"><span style="color:red">Inactive</span></a>
                                    @endif
                                </td>
                                <td>{{ date('j F Y', strtotime($newsletter->created_at)) }}</td>
                                
                                <td class="text-center">
                                    <a class="btn btn-danger btn-xs" href="{{ url('delete_newsletter/'.$newsletter->id) }}" title="Delete">
                                        <span>Delete</span>
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