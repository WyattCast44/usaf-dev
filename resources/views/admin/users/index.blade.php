@extends('admin.users.layout')

@section('user-content')

    <h3 class="table-responsive tw-text-2xl tw-mb-6">All Users</h3>

    <div class="overflow-x-scroll tw-shadow-md tw-rounded-lg">

        <table class="tw-w-full tw-bg-gray-100 tw-border-gray-400">

            <thead class="tw-bg-gray-200">
                <tr class="">
                    <th class="tw-p-3" scope="col">Last Name</th>
                    <th class="tw-p-3" scope="col">First Name</th>
                    <th class="tw-p-3" scope="col">Email</th>
                    <th class="tw-p-3" scope="col">Email Verified</th>
                    <th class="tw-p-3" scope="col">Last Login</th>
                    <th class="tw-p-3" scope="col"></th>
                </tr>
            </thead>

            <tbody>
                
                @foreach($users as $user)

                    <tr class="tw-border-b tw-border-solid tw-border-gray-300">
                        <td>{{ $user->last_name }}</td>
                        <td>{{ $user->first_name }}</td>
                        <td class="tw-flex items-center">
                            <a href="mailto:{{ $user->email }}" class="tw-text-blue-400 hover:tw-text-blue-600" title="Email user">
                                 {{ $user->email }} 
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
                            <a href="{{ route('admin.users.show', $user) }}" class="tw-text-gray-500">
                                @svg('chevron-right')
                            </a>
                        </td>
                    </tr>

                @endforeach
                
            </tbody>
        </table>

    </div>

    <div class="tw-my-6">
        {{ $users->links() }}
    </div>

</main>

@endsection
