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