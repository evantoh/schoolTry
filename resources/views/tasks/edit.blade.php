@extends('layouts.app')  <!-- Extend the 'layouts.app' layout -->

@section('title', 'Edit Task')  <!-- Set the title for this page -->

@section('content')
    <!-- Main content section -->

    <h1>Edit Task</h1>  <!-- Heading for the page -->

    <!-- Task editing form -->
    <form action="{{ route('tasks.update', $task->id) }}" method="post">
        @csrf  <!-- CSRF protection token -->
        @method('put')  <!-- HTTP method spoofing for PUT request -->

        <!-- Title input -->
        <label for="title">Title:</label>
        <input type="text" name="title" value="{{ $task->title }}" required>

        <!-- Description textarea -->
        <label for="description">Description:</label>
        <textarea name="description">{{ $task->description }}</textarea>

        <!-- Due Date input -->
        <label for="duedate">Due Date:</label>
        <input type="date" name="duedate" value="{{ $task->duedate }}">

        <!-- Status dropdown -->
        <label for="status">Status:</label>
        <select name="status">
            <option value="to do" {{ $task->status === 'to do' ? 'selected' : '' }}>To Do</option>
            <option value="in progress" {{ $task->status === 'in progress' ? 'selected' : '' }}>In Progress</option>
            <option value="done" {{ $task->status === 'done' ? 'selected' : '' }}>Done</option>
        </select>

        <!-- Submit button -->
        <button type="submit" class="btn btn-primary">Update Task</button>
    </form>
@endsection
