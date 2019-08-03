@extends('dashboard.layout')

@section('page-title', 'My Profile')

@section('dashboard-content')

    <!-- General Info -->
    @include('dashboard.profile._partials.general')

    <!-- Password Change -->
    @includeWhen(config('settings.allow-password-resets'), 'dashboard.profile._partials.password')    

@endsection