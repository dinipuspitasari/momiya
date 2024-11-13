@extends('layouts.admin')

@section('title', 'Detail Reservasi')

@section('content')
    <h1 class="text-3xl font-semibold mb-6">Detail Reservasi</h1>
    
    <div class="bg-white p-6 rounded-lg shadow-md">
        <div class="grid grid-cols-2 gap-4">
            <div>
                <p class="text-lg font-medium text-gray-700"><strong>Nama Orang Tua:</strong></p>
                <p class="text-gray-600">{{ $reservasi->pasien->name }}</p>
            </div>
            <div>
                <p class="text-lg font-medium text-gray-700"><strong>Nama Anak:</strong></p>
                <p class="text-gray-600">{{ $reservasi->nama_anak }}</p>
            </div>
            <div>
                <p class="text-lg font-medium text-gray-700"><strong>NIK Anak:</strong></p>
                <p class="text-gray-600">{{ $reservasi->nik_anak }}</p>
            </div>
            <div>
                <p class="text-lg font-medium text-gray-700"><strong>No KK:</strong></p>
                <p class="text-gray-600">{{ $reservasi->no_kk_anak }}</p>
            </div>
            <div>
                <p class="text-lg font-medium text-gray-700"><strong>Dokter:</strong></p>
                <p class="text-gray-600">{{ $reservasi->dokter->user->name }}</p>
            </div>
            <div>
                <p class="text-lg font-medium text-gray-700"><strong>Poliklinik:</strong></p>
                <p class="text-gray-600">{{ $reservasi->poli->nama_poli }}</p>
            </div>
            <div>
                <p class="text-lg font-medium text-gray-700"><strong>Tanggal Kedatangan:</strong></p>
                <p class="text-gray-600">
                    {{ \Carbon\Carbon::parse($reservasi->tanggal_kedatangan)->locale('id')->isoFormat('dddd, D MMMM YYYY') }}
                </p>
            </div>
            <div>
                <p class="text-lg font-medium text-gray-700"><strong>Jam Reservasi:</strong></p>
                <p class="text-gray-600">{{ $reservasi->jam_reservasi }}</p>
            </div>
            <div>
                <p class="text-lg font-medium text-gray-700"><strong>Status:</strong></p>
                <p class="text-gray-600">{{ ucfirst($reservasi->status) }}</p>
            </div>
        </div>

        <div class="mt-6 flex justify-end">
            <a href="{{ route('reservasi.adminIndex') }}" class="btn btn-secondary py-2 px-4 bg-gray-600 text-white rounded-lg hover:bg-gray-700">
                Kembali
            </a>
        </div>
    </div>
@endsection
