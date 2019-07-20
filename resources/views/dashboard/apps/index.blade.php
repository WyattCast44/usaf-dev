@extends('dashboard.layout')

@section('page-title', 'My Apps')

@section('dashboard-content')

<div class="tw-flex tw-flex-wrap tw--mb-4 tw--mx-2 tw-justify-center tw-items-center">
    
    @forelse ($apps as $app)
    
        <div class="tw-w-1/3 tw-mb-4 tw-bg-white hover:tw-bg-gray-100 tw-rounded tw-px-4 tw-py-4 tw-mx-2 tw-border tw-border-solid tw-border-gray-300 hover:tw-shadow-md">
            <h2 class="tw-text-lg tw-mb-3">
                <a href="{{ $app->client->homepage_url }}" target="_blank" class="tw-text-blue-500">{{ $app->client->name }}</a>
            </h2>
            <p class="tw-text-gray-600">{{ $app->client->description }}</p>
        </div>

    @empty
    @endforelse

</div>

@endsection