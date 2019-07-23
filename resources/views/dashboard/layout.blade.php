@extends('layouts.app')

@section('content')

<div class="tw-bg-gray-200 tw-border-b tw-border-solid tw-border-gray-300">

    <div class="container tw-pt-12">

        <div class="tw-flex tw-mb-12 tw-items-center">
            <img src="{{ auth()->user()->avatar_url }}" alt="{{ auth()->user()->display_name }}" class="tw-w-24 tw-rounded-full tw-mr-4">
            <div>
                <h2 class="tw-text-3xl tw-m-0 tw-mb-2 tw-font-light tw-p-0 tw-text-gray-700">{{ auth()->user()->display_name }}</h2>
                <p class="tw-font-light">Joined {{ auth()->user()->created_at->diffForHumans() }}</p>
            </div>
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
