<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        // Retrieve all tasks from the database, ordered by creation date (latest first)
        $tasks = Task::latest()->get();
        // Check if the request expects a JSON response (e.g., for API requests)
        if (request()->expectsJson()) {
            return response()->json($tasks, 200);
        }
        //dispaly the list of tasks
        return view('tasks.index', compact('tasks'));
    }
    public function create()
    {
        //display the form to create a new task
        return view('tasks.create');
    }
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:50',
            'description' => 'required|string',
            'priority' => 'required|integer|min:1|max:10',
        ]);
        // Create a new task using the validated data
        $task = Task::create($validatedData);

        // Return a response with the created task
        // if ($request->expectsJson()) {
        return response()->json($task, 201);
        // }
        // Redirect to the tasks index page with a success message
        //     return redirect()->route('tasks.index')
        //         ->with('success', 'Task created successfully!');
    }
    public function show($id)
    {
        // Find the task by ID
        $task = Task::findOrFail($id);
        // dd($task);
        // Check if the request expects a JSON response (e.g., for API requests)
        if (request()->expectsJson()) {
            return response()->json($task, 200);
        }
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
    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:50',
            'description' => 'required|string',
            'priority' => 'required|integer|min:1|max:10',
        ]);
        // Find the task by ID and update it with the validated data
        $task = Task::findOrFail($id);
        $task->update($validatedData);

        // Return a response with the updated task
        if ($request->expectsJson()) {
            return response()->json($task, 200);
        }
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
