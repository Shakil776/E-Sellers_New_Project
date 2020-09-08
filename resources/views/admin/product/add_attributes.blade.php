@extends('admin.master')

@section('title')
	Add Product Attribute
@endsection

@section('body')

	<div class="row" style="margin-top: 50px;">
		<div class="col-md-12">
			@if(Session::get('message'))
				<div id="msg" class="alert alert-success left-icon-alert" role="alert">
	                <strong>Well done! &nbsp;</strong>{{ Session::get('message') }}
	            </div>
	        @elseif(Session::get('error'))
	        <div id="msg" class="alert alert-danger left-icon-alert" role="alert">
	                <strong>Oppps! &nbsp;</strong>{{ Session::get('error') }}
	            </div>
            @endif


			<div class="panel panel-default">
		    	<div class="panel-heading">
		    		<h4 class="text-center text-success">Add Product Attribute</h4>
		    	</div>
		    	<div class="panel-body">
		    		<form class="form-horizontal" action="{{ route('save-attribute', ['id'=>$productDetails->id]) }}" method="POST">
		    			@csrf

						 <div class="form-group">
						    <label class="control-label col-sm-2">Product Name: </label>
						    <label class="control-label col-sm-2">{{ $productDetails->product_name }}</label>
						 </div>

						  <div class="form-group">
						    <label class="control-label col-sm-2">Product Code: </label>
						    <label class="control-label col-sm-2">{{ $productDetails->product_code }}</label>
						 </div> 

						 <div class="form-group">
						   <label class="control-label col-sm-2">Product Price: </label>
						    <label class="control-label col-sm-2">TK. {{ $productDetails->product_price}}</label>
						 </div>


						    <div class="field_wrapper">
							    <div>
							        <input type="text" name="sku[]" id="sku" placeholder="SKU" width="70px" />
							        <input type="text" name="size[]" id="size" placeholder="Size" width="70px" />
							        <input type="text" name="color[]" id="color" placeholder="Color" width="70px" />
							        <input type="text" name="price[]" id="price" placeholder="Price" width="70px" />
							        <input type="text" name="stock[]" id="stock" placeholder="Stock" width="70px" />
							        <a href="javascript:void(0);" class="add_button btn btn-info" title="Add field"><span class="glyphicon glyphicon-plus"></span></a>
							    </div>
							</div>



						<div class="form-group"> 
					    	<div class="col-sm-6 col-sm-offset-3">
					    		<input type="submit" name="btn" class="btn btn-success" value="Add Attribute">
					    	</div>
					    </div>
		    		</form>
		    	</div>
		 	</div>
		</div>
	</div>

	{{-- show attribute --}}
	<div class="row">
		<div class="col-md-12">
						<div class="panel panel-default">
		    	<div class="panel-heading">
		    		<h4 class="text-center text-success">Show Attributes</h4>
		    	</div>

	    		<div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables">
                        <thead>
                            <tr>
                                <th class="text-center">Sl No.</th>
                                <th class="text-center">SKU</th>
                                <th class="text-center">SIZE</th>
                                <th class="text-center">COLOR</th>
                                <th class="text-center">PRICE</th>
                                <th class="text-center">STOCK</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php($i=1)
                        @foreach($productDetails['attributes'] as $attribute)
                            <tr class="odd gradeX">
                                <td>{{ $i++ }}</td>
                                <td>{{ $attribute->sku }}</td>
                                <td>{{ $attribute->size }}</td>
                                <td>{{ $attribute->color }}</td>
                                <td>{{ $attribute->price }}</td>
                                <td>{{ $attribute->stock }}</td>

                               	<td class="text-center">
                                	<a class="btn btn-danger btn-xs" href="{{ route('delete-attribute', ['id'=>$attribute->id]) }}" onclick="return confirm('Are you sure to delete this attribute?');" title="Delete">
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