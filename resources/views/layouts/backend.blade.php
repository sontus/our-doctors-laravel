<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
    <meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="Our-Doctors - Web" />
	<meta property="og:title" content="Our-Doctors - Web" />
	<meta property="og:description" content="Our-Doctors - Web" />
	<meta property="og:image" content="" />
	<meta name="format-detection" content="telephone=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Our-Doctors') }} | @yield('title')</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- laravel-toastr css -->
    <link href="{{ asset('assets/backend/css/toastr.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- sweetalert2 css -->
    <link href="{{ asset('assets/backend/css/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="{{ asset('assets/backend/vendor/chartist/css/chartist.min.css')}}">
    <link href="{{ asset('assets/backend/vendor/bootstrap-select/dist/css/bootstrap-select.min.css')}}" rel="stylesheet">
	<link href="{{ asset('assets/backend/vendor/owl-carousel/owl.carousel.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/backend/css/style.css')}}" rel="stylesheet">
    <style>
        .req{
            color:red;
            font-weight: 700;
        }
    </style>
    @stack('vendor-css')
    @stack('onpage-css')
</head>
<body>
    <!--*******************
        Preloader start
    ********************-->
    @include('layouts.partials.backend.preloader')
    <!--*******************
        Preloader end
    ********************-->
    <div id="main-wrapper">
        <!--**********************************
            Nav header start
        ***********************************-->
       @include('layouts.partials.backend.header')
        <!--**********************************
            Nav header end
        ***********************************-->

		<!--**********************************
            Header start
        ***********************************-->
        <!--**********************************
            Sidebar start
        ***********************************-->
        @include('layouts.partials.backend.left-sidebar')
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        @yield('content')
        <!--**********************************
            Content body end
        ***********************************-->
        <!--**********************************
            Footer start
        ***********************************-->
       @include('layouts.partials.backend.footer')
        <!--**********************************
            Footer end
        ***********************************-->
    </div>

    <!-- Required vendors -->
    <script src="{{ asset('assets/backend/vendor/global/global.min.js')}}"></script>
    <script src="{{ asset('assets/backend/vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
    {{-- <script src="{{ asset('assets/backend/vendor/chart.js/Chart.bundle.min.js')}}"></script> --}}

    <!-- Dashboard 1 -->
    {{-- <script src="{{ asset('assets/backend/js/dashboard/dashboard-1.js')}}"></script> --}}

    {{-- <script src="{{ asset('assets/backend/vendor/chart.js/Chart.bundle.min.js')}}"></script> --}}
    <script src="{{ asset('assets/backend/js/custom.min.js')}}"></script>
    <script src="{{ asset('assets/backend/js/deznav-init.js')}}"></script>
    <script src="{{ asset('assets/backend/js/demo.js')}}"></script>
     <!-- laravel-toastr css -->
    {{-- <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script> --}}
    <script src="{{ asset('assets/backend/js/toastr.min.js')}}"></script>
    <!-- sweetalert2 css -->
    <script src="{{ asset('assets/backend/js/sweetalert2.min.js')}}"></script>
    {!! Toastr::message() !!}
        <script>
            @if($errors->any())
                @foreach($errors->all() as $error)
                    toastr.error('{{ $error }}','Error',{
                    closeButton:true,
                    progressBar: true,
                });
                @endforeach
            @endif

            //
        // Delete Item
        function deleteItem(id) {
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-danger',
                cancelButtonClass: 'btn btn-success mr-3',
                buttonsStyling: false,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-form-'+id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelled',
                        'Your data is safe :)',
                        'error'
                    )
                }
            })
        }
        </script>
    @stack('vendor-js')
    @stack('onpage-js')
</body>
</html>
