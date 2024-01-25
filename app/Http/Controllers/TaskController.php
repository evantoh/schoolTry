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

}