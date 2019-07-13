<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'USAF Cloud') }}</title>
    @include('layouts._partials.scripts')
    @include('layouts._partials.styles')
    @include('layouts._partials.meta')
</head>
<body>

    @yield('body')


    @include('sweetalert::alert')
</body>
</html>