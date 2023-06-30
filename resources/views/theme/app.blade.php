<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    {{-- membuat navbar active tidak error --}}
    <meta name="turbolinks-cache-control" content="no-cache">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <meta name="turbolinks-visit-control" content="reload"> --}}
    <title>{{ $title }}</title>

    <link rel="stylesheet" turbolinks-track="true" href="{{ asset('theme') }}/assets/css/main/app.css">
    <link rel="stylesheet" href="{{ asset('theme') }}/assets/css/main/app-dark.css">
    <link rel="stylesheet" href="{{ asset('theme') }}/assets/css/pages/fontawesome.css">
    <link rel="shortcut icon" href="{{ asset('theme') }}/assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('theme') }}/assets/images/logo/favicon.png" type="image/png">

    <link rel="stylesheet" href="{{ asset('theme') }}/assets/css/shared/iconly.css">

    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="{{ asset('theme') }}/assets/extensions/choices.js/public/assets/styles/choices.css">

    {{-- mazer datatbles --}}
    <link rel="stylesheet" href="{{ asset('theme') }}/assets/extensions/simple-datatables/style.css" />
    <link rel="stylesheet" href="{{ asset('theme') }}/assets/css/pages/simple-datatables.css" />

    {{-- toast --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/css/toastr.css" rel="stylesheet" />

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>


    @yield('styles')

</head>

<body>
    <script src="{{ asset('theme') }}/assets/js/initTheme.js"></script>
    <div id="app">

        @include('theme.navbar')
        @yield('content')

    </div>
    <script src="{{ asset('theme') }}/assets/js/bootstrap.js"></script>
    <script src="{{ asset('theme') }}/assets/js/app.js"></script>
    <script src="{{ asset('theme') }}/assets/extensions/jquery/jquery.min.js"></script>


    {{-- datatbles mazer --}}
    <script src="{{ asset('theme') }}/assets/extensions/simple-datatables/umd/simple-datatables.js"></script>
    <script src="{{ asset('theme') }}/assets/js/pages/simple-datatables.js"></script>

    {{-- toast --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/js/toastr.js"></script>
    <script src="{{ asset('theme') }}/assets/extensions/choices.js/public/assets/scripts/choices.js"></script>
    <script src="{{ asset('theme') }}/assets/js/pages/form-element-select.js"></script>

    {{-- <script>
        $(document).ready(function() {
            $('#table').DataTable();
        });
    </script> --}}
    <script>
        $(document).ready(function() {
            toastr.options.timeOut = 1000;
            @if (Session::has('error'))
                toastr.error('{{ Session::get('error') }}');
            @elseif (Session::has('sukses'))
                toastr.success('{{ Session::get('sukses') }}');
            @endif
        });
    </script>

    @yield('scripts')


</body>

</html>
