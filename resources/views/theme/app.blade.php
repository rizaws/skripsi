<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    {{-- membuat navbar active tidak error --}}
    <meta name="turbolinks-cache-control" content="no-cache">
    {{-- <meta name="turbolinks-visit-control" content="reload"> --}}
    <title>Dashboard - Mazer Admin Dashboard</title>

    <link rel="stylesheet" turbolinks-track="true" href="{{ asset('theme') }}/assets/css/main/app.css">
    <link rel="stylesheet" href="{{ asset('theme') }}/assets/css/main/app-dark.css">
    <link rel="shortcut icon" href="{{ asset('theme') }}/assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('theme') }}/assets/images/logo/favicon.png" type="image/png">

    <link rel="stylesheet" href="{{ asset('theme') }}/assets/css/shared/iconly.css">
    
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">

    
    @yield('styles')

</head>

<body>
    <div id="app">
        @include('theme.navbar')
        @yield('content')
        
    </div>
    <script src="{{ asset('theme') }}/assets/js/bootstrap.js"></script>
    <script src="{{ asset('theme') }}/assets/js/app.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    


    @yield('scripts')


</body>

</html>
