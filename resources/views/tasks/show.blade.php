@extends('layouts.app')
@section('addTask')
    <div class="container mt-5">
        <div class="row justify-content-center">

            <div class="col-md-8">

                <div class="card bg-dark text-white shadow-lg rounded-4">

                    <div class="card-header text-center fs-4">
                        Task Details
                    </div>

                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Task name:</label>
                            <p class="text">{{ $task->title }}</p>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Task description:</label>
                            <p class="text">{{ $task->description }}</p>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Task priority:</label>
                            <p class="text">{{ $task->priority }}</p>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Task owner:</label>
                            <p class="text">{{ optional($task->user)->name ?? 'Unknown' }}</p>
                        </div>

                        <div class="d-flex gap-2">
                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning">Edit</a>
                            <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Back to List</a>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
@endsection
