@extends('layouts.app')  <!-- Extend the 'layouts.app' layout -->

@section('title', 'Create Task')  <!-- Set the title for this page -->

@section('content')
    <!-- Main content section -->

    <h1>Create Task</h1>  <!-- Heading for the page -->

    <!-- Task creation form -->
    <form action="{{ route('tasks.store') }}" method="post">
        @csrf  <!-- CSRF protection token -->

        <!-- Title input -->
        <label for="title">Title:</label>
        <input type="text" name="title" required>

        <!-- Description textarea -->
        <label for="description">Description:</label>
        <textarea name="description"></textarea>

        <!-- Due Date input -->
        <label for="duedate">Due Date:</label>
        <input type="date" name="duedate">

        <!-- Status dropdown -->
        <label for="status">Status:</label>
        <select name="status">
            <option value="to do">To Do</option>
            <option value="in progress">In Progress</option>
            <option value="done">Done</option>
        </select>

        <!-- Submit button -->
        <button type="submit" class="btn btn-success">Create Task</button>
    </form>

@endsection
