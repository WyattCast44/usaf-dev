@extends('admin.apps.layout')

@section('app-content')

<div class="tw-mb-8">
    <a href="{{ route('admin.apps.index') }}" class="tw-text-sm tw-text-gray-500 tw-mb-3 tw-inline-block">
        &leftarrow; Back
    </a>
    <h3 class="tw-text-2xl tw-mb-6">Manage <span class="tw-italic tw-text-gray-700 tw-underline">{{ $app->name }}</span></h3>
</div>

<div class="overflow-x-scroll tw-shadow-md tw-rounded-lg">

    <table class="tw-w-full tw-bg-gray-100 tw-border-gray-400">

        <thead class="tw-bg-gray-200">
            <tr class="">
                <th class="tw-p-3" scope="col">Item</th>
                <th class="tw-p-3" scope="col">Value</th>
            </tr>
        </thead>

        <tbody>
            
            <tr>
                <td>
                    App ID
                </th>
                <td>
                    {{ $app->id }}
                </th>
            </tr>

            <tr>
                <td>
                    App Name
                </th>
                <td>
                    {{ $app->name }}
                </td>
            </tr>

            <tr>
                <td>
                    App Secret
                </th>
                <td>
                    {{ $app->secret }}
                </th>
            </tr>

            <tr>
                <td>
                    First Party App
                </td>
                <td>
                    @if($app->first_party)
                        <span class="tw-text-green-600">
                            @svg('check-circle')
                        </span>      
                    @else
                        <span class="tw-text-red-600">
                            @svg('x-circle')
                        </span>           
                    @endif
                </td>
            </tr>

            <tr>
                <td>
                    Status
                </th>
                <td>
                    <span class="badge badge-pill tw-py-2 tw-px-3
                {{ ($app->revoked) ? 'badge-danger' : 'badge-success' }}">
                        {{ ($app->revoked) ? 'Revoked' : 'Active' }}
                    </span>
                </td>
            </tr>

            <tr>
                <td>
                    Homepage URL
                </th>
                <td>
                    <a href="{{ $app->homepage_url }}" target="_blank" class="tw-text-blue-400">
                        {{ $app->homepage_url }}
                    </a>
                </td>
            </tr>

            <tr>
                <td>
                   Redirect URL
                </th>
                <td>
                    {{ $app->redirect }}
                </td>
            </tr>

            <tr>
                <td>
                    Created At
                </th>
                <td>
                    {{ $app->created_at->diffForHumans() }}
                </td>
            </tr>

            <tr>
                <td>
                    Updated At
                </th>
                <td>
                    {{ $app->updated_at->diffForHumans() }}
                </td>
            </tr>
        
        </tbody>
    </table>

</div>


@endsection
