@extends('layouts.app')

@section('content')
    <h2>Dashboard</h2>

    <div class="row">

        <div class="col-md-4">

            <div class="card shadow">
                <div class="card-body">

                    <h5>Total Lapangan</h5>

                    <h1 id="jumlahLapangan">0</h1>

                </div>
            </div>

        </div>

    </div>

    <script>
        loadLapangan();

        async function loadLapangan() {

            const token =
                localStorage.getItem('token');

            const response =
                await fetch(
                    'http://127.0.0.1:8000/api/lapangan', {
                        headers: {
                            'Authorization': 'Bearer ' + token
                        }
                    });

            const data =
                await response.json();

            document.getElementById(
                'jumlahLapangan'
            ).innerText = data.length;

        }
    </script>
@endsection
