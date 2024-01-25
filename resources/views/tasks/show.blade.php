<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $task->title }}</title>
</head>
<body>
    <h1>{{ $task->title }}</h1>
    <!-- Display other task details -->

    <a href="/tasks/{{ $task->id }}/edit">Edit Task</a>

    <form action="/tasks/{{ $task->id }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete Task</button>
    </form>

    <a href="/tasks">Back to Task List</a>
</body>
</html>
