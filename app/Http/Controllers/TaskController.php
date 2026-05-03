<?php

namespace App\Http\Controllers;

use App\Http\Requests\store;
use App\Models\User;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        //  Authenticated tasks from the database, ordered by creation date (latest first)
        $tasks = Task::where('user_id', Auth::id())->latest()->get();
        //dispaly the list of tasks
        return view('tasks.index', compact('tasks'));
    }
    public function create()
    {
        //display the form to create a new task
        return view('tasks.create');
    }
    public function store(store $request)
    {
        // Create a new task using the validated data and attach it to the current user
        $task = Task::create(array_merge($request->validated(), [
            'user_id' => Auth::id(),
        ]));

        // Redirect to the tasks index page with a success message
        return redirect()->route('tasks.index')
            ->with('success', 'Task created successfully!');
    }
    public function show($id)
    {
        // Find the task by ID along with its owner
        $task = Task::with('user')->findOrFail($id);
        // dd($task);
        // Display the task details
        return view('tasks.show', compact('task'));
    }
    public function edit($id)
    {
        // Find the task by ID
        $task = Task::findOrFail($id);
        // Display the edit form
        return view('tasks.edit', compact('task'));
    }
    public function update(store $request, $id)
    {

        // Find the task by ID and update it with the validated data
        $task = Task::findOrFail($id);
        $task->update($request->validated(), $request->messages());

        // Redirect to the tasks index page with a success message
        return redirect()->route('tasks.index')
            ->with('success', 'Task updated successfully!');
    }
    public function destroy($id)
    {
        // Find the task by ID and delete it
        $task = Task::findOrFail($id);
        $task->delete();

        // Redirect to the tasks index page with a success message
        return redirect()->route('tasks.index')
            ->with('success', 'Task deleted successfully!');
    }
}
