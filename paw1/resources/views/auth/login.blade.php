@extends('layouts.auth')

@section('content')
    <div class="row justify-content-center">

        <div class="col-md-5">

            <div class="card shadow">

                <div class="card-header bg-success text-white">

                    Login

                </div>

                <div class="card-body">

                    @if (session('error'))
                        <div class="alert alert-danger">

                            {{ session('error') }}

                        </div>
                    @endif

                    <form method="POST" action="/login">

                        @csrf

                        <div class="mb-3">

                            <label>Email</label>

                            <input type="email" name="email" class="form-control">

                        </div>

                        <div class="mb-3">

                            <label>Password</label>

                            <input type="password" name="password" class="form-control">

                        </div>

                        <button class="btn btn-success w-100">

                            Login

                        </button>

                        <div class="text-center mt-3">
                            Belum punya akun?
                            <a href="/register" class="text-decoration-none">
                                Daftar di sini
                            </a>
                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>
@endsection
