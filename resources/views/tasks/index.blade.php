 @extends('layouts.app')
 @section('list')
     <div class="container mt-5">

         <div class="card bg-dark text-white shadow-lg rounded-4">

             <div class="card-header fs-4">
                 Task List
             </div>

             <div class="card-body table-responsive">

                 <table class="table table-dark table-striped table-hover align-middle">
                     <thead>
                         <tr>
                             <th>#</th>
                             <th>Name</th>
                             <th>Description</th>
                             <th>Priority</th>
                             <th>Actions</th>
                         </tr>
                     </thead>

                     <tbody>
                         @foreach ($tasks as $task)
                             <tr>
                                 <td>{{ $loop->iteration }}</td>
                                 <td>{{ $task->title }}</td>
                                 <td>{{ $task->description }}</td>
                                 <td>{{ $task->priority }}</td>

                                 <td>
                                     <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-sm btn-warning">View</a>
                                     <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                     <a href="{{ route('tasks.destroy', $task->id) }}" class="btn btn-sm btn-danger"
                                         onclick="event.preventDefault(); document.getElementById('delete-form-{{ $task->id }}').submit();">Delete</a>
                                     <form id="delete-form-{{ $task->id }}"
                                         action="{{ route('tasks.destroy', $task->id) }}" method="POST"
                                         style="display: none;">
                                         @csrf
                                         @method('DELETE')
                                     </form>
                                 </td>
                             </tr>
                         @endforeach
                     </tbody>

                 </table>

             </div>

         </div>

     </div>
 @endsection
