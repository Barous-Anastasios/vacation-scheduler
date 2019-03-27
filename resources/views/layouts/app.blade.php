<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    {{--FOR HTTPS HEROKU--}}
    <script src="https://vacation-scheduler.herokuapp.com/js/app.js"></script>
    <link rel="stylesheet" href="https://vacation-scheduler.herokuapp.com/css/app.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
        @include('components.navbar')

        @if(session()->has('message'))
            <script>swal('{{session()->get('message')}}');</script>
        @endif

        <main style="margin-top: 50px;">
            @yield('content')
        </main>
    </div>
</body>
</html>
