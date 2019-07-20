@extends('dashboard.layout')

@section('page-title', 'My Apps')

@section('dashboard-content')

<div class="tw-flex tw-flex-wrap tw--mb-4 tw--mx-2">
    
    @forelse ($apps as $app)
    
        <div class="tw-w-1/3 tw-mb-4 tw-bg-gray-400 tw-h-12 tw-mx-2">
            {{ $app->client->name }}
        </div>        

    @empty
    @endforelse

</div>

@endsection