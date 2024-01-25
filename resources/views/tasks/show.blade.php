@extends('layouts.app')  <!-- Extend the 'layouts.app' layout -->

@section('title', 'Task Details')  <!-- Set the title for this page -->

@section('content')
    <!-- Main content section -->

    <h1>Task Details</h1>  <!-- Heading for the page -->

    <div class="task-details">
        <!-- Display task details -->
        <p><strong>Title:</strong> {{ $task->title }}</p>
        <p><strong>Description:</strong> {{ $task->description }}</p>
        <p><strong>Due Date:</strong> {{ $task->duedate }}</p>
        <p><strong>Status:</strong> {{ $task->status }}</p>
    </div>

    <!-- Button to edit the task -->
    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning">Edit Task</a>

    <!-- Form for deleting the task -->
    <form action="{{ route('tasks.destroy', $task->id) }}" method="post" style="display:inline;">
        @csrf  <!-- CSRF protection token -->
        @method('delete')  <!-- HTTP method spoofing for DELETE request -->
        <button type="submit" class="btn btn-danger">Delete Task</button>
    </form>

    <!-- Link to go back to Task List -->
    <a href="{{ route('tasks.listallTasks') }}" class="btn btn-secondary">Back to Task List</a>
@endsection
