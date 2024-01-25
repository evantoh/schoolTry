<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
</head>
<body>
    <h1>Edit Task</h1>

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

    <form action="/tasks/{{ $task->id }}" method="POST">
        @csrf
        @method('PUT')
        <label for="title">Title:</label>
        <input type="text" name="title" value="{{ $task->title }}" required>
        <!-- Add other fields as needed -->

        <label for="description">Description:</label>
        <input type="text" name="description" value="{{ $task->description }}" required>

        <label for="title">Due Date:</label>
        <input type="text" name="duedate" value="{{ $task->duedate }}" required>

        <label for="title">Status:</label>
        <input type="text" name="status" value="{{ $task->status }}" required>

        <button type="submit">Updates Task</button>
    </form>

    <a href="/tasks/{{ $task->id }}">Cancel</a>

    <a href="/tasks">Back to Task List</a>
</body>
</html>
