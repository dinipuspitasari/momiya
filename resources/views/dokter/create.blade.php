@extends('layouts.admin')

@section('title', 'Tambah Dokter')

@section('content')

<div class="container mx-auto mt-10 pb-20">
    <div class="max-w-2xl mx-auto bg-white shadow-xl rounded-lg p-8">
        <h2 class="text-center text-4xl font-bold text-gray-800 mb-8">Tambah Dokter</h2>
        
        {{-- Form untuk menambah dokter --}}
        <form action="{{ route('dokter.create') }}" method="POST" class="space-y-6">
            @csrf

            {{-- Input Nama Dokter --}}
            <div>
                <label for="name" class="block text-sm font-semibold text-gray-600">Nama Dokter</label>
                <input type="text" name="name" id="name" placeholder="Masukkan Nama Dokter"
                       value="{{ old('name') }}" required
                       class="w-full px-4 py-2 mt-2 text-gray-700 bg-gray-50 border border-gray-300 rounded-lg focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200">
            </div>

            {{-- Input NIK --}}
            <div>
                <label for="nik" class="block text-sm font-semibold text-gray-600">NIK</label>
                <input type="text" name="nik" id="nik" placeholder="Masukkan NIK" value="{{ old('nik') }}" required
                       class="w-full px-4 py-2 mt-2 text-gray-700 bg-gray-50 border border-gray-300 rounded-lg focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200">
            </div>

            {{-- Input No KK --}}
            <div>
                <label for="no_kk" class="block text-sm font-semibold text-gray-600">No KK</label>
                <input type="text" name="no_kk" id="no_kk" placeholder="Masukkan No KK" value="{{ old('no_kk') }}" required
                       class="w-full px-4 py-2 mt-2 text-gray-700 bg-gray-50 border border-gray-300 rounded-lg focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200">
            </div>

            {{-- Input No Telepon --}}
            <div>
                <label for="no_telp" class="block text-sm font-semibold text-gray-600">No Telepon</label>
                <input type="text" name="no_telp" id="no_telp" placeholder="Masukkan No Telepon" value="{{ old('no_telp') }}" required
                       class="w-full px-4 py-2 mt-2 text-gray-700 bg-gray-50 border border-gray-300 rounded-lg focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200">
            </div>

            {{-- Input Alamat --}}
            <div>
                <label for="alamat" class="block text-sm font-semibold text-gray-600">Alamat</label>
                <textarea name="alamat" id="alamat" placeholder="Masukkan Alamat" required
                          class="w-full px-4 py-2 mt-2 text-gray-700 bg-gray-50 border border-gray-300 rounded-lg focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200">{{ old('alamat') }}</textarea>
            </div>

            {{-- Input Email --}}
            <div>
                <label for="email" class="block text-sm font-semibold text-gray-600">Email</label>
                <input type="email" name="email" id="email" placeholder="Masukkan Email" value="{{ old('email') }}" required
                       class="w-full px-4 py-2 mt-2 text-gray-700 bg-gray-50 border border-gray-300 rounded-lg focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200">
            </div>

            {{-- Input Password --}}
            <div>
                <label for="password" class="block text-sm font-semibold text-gray-600">Password</label>
                <input type="password" name="password" id="password" placeholder="Masukkan Password" required
                       class="w-full px-4 py-2 mt-2 text-gray-700 bg-gray-50 border border-gray-300 rounded-lg focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200">
            </div>

            {{-- Input Spesialis --}}
            <div>
                <label for="spesialis" class="block text-sm font-semibold text-gray-600">Spesialis</label>
                <input type="text" name="spesialis" id="spesialis" placeholder="Masukkan Spesialis Dokter" value="{{ old('spesialis') }}" required
                       class="w-full px-4 py-2 mt-2 text-gray-700 bg-gray-50 border border-gray-300 rounded-lg focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200">
            </div>

            {{-- Input Poliklinik (Dropdown dari Poli) --}}
            <div>
                <label for="poli_id" class="block text-sm font-semibold text-gray-600">Poliklinik</label>
                <select name="poli_id" id="poli_id" required
                        class="w-full px-4 py-2 mt-2 text-gray-700 bg-gray-50 border border-gray-300 rounded-lg focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200">
                    <option value="" disabled selected>Pilih Poliklinik</option>
                    @foreach($polikliniks as $poli)
                        <option value="{{ $poli->id }}">{{ $poli->nama_poli }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Tombol Submit --}}
            <div class="flex justify-center">
                <button type="submit"
                        class="w-full md:w-auto px-6 py-3 mt-4 bg-blue-200 hover:bg-blue-400 text-gray font-semibold rounded-lg shadow-lg transition duration-300 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-blue-300">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
