<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Tranvas</title>
    <link rel="stylesheet" href="{{ asset('css/darkly.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ mix('css/app.css') }}"> --}}
    <script>
        window.Laravel = {
            csrfToken: '{{ csrf_token() }}',
            basePath: '{{ url('/') }}'
        }
    </script>
    @yield('header-style')
</head>
<body>
    @include('partials.menu')
    <div class="container" id="app">
        <div class="container-content">
            @yield('content')
        </div>
    </div>

    <script src="{{ mix('js/app.js') }}"></script>
    @stack('footer-script')
</body>
</html>
