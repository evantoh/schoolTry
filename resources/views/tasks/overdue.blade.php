@extends('layouts.app')

@section('title', 'Overdue Tasks')

@section('content')
    <h1>Overdue Tasks</h1>

    @if ($overdueTasks->isEmpty())
        <p>No overdue tasks found.</p>
    @else
        <ul class="task-list overdue-task-list">
            @foreach ($overdueTasks as $task)
                <li>
                    <span>{{ $task->title }}</span>
                    <span>{{ $task->description }}</span>
                    <span>{{ $task->duedate }}</span>
                    <span>{{ $task->status }}</span>
                    <a href="{{ route('tasks.show', $task->id) }}">Details</a>
                </li>
            @endforeach
        </ul>
    @endif
@endsection
