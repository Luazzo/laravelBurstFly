<!DOCTYPE HTML>
<html>
    <head>
        @include('partials.head')

    </head>
    <body>
        @include('partials.header')

        <div id="wrapper-container">
            @yield('content')
            @include('partials.footer')
        </div>

        @include('partials.scripts')
    </body>
</html>
