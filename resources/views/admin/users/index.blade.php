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
            <li class="nav-item">
                <a class="nav-link hover:tw-bg-white" href="#">Import Users</a>
            </li>
        </ul>

    </div>

</header>

<main class="tw-m-12">

    <h3 class="tw-text-2xl tw-mb-6">All Users</h3>

    <div class="table-responsive">

        <table class="table">
            <thead class="tw-rounded tw-bg-gray-200">
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Email Verified</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach($users as $user)

                    <tr>
                        <th>{{ $user->display_name }}</th>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if($user->email_verified_at)
                                <span class="tw-text-green-500">@svg('check-circle', 'fill-current')</span> 
                            @else
                            <span class="tw-text-red-500">@svg('x-circle', 'fill-current')</span>
                            @endif
                        </td>
                    </tr>

                @endforeach
                
            </tbody>
        </table>

    </div>

</main>

@endsection
