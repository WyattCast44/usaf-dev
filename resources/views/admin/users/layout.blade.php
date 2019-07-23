@extends('admin.layout')

@section('page-content')

<header class="tw-bg-gray-200 tw-border-b tw-border-solid tw-border-gray-300  tw-pt-10">

    <div class="tw-mx-12">

        <h3 class="tw-text-3xl tw-mb-8">Manage Users</h2>

        <ul class="nav nav-tabs" style="border:none">
            <li class="nav-item">
                <a class="nav-link hover:tw-bg-white {{ applyActive('admin.users.index') }}" href="{{ route('admin.users.index') }}">All Users</a>
            </li>
            <li class="nav-item">
                <a class="nav-link hover:tw-bg-white {{ applyActive('admin.users.create') }}" href="{{ route('admin.users.create') }}">Create User</a>
            </li>
        </ul>

    </div>

</header>

<main class="tw-m-12">

    @yield('user-content')

</main>

@endsection
