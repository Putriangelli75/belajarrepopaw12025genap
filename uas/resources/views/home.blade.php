<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Lapangan Jakabaring</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .hero{
            background: linear-gradient(135deg,#0d6efd,#198754);
            color:white;
            padding:100px 0;
        }

        .card:hover{
            transform: translateY(-5px);
            transition:0.3s;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">
            Booking Lapangan Jakabaring
        </a>
    </div>
</nav>

<section class="hero text-center">
    <div class="container">
        <h1 class="display-4 fw-bold">
            Sistem Pemesanan Lapangan Olahraga
        </h1>

        <p class="lead">
            Booking lapangan futsal, badminton, basket dan tenis secara online.
        </p>

        <button class="btn btn-light btn-lg">
            Booking Sekarang
        </button>
    </div>
</section>

<div class="container my-5">

    <h2 class="text-center mb-4">
        Daftar Lapangan
    </h2>

    <div class="row">

        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body">
                    <h4>Futsal A</h4>
                    <p>Jenis : Futsal</p>
                    <p>Harga : Rp100.000/Jam</p>
                    <button class="btn btn-primary">
                        Pesan
                    </button>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body">
                    <h4>Badminton 1</h4>
                    <p>Jenis : Badminton</p>
                    <p>Harga : Rp80.000/Jam</p>
                    <button class="btn btn-success">
                        Pesan
                    </button>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body">
                    <h4>Basket Indoor</h4>
                    <p>Jenis : Basket</p>
                    <p>Harga : Rp150.000/Jam</p>
                    <button class="btn btn-warning">
                        Pesan
                    </button>
                </div>
            </div>
        </div>

    </div>
</div>

<footer class="bg-dark text-white text-center p-3">
    © 2026 Booking Lapangan Jakabaring
</footer>

</body>
</html>