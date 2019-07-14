@extends('admin.apps.layout')

@section('app-content')

<h3 class="tw-text-2xl tw-mb-6">All Apps</h3>

<div class="overflow-x-scroll tw-shadow-md tw-rounded-lg">

    <table class="tw-w-full tw-bg-gray-100 tw-border-gray-400">

        <thead class="tw-bg-gray-200">
            <tr class="">
                <th class="tw-p-3" scope="col">ID</th>
                <th class="tw-p-3" scope="col">Name</th>
                <th class="tw-p-3" scope="col">Homepage Url</th>
                <th class="tw-p-3" scope="col">Status</th>
                <th class="tw-p-3" scope="col">First Party</th>
                <th class="tw-p-3" scope="col"></th>
            </tr>
        </thead>

        <tbody>
            
            @foreach ($clients as $app)
                
                <tr>
                    <td>
                        {{ $app->id }}
                    </th>
                    <td>
                        {{ $app->name }}
                    </td>
                    <td>
                        <a href="{{ $app->homepage_url }}" target="_blank">
                            {{ $app->homepage_url }}
                        </a>
                    </td>
                    <td>
                        <span class="badge badge-pill tw-py-2 tw-px-3
                    {{ ($app->revoked) ? 'badge-danger' : 'badge-success' }}">
                            {{ ($app->revoked) ? 'Revoked' : 'Active' }}
                        </span>
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
                    <td class="tw-text-right">
                        <a href="#">
                            @svg('chevron-right')
                        </a>
                    </td>
                </tr>

            @endforeach
            
        </tbody>
    </table>

</div>

@endsection
