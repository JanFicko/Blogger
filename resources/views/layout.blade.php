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

{{ HTML::script('https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js') }}
{{ HTML::script('js/bootstrap.min.js') }}

</body>
</html>
