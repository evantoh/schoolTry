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

    // show tasks
    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }
    // edit specific tasks by id
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }
    //  update task after editing
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required',
            // add other validation rules as needed
        ]);

        $task->update($request->all());

        return redirect('/tasks')->with('success', 'Task updated successfully!');
    }

    // delete task
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect('/tasks')->with('success', 'Task deleted successfully!');
    }
}

    


