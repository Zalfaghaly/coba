<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $pageTitle }}</title>
    @vite('resources/sass/app.scss')
    <link rel="icon" type="image/x-icon" href="{{ Vite::asset('resources/images/Logo.png') }}">
    <link rel="stylesheet" href="{{ asset('css/admin_style.css') }}">

</head>

<body>
    @include('layouts.admin_nav')
    @yield('admin_content')
    @vite('resources/js/app.js')
    @include('sweetalert::alert')
    @stack('scripts')
</body>

</html>
