
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Task</title>
</head>
<body>
    <h1>Create Task</h1>

    @if ($errors->any())
        <div>
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/tasks" method="POST">
        @csrf
        <label for="title">Title:</label>
        <input type="text" name="title" required>

        <label for="description">Description:</label>
        <input type="text" name="description" required>

        <label for="duedate">Due Date:</label>
        <input type="date" name="duedate" required>

        <label for="status">Status:</label>
        <input type="text" name="status" required>

        <button type="submit">Create Task</button>
    </form>

    <a href="/tasks">Back to Task List</a>
</body>
</html> -->
@extends('layouts.app')

@section('title', 'Create Task')

@section('content')
    <h1>Create Task</h1>

    <!-- Task creation form -->
    <form action="{{ route('tasks.store') }}" method="post">
        @csrf
        <label for="title">Title:</label>
        <input type="text" name="title" required>

        <label for="description">Description:</label>
        <textarea name="description"></textarea>

        <label for="duedate">Due Date:</label>
        <input type="date" name="duedate">

        <label for="status">Status:</label>
        <select name="status">
            <option value="to do">To Do</option>
            <option value="in progress">In Progress</option>
            <option value="done">Done</option>
        </select>

        <button type="submit" class="btn btn-success">Create Task</button>
    </form>
@endsection
