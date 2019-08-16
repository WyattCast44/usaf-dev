@extends('admin.skeleton')

@section('body')

<div class="tw-flex tw-flex-col">

    <div class="tw-min-h-screen tw-flex tw-flex-col">

        <!-- Header -->
        <div class="tw-flex">
            
            <div class="tw-bg-blue-800 tw-flex tw-items-center tw-justify-center tw-w-64 tw-py-4 tw-px-12">
                <a href="/" title="Home">
                    @svg('af-cloud', 'tw-h-12 tw-w-32')
                </a>
            </div>

            <div class="tw-flex-1 tw-flex tw-items-center tw-justify-end tw-bg-gray-200 tw-py-4 tw-px-12">
                <div>
                    <a href="#">Castaneda, Wyatt</a>
                </div>
            </div>

        </div>

        <!-- Main -->
        <div class="tw-flex tw-flex-grow">

            <!-- Navbar -->
            <aside class="tw-w-64 tw-bg-gray-300">
                
                    <ul class="tw-text-gray-700">

                        <li class="hover:tw-bg-gray-400 {{ applyActive('admin.dashboard', 'tw-font-black') }}">
                            <a href="{{ route('admin.dashboard') }}" class="tw-p-4 tw-block hover:tw-no-underline hover:tw-text-gray-900 tw-flex tw-items-center">
                                @svg('home', 'mr-3') Home
                            </a>
                        </li>
            
                        <li class="hover:tw-bg-gray-400">
                            <a href="{{ route('admin.users.index') }}" class="tw-p-4 tw-block hover:tw-no-underline hover:tw-text-gray-900  tw-flex tw-items-center {{ applyActive('admin.users.*', 'tw-font-black') }}">
                                @svg('users', 'mr-3') Users
                            </a>
                        </li>
            
                        <li class="hover:tw-bg-gray-400">
                            <a href="#" class="tw-p-4 tw-block hover:tw-no-underline hover:tw-text-gray-900  tw-flex tw-items-center">
                                @svg('globe', 'mr-3') Teams
                            </a>
                        </li>
            
                        <li class="hover:tw-bg-gray-400">
                            <a href="{{ route('admin.gsuite.index') }}" class="tw-p-4 tw-block hover:tw-no-underline hover:tw-text-gray-900  tw-flex tw-items-center {{ applyActive('admin.gsuite.*', 'tw-font-black') }}">
                                @svg('chrome', 'mr-3') G-Suite 
                            </a>
                        </li>
            
                        <li class="hover:tw-bg-gray-400">
                            <a href="{{ route('admin.apps.index') }}" class="tw-p-4 tw-block hover:tw-no-underline hover:tw-text-gray-900  tw-flex tw-items-center {{ applyActive('admin.apps.*', 'tw-font-black') }}">
                                @svg('package', 'mr-3') Apps
                            </a>
                        </li>
            
                        <li class="hover:tw-bg-gray-400">
                            <a href="{{ route('admin.security.index') }}" class="tw-p-4 tw-block hover:tw-no-underline hover:tw-text-gray-900  tw-flex tw-items-center {{ applyActive('admin.security.*', 'tw-font-black') }}">
                                @svg('lock', 'mr-3') Security
                            </a>
                        </li>
            
                        <!-- Services -> A collection of integrted APIs for common tools, example: Have a dashboard for Squadron Ops Center App -> where you can create a new "site" and assign the owner -->
                        <li class="hover:tw-bg-gray-400">
                            <a href="#" class="tw-p-4 tw-block hover:tw-no-underline hover:tw-text-gray-900  tw-flex tw-items-center">
                                @svg('layers', 'mr-3') Services
                            </a>
                        </li>
            
                    </ul>

            </aside>

            <main class="tw-flex-1">
                
                @yield('page-content')

            </main>

        </div>


    </div>

</div>

@endsection
