<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Booking Lapangan Jakabaring</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f4f6f9;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            background: #212529;
            color: white;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 15px;
        }

        .sidebar a:hover {
            background: #0d6efd;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
        }
    </style>

</head>

<body>

    <div class="sidebar">

        <h3 class="text-center mt-3">
            Jakabaring Sport
        </h3>

        <hr>

        <a href="/dashboard">Dashboard</a>
        <a href="/lapangan">Lapangan</a>
        <a href="/booking">Booking</a>

        <a href="#" onclick="logout()">
            Logout
        </a>

    </div>

    <div class="content">
        @yield('content')
    </div>

    <script>
        function logout() {
            localStorage.removeItem('token');
            window.location = '/login';
        }
    </script>

</body>

</html>
