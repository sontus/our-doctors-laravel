<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('assets/css/all.css')}} " rel="stylesheet"> <!--load all styles -->
    <script defer src="{{ asset('assets/js/custom.js')}} "></script> <!--load all styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
     <!-- laravel-toastr css -->
     <link href="{{ asset('assets/backend/css/toastr.min.css')}}" rel="stylesheet" type="text/css" />
     <!-- sweetalert2 css -->
     <link href="{{ asset('assets/backend/css/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
    <style>
        .req{
            color:red;
            font-weight: 700;
        }
    </style>
</head>
<body>

        @include('layouts.partials.header')
        @yield('content')
        @include('layouts.partials.footer')

    <!-- footer end-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/js/custom.js')}}"></script>
     <!-- laravel-toastr css -->
   <!-- laravel-toastr css -->
    <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
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
</body>
</html>
