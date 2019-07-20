@extends('layouts.app')

@section('content')

<div class="tw-bg-gray-200 tw-border-b tw-border-solid tw-border-gray-300  tw-pt-10">

    <div class="container">

        <div class="tw-mb-8">
            <h2 class="tw-text-2xl tw-m-0 tw-p-0">{{ auth()->user()->display_name }}</h2>
        </div>
    
        <ul class="nav nav-tabs" style="border:none">
            <li class="nav-item">
                <a class="nav-link hover:tw-bg-white {{ applyActive('user.dashboard') }}" href="{{ route('user.dashboard') }}">
                    Home
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link hover:tw-bg-white {{ applyActive('user.apps.*') }}" href="{{ route('user.apps.index') }}">
                    My Apps
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link hover:tw-bg-white" href="#">All Apps</a>
            </li>
        </ul>

    </div>

</div>

<main class="tw-mt-12 container">

    @yield('dashboard-content')

</main>

@endsection
