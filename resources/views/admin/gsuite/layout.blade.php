@extends('admin.layout')

@section('page-content')

<header class="tw-bg-gray-200 tw-border-b tw-border-solid tw-border-gray-300  tw-pt-10">

    <div class="tw-mx-12">

        <h2 class="tw-text-3xl tw-mb-8">Manage GSuite</h2>

        <ul class="nav nav-tabs" style="border:none">
            <li class="nav-item">
                <a class="nav-link hover:tw-bg-white {{ applyActive('admin.gsuite.index') }}" href="#">
                    Overview
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link hover:tw-bg-white {{ applyActive('admin.gsuite.users.index') }}" href="#">
                    Users
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link hover:tw-bg-white {{ applyActive('admin.gsuite.groups.index') }}" href="#">
                    Groups
                </a>
            </li>

        </ul>

    </div>

</header>

<main class="tw-m-12">

    @yield('gsuite-content')

</main>

@endsection
