@extends('admin.gsuite.layout')

@section('gsuite-content')

<div class="tw-mb-8 tw-flex tw-items-end tw-justify-between">
    <div>
        <h3 class="tw-text-2xl tw-mb-2">All Accounts</h3>
        <p class="tw-text-gray-500">
            Each is a fully featured G-Suite account
        </p>
    </div>

    <div>
        <a href="{{ route('admin.gsuite.accounts.refresh') }}" class="btn btn-primary" data-turbolinks="false">Refresh</a>
        <a href="{{ route('admin.gsuite.accounts.create') }}" class="btn btn-primary">Create Account</a>
    </div>
</div>

<main>
    <div class="overflow-x-scroll tw-shadow-md tw-rounded-lg">

        <table class="tw-w-full tw-bg-gray-100 tw-border-gray-400">

            <thead class="tw-bg-gray-200">
                <tr class="">
                    <th class="tw-p-3" scope="col">Name</th>
                    <th class="tw-p-3" scope="col">Email</th>
                    <th class="tw-p-3" scope="col">Owner</th>
                    <th class="tw-p-3" scope="col"></th>
                </tr>
            </thead>

            <tbody>
                
                @foreach($accounts as $account)

                    <tr class="tw-border-b tw-border-solid tw-border-gray-300">
                        <td>{{ $account->name->fullName }}</td>
                        <td class="tw-flex items-center">
                            <a href="mailto:{{ $account->primaryEmail }}" class="btn btn-link tw-px-2 tw-py-0"
                                 title="Email group">{{ $account->primaryEmail }} 
                            </a>
                        </td>
                        <td>...</td>
                        <td class="text-right">
                            @include('admin.gsuite.accounts._partials.delete')

                            <a href="{{ route('admin.gsuite.accounts.show', $account->primaryEmail) }}" class="btn btn-link tw-px-2 tw-py-0" title="View account">
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
