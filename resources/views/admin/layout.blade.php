@extends('layouts.app')

@section('content')

<div class="tw-flex">

    <aside class="tw-bg-gray-300 tw-h-screen shadow-md" style="width:225px;">

        <ul>
            <li class="hover:tw-bg-gray-400 {{ applyActive('admin.dashboard', 'tw-bg-gray-500') }}">
                <a href="{{ route('admin.dashboard') }}" class="tw-p-4 tw-block hover:tw-no-underline hover:tw-text-gray-900 tw-flex tw-items-center">
                    @svg('home', 'mr-3') Dashboard
                </a>
            </li>

            <li class="hover:tw-bg-gray-400">
                <a href="{{ route('admin.users.index') }}" class="tw-p-4 tw-block hover:tw-no-underline hover:tw-text-gray-900  tw-flex tw-items-center {{ applyActive('admin.users.*', 'tw-bg-gray-500') }}">
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

        @yield('page-content')
        
    </main>

</div>

@endsection
