@extends('layouts.admin')

@section('title', 'Manajemen Reservasi')

@section('content')
    <h1 class="text-3xl font-semibold mb-4">Manajemen Reservasi</h1>
    
    @if (session('success'))
        <div class="alert alert-success mb-4 bg-green-100 text-green-800 border border-green-400 rounded-lg p-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- Filter by Status --}}
    <div class="flex justify-end mb-4">
        <label for="status-filter" class="mr-2 text-lg">Filter by Status:</label>
        <select id="status-filter" class="inline-flex items-center text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-4 py-2">
            <option value="all">All</option>
            <option value="menunggu" class="text-red-600">Menunggu</option>
            <option value="disetujui" class="text-green-600">Disetujui</option>
            <option value="sudah datang" class="text-blue-600">Sudah Datang</option>
        </select>
    </div>

    <table class="table-auto w-full mt-4 text-left">
        <thead>
            <tr class="bg-gray-100">
                <th class="px-6 py-3 text-sm font-medium text-gray-500">Nama Orang Tua</th>
                <th class="px-6 py-3 text-sm font-medium text-gray-500">Nama Anak</th>
                <th class="px-6 py-3 text-sm font-medium text-gray-500">Tanggal Kedatangan</th>
                <th class="px-6 py-3 text-sm font-medium text-gray-500">Status</th>
                <th class="px-6 py-3 text-sm font-medium text-gray-500">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservasis as $reservasi)
                <tr class="border-b" data-status="{{ $reservasi->status }}">
                    <td class="px-6 py-4 text-sm text-gray-700">{{ $reservasi->pasien->name }}</td>
                    <td class="px-6 py-4 text-sm text-gray-700">{{ $reservasi->nama_anak }}</td>
                    <td class="px-6 py-4 text-sm text-gray-700"> {{ \Carbon\Carbon::parse($reservasi->tanggal_kedatangan)->locale('id')->isoFormat('dddd, D MMMM YYYY') }}</td>
                    <td class="px-6 py-4 text-sm text-gray-700">
                        <span class="
                            {{ $reservasi->status == 'menunggu' ? 'bg-red-600 text-white' : '' }}
                            {{ $reservasi->status == 'disetujui' ? 'bg-green-600 text-white' : '' }}
                            {{ $reservasi->status == 'sudah datang' ? 'bg-blue-600 text-white' : '' }}
                            inline-block px-3 py-1 rounded-full font-medium">
                            {{ ucfirst($reservasi->status) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-sm">
                        <a href="{{ route('reservasi.adminShow', $reservasi->id) }}" class="btn btn-info py-2 px-4 text-white bg-blue-600 rounded hover:bg-blue-700">Detail</a>
                        <form action="{{ route('reservasi.updateStatus', $reservasi->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PUT')
                            <select name="status" class="inline-flex items-center text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-3 py-1.5" onchange="this.form.submit()">
                                <option value="menunggu" {{ $reservasi->status == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                                <option value="disetujui" {{ $reservasi->status == 'disetujui' ? 'selected' : '' }}>Disetujui</option>
                                <option value="sudah datang" {{ $reservasi->status == 'sudah datang' ? 'selected' : '' }}>Sudah Datang</option>
                            </select>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const statusFilter = document.getElementById('status-filter');
            const tableRows = document.querySelectorAll('tbody tr');

            // Filter function
            function filterTable() {
                const selectedStatus = statusFilter.value;
                tableRows.forEach(row => {
                    const status = row.getAttribute('data-status');
                    if (selectedStatus === 'all' || status === selectedStatus) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            }

            // Event listener for filtering
            statusFilter.addEventListener('change', filterTable);
        });
    </script>
@endsection
