<?php

namespace App\Http\Controllers;

use App\Http\Requests\store;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        // Retrieve all tasks from the database, ordered by creation date (latest first)
        $tasks = Task::latest()->get();
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
        // Create a new task using the validated data
        $task = Task::create($request->validated(), $request->messages());

        // Redirect to the tasks index page with a success message
        return redirect()->route('tasks.index')
            ->with('success', 'Task created successfully!');
    }
    public function show($id)
    {
        // Find the task by ID
        $task = Task::findOrFail($id);
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
