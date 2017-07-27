<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name'))</title>
    <link href="{{ asset(mix('assets/frontend/styles.css')) }}" rel="stylesheet">
    <link href="{{ asset(mix('assets/frontend/app.css')) }}" rel="stylesheet">
    @yield('scripts', '')
    @if (class_exists('Spark'))
        <script>
            window.Spark = {!! json_encode(array_merge(Spark::scriptVariables(), [])) !!};
        </script>
    @endif
</head>
<body class="with-navbar body-integration">
    <div id="spark-app">
        @yield('content')
    </div>
    <script src="{{ asset(mix('assets/frontend/scripts.js')) }}"></script>
    <script src="{{ asset(mix('assets/frontend/app.js')) }}"></script>
</body>
</html>
