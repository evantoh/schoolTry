@extends('layouts.app')

@section('title', 'Task Details')

@section('content')
    <h1>Task Details</h1>

    <div class="task-details">
        <p><strong>Title:</strong> {{ $task->title }}</p>
        <p><strong>Description:</strong> {{ $task->description }}</p>
        <p><strong>Due Date:</strong> {{ $task->duedate }}</p>
        <p><strong>Status:</strong> {{ $task->status }}</p>
    </div>

    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning">Edit Task</a>

    <form action="{{ route('tasks.destroy', $task->id) }}" method="post" style="display:inline;">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger">Delete Task</button>
    </form>

    <a href="{{ route('tasks.listallTasks') }}" class="btn btn-secondary">Back to Task List</a>
@endsection
