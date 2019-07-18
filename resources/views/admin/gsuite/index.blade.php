@extends('admin.gsuite.layout')

@section('gsuite-content')

<h3 class="tw-text-2xl tw-mb-6">Overview</h3>

<div class="flex">

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
                    <td>
                        Number of GSuite Accounts
                    </td>
                    <td>
                        {{ $accounts_number }}
                    </td>
                </tr>

                <tr class="tw-border-b tw-border-solid tw-border-gray-300">
                    <td>
                        Number of Groups/Org Boxes
                    </td>
                    <td>
                        {{ $groups_number }}
                    </td>
                </tr>

                <tr class="tw-border-b tw-border-solid tw-border-gray-300">
                    <td>
                        Approximate Monthly Cost
                    </td>
                    <td>
                        ${{ $monthly_cost }}.00
                    </td>
                </tr>

            </tbody>
        </table>

    </div>

</div>

@endsection
