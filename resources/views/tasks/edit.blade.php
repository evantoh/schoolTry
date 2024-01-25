@extends('layouts.app')

@section('title', 'Edit Task')

@section('content')
    <h1>Edit Task</h1>

    <!-- Task editing form -->
    <form action="{{ route('tasks.update', $task->id) }}" method="post">
        @csrf
        @method('put')

        <label for="title">Title:</label>
        <input type="text" name="title" value="{{ $task->title }}" required>

        <label for="description">Description:</label>
        <textarea name="description">{{ $task->description }}</textarea>

        <label for="duedate">Due Date:</label>
        <input type="date" name="duedate" value="{{ $task->duedate }}">

        <label for="status">Status:</label>
        <select name="status">
            <option value="to do" {{ $task->status === 'to do' ? 'selected' : '' }}>To Do</option>
            <option value="in progress" {{ $task->status === 'in progress' ? 'selected' : '' }}>In Progress</option>
            <option value="done" {{ $task->status === 'done' ? 'selected' : '' }}>Done</option>
        </select>

        <button type="submit" class="btn btn-primary">Update Task</button>
    </form>
@endsection