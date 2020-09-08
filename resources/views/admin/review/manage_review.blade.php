<?php
    use App\User;
?>
@extends('admin.master')

@section('title')
	Manage Review
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
		    		<h4 class="text-center text-success">Manage Review</h4>
		    	</div>

	    		<div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables">
                        <thead>
                            <tr>
                                <th class="text-center" width="5%">No.</th>
                                <th class="text-center" width="10%">Product Name</th>
                                <th class="text-center" width="10%">Vendor Name</th>
                                <th class="text-center" width="75%">Reviews Details</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php($i=1)
                        @foreach($product_reviews as $product_review)
                            <tr class="odd gradeX">
                                <td>{{ $i++ }}</td>
                                <td>{{ $product_review->product_name }}</td>
                                <td>{{ $product_review->vendor_name }}</td>
                                <td>
                                    <table class="table table-bordered">
                                        <thead>
                                            <th class="text-center" width="20%">Customer Name</th>
                                            <th class="text-center" width="60%">Review</th>
                                            <th class="text-center" width="10%">Rating</th>
                                            <th class="text-center" width="10%">Action</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($product_review['reviews'] as $review)
                                                <tr>
                                                    <?php 
                                                        $customers = User::find($review->customer_id);
                                                    ?>
                                                    
                                                    <td class="text-center">
                                                        @if (!empty($customers['name']) && isset($customers['name']))
                                                            {{ $customers['name'] }}
                                                        @endif
                                                    </td>
                                                    
                                                    <td class="text-center">{{ $review->review }}</td>
                                                    <td class="text-center">{{ $review->rating }}</td>
                                                    <td class="text-center">
                                                        @if($review->status == 1)
                                                            <a class="btn btn-info btn-xs" href="{{ route('unpublished-review', ['id'=>$review->id]) }}" onclick="return confirm('Are you sure to Unpublished this Review?');" title="Unpublished">
                                                                <span class="glyphicon glyphicon-arrow-up"></span>
                                                                
                                                            </a>
                                                        @else
                                                            <a class="btn btn-warning btn-xs" href="{{ route('published-review', ['id'=>$review->id]) }}" onclick="return confirm('Are you sure to Published this Review?');" title="Published">
                                                                <span class="glyphicon glyphicon-arrow-down"></span>
                                                            </a>
                                                        @endif

                                                        <a class="btn btn-danger btn-xs" href="{{ route('delete-review', ['id'=>$review->id]) }}" onclick="return confirm('Are you sure to delete this review?');" title="Delete">
                                                            <span class="glyphicon glyphicon-trash"></span>
                                                        </a>
                                                    </td>
                                                </tr> 
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <th colspan="2" class="text-center">Average</th>
                                            <th colspan="2" class="text-center">{{ $product_review->rating }}</th>
                                        </tfoot>
                                    </table>
                                    
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