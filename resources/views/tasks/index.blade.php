<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task List Assign to Developer</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1>Task List Assign to Developer</h1>
    <h3>Minimum Number of Weeks: {{ $weeks }}</h3>
    <div class="row">
        @foreach ($schedule as $name => $developerSchedule)
            <div class="col-md-4">
                <h4>Developer {{ $name }}</h4>
                <ul>
                    @foreach ($developerSchedule['tasks'] as $task)
                        <li>{{ $task->name }} ({{ $task->duration }} hours, Difficulty: {{ $task->difficulty }})</li>
                    @endforeach
                </ul>
            </div>
        @endforeach
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
