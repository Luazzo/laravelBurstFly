<!DOCTYPE HTML>
<html>

<head>

    @include('partials.head')

</head>

<body>

    <!--Header-->
    @include('partials.header')




    <!-- PORTFOLIO -->

    @yield('content')


    @include('partials.footer')
    <!-- SCRIPT -->
    @include('partials.scripts')


</body>


</html>
