<!-- resources/views/welcome.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Task Management system</title>
    <!-- Add your styles and scripts here -->
</head>
<body>
    <header>
        <h1>Welcome Task Management System</h1>
    </header>

    <!-- Define the routes to either register or login -->
    <main>
        <p>please register or login if already registered!</p>
        <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
        <a href="{{ route('register') }}" class="btn btn-secondary">Register</a>
    </main>
    <footer>
        <p>&copy; 2024 schoolTry</p>
    </footer>
</body>
</html>
