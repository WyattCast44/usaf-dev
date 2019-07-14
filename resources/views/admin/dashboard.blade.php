@extends('admin.layout')

@section('page-content')

<header class="tw-bg-gray-200 tw-border-b tw-border-solid tw-border-gray-300  tw-pt-10">

    <div class="tw-mx-8">

        <h3 class="tw-text-3xl tw-mb-8">Admin Dashboard</h3>

        <ul class="nav nav-tabs" style="border:none">
            <li class="nav-item">
                <a class="nav-link hover:tw-bg-white {{ applyActive('admin.dashboard') }}" href="{{ route('admin.dashboard') }}">General</a>
            </li>
            <li class="nav-item">
                <a class="nav-link hover:tw-bg-white" href="#">Settings</a>
            </li>
        </ul>

    </div>

</header>

<main class="tw-m-8">

</main>

@endsection
