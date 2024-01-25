<?php

namespace App\Http\Controllers;
use App\Models\Task;


use Illuminate\Http\Request;
use Carbon\Carbon; //inbuilt date library

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
            'description' => 'nullable|string',
            'duedate' => 'nullable|date',
            'status' => 'nullable|in:to do,in progress,done',
            // 'deadline' => 'nullable|date',
            // 'reminder' => 'nullable|date',

        ]);

        // Convert date strings to Carbon objects
        $request['duedate'] = $request['duedate'] ? Carbon::parse($request['duedate']) : null;
        $request['deadline'] = $request['deadline'] ? Carbon::parse($request['deadline']) : null;
        $request['reminder'] = $request['reminder'] ? Carbon::parse($request['reminder']) : null;


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
            'description' => 'nullable|string',
            'duedate' => 'nullable|date',
            'status' => 'nullable|in:to do,in progress,done',
            // 'deadline' => 'nullable|date',
            // 'reminder' => 'nullable|date',        
        ]);

        // Convert date strings to Carbon objects
        $request['duedate'] = $request['duedate'] ? Carbon::parse($request['duedate']) : null;
        $request['deadline'] = $request['deadline'] ? Carbon::parse($request['deadline']) : null;
        $request['reminder'] = $request['reminder'] ? Carbon::parse($request['reminder']) : null;


        $task->update($request->all());

        return redirect('/tasks')->with('success', 'Task updated successfully!');
    }

    // delete task
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect('/tasks')->with('success', 'Task deleted successfully!');
    }


    // get and display tasks which are overdue
    public function overdue()
{
    $overdueTasks = Task::where('duedate', '<', now())->get();
    return view('tasks.overdue', compact('overdueTasks'));
}

}

    


