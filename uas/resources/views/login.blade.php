<!DOCTYPE html>
<html>

<head>

    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

    <div class="container">

        <div class="row justify-content-center mt-5">

            <div class="col-md-4">

                <div class="card shadow">

                    <div class="card-body">

                        <h3 class="text-center mb-4">
                            Login
                        </h3>

                        <input type="email" id="email" class="form-control mb-3" placeholder="Email">

                        <input type="password" id="password" class="form-control mb-3" placeholder="Password">

                        <button class="btn btn-primary w-100" onclick="login()">

                            Login


                        </button>

                    </div>
                    <div class="text-center mt-3">

                        Belum punya akun?

                        <a href="/register">
                            Daftar
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <script>
        async function login() {

            const response = await fetch(
                'http://127.0.0.1:8000/api/login', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
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

                window.location = '/dashboard';

            } else {

                alert('Login gagal');

            }

        }
    </script>

</body>

</html>
