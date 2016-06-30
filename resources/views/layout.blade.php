<!DOCTYPE html>
<html>
<head>
    <title>Laravel</title>


    @yield('cssblock')

    {{ HTML::style('css/bootstrap.min.css') }}

</head>
<body>

@yield('content')

@yield('jsblock')

{{ HTML::script('js/bootstrap.min.js') }}

</body>
</html>
