<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('meta_tags')

    {{-- Title --}}
    <title>@yield('title', config('app.name', 'Eventos'))</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    @stack('css')
</head>
<body class="@yield('classes_body')" style="@yield('body_style')" @yield('body_data')>

    @yield('content')

    @stack('js')
</body>
</html>