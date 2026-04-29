<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Http\Requests\store;
use App\Models\User;

class TaskApiController extends Controller
{
    public function index()
    {
        $tasks = Task::latest()->get();
        // Check if the request expects a JSON response (e.g., for API requests)
        return response()->json($tasks, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(store $request)
    {
        $task = Task::create(($request)->validated(), $request->messages());
        return response()->json($task, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $task = Task::where('user_id', $id)->first();
        // $task = Task::findOrFail($id);
        return response()->json($task, 200);
    }
    public function getUser(string $id)
    {
        // ddasks();
        // return response()->json($task, 200);($id);
        // $task = Task::findOrFail($id)->user;
        // $task = User::findOrFail($id)->user;
        $task = User::findOrFail($id)->tasks;
        // return response()->json(User::findOrFail($id)->tasks, 200);
        return response()->json($task, 200);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(store $request, string $id)
    {
        $task = Task::findOrFail($id);
        $task->update($request->validated(), $request->messages());

        // Return a response with the updated task
        return response()->json($task, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the task by ID and delete it
        $task = Task::findOrFail($id);
        $task->delete();
        return response()->json(null, 204);
    }
}
