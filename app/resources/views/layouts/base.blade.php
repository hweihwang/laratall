<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @hasSection('title')
        <title>@yield('title') - {{ config('app.name') }}</title>
    @else
        <title>{{ config('app.name') }}</title>
    @endif
    <link rel="shortcut icon" href="{{ url(asset('images/favicon.svg')) }}">
    <link rel="stylesheet" href="{{ url(asset('fonts/FiraCode-Light.ttf')) }}">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @livewireStyles
    @livewireScripts
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="bg-gray-100 leading-normal tracking-normal">
@yield('body')
</body>
</html>
