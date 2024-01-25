<?php

namespace App\Http\Controllers;
use App\Models\Task;


use Illuminate\Http\Request;

class TaskController extends Controller
{
    // function to list all Tasks
    public function listAllTasks()
    {
        // get all tasks from the Model Task
        $tasks = Task::all();
        return view('tasks.listAllTasks', compact('tasks'));
    }

    // function to create Tasks
    public function create()
    {
        return view('tasks.create');
    }

    // function to store Tasks and add validation of some field and make them required
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            // add other validation rules as needed
        ]);

        Task::create($request->all());
        // return message when tasks have been created successfully
        return redirect('/tasks')->with('success', 'Task created successfully!');
    }


}