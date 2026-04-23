{{-- @vite(['resources/css/app.css', 'resources/js/app.js'])
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Employees</h1>

        <input type="text" id="search" class="form-control mb-3" placeholder="Suche...">

        <div id="tableContainer">
            @include('employees.list', ['employees' => $employees ?? []])
        </div>

        @include('employees.modal')
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/AjaxTable.js') }}"></script>
    <script>
        let table = new AjaxTable({
            url: '{{ route('employees.list') }}',
            container: '#tableContainer'
        });

        document.getElementById('search').addEventListener('keyup', function() {
            table.load({
                search: this.value
            });
        });
    </script>
@endsection --}}
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Employees</h1>

        <input type="text" id="search" class="form-control mb-3" placeholder="Suche...">

        <div id="tableContainer">
            @include('employees.list', ['employees' => $employees ?? []])
        </div>

        @include('employees.modal')
    </div>
@endsection