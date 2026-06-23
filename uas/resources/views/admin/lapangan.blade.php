@extends('layouts.app')

@section('title', 'Kelola Lapangan - Admin SPLJ')

@section('app_sidebar', true)

@section('content')


<div class="space-y-10">



    <!-- HEADER -->

    <div class="flex flex-wrap items-center justify-between gap-5">


        <div>


            <div class="flex items-center gap-2">

                <span class="px-3 py-1 rounded-full
                bg-emerald-50
                text-emerald-700
                text-xs font-semibold">

                    ADMIN PANEL

                </span>


            </div>




            <h1 class="mt-4 text-4xl font-bold
            text-slate-900">

                Kelola Data Lapangan

            </h1>



            <p class="mt-3 text-slate-500">

                Tambah, edit, dan kontrol seluruh lapangan olahraga SPLJ.

            </p>


        </div>






        <button

        onclick="openLapanganModal()"

        class="group flex items-center gap-2
        rounded-2xl
        bg-emerald-600
        px-6 py-3
        text-white
        font-semibold
        shadow-lg
        shadow-emerald-200
        hover:bg-emerald-700
        transition">


            <span class="text-xl">

                +

            </span>


            Tambah Lapangan


        </button>



    </div>







    <div id="adminLapanganAlert"></div>








    <!-- TABLE CARD -->


    <div class="bg-white
    rounded-3xl
    border border-slate-200
    shadow-sm
    overflow-hidden">



        <div class="px-6 py-5
        border-b
        flex justify-between">


            <div>

                <h2 class="font-bold text-lg">

                    Daftar Lapangan

                </h2>


                <p class="text-sm text-slate-500">

                    Data lapangan yang tersedia di sistem.

                </p>


            </div>



        </div>






        <div class="overflow-x-auto">


        <table class="w-full text-sm">


            <thead>


                <tr class="bg-slate-50
                text-slate-500
                uppercase
                text-xs">


                    <th class="px-6 py-4 text-left">
                        Lapangan
                    </th>


                    <th class="px-6 py-4 text-left">
                        Olahraga
                    </th>


                    <th class="px-6 py-4 text-left">
                        Harga
                    </th>


                    <th class="px-6 py-4 text-left">
                        Deskripsi
                    </th>


                    <th class="px-6 py-4 text-left">
                        Status
                    </th>


                    <th class="px-6 py-4 text-right">
                        Aksi
                    </th>


                </tr>


            </thead>




            <tbody

            id="lapanganTableBody"

            class="divide-y divide-slate-100">



                <tr>

                    <td colspan="6"

                    class="text-center py-10 text-slate-500">


                        Memuat data lapangan...


                    </td>


                </tr>



            </tbody>



        </table>


        </div>



    </div>









<!-- MODAL MODERN -->


<div id="lapanganModal"

class="fixed inset-0 hidden items-center justify-center
bg-slate-900/60 backdrop-blur-sm z-50 p-5">





<div class="bg-white
rounded-3xl
shadow-2xl
w-full max-w-xl
p-8">





    <div class="flex justify-between items-start">


        <div>


            <h2 id="modalTitle"

            class="text-2xl font-bold text-slate-900">


                Tambah Lapangan


            </h2>


            <p id="modalSubtitle"

            class="mt-2 text-sm text-slate-500">

                Tambahkan lapangan baru ke sistem.


            </p>


        </div>




        <button

        onclick="closeLapanganModal()"

        class="w-10 h-10 rounded-full
        hover:bg-slate-100">


            ✕

        </button>



    </div>







    <div id="modalAlert"

    class="mt-4">

    </div>







    <form id="lapanganForm"

    onsubmit="submitLapangan(event)"

    class="mt-6 space-y-5">





        <input type="hidden"

        id="lapangan_id">





        <div>


            <label class="text-sm font-semibold">

                Nama Lapangan

            </label>


            <input

            id="nama_lapangan"

            class="mt-2 w-full
            rounded-2xl
            border border-slate-200
            px-4 py-3
            focus:ring-2
            focus:ring-emerald-500
            outline-none"

            placeholder="Contoh: Futsal A"

            required>


        </div>








        <div class="grid sm:grid-cols-2 gap-4">



            <div>


                <label class="text-sm font-semibold">

                    Jenis Olahraga

                </label>



                <select

                id="jenis_olahraga"

                class="mt-2 w-full
                rounded-2xl
                border
                px-4 py-3">


                    <option value="">
                        Pilih olahraga
                    </option>


                    <option>Futsal</option>

                    <option>Badminton</option>

                    <option>Basket</option>

                    <option>Tenis</option>

                    <option>Mini Soccer</option>


                </select>


            </div>






            <div>


                <label class="text-sm font-semibold">

                    Harga / Jam

                </label>



                <input

                id="harga_per_jam"

                type="number"

                class="mt-2 w-full
                rounded-2xl
                border
                px-4 py-3"

                placeholder="100000">


            </div>



        </div>







        <div>


            <label class="text-sm font-semibold">

                Status

            </label>


            <select

            id="status"

            class="mt-2 w-full rounded-2xl border px-4 py-3">


                <option value="tersedia">
                    Tersedia
                </option>


                <option value="maintenance">
                    Maintenance
                </option>


            </select>


        </div>







        <div>


            <label class="text-sm font-semibold">

                Deskripsi

            </label>


            <textarea

            id="deskripsi"

            rows="3"

            class="mt-2 w-full rounded-2xl border px-4 py-3"

            placeholder="Fasilitas lapangan...">

            </textarea>


        </div>






        <div class="flex justify-end gap-3 pt-5 border-t">


            <button

            type="button"

            onclick="closeLapanganModal()"

            class="px-5 py-3 rounded-xl border">

                Batal

            </button>





            <button

            id="submitBtn"

            class="px-6 py-3 rounded-xl
            bg-emerald-600
            text-white
            font-semibold">

                Simpan

            </button>



        </div>



    </form>




</div>


</div>



</div>

@endsection

@push('scripts')
    <script>
        requireAdmin();

        let allLapangan = [];
        loadLapanganList();

        async function loadLapanganList() {
            const response = await fetch('/api/lapangan', {
                headers: apiHeaders()
            });

            if (!response.ok) {
                showAlert('adminLapanganAlert', await getErrorMessage(response));
                return;
            }

            allLapangan = await response.json();

            if (!allLapangan.length) {
                document.getElementById('lapanganTableBody').innerHTML = `
                    <tr>
                        <td class="px-5 py-8 text-center text-slate-500" colspan="6">
                            Belum ada data lapangan. Silakan tambah lapangan baru.
                        </td>
                    </tr>
                `;
                return;
            }

            document.getElementById('lapanganTableBody').innerHTML = allLapangan.map(item => `
                <tr class="hover:bg-slate-50/50">
                    <td class="px-5 py-4 font-semibold text-slate-950">${escapeHtml(item.nama_lapangan)}</td>
                    <td class="px-5 py-4 text-slate-600">${escapeHtml(item.jenis_olahraga)}</td>
                    <td class="px-5 py-4 font-medium text-slate-900">${formatRupiah(item.harga_per_jam)}</td>
                    <td class="px-5 py-4 text-slate-500 max-w-[200px] truncate" title="${escapeHtml(item.deskripsi ?? '')}">
                        ${escapeHtml(item.deskripsi ?? '-')}
                    </td>
                    <td class="px-5 py-4">
                        <span class="inline-flex rounded-full px-2.5 py-0.5 text-xs font-semibold ${item.status === 'tersedia' ? 'bg-emerald-50 text-emerald-900' : 'bg-amber-50 text-amber-800'}">
                            ${escapeHtml(item.status)}
                        </span>
                    </td>
                    <td class="px-5 py-4 text-right">
                        <div class="flex justify-end gap-2">
                            <button class="text-xs font-semibold text-blue-900 hover:text-blue-700 bg-blue-50 px-2 py-1 rounded transition" onclick="editLapangan(${item.id})">Edit</button>
                            <button class="text-xs font-semibold text-red-900 hover:text-red-700 bg-red-50 px-2 py-1 rounded transition" onclick="deleteLapangan(${item.id})">Hapus</button>
                        </div>
                    </td>
                </tr>
            `).join('');
        }

        function openLapanganModal(item = null) {
            const modal = document.getElementById('lapanganModal');
            const alertContainer = document.getElementById('modalAlert');
            const form = document.getElementById('lapanganForm');
            
            alertContainer.innerHTML = '';
            form.reset();

            if (item) {
                document.getElementById('lapangan_id').value = item.id;
                document.getElementById('nama_lapangan').value = item.nama_lapangan;
                document.getElementById('jenis_olahraga').value = item.jenis_olahraga;
                document.getElementById('harga_per_jam').value = item.harga_per_jam;
                document.getElementById('status').value = item.status;
                document.getElementById('deskripsi').value = item.deskripsi ?? '';
                
                document.getElementById('modalTitle').innerText = 'Ubah Lapangan';
                document.getElementById('modalSubtitle').innerText = 'Perbarui data lapangan yang sudah ada.';
                document.getElementById('submitBtn').innerText = 'Simpan Perubahan';
            } else {
                document.getElementById('lapangan_id').value = '';
                document.getElementById('modalTitle').innerText = 'Tambah Lapangan';
                document.getElementById('modalSubtitle').innerText = 'Tambahkan data lapangan baru ke dalam sistem.';
                document.getElementById('submitBtn').innerText = 'Simpan';
            }

            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeLapanganModal() {
            const modal = document.getElementById('lapanganModal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }

        function editLapangan(id) {
            const item = allLapangan.find(l => l.id === id);
            if (item) {
                openLapanganModal(item);
            }
        }

        async function submitLapangan(event) {
            event.preventDefault();

            const id = document.getElementById('lapangan_id').value;
            const submitBtn = document.getElementById('submitBtn');
            
            submitBtn.disabled = true;
            submitBtn.innerText = 'Menyimpan...';

            const payload = {
                nama_lapangan: document.getElementById('nama_lapangan').value,
                jenis_olahraga: document.getElementById('jenis_olahraga').value,
                harga_per_jam: document.getElementById('harga_per_jam').value,
                status: document.getElementById('status').value,
                deskripsi: document.getElementById('deskripsi').value
            };

            const url = id ? `/api/lapangan/${id}` : '/api/lapangan';
            const method = id ? 'PUT' : 'POST';

            const response = await fetch(url, {
                method: method,
                headers: apiHeaders(),
                body: JSON.stringify(payload)
            });

            if (!response.ok) {
                showAlert('modalAlert', await getErrorMessage(response));
                submitBtn.disabled = false;
                submitBtn.innerText = id ? 'Simpan Perubahan' : 'Simpan';
                return;
            }

            showAlert('adminLapanganAlert', `Lapangan berhasil ${id ? 'diperbarui' : 'ditambahkan'}.`, 'success');
            closeLapanganModal();
            loadLapanganList();
        }

        async function deleteLapangan(id) {
            if (!confirm('Apakah Anda yakin ingin menghapus data lapangan ini? Semua riwayat booking terkait mungkin akan terpengaruh.')) {
                return;
            }

            const response = await fetch(`/api/lapangan/${id}`, {
                method: 'DELETE',
                headers: apiHeaders()
            });

            if (!response.ok) {
                showAlert('adminLapanganAlert', await getErrorMessage(response));
                return;
            }

            showAlert('adminLapanganAlert', 'Data lapangan berhasil dihapus.', 'success');
            loadLapanganList();
        }
    </script>
@endpush
