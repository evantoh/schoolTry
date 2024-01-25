<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task List</title>
</head>
<body>
    <h1>Task List</h1>

    <a href="/tasks/create">Create New Task</a>

    <ul>
        @foreach ($tasks as $task)
            <li>
                <a href="/tasks/{{ $task->id }}">{{ $task->title }}</a>
            </li>

        @endforeach
    </ul>
</body>
</html> -->


@extends('layouts.app')

@section('title', 'Task List')

@section('styles')
    <!-- Add specific styles for the task list page here -->
@endsection

@section('content')
    <h1>Task List</h1>

    <ul class="task-list">
        @forelse ($tasks as $task)
            <li>
                <span>{{ $task->title }}</span>
                <span>{{ $task->description }}</span>
                <span>{{ $task->duedate }}</span>
                <span>{{ $task->status }}</span>
                <!-- <span>{{ $task->deadline }}</span>
                <span>{{ $task->reminder }}</span> -->

                <a href="{{ route('tasks.show', $task->id) }}">Details</a>
            </li>
        @empty
            <li>No tasks found.</li>
        @endforelse
    </ul>

    <a href="{{ route('tasks.create') }}" class="btn btn-primary">Create Task</a>
    <a href="{{ route('tasks.fetchAsanaTasks') }}" class="btn btn-primary">View Tasks Asana</a>

@endsection
