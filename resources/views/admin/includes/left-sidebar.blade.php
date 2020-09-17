
<div class="sidebar-nav navbar-collapse">
    <ul class="nav" id="side-menu">
        <li class="sidebar-search">
            <div class="input-group custom-search-form">
                <input type="text" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button class="btn btn-default" type="button">
                    <i class="fa fa-search"></i>
                </button>
            </span>
            </div>
            <!-- /input-group -->
        </li>

        <li>
            <a href="{{ route('dashboard') }}"><i class="fa fa-dashboard fa-fw"></i>&nbsp;Dashboard</a>
        </li>
        @if(Session::get('adminDetails')['type'] == "Admin")
        <li>
            <a href=""><i class="fa fa-lock"></i>&nbsp;Admin Manager<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li><a href="{{ url('add-admin') }}">Add Admin</a></li>
                <li><a href="{{ url('manage-admin') }}">Manage Admin</a></li>
            </ul>
        </li>
        @endif

        @if(Session::get('adminDetails')['customer_access'] == 1)
        <li>
            <a href=""><i class="fa fa-users fa-fw"></i>&nbsp;Customer Manager<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li><a href="{{ route('manage_customer') }}">Manage Customers</a></li>
            </ul>
        </li>
        @endif


        @if(Session::get('adminDetails')['categories_access'] == 1)
        <li>
            <a href=""><i class="fa fa-envelope"></i>&nbsp;Category Manager<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="{{ route('add-category') }}">Add Category</a>
                </li>
                <li>
                    <a href="{{ route('manage-category') }}">Manage Category</a>
                </li>
            </ul>
        </li>
        @endif

        <!-- custom category manager start -->
        <li>
            <a href=""><i class="fa fa-envelope"></i>&nbsp;Custom Category Manager<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="{{ url('add-custom-category') }}">Add Custom Category</a>
                </li>
                <li>
                    <a href="{{ url('manage-custom-category') }}">Manage Custom Category</a>
                </li>
            </ul>
        </li>
        <!-- custom category manager end -->

        <!-- design image manager start -->
        <li>
            <a href=""><i class="fa fa-envelope"></i>&nbsp;Design Image Manager<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="{{ url('add-design-image') }}">Add Design Image</a>
                </li>
                <li>
                    <a href="{{ url('manage-design-image') }}">Manage Design Image</a>
                </li>
            </ul>
        </li>
        <!-- custom category manager end -->

        @if(Session::get('adminDetails')['manufacturer_access'] == 1)
        <li>
            <a href=""><i class="fa fa-filter"></i>&nbsp;Manufacturer Manager<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="{{ route('add-manufacturer') }}">Add Manufacturer</a>
                </li>
                <li>
                    <a href="{{ route('manage-manufacturer') }}">Manage Manufacturer</a>
                </li>
            </ul>
        </li>
        @endif

        @if(Session::get('adminDetails')['product_status_access'] == 1)
        <li>
            <a href=""><i class="fa fa-bar-chart-o fa-fw"></i>&nbsp;Product Status Manager<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="{{ route('add-product-status') }}">Add Product Status Name</a>
                </li>
                <li>
                    <a href="{{ route('manage-product-status') }}">Manage Product Status Name</a>
                </li>
            </ul>
        </li>
        @endif


        @if(Session::get('adminDetails')['product_access'] == 1)
        <li>
            <a href=""><i class="fa fa-product-hunt"></i>&nbsp;Product Manager<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="{{ route('add-product') }}">Add Product</a>
                </li>
                <li>
                    <a href="{{ route('manage-product') }}">Manage Product</a>
                </li>
            </ul>
        </li>
        @endif

        @if(Session::get('adminDetails')['review_access'] == 1)
        <li>
            <a href=""><i class="fa fa-star"></i>&nbsp;Review Manager<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li><a href="{{ route('manage-review') }}">Manage Review</a></li>
            </ul>
        </li>
        @endif

        @if(Session::get('adminDetails')['order_access'] == 1)
        <li>
            <a href="{{ route('manage-order') }}"><i class="fa fa-first-order"></i>&nbsp;Manage Order</a>
        </li>
        @endif

        @if(Session::get('adminDetails')['slider_access'] == 1)
        <li>
            <a href=""><i class="fa fa-image"></i> Slider Manager<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="{{ route('slider_image') }}">Add Slider</a>
                </li>
                <li>
                    <a href="{{ route('manage_slider') }}">Manage Slider</a>
                </li>
            </ul>
        </li>
        @endif

        @if(Session::get('adminDetails')['newsletter_access'] == 1)
        <li>
            <a href="{{ route('newsletter_subscriber') }}"><i class="fa fa-newspaper-o"></i>&nbsp;Newsletter Subscriber</a>
        </li>
        @endif

    
    </ul>
</div>
