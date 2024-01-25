@extends('layouts.app')  <!-- Extend the 'layouts.app' layout -->

@section('title', 'Task List')  <!-- Set the title for this page -->

@section('styles')
    <!-- Add specific styles for the task list page here -->
@endsection

@section('content')
    <!-- Main content section -->

    <h1>Task List</h1>  <!-- Heading for the page -->

    <ul class="task-list">
        @forelse ($tasks as $task)
            <li>
                <!-- Task Details -->
                <span>{{ $task->title }}</span>
                <span>{{ $task->description }}</span>
                <span>{{ $task->duedate }}</span>
                <span>{{ $task->status }}</span>
                <!-- Uncomment the lines below if needed -->
                <!-- <span>{{ $task->deadline }}</span> -->
                <!-- <span>{{ $task->reminder }}</span> -->

                <!-- Link to view task details -->
                <a href="{{ route('tasks.show', $task->id) }}">Details</a>
            </li>
        @empty
            <!-- Displayed when no tasks are found -->
            <li>No tasks found.</li>
        @endforelse
    </ul>

    <!-- Buttons for creating a new task and viewing Asana tasks -->
    <a href="{{ route('tasks.create') }}" class="btn btn-primary">Create Task</a>
    <a href="{{ route('tasks.fetchAsanaTasks') }}" class="btn btn-primary">View Tasks Asana</a>

@endsection
