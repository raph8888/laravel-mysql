@extends('layouts.master2')
@section('content')

    <div id='app'>
        <task-list></task-list>
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

@endsection