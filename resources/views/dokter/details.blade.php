@extends('layouts.admin')

@section('title', 'Electric Pay | Detail Dokter')

@section('content')
    <div class="container mb-10">
    <div class="col">
        <div class="flex justify-between">
            <h2 class="text-3xl"> Detail Dokter</h2>
        </div>
    </div>
        </br>
        </br>
        <div class="card">
            <div class="credit-card shadow-lg flex flex-col justify-between">
                <div class="flex justify-end mb-4">
                    <div class="text-lg font-bold">Momiya Medical Clinic</div>
                </div>
                <div class="card-number text-2xl font-mono tracking-wide">
                    {{  $dokter->user->name }}
                </div>
                <div class="flex justify-between items-center mt-4">
                    <div>
                        <div class="text-sm">Spesialis</div>
                        <div class="text-sm font-mono">{{  $dokter->spesialis }}</div>
                        <div class="text-medium font-semibold uppercase">{{ $dokter->poliklinik->nama_poli}}</div>
                    </div>
                    <div>
                        <img src="/assets/img/logo.png" alt="E-Pay Logo" class="card-logo">
                    </div>
                </div>
            </div>
        
            <div class="card-body mt-5">
                <table class="w-full text-sm text-left rtl:text-right bg-white rounded">
                    <tr>
                        <th scope="col" class="px-6 py-3">NIK</th>
                        <td scope="col" class="px-6 py-3">{{  $dokter->user->nik }}</td>
                    </tr>
                    <tr>
                        <th scope="col" class="px-6 py-3">Nama Dokter</th>
                        <td scope="col" class="px-6 py-3">{{  $dokter->user->name }}</td>
                    </tr>
                    <tr>
                        <th scope="col" class="px-6 py-3">Email</th>
                        <td scope="col" class="px-6 py-3">{{  $dokter->user->email }}</td>
                    </tr>
                    <tr>
                        <th scope="col" class="px-6 py-3">Alamat</th>
                        <td scope="col" class="px-6 py-3">{{   $dokter->user->alamat }}</td>
                    </tr>
                    <tr>
                        <th scope="col" class="px-6 py-3">Nomor Telp</th>
                        <td scope="col" class="px-6 py-3">{{  $dokter->user->no_telp }}</td>
                    </tr>
                    <tr>
                        <th scope="col" class="px-6 py-3">Spesialis</th>
                        <td scope="col" class="px-6 py-3">{{   $dokter->spesialis }}</td>
                    </tr>
                    <tr>
                        <th scope="col" class="px-6 py-3">Poliklinik</th>
                        <td scope="col" class="px-6 py-3">{{   $dokter->poliklinik->nama_poli}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
