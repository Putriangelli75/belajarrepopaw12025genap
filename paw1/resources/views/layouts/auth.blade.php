<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jakabaring Sport Booking</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body{
            background:#f4f6f9;
        }

        .auth-container{
            min-height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
        }

    </style>

</head>
<body>

<div class="container auth-container">

    @yield('content')

</div>

</body>
</html>