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

        .sidebar{
            width:250px;
            min-height:100vh;
            background:#198754;
            position:fixed;
            left:0;
            top:0;
        }

        .sidebar h3{
            color:white;
            text-align:center;
            padding:20px 10px;
            border-bottom:1px solid rgba(255,255,255,.2);
        }

        .sidebar a{
            display:block;
            color:white;
            text-decoration:none;
            padding:15px 20px;
        }

        .sidebar a:hover{
            background:rgba(255,255,255,.2);
        }

        .content{
            margin-left:250px;
            padding:20px;
        }

        .navbar-custom{
            background:white;
            border-radius:10px;
            padding:15px;
            margin-bottom:20px;
            box-shadow:0 2px 8px rgba(0,0,0,.1);
        }

    </style>

</head>
<body>

<div class="sidebar">

    <h3>Jakabaring</h3>

    <a href="/dashboard">
        Dashboard
    </a>

    <a href="/lapangan">
        Data Lapangan
    </a>

    <a href="/jadwal">
        Data Jadwal
    </a>

    <a href="/booking">
        Booking
    </a>

    <a href="/riwayat-booking">
        Riwayat Booking
    </a>

    <a href="/admin/pembayaran">
        Pembayaran
    </a>

    <form action="/logout" method="POST">

        @csrf

        <button
            class="btn btn-danger m-3">
            Logout
        </button>

    </form>

</div>

<div class="content">

    <div class="navbar-custom">

        <h4>
            Sistem Pemesanan Lapangan
            Jakabaring
        </h4>

    </div>

    @yield('content')

</div>

</body>
</html>