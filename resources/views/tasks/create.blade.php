@extends('layouts.app')
@section('addTask')
    <div class="container mt-5">
        <div class="row justify-content-center">

            <div class="col-md-6">

                <div class="card bg-dark text-white shadow-lg rounded-4">

                    <div class="card-header text-center fs-4">
                        Task Form
                    </div>

                    <div class="card-body">

                        <form method="POST" action="{{ route('tasks.store') }}">
                            @csrf

                            <!-- Task name -->
                            <div class="mb-3">
                                <label class="form-label">Task name</label>
                                <input type="text" name="title" class="form-control bg-secondary text-white border-0"
                                    placeholder="Enter task name">
                            </div>

                            <!-- description -->
                            <div class="mb-3">
                                <label class="form-label">Task description</label>
                                <textarea class="form-control bg-secondary text-white border-0" name="description"rows="4"
                                    placeholder="Enter task description"></textarea>
                            </div>

                            <!-- priority -->
                            <div class="mb-3">
                                <label class="form-label">Task priority</label>
                                <input type="number" name="priority" class="form-control bg-secondary text-white border-0"
                                    placeholder="Enter task priority">
                            </div>

                            <!-- Add Task  -->
                            <div class="d-grid">
                                <button class="btn btn-primary w-100" type="submit">
                                    <span class="spinner-border spinner-border-sm d-none"></span>
                                    Add Task
                                </button>
                            </div>
                        </form>

                    </div>

                </div>

            </div>

        </div>
    </div>
@endsection
