<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Carbon\Carbon; // In-built date library

class TaskController extends Controller
{
    // Function to list all tasks
    public function listAllTasks()
    {
        // Get all tasks from the Task model
        $tasks = Task::all();
        return view('tasks.listAllTasks', compact('tasks'));
    }

    // Function to create tasks
    public function create()
    {
        return view('tasks.create');
    }

    // Function to store tasks and add validation for some fields making them required
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable|string',
            'duedate' => 'nullable|date',
            'status' => 'nullable|in:to do,in progress,done',
        ]);

        // Convert date strings to Carbon objects
        $request['duedate'] = $request['duedate'] ? Carbon::parse($request['duedate']) : null;

        Task::create($request->all());

        // Return a message when tasks have been created successfully
        return redirect('/tasks')->with('success', 'Task created successfully!');
    }

    // Show tasks
    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    // Edit specific tasks by id
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    // Update task after editing
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable|string',
            'duedate' => 'nullable|date',
            'status' => 'nullable|in:to do,in progress,done',
        ]);

        // Convert date strings to Carbon objects
        $request['duedate'] = $request['duedate'] ? Carbon::parse($request['duedate']) : null;

        $task->update($request->all());

        return redirect('/tasks')->with('success', 'Task updated successfully!');
    }

    // Delete task
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect('/tasks')->with('success', 'Task deleted successfully!');
    }

    // Get and display tasks which are overdue
    public function overdue()
    {
        $overdueTasks = Task::where('duedate', '<', now())->get();
        return view('tasks.overdue', compact('overdueTasks'));
    }
}

