@extends('layouts.app')

@section('content')

<div class="tw-bg-gray-200 tw-border-b tw-border-solid tw-border-gray-300  tw-pt-10">

    <ul class="nav nav-tabs container" style="border:none">
        <li class="nav-item">
            <a class="nav-link hover:tw-bg-white {{ applyActive('user.dashboard') }}" href="#">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link hover:tw-bg-white" href="#">My Apps</a>
        </li>
        <li class="nav-item">
            <a class="nav-link hover:tw-bg-white" href="#">All Apps</a>
        </li>
    </ul>

</div>

@endsection
