<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="E-commerce">
    <meta name="keywords" content="E-commerce">
    <meta name="author" content="E-commerce">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="icon" href="{{ url('frontEnd') }}/images/favicon/1.png" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('frontEnd') }}/images/favicon/1.png" type="image/x-icon">
    <title>@yield('title')</title>

    <!--Google font-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" type="text/css" href="{{ url('frontEnd') }}/css/fontawesome-all.min.css">

    <!--Slick slider css-->
    <link rel="stylesheet" type="text/css" href="{{ url('frontEnd') }}/css/slick.css">
    <link rel="stylesheet" type="text/css" href="{{ url('frontEnd') }}/css/slick-theme.css">

    <!-- Animate icon -->
    <link rel="stylesheet" type="text/css" href="{{ url('frontEnd') }}/css/animate.css">

    <!-- Bootstrap css -->
    <link rel="stylesheet" type="text/css" href="{{ url('frontEnd') }}/css/bootstrap.css">

    <!-- Theme css -->
    <link rel="stylesheet" type="text/css" href="{{ url('frontEnd') }}/css/color1.css?v=1.1" media="screen" id="color">


</head>

<body>

    <!-- header -->
    @include('front-end.includes.header')

    <!-- Home slider -->

    @yield('main-content')

    <!-- footer -->
    @include('front-end.includes.footer')
    <!-- footer end -->


    <!-- tap to top -->
    <div class="tap-top top-cls">
        <div>
            <i class="fa fa-angle-double-up"></i>
        </div>
    </div>
    <!-- tap to top end -->




    <!-- latest jquery-->
    <script src="{{ url('frontEnd') }}/js/jquery-3.3.1.min.js"></script>

    <!-- fly cart ui jquery-->
    <script src="{{ url('frontEnd') }}/js/jquery-ui.min.js"></script>

    <!-- popper js-->
    <script src="{{ url('frontEnd') }}/js/popper.min.js"></script>

    <!-- slick js-->
    <script src="{{ url('frontEnd') }}/js/slick.js"></script>

    <!-- menu js-->
    <script src="{{ url('frontEnd') }}/js/menu.js"></script>

    <!-- lazyload js-->
    <script src="{{ url('frontEnd') }}/js/lazysizes.min.js"></script>

    <!-- Bootstrap js-->
    <script src="{{ url('frontEnd') }}/js/bootstrap.js"></script>

    <!-- Bootstrap Notification js-->
    <script src="{{ url('frontEnd') }}/js/bootstrap-notify.min.js"></script>

    <!-- Fly cart js-->
    <script src="{{ url('frontEnd') }}/js/fly-cart.js"></script>

    <!-- jquery.elevatezoom.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/elevatezoom/2.2.3/jquery.elevatezoom.min.js"></script>

    <!-- Theme js-->
    <script src="{{ url('frontEnd') }}/js/script.js?v=1.0"></script>

    <script>
        $(window).on('load', function () {
            setTimeout(function () {
                $('#exampleModal').modal('show');
            }, 2500);
        });
        function openSearch() {
            document.getElementById("search-overlay").style.display = "block";
        }

        function closeSearch() {
            document.getElementById("search-overlay").style.display = "none";
        }
    </script>

</body>
</html>
