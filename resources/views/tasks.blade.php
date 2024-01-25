<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .navbar {
            background-color: #007bff;
        }

        .navbar-dark .navbar-toggler-icon {
            background-color: #fff;
        }

        .navbar-brand, .navbar-nav .nav-link {
            color: #fff;
        }

        .container {
            margin-top: 20px;
        }

        .task-table th, .task-table td {
            text-align: center;
            vertical-align: middle;
        }

        .table-container {
            max-width: 100%;
            overflow-x: auto;
        }

        .btn-details {
            background-color: #007bff;
            color: #fff;
        }

        .btn-details:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark">
    <a class="navbar-brand" href="#">Task Manager</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('tasks.listallTasks') }}">Task List</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center mb-4">Task Management Asana</h2>

            <div class="table-container">
                <div class="table-responsive">
                    @if($tasks)
                        <table class="table table-bordered table-hover task-table">
                            <thead class="thead-light">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Resource Type</th>
                                <th>Resource Sub Type</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tasks as $task)
                                <tr>
                                    <td>{{ $task['gid'] }}</td>
                                    <td>{{ $task['name'] }}</td>
                                    <td>{{ $task['resource_type'] }}</td>
                                    <td>{{ $task['resource_subtype'] }}</td>
                                    <td>
                                        <a href="{{ route('tasks.detailsFromAsana', ['id' => $task['gid']]) }}" class="btn btn-info btn-sm btn-details">Details</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    @else
                        <p class="text-center">No tasks available.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
