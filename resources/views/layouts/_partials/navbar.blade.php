<nav class="tw-py-6 tw-shadow-md tw-border-b tw-border-solid tw-border-gray-400 tw-bg-white">
    <div class="container-fluid tw-flex tw-items-center tw-justify-between">

        <!-- Logo -->
        <div>
            <h1 class="tw-text-xl tw-leading-none mb-0 relative">
                <a href="/" class="tw-text-gray-900 hover:tw-text-gray-900 hover:tw-no-underline tw-flex tw-items-center">
                    USAF Cloud @svg('cloud-lightning', 'ml-2')
                </a>
            </h1>  
        </div>

        <div class="tw-flex-1 tw-mx-8">
            <input type="text" class="form-control" placeholder="Search...">
        </div>

        <!-- Menu -->
        <div>

            @guest

                <nav class="tw-flex tw-items-center">
                    <a href="/login" class="tw-px-3 tw-mx-2 tw-text-gray-600 hover:tw-text-gray-800 tw-text-xl">
                        Login
                    </a>
                    <a href="/register" class="tw-px-3 tw-mx-2 tw-text-gray-600 hover:tw-text-gray-800 tw-text-xl">
                        Register
                    </a>
                </nav>

            @endguest

            @auth

                <nav class="tw-flex tw-items-center">

                    <div class="dropdown">
                        <a class="btn btn-link dropdown-toggle tw-p-0 hover:tw-no-underline focus:tw-no-underline" href="#" role="button" id="user-profile-menu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ auth()->user()->display_name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right tw-mt-3" aria-labelledby="user-profile-menu">
                            <!-- User Menu -->
                            <a class="dropdown-item" href="{{ route('user.dashboard') }}">Dashboard</a>

                            @if(auth()->user()->isAdmin())
                                <a class="dropdown-item" href="{{ route('admin.dashboard') }}">Admin Dashboard</a>
                            @endif
                            
                            <!-- Logout -->
                            <div class="dropdown-divider"></div>
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button class="dropdown-item"  type="submit">Logout</button>
                            </form>
                        </div>
                    </div>

                </nav>

            @endauth

        </div>

    </div>
</nav>