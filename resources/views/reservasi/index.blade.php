@extends('layouts.admin')

@section('title', 'Daftar Reservasi')

@section('content')
    <h1 class="text-3xl font-bold">Daftar Reservasi</h1>

    {{-- Button for New Reservation --}}
    <div class="flex justify-end pb-4">
        <a href="{{ route('reservasi.create') }}" 
           class="bg-blue-600 text-white font-medium px-4 py-2 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300">
           Tambah Reservasi
        </a>
    </div>

    <div class="relative overflow-x-auto">
        <div class="flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-between pb-4">
            <div>
                <label for="status-filter" class="mr-2">Filter by Status:</label>
                <select id="status-filter" class="inline-flex items-center text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-3 py-1.5">
                    <option value="all">All</option>
                    <option value="menunggu" class="text-red-600">menunggu</option>
                    <option value="disetujui" class="text-green-600">disetujui</option>
                    <option value="sudah datang" class="text-blue-600">sudah datang</option>
                </select>
            </div>
            <label for="table-search" class="sr-only">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 rtl:inset-r-0 rtl:right-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <input type="text" id="table-search" class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Search for items">
            </div>
        </div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-900 rounded-sm">
            <thead class="text-xs text-gray-900 uppercase bg-gray-300">
                <tr>
                    <th scope="col" class="px-6 py-3">Nama Anak</th>
                    <th scope="col" class="px-6 py-3">Tanggal Kedatangan</th>
                    <th scope="col" class="px-6 py-3">Status</th>
                    <th scope="col" class="px-6 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reservasis as $reservasi)
                <tr class="bg-white border-b hover:bg-gray-50" data-status="{{ $reservasi->status }}">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ $reservasi->nama_anak }}</th>
                    <td class="px-6 py-4">{{ $reservasi->tanggal_kedatangan }}</td>
                    <td class="px-6 py-4">
                        <span class="
                            {{ $reservasi->status == 'menunggu' ? 'bg-red-600 text-white px-8 py-1 rounded-full font-medium' : '' }}
                            {{ $reservasi->status == 'disetujui' ? 'bg-green-600 text-white px-6 py-1 rounded-full font-medium' : '' }}
                            {{ $reservasi->status == 'sudah datang' ? 'bg-blue-600 text-white px-6 py-1 rounded-full font-medium' : '' }}">
                            {{ ucfirst($reservasi->status) }}
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{ route('reservasi.show', $reservasi->id) }}" class="btn btn-info">Detail</a> |
                        <a href="{{ route('reservasi.edit', $reservasi->id) }}" class="btn btn-warning">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const statusFilter = document.getElementById('status-filter');
            const searchInput = document.getElementById('table-search');
            const tableRows = document.querySelectorAll('tbody tr');
    
            // Filter function
            function filterTable() {
                const searchValue = searchInput.value.toLowerCase();
                const selectedStatus = statusFilter.value;
    
                tableRows.forEach(row => {
                    const namaAnak = row.cells[0].textContent.toLowerCase();
                    const status = row.getAttribute('data-status');
    
                    // Check if row matches search and selected status
                    const matchesSearch = namaAnak.includes(searchValue);
                    const matchesStatus = selectedStatus === 'all' || status === selectedStatus;
    
                    if (matchesSearch && matchesStatus) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            }
    
            // Event listeners for filtering
            statusFilter.addEventListener('change', filterTable);
            searchInput.addEventListener('input', filterTable);
        });
    </script>
    
@endsection
