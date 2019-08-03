@extends('admin.gsuite.layout')

@section('gsuite-content')

<div class="tw-mb-8 tw-flex tw-items-end tw-justify-between">
    <div>
        <h3 class="tw-text-2xl tw-mb-2">All Groups</h3>
        <p class="tw-text-gray-500">
            Think of groups as "org-boxes"
        </p>
    </div>

    <div>
        <a href="{{ route('admin.gsuite.groups.refresh') }}" class="btn btn-primary">Refresh</a>
        <a href="{{ route('admin.gsuite.groups.create') }}" class="btn btn-primary">Create Group</a>
    </div>
</div>

<main>
    <div class="overflow-x-scroll tw-shadow-md tw-rounded-lg">

        <table class="tw-w-full tw-bg-gray-100 tw-border-gray-400">

            <thead class="tw-bg-gray-200">
                <tr class="">
                    <th class="tw-p-3" scope="col">Name</th>
                    <th class="tw-p-3" scope="col">Email</th>
                    <th class="tw-p-3" scope="col">Members</th>
                    <th class="tw-p-3" scope="col">Owner</th>
                    <th class="tw-p-3" scope="col"></th>
                </tr>
            </thead>

            <tbody>
                
                @foreach($groups as $group)

                    <tr class="tw-border-b tw-border-solid tw-border-gray-300">
                        <td>{{ $group->name }}</td>
                        <td class="tw-flex items-center">
                            <a href="mailto:{{ $group->email }}" class="tw-text-blue-600 hover:tw-text-blue-600" title="Email group">
                                {{ $group->email }} 
                            </a>
                        </td>
                        <td class="tw-text-sm tw-text-gray-600">
                            {{ $group->directMembersCount }}
                        </td>
                        <td class="">
                            <a href="#" class="tw-font-semibold tw-text-blue-500 hover:tw-no-underline">Team: 12th TRS</a>
                        </td>
                        <td class="text-right">
                            <a href="#" class="tw-text-gray-500 tw-mr-2" title="Add member">
                                @svg('user-plus')
                            </a>
                            <a href="{{ route('admin.gsuite.groups.show', $group->email) }}" class="tw-text-gray-500" title="View group">
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
