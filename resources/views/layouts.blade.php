<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Tranvas</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @yield('header-style')
</head>
<body>
    @include('partials.menu')
    <div class="container">
        @yield('content')
    </div>

    <script src="js/app.js"></script>
    @stack('footer-script')
</body>
</html>
