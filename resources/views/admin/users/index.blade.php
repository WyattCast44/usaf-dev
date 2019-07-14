@extends('admin.layout')

@section('page-content')

<header class="tw-bg-gray-200 tw-border-b tw-border-solid tw-border-gray-300  tw-pt-10">

    <div class="tw-mx-12">

        <h2 class="tw-text-2xl tw-mb-8">Manage Users</h2>

        <ul class="nav nav-tabs" style="border:none">
            <li class="nav-item">
                <a class="nav-link hover:tw-bg-white {{ applyActive('admin.users.index') }}" href="#">All Users</a>
            </li>
            <li class="nav-item">
                <a class="nav-link hover:tw-bg-white" href="#">Create User</a>
            </li>
        </ul>

    </div>

</header>

<main class="tw-m-12">

    <h3 class="table-responsive tw-text-2xl tw-mb-6">All Users</h3>

    <div class="overflow-x-scroll tw-shadow-md tw-rounded-lg">

        <table class="tw-w-full tw-bg-gray-100 tw-border-gray-400">

            <thead class="tw-bg-gray-200">
                <tr class="">
                    <th class="tw-p-3" scope="col">Name</th>
                    <th class="tw-p-3" scope="col">Email</th>
                    <th class="tw-p-3" scope="col">Email Verified</th>
                    <th class="tw-p-3" scope="col">Last Login</th>
                    <th class="tw-p-3" scope="col"></th>
                </tr>
            </thead>

            <tbody>
                
                @foreach($users as $user)

                    <tr class="tw-border-b tw-border-solid tw-border-gray-300">
                        <td>{{ $user->display_name }}</td>
                        <td class="tw-flex items-center">
                            {{ $user->email }} 
                            <a href="mailto:{{ $user->email }}" class="tw-text-gray-500 hover:tw-text-blue-600"
                                 title="Email user">@svg('mail', 'tw-w-4 tw-ml-2')
                            </a>
                        </td>
                        <td>
                            @if($user->email_verified_at)
                                <span class="tw-text-green-500">@svg('check-circle', 'fill-current')</span> 
                            @else
                            <span class="tw-text-red-500">@svg('x-circle', 'fill-current')</span>
                            @endif
                        </td>
                        <td class="tw-text-sm tw-text-gray-600">
                            {{ ($user->last_login <> null) ? $user->last_login->diffForHumans() : "Hasn't loggen in yet"}}
                        </td>
                        <td class="text-right">
                            <a href="#" class="tw-text-gray-500">
                                @svg('chevron-right')
                            </a>
                        </td>
                    </tr>

                @endforeach
                
            </tbody>
        </table>

    </div>

</main>

@endsection
