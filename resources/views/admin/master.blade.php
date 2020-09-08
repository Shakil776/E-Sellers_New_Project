<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('admin') }}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"><!-- Invoie  Bootstrap CSS -->
    {{-- <link href="{{asset('admin') }}/invoice-templete/bootstrap/css/bootstrap.min.css" rel="stylesheet"> --}}
    <!-- MetisMenu CSS -->
    <link href="{{asset('admin') }}/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link rel="icon" href="{{asset('admin/images/logo.png') }}"/>
    <!-- Custom CSS -->
    <link href="{{asset('admin') }}/dist/css/sb-admin-2.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link href="{{asset('admin') }}/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
    <!-- DataTables Responsive CSS -->
    <link href="{{asset('admin') }}/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
    <!-- Morris Charts CSS -->
    <link href="{{asset('admin') }}/vendor/morrisjs/morris.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="{{asset('admin') }}/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- sweet alert css -->
    <link href="{{asset('admin') }}/assets/css/sweetalert.css" rel="stylesheet" type="text/css">

</head>

<body>

    <div id="wrapper">
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            @include('admin.includes.header')
            
            <div class="navbar-default sidebar" role="navigation">
                <!-- left-sidebar -->
                @include('admin.includes.left-sidebar')
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- body content -->
            <div id="page-wrapper">

                @yield('body')

            </div>
        <!-- /#page-wrapper -->
    </div>

    <!-- jQuery -->
    <script src="{{asset('admin') }}/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('admin') }}/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{asset('admin') }}/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <!-- <script src="{{asset('admin') }}/vendor/raphael/raphael.min.js"></script>
    <script src="{{asset('admin') }}/vendor/morrisjs/morris.min.js"></script>
    <script src="{{asset('admin') }}/data/morris-data.js"></script> -->

    <!-- DataTables JavaScript -->
    <script src="{{asset('admin') }}/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('admin') }}/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="{{asset('admin') }}/vendor/datatables-responsive/dataTables.responsive.js"></script>
    <!-- sweet alert JS -->
    <script src="{{asset('admin') }}/assets/js/sweetalert.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{asset('admin') }}/dist/js/sb-admin-2.js"></script>

    <!--data table init -->
    <script>
        $(document).ready(function() {
            $('#dataTables').DataTable({
                responsive: true
            });
        });
    </script>

    {{-- message remove every page --}}
    <script>
        $(document).ready(function() {
            $('#msg').click(function() {
                $(this).text(' ');
            });
            
            $('.alert').click(function() {
                $(this).remove();
            });
        });
    </script>

    {{-- add remove input field dynamically --}}
    <script>
        $(document).ready(function(){
            var maxField = 10; //Input fields increment limitation
            var addButton = $('.add_button'); //Add button selector
            var wrapper = $('.field_wrapper'); //Input field wrapper
            var fieldHTML = '<div><input type="text" name="sku[]" id="sku" placeholder="SKU" width="70px" style="margin-right:4px;margin-top:5px;" /><input type="text" name="size[]" id="size" placeholder="Size" width="70px" style="margin-right:4px;margin-top:5px;"/><input type="text" name="color[]" id="color" placeholder="Color" width="70px" style="margin-right:4px;margin-top:5px;"/><input type="text" name="price[]" id="price" placeholder="Price" width="70px" style="margin-right:4px;margin-top:5px;"/><input type="text" name="stock[]" id="stock" placeholder="Stock" width="70px" style="margin-right:4px; margin-top:5px;"/><a href="javascript:void(0);" class="remove_button btn btn-danger"><span class="glyphicon glyphicon-minus"></span></a></div>'; //New input field html 
            var x = 1; //Initial field counter is 1
            
            //Once add button is clicked
            $(addButton).click(function(){
                //Check maximum number of input fields
                if(x < maxField){ 
                    x++; //Increment field counter
                    $(wrapper).append(fieldHTML); //Add field html
                }
            });
            
            //Once remove button is clicked
            $(wrapper).on('click', '.remove_button', function(e){
                e.preventDefault();
                $(this).parent('div').remove(); //Remove field html
                x--; //Decrement field counter
            });
        });
    </script>

</body>

</html>
