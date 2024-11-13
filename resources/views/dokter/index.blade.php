@extends('layouts.admin')

@section('title', 'Momiya Medical Clinic | Dokter')

@section('content')
    {{-- Container utama --}}
    <div class="container">
        <div class="mt-3 pb-4">
            <label for="table-search" class="sr-only">Search</label>

            {{-- Filter Poliklinik dan Search Nama --}}
            <div class="flex md:flex-row flex-col-reverse gap-y-2 md:gap-y-0 md:justify-between items-center">
                <div class="flex gap-2">
                    <select id="filter-poliklinik" class="border border-gray-300 rounded-lg">
                        <option value="">Semua Poli</option>
                        @foreach ($polikliniks as $poli)
                            <option value="{{ $poli->nama_poli }}">{{ $poli->nama_poli }}</option>
                        @endforeach
                    </select>
                    <input type="text" id="search-name" class="border border-gray-300 rounded-lg"
                           placeholder="Cari Nama Dokter">
                </div>
                
                {{-- Tombol tambah dokter --}}
                <a type="button"
                   class="flex items-center justify-center text-white w-full md:w-48 bg-gray-900 hover:bg-gray-700 focus:ring-4 focus:ring-blue-300 font-medium text-sm px-1 py-2 sm:mb-0 rounded-full"
                   href={{ url('/dokter/create') }}>
                    <svg class="w-5 h-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M5 12h14m-7 7V5"/>
                    </svg>
                    Tambah Dokter
                </a>
            </div>
        </div>

        <div class="col">
            <h2 class="mt-2 text-xl mb-1 font-semibold">Data Dokter</h2>
            <hr>
        </div>
        
        {{-- Tabel data dokter --}}
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-900">
                <thead class="text-xs text-white uppercase bg-gray-900 h-8">
                    <tr align="center">
                        <th class="border border-gray-300 px-2 py-2">No</th>
                        <th class="border border-gray-300 px-2 py-2">Nama Dokter</th>
                        <th class="border border-gray-300 px-2 py-2">Poli</th>
                        <th class="border border-gray-300 px-2 py-2">Terakhir DiUpdate</th>
                        <th class="border border-gray-300 px-2 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dokters as $u)
                        <tr align="center" class="bg-white border-b text-gray-900">
                            <th class="border border-gray-300 px-2 py-2">{{ $loop->iteration }}</th>
                            <td class="border border-gray-300 px-2 py-2">{{ $u->user->name }}</td>
                            <td class="border border-gray-300 px-2 py-2">{{ $u->poliklinik->nama_poli }}</td>
                            <td class="border border-gray-300 px-2 py-2">{{ $u->updated_at }}</td>
                            <td class="flex items-center justify-center py-2 px-2">
                                <a href={{ url('/dokter/edit/' . $u->id) }} class="text-gray-900 hover:bg-blue-200 font-medium rounded-lg text-sm px-1 py-1">
                                    <svg class="w-5 h-5 text-gray-900" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                                    </svg>
                                </a>
                                <a href={{ url('/dokter/details/' . $u->id) }} class="text-gray-900 hover:bg-green-200 font-medium rounded-lg text-sm px-1 py-1">
                                    <svg class="w-6 h-6 text-gray-800" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11h2v5m-2 0h4m-2.592-8.5h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                    </svg>
                                </a>
                                <a href={{ url('/dokter/delete/' . $u->id) }} onclick="return confirm('Anda Yakin ingin Menghapus {{ $u->daya }} ?')" class="text-gray-900 hover:bg-red-200 font-medium rounded-lg text-sm px-1 py-1">
                                    <svg class="w-5 h-5 text-gray-900" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- JavaScript untuk Filter dan Pencarian --}}
    <script>
        document.getElementById('filter-poliklinik').addEventListener('change', filterTable);
        document.getElementById('search-name').addEventListener('input', filterTable);

        function filterTable() {
            const filterPoliklinik = document.getElementById('filter-poliklinik').value.toLowerCase();
            const searchName = document.getElementById('search-name').value.toLowerCase();
            const rows = document.querySelectorAll('tbody tr');

            rows.forEach(row => {
                const poli = row.cells[2].innerText.toLowerCase();
                const name = row.cells[1].innerText.toLowerCase();

                if ((poli.includes(filterPoliklinik) || filterPoliklinik === "") &&
                    name.includes(searchName)) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        }
    </script>
@endsection
