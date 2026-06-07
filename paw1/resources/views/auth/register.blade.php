@extends('layouts.auth')

@section('content')
    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card shadow">

                <div class="card-header bg-primary text-white">

                    Register

                </div>

                <div class="card-body">

                    <form method="POST" action="/register">

                        @csrf

                        <div class="mb-3">

                            <label>Nama</label>

                            <input type="text" name="name" class="form-control">

                        </div>

                        <div class="mb-3">

                            <label>Email</label>

                            <input type="email" name="email" class="form-control">

                        </div>

                        <div class="mb-3">

                            <label>Password</label>

                            <input type="password" name="password" class="form-control">

                        </div>

                        <button class="btn btn-primary w-100">

                            Daftar

                        </button>

                        <div class="text-center mt-3">
                            Sudah punya akun?
                            <a href="/login" class="text-decoration-none">
                                Login di sini
                            </a>
                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>
@endsection
