<html>
    <head>
        <title>Survify - @yield('title')</title>
        <link rel="stylesheet" type="text/css" href="css/all.css">
    </head>
    <body>
        <div class="container">
            @yield('content')
        </div>
        <script type="text/javascript" src="js/app.js"></script>
        <script type="text/javascript" src="@yield('script')"></script>
    </body>
</html>