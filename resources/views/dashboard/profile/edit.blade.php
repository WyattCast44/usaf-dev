@extends('dashboard.layout')

@section('page-title', 'My Profile')

@section('dashboard-content')

    <siv class="row">

        <div class="col-md-8 tw-flex-col tw-items-center tw-justify-center">

            <!-- General Info -->
            @include('dashboard.profile._partials.general')

            <!-- Password Change -->
            @includeWhen(config('settings.allow-password-resets'), 'dashboard.profile._partials.password')    

        </div>

    </siv>

@endsection