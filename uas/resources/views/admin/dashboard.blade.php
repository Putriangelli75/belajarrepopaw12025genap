@extends('layouts.app')

@section('title', 'Admin Dashboard - SPLJ')

@section('app_sidebar', true)

@section('content')

<div class="space-y-8">


    <!-- HEADER -->

    <div class="flex flex-wrap items-end justify-between gap-4">


        <div>

            <p class="text-sm font-semibold 
            text-emerald-700 mb-2">

                Panel Admin

            </p>


            <h1 class="text-3xl font-bold 
            text-slate-900">

                Statistik SPLJ

            </h1>


            <p class="mt-2 text-sm 
            text-slate-500">

                Overview sistem pemesanan lapangan Jakabaring secara real-time.

            </p>
        </div>


    </div>





    <div id="adminAlert"></div>






    <!-- STAT CARD -->


    <div class="grid gap-5
    md:grid-cols-2
    xl:grid-cols-5">



        <div class="bg-white
        rounded-2xl
        border border-slate-200
        p-5
        hover:shadow-md
        transition">


            <p class="text-sm text-slate-500">
                Total Lapangan
            </p>


            <h2 id="totalLapangan"

            class="mt-3 text-3xl font-bold text-slate-900">

                0

            </h2>


        </div>





        <div class="bg-white
        rounded-2xl
        border border-slate-200
        p-5
        hover:shadow-md
        transition">


            <p class="text-sm text-slate-500">
                Total Booking
            </p>


            <h2 id="totalBookings"

            class="mt-3 text-3xl font-bold text-slate-900">

                0

            </h2>


        </div>







        <div class="bg-white
        rounded-2xl
        border border-slate-200
        p-5
        hover:shadow-md
        transition">


            <p class="text-sm text-slate-500">
                Total Pendapatan
            </p>


            <h2 id="totalRevenue"

            class="mt-3 text-3xl font-bold text-emerald-700">

                Rp0

            </h2>


        </div>







        <div class="bg-white
        rounded-2xl
        border border-slate-200
        p-5
        hover:shadow-md
        transition">


            <p class="text-sm text-slate-500">
                Menunggu Verifikasi
            </p>


            <h2 id="pendingVerifications"

            class="mt-3 text-3xl font-bold text-orange-600">

                0

            </h2>


        </div>







        <div class="bg-white
        rounded-2xl
        border border-slate-200
        p-5
        hover:shadow-md
        transition">


            <p class="text-sm text-slate-500">
                Total Pelanggan
            </p>

            
            <h2 id="totalUsers"

            class="mt-3 text-3xl font-bold text-slate-900">

                0

            </h2>

        </div>

        </div>



    </div>








    <!-- TABLE VERIFIKASI -->


    <div class="bg-white
    rounded-2xl
    border border-slate-200
    p-5">


        <div class="flex justify-between 
        items-center mb-5">


            <div>


                <h2 class="text-lg font-bold 
                text-slate-900">

                    Membutuhkan Verifikasi

                </h2>



                <p class="text-sm text-slate-500">

                    Booking yang menunggu persetujuan admin.

                </p>


            </div>





            <span id="pendingBadge"

            class="px-3 py-1 rounded-full
            text-xs font-semibold
            bg-orange-50
            text-orange-700">


                0 Transaksi


            </span>


        </div>






        <div class="overflow-x-auto">


            <table class="w-full text-sm">


                <thead>


                    <tr class="border-b
                    text-slate-500">


                        <th class="py-3 text-left">
                            Pelanggan
                        </th>


                        <th class="py-3 text-left">
                            Lapangan
                        </th>


                        <th class="py-3 text-left">
                            Tanggal & Jam
                        </th>


                        <th class="py-3 text-left">
                            Total Harga
                        </th>


                        <th class="py-3 text-left">
                            Bukti
                        </th>


                        <th class="py-3 text-right">
                            Aksi
                        </th>


                    </tr>


                </thead>



                <tbody id="pendingBookingsBody">


                    <tr>

                        <td colspan="6"

                        class="py-10 text-center
                        text-slate-500">


                            Memuat data verifikasi...


                        </td>


                    </tr>


                </tbody>



            </table>



        </div>


    </div>






    <!-- MODAL -->


    <div id="imageModal"

    class="fixed inset-0 hidden items-center
    justify-center bg-black/50 z-50">


        <div class="bg-white rounded-2xl p-5">


            <button onclick="closeImageModal()"

            class="float-right text-xl">

                ✕

            </button>



            <img id="modalImg"

            class="max-h-[80vh] rounded-xl">


            <p id="modalImgLabel"

            class="mt-3 text-center">

            </p>


        </div>


    </div>



</div>


@endsection
</div>

@push('scripts')
    <script>
        requireAdmin();

        loadAdminDashboard();

        async function loadAdminDashboard() {
            const [statsResponse, bookingsResponse] = await Promise.all([
                fetch('/api/admin/stats', {
                    headers: apiHeaders()
                }),
                fetch('/api/admin/bookings', {
                    headers: apiHeaders()
                })
            ]);

            if (!statsResponse.ok) {
                showAlert('adminAlert', await getErrorMessage(statsResponse));
                return;
            }

            if (!bookingsResponse.ok) {
                showAlert('adminAlert', await getErrorMessage(bookingsResponse));
                return;
            }

            const stats = await statsResponse.json();
            const bookings = await bookingsResponse.json();

            // Render stats
            document.getElementById('totalLapangan').innerText = stats.total_lapangan;
            document.getElementById('totalBookings').innerText = stats.total_bookings;
            document.getElementById('totalRevenue').innerText = formatRupiah(stats.total_revenue);
            document.getElementById('pendingVerifications').innerText = stats.pending_verifications;
            document.getElementById('pendingBadge').innerText = `${stats.pending_verifications} Transaksi`;
            document.getElementById('totalUsers').innerText = stats.total_users;

            // Filter pending verifications
            const pendingBookings = bookings.filter(b => b.status === 'menunggu_verifikasi');

            if (!pendingBookings.length) {
                document.getElementById('pendingBookingsBody').innerHTML = `
                    <tr>
                        <td class="px-5 py-10 text-center text-slate-500" colspan="6">
                            <div class="flex flex-col items-center justify-center gap-2">
                                <span class="text-3xl">🎉</span>
                                <p class="text-sm font-semibold text-slate-900">Semua bersih!</p>
                                <p class="text-xs text-slate-500">Tidak ada pembayaran booking yang menunggu verifikasi saat ini.</p>
                            </div>
                        </td>
                    </tr>
                `;
                return;
            }

            document.getElementById('pendingBookingsBody').innerHTML = pendingBookings.map(b => `
                <tr class="hover:bg-slate-50/50">
                    <td class="px-5 py-4">
                        <div class="font-semibold text-slate-950">${escapeHtml(b.user?.name)}</div>
                        <div class="text-xs text-slate-550">${escapeHtml(b.user?.email)}</div>
                    </td>
                    <td class="px-5 py-4">
                        <div class="font-semibold text-slate-900">${escapeHtml(b.lapangan?.nama_lapangan)}</div>
                        <div class="text-xs text-slate-550">${escapeHtml(b.lapangan?.jenis_olahraga)}</div>
                    </td>
                    <td class="px-5 py-4">
                        <div class="text-slate-900">${escapeHtml(b.tanggal)}</div>
                        <div class="text-xs text-slate-500">${escapeHtml(b.jam_mulai.slice(0,5))} - ${escapeHtml(b.jam_selesai.slice(0,5))}</div>
                    </td>
                    <td class="px-5 py-4 font-bold text-slate-950">
                        ${formatRupiah(b.total_harga)}
                    </td>
                    <td class="px-5 py-4">
                        ${b.pembayaran ? `
                            <button class="text-xs font-semibold text-emerald-900 hover:underline flex items-center gap-1" onclick="viewImage('/bukti/${b.pembayaran.bukti_bayar}', 'Bukti ${escapeHtml(b.user?.name)}')">
                                Lihat Bukti
                            </button>
                        ` : '<span class="text-xs text-slate-400">Tidak ada</span>'}
                    </td>
                    <td class="px-5 py-4 text-right">
                        <div class="flex justify-end gap-2">
                            <button class="bg-red-50 text-red-700 hover:bg-red-100 px-3 py-1 rounded text-xs font-semibold transition" onclick="verifyBooking(${b.id}, 'ditolak')">Tolak</button>
                            <button class="bg-emerald-50 text-emerald-700 hover:bg-emerald-100 px-3 py-1 rounded text-xs font-semibold transition" onclick="verifyBooking(${b.id}, 'disetujui')">Setujui</button>
                        </div>
                    </td>
                </tr>
            `).join('');
        }

        function viewImage(url, label) {
            document.getElementById('modalImg').src = url;
            document.getElementById('modalImgLabel').innerText = label;
            document.getElementById('imageModal').classList.remove('hidden');
            document.getElementById('imageModal').classList.add('flex');
        }

        function closeImageModal() {
            document.getElementById('imageModal').classList.add('hidden');
            document.getElementById('imageModal').classList.remove('flex');
        }

        async function verifyBooking(id, status) {
            if (!confirm(`Apakah Anda yakin ingin memverifikasi booking ini sebagai: ${status.toUpperCase()}?`)) {
                return;
            }

            const response = await fetch(`/api/booking/${id}/verifikasi`, {
                method: 'POST',
                headers: apiHeaders(),
                body: JSON.stringify({ status })
            });

            if (!response.ok) {
                showAlert('adminAlert', await getErrorMessage(response));
                return;
            }

            showAlert('adminAlert', `Booking berhasil ${status === 'disetujui' ? 'disetujui' : 'ditolak'}.`, 'success');
            loadAdminDashboard();
        }
    </script>
@endpush
