@extends('layouts.skeleton')

@section('body')

<div id="app">
    
    @include('layouts._partials.navbar')

    <main>
        @yield('content')
    </main>
    
</div>

@endsection