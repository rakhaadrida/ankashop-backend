<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AnkaShop - Shopping with Style</title>
    <meta name="description" content="ShaynaAdmin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

    @stack('prepend-style')
    @include('includes.style')
    @stack('addon-style')
</head>

<body>
    <!-- Left Panel -->
    @include('includes.sidebar')

    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        @include('includes.navbar')

        <div class="content">
            <!-- Content -->
            @yield('content')
        </div>

        <div class="clearfix"></div>
    </div>
    <!-- /#right-panel -->

    <!-- Scripts -->
    @stack('prepend-script')
    @include('includes.script')
    @stack('addon-script')
</body>
</html>
