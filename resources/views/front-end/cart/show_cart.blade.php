@extends('front-end.master')

@section('title', 'Cart Details')

@section('main-content')

    {{-- message --}}
     @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
          <strong>Success! </strong>  {{ Session::get('success') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
    @endif

    @if(Session::has('error'))
        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
          <strong>Ooops! </strong>  {{ Session::get('error') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
    @endif


    <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>Cart</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active">Cart</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->


    <!--section start-->
    <section class="cart-section section-b-space text-center">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                @if($countCartItem != 0)
                    <table class="table cart-table table-responsive">
                        <thead>
                            <tr class="table-head">
                                <th scope="col">image</th>
                                <th scope="col">product name</th>
                                <th scope="col">price</th>
                                <th scope="col">quantity</th>
                                <th scope="col">action</th>
                                <th scope="col">total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($sum = 0)
                            @foreach($cartItems as $cartItem)

                            <tr id="cart-item-row">
                                
                                <td>
                                    <a href="javacript:"><img src="{{ asset($cartItem->options->image) }}" alt=""></a>
                                </td>

                                <td>
                                    <a href="javacript:">{{ $cartItem->name }}</a>
                                </td>
                                <td>
                                    <h2>{{ $cartItem->price }}</h2>
                                </td>

                                <td>
                                    <div class="qty-box">
                                        <div class="input-group">
                                            <form action="{{ url('cart-update') }}" method="post">
                                                @csrf
                                                <input type="number" name="qty" class="form-control input-number" value="{{ $cartItem->qty }}" min="1">
                                                <input type="hidden" name="rowId" value="{{ $cartItem->rowId }}" min="1" />
                                                <input type="submit" name="btn" class="btn btn-primary" style="background:#ff4c3b;border-color:#ff4c3b" value="Update" />
                                            </form>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <a href="{{ url('cart-remove/'.$cartItem->rowId) }}" class="icon cart-remove">
                                        <i class="ti-close" title="Remove"></i>
                                    </a>
                                </td>

                                <td>
                                    <h2 class="td-color">{{ $total = $cartItem->price * $cartItem->qty }}</h2>
                                </td>
                            </tr>

                            <?php $sum = $sum + $total; Session::put('subTotal', $sum); ?>
                                    
                            @endforeach

                        </tbody>
                    </table>
                    <table class="table cart-table table-responsive-md">
                        <tfoot>
                            <tr>
                                <td>Item Total (TK.) :</td>
                                <td>
                                    <h2>{{ $sum }}</h2>
                                </td>
                            </tr>
                            <tr>
                                <td>Vat (2%) (TK.) :</td>
                                <td>
                                    <h2>{{ $vat = $sum * (2/100) }}</h2>
                                </td>
                            </tr>
                            <tr>
                                <td>Grand Total (TK.) :</td>
                                <td>
                                    <h2>{{ $orderTotal = $sum + $vat }}</h2>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                @else
					<tr class="text-center"><td>Your Shopping Cart is empty. Please add prodcut.</td></tr>
				@endif
                </div>
            </div>
            <div class="row cart-buttons">
                <div class="col-6 ">
                    <a href="{{ url('/') }}" class="btn btn-solid">continue shopping</a>
                </div>
                @if($countCartItem != 0)
                    <div class="col-6">
                        <a href="{{ url('checkout') }}" class="btn btn-solid">check out</a>
                    </div>
                @endif

            </div>
        </div>
    </section>
    <!--section end-->

@endsection


