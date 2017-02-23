<!DOCTYPE html>
<html>
<head>
    <title>Propay</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ URL::to('users') }}">Profiles</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="{{ URL::to('users') }}">View All profiles</a></li>
            <li><a href="{{ URL::to('users/create') }}">Create a Profile</a>
        </ul>
    </nav>

    <h1>View Profile For {{ $user->name }}</h1>

    <div class="jumbotron text-center">
        <h2>{{ $user->user-name }}</h2>
        <p>
            <strong>Email:</strong> {{ $user->email }}<br>
            <strong>Mobile:</strong> {{ $user->mobile }}
            <strong>Language:</strong> {{ $user->language }}
            <strong>DOB:</strong> {{ $user->dob }}
        </p>
    </div>

</div>
</body>
</html>
