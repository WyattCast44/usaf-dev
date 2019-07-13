<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('page-title', 'Home') - {{ config('app.name', 'USAF Cloud') }}</title>
    @include('layouts._partials.scripts')
    @include('layouts._partials.styles')
    @include('layouts._partials.meta')
</head>
<body class="tw-font-sans tw-text-black tw-leading-tight tw-antialiased tw-bg-gray-100">

    @yield('body')

    @include('sweetalert::alert')
</body>
</html>