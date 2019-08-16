@extends('admin.users.layout')

@section('user-content')


<div class="tw-mb-6 tw-flex tw-justify-between tw-items-end">
    
    <div>
        <a href="{{ route('admin.users.index') }}" class="tw-text-sm tw-text-blue-400 tw-mb-2 tw-inline-block">
            &leftarrow; Back
        </a>
        <h3 class="tw-text-2xl">{{ $user->display_name }}</h3>
    </div>

    <div class="dropdown">
        <button class="btn btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Actions
        </button>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
            @if ($user->isAdmin())
                <a class="dropdown-item tw-flex tw-items-center tw-leading-none tw-font-light" href="#">
                    @svg('users', 'tw-h-6 tw-mr-2') Remove Admin
                </a>
            @else
                <a class="dropdown-item tw-flex tw-items-center tw-leading-none tw-font-light" href="#">
                    @svg('users', 'tw-h-6 tw-mr-2') Make Admin
                </a>
            @endif

            <a class="dropdown-item tw-flex tw-items-center tw-leading-none tw-font-light" href="#">
                @svg('download-cloud', 'tw-h-6 tw-mr-2') Download Excel
            </a>

            <a class="dropdown-item tw-flex tw-items-center tw-leading-none tw-font-light" href="#">
                @svg('trash', 'tw-h-6 tw-mr-2') Delete
            </a>
        </div>
    </div>

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

            <tr class="tw-border-b tw-border-solid tw-border-gray-300">
                <td>First Name</td>
                <td>{{ $user->first_name }}</td>
            </tr>

            <tr class="tw-border-b tw-border-solid tw-border-gray-300">
                <td>Last Name</td>
                <td>{{ $user->last_name }}</td>
            </tr>
            
            <tr class="tw-border-b tw-border-solid tw-border-gray-300">
                <td>Middle Name</td>
                <td>{{ $user->middle_name }}</td>
            </tr>

            <tr class="tw-border-b tw-border-solid tw-border-gray-300">
                <td>Email</td>
                <td><a href="mailto:{{ $user->email }}" class="btn btn-link tw-p-0">{{ $user->email }}</a></td>
            </tr>

            <tr class="tw-border-b tw-border-solid tw-border-gray-300">
                <td>Last Password Reset</td>
                <td>{{ ($user->last_password_reset) ? $user->last_password_reset->diffForHumans() : 'Never' }}</td>
            </tr>

            <tr class="tw-border-b tw-border-solid tw-border-gray-300">
                <td>Email Verified At</td>
                <td>
                    @if($user->email_verified_at)
                        {{ $user->email_verified_at }}
                    @else
                        {{ 'Not verified' }} &middot; <a href="#" class="btn btn-link tw-p-0 tw-text-base tw-align-baseline">Resend verification email?</a>
                    @endif
                </td>
            </tr>

        </tbody>
    </table>

</div>

@endsection
