<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<head>
    @include('layouts.head')
</head>
<body class="">

    <div id="wrapper">

        <header class="navbar" role="banner">
            @include('layouts.header')
        </header>


        @if(Auth::check())
            @include('layouts.navbar')
        @endif

        @yield('content')

    </div> <!-- /#wrapper -->

    @include('layouts.footer')

</body>
</html>
