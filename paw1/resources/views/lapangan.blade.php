@extends('layouts.app')

@section('content')
    <h2>Data Lapangan</h2>

    <table class="table table-bordered">

        <thead>

            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Olahraga</th>
                <th>Harga</th>
                <th>Status</th>
            </tr>

        </thead>

        <tbody id="lapanganBody">

        </tbody>

    </table>

    <script>
        loadData();

        async function loadData() {

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

            let html = '';

            data.forEach(item => {

                html += `
<tr>
<td>${item.id}</td>
<td>${item.nama_lapangan}</td>
<td>${item.jenis_olahraga}</td>
<td>Rp ${item.harga_per_jam}</td>
<td>${item.status}</td>
</tr>
`;

            });

            document.getElementById(
                'lapanganBody'
            ).innerHTML = html;

        }
    </script>
@endsection
