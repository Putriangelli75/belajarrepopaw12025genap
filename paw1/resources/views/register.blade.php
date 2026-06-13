<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Register</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f4f6f9;
        }

        .card {
            border: none;
            border-radius: 15px;
        }

        .btn-primary {
            border-radius: 10px;
        }
    </style>

</head>

<body>

    <div class="container">

        <div class="row justify-content-center mt-5">

            <div class="col-md-5">

                <div class="card shadow">

                    <div class="card-body p-4">

                        <h2 class="text-center mb-4">
                            Daftar Akun
                        </h2>

                        <div class="mb-3">

                            <label>Nama</label>

                            <input type="text" id="name" class="form-control" placeholder="Masukkan nama">

                        </div>

                        <div class="mb-3">

                            <label>Email</label>

                            <input type="email" id="email" class="form-control" placeholder="Masukkan email">

                        </div>

                        <div class="mb-3">

                            <label>Password</label>

                            <input type="password" id="password" class="form-control" placeholder="Masukkan password">

                        </div>

                        <button class="btn btn-primary w-100" onclick="register()">

                            Daftar

                        </button>

                        <div class="text-center mt-3">

                            Sudah punya akun?

                            <a href="/login">
                                Login
                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <script>
        async function register() {

            const response = await fetch(
                'http://127.0.0.1:8000/api/register', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({

                        name: document.getElementById('name').value,

                        email: document.getElementById('email').value,

                        password: document.getElementById('password').value

                    })
                });

            const data = await response.json();

            if (data.token) {

                localStorage.setItem(
                    'token',
                    data.token
                );

                alert('Registrasi berhasil');

                window.location = '/dashboard';

            } else {

                alert('Registrasi gagal');

            }

        }
    </script>

</body>

</html>
