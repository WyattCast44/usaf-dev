@extends('layouts.skeleton')

@section('body')

<div id="app">
    
    @include('layouts._partials.navbar')

    <main class="py-4">
        @yield('content')
    </main>
    
</div>

@endsection