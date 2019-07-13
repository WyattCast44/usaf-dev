@extends('layouts.app')

@section('content')

<div class="tw-flex">

    <aside class="tw-bg-gray-300 tw-h-screen shadow-md" style="width:225px;">

        <ul>
            <li class="hover:tw-bg-gray-400 {{ applyActive('admin.dashboard', 'tw-bg-gray-500') }}">
                <a href="#" class="tw-p-4 tw-block hover:tw-no-underline hover:tw-text-gray-900 tw-flex tw-items-center">
                    @svg('home', 'mr-3') Dashboard
                </a>
            </li>

            <li class="hover:tw-bg-gray-400">
                <a href="#" class="tw-p-4 tw-block hover:tw-no-underline hover:tw-text-gray-900  tw-flex tw-items-center">
                    @svg('users', 'mr-3') Users
                </a>
            </li>

            <li class="hover:tw-bg-gray-400">
                <a href="#" class="tw-p-4 tw-block hover:tw-no-underline hover:tw-text-gray-900  tw-flex tw-items-center">
                    @svg('mail', 'mr-3') GSuite Accounts
                </a>
            </li>

            <li class="hover:tw-bg-gray-400">
                <a href="#" class="tw-p-4 tw-block hover:tw-no-underline hover:tw-text-gray-900  tw-flex tw-items-center">
                    @svg('package', 'mr-3') Apps
                </a>
            </li>    

            <li class="hover:tw-bg-gray-400">
                <a href="#" class="tw-p-4 tw-block hover:tw-no-underline hover:tw-text-gray-900  tw-flex tw-items-center">
                    @svg('user-check', 'mr-3') Roles
                </a>
            </li>

            <li class="hover:tw-bg-gray-400">
                <a href="#" class="tw-p-4 tw-block hover:tw-no-underline hover:tw-text-gray-900  tw-flex tw-items-center">
                    @svg('lock', 'mr-3') Permissions
                </a>
            </li>

        </ul>

    </aside>

    <main class="tw-flex-1">
        <div class="tw-bg-gray-200 tw-border-b tw-border-solid tw-border-gray-300  tw-pt-10">

            <ul class="nav nav-tabs container" style="border:none">
                <li class="nav-item">
                    <a class="nav-link hover:tw-bg-white {{ applyActive('users.dashboard') }}" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link hover:tw-bg-white" href="#">My Apps</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link hover:tw-bg-white" href="#">Link</a>
                </li>
            </ul>
        
        </div>
    </main>

</div>

@endsection
