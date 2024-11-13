@extends('layouts.admin')

@section('title', 'Tambah Jadwal Dokter')

@section('content')

<div class="container mx-auto mt-10 max-w-2xl p-6 bg-white shadow-md rounded-lg">
    <h2 class="text-2xl font-semibold text-gray-800 text-center mb-6">Tambah Jadwal Dokter</h2>

    {{-- Form untuk menambah jadwal --}}
    <form action="{{ route('jadwal.store') }}" method="POST" class="space-y-5">
        @csrf

        {{-- Pilih Dokter --}}
        <div class="space-y-2">
            <label for="dokter_id" class="text-gray-700">Dokter</label>
            <select id="dokter_id" name="dokter_id" required
                class="w-full border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                <option value="" disabled selected>Pilih Dokter</option>
                @foreach($dokters as $dokter)
                    <option value="{{ $dokter->id }}">{{ $dokter->user->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- Pilih Poliklinik --}}
        <div class="space-y-2">
            <label for="poli_id" class="text-gray-700">Poliklinik</label>
            <select id="poli_id" name="poli_id" required
                class="w-full border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                <option value="" disabled selected>Pilih Poliklinik</option>
            </select>
        </div>

        {{-- Input Hari --}}
        <div class="space-y-2">
            <label for="hari" class="text-gray-700">Hari</label>
            <input type="text" id="hari" name="hari" placeholder="Masukkan Hari"
                value="{{ old('hari') }}" required
                class="w-full border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
        </div>

        {{-- Input Jam Mulai --}}
        <div class="space-y-2">
            <label for="jam_mulai" class="text-gray-700">Jam Mulai</label>
            <input type="time" id="jam_mulai" name="jam_mulai" required
                value="{{ old('jam_mulai') }}"
                class="w-full border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
        </div>

        {{-- Input Jam Selesai --}}
        <div class="space-y-2">
            <label for="jam_selesai" class="text-gray-700">Jam Selesai</label>
            <input type="time" id="jam_selesai" name="jam_selesai" required
                value="{{ old('jam_selesai') }}"
                class="w-full border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
        </div>

        {{-- Tombol Submit --}}
        <button type="submit"
            class="w-full bg-blue-200 text-gray font-semibold py-2 rounded-lg hover:bg-blue-400 focus:ring-4 focus:ring-blue-300">
            Simpan
        </button>
    </form>
</div>

{{-- JavaScript for fetching poliklinik --}}
<script>
    document.getElementById('dokter_id').addEventListener('change', function () {
        var dokterId = this.value;
        var poliSelect = document.getElementById('poli_id');

        // Clear current options in poliklinik
        poliSelect.innerHTML = '<option value="" disabled selected>Pilih Poliklinik</option>';

        if (dokterId) {
            // Fetch poliklinik based on selected dokter
            fetch(`/get-poli/${dokterId}`)
                .then(response => response.json())
                .then(data => {
                    poliSelect.innerHTML = `<option value="${data.id}">${data.nama_poli}</option>`;
                })
                .catch(error => console.error('Error:', error));
        }
    });
</script>

@endsection
