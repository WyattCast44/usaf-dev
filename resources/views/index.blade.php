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
<body class="tw-font-sans tw-text-black tw-leading-tight tw-antialiased tw-bg-white">

    <header class="tw-bg-blue-700 tw-relative">

        <div class="tw-flex tw-items-center tw-pt-12 tw-justify-between container tw-mb-24 tw-text-white tw-relative tw-z-10">

            <div>
                <h1 class="tw-font-extrabold tw-text-lg md:tw-text-4xl">
                    USAF Cloud @svg('cloud-lightning', 'tw-h-6 tw-w-6 md:tw-w-12 md:tw-h-12 tw-ml-2')
                </h1>
            </div>

            <div class="tw-uppercase tw-font-bold">
                <a href="/login" class="tw-mx-2 tw-px-3 tw-py-2 hover:tw-text-blue-100 hover:tw-no-underline">Login</a>
                <a href="/register" class="tw-mx-2 tw-px-3 tw-py-2 hover:tw-text-blue-100 hover:tw-no-underline">Register</a>
            </div>

        </div>

        <div class="container tw-relative tw-z-10">
            <h2 class="tw-text-white tw-text-4xl tw-font-thin tw-text-center tw-mb-12">
                A Open Platform for Airmen and Their Tools
            </h2>

            <div class="tw-flex tw-items-bottom tw-justify-center tw-relative" style="top:25px; max-height:350px">
                <img src="{{ asset('img/home.png') }}" alt="Home page screenshot" class="tw-w-4/5 tw-shadow-lg">
            </div>
        </div>

        <div class="tw-absolute tw-px-12 tw-py-5 tw-top-0 tw-justify-start tw-flex tw-items-center" style="z-index:0;">
            @svg('cloud-bg-layer', ['style' => 'transform:rotate(0deg);height:550px;width:550px;opacity:0.4;'])
        </div>

    </header>

    <section class="tw-bg-gray-100 tw-py-24">

        <div class="container">

            <h3>One Login. All Your Trusted Applications</h3>

        </div>


    </section>

</body>
</html>
