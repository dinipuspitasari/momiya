@extends('layouts.admin')

@section('title', 'Buat Reservasi')

@section('content')
<div class="container mx-auto mt-10 max-w-2xl">
    <h2 class="text-3xl font-semibold text-center mb-6">Buat Reservasi</h2>
    <hr class="mb-6">

    <form action="{{ route('reservasi.store') }}" method="POST">
        @csrf

        {{-- Pilih Dokter --}}
        <div class="mb-4">
            <label for="dokter_id" class="block text-sm font-medium text-gray-700">Dokter</label>
            <select class="block w-full px-4 py-2 mt-1 text-gray-900 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" name="dokter_id" id="dokter_id" required>
                <option value="" disabled selected>Pilih Dokter</option>
                @foreach($dokters as $dokter)
                <option value="{{ $dokter->id }}" data-poli="{{ $dokter->poli_id }}">
                    {{ $dokter->user->name ?? 'Nama tidak tersedia' }}
                </option>
                @endforeach
            </select>
        </div>

        {{-- Pilih Poliklinik --}}
        <div class="mb-4">
            <label for="poli_id" class="block text-sm font-medium text-gray-700">Poliklinik</label>
            <select class="block w-full px-4 py-2 mt-1 text-gray-900 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" name="poli_id" id="poli_id" required>
                <option value="" disabled selected>Pilih Poliklinik</option>
                @foreach($polikliniks as $poli)
                    <option value="{{ $poli->id }}">{{ $poli->nama_poli }}</option>
                @endforeach
            </select>
        </div>

        {{-- Input Nama Anak --}}
        <div class="mb-4">
            <label for="nama_anak" class="block text-sm font-medium text-gray-700">Nama Anak</label>
            <input type="text" class="block w-full px-4 py-2 mt-1 text-gray-900 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" name="nama_anak" id="nama_anak" required>
        </div>

        {{-- Input NIK Anak --}}
        <div class="mb-4">
            <label for="nik_anak" class="block text-sm font-medium text-gray-700">NIK Anak</label>
            <input type="text" class="block w-full px-4 py-2 mt-1 text-gray-900 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" name="nik_anak" id="nik_anak" required>
        </div>

        {{-- Input No KK --}}
        <div class="mb-4">
            <label for="no_kk_anak" class="block text-sm font-medium text-gray-700">No KK</label>
            <input type="text" class="block w-full px-4 py-2 mt-1 text-gray-900 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" name="no_kk_anak" id="no_kk_anak" required>
        </div>

        {{-- Input Tanggal Kedatangan --}}
        <div class="mb-4">
            <label for="tanggal_kedatangan" class="block text-sm font-medium text-gray-700">Tanggal Kedatangan</label>
            <input type="date" class="block w-full px-4 py-2 mt-1 text-gray-900 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" name="tanggal_kedatangan" id="tanggal_kedatangan" required>
        </div>

        {{-- Input Jam Reservasi --}}
        <div class="mb-4">
            <label for="jam_reservasi" class="block text-sm font-medium text-gray-700">Jam Reservasi</label>
            <input type="time" class="block w-full px-4 py-2 mt-1 text-gray-900 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" name="jam_reservasi" id="jam_reservasi" required>
        </div>

        {{-- Tombol Submit --}}
        <div class="text-center">
            <button type="submit" class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:ring-4 focus:ring-blue-500">
                Buat Reservasi
            </button>
        </div>
    </form>
</div>

<script>
document.getElementById('dokter_id').addEventListener('change', function() {
    var selectedOption = this.options[this.selectedIndex];
    var poliId = selectedOption.getAttribute('data-poli');

    // Set the selected poliklinik in the poli_id dropdown
    var poliSelect = document.getElementById('poli_id');
    for (var i = 0; i < poliSelect.options.length; i++) {
        if (poliSelect.options[i].value == poliId) {
            poliSelect.selectedIndex = i; // Set selected option
            break;
        }
    }
});
</script>
@endsection
