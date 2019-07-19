@extends('admin.gsuite.layout')

@section('gsuite-content')

<div class="tw-mb-8 tw-flex tw-items-end tw-justify-between">
    <div>
        <h3 class="tw-text-2xl tw-mb-2">{{ $group->email }}</h3>
        <p class="tw-text-gray-500">
            {{ $group->description }}
        </p>
    </div>
</div>

<main>
    <div class="overflow-x-scroll tw-shadow-md tw-rounded-lg">

    </div>
</main>

@endsection
