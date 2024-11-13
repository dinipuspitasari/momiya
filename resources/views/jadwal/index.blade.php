@extends('layouts.admin')

@section('title', 'Momiya Medical Clinic | Jadwal')

@section('content')

    {{--  Content --}}
    <div class="container">
        <div class="mt-3 pb-4">        
            <label for="table-search" class="sr-only">Search</label>

            {{-- button tambah jadwal --}}
            <div class="flex md:flex-row flex-col-reverse gap-y-2 md:gap-y-0 md:justify-between items-center">
                <div class="relative w-full">
                    <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="text" id="table-search"
                        class="block pt-2 w-full md:w-auto ps-10 text-sm text-gray-900 border border-gray-300 rounded-full bg-white focus:ring-blue-300 focus:border-grau-300 "
                        placeholder="Cari">
                </div>
                <a type="button"
                    class="flex items-center justify-center text-white w-full md:w-48 bg-gray-900 hover:bg-gray-700 focus:ring-4 focus:ring-blue-300 font-medium text-sm px-1 py-2 sm:mb-0 rounded-full"
                    href={{ url('/jadwal/create') }}>
                    <svg class="w-5 h-5 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 12h14m-7 7V5" />
                    </svg>
                    Tambah Jadwal</a>
            </div>

        </div>

    </div>
    <div class="col">
        <h2 class="mt-2 text-xl mb-1 font-semibold"> Data Jadwal Dokter</h2>
        <hr>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-900 px-10 ">
            <thead class="text-xs text-white uppercase bg-gray-900 h-8">
                <tr align="center">
                    <th class="border border-gray-300 px-2 py-2">No</th>
                    <th class="border border-gray-300 px-2 py-2">Nama Dokter</th>
                    <th class="border border-gray-300 px-2 py-2">Poli</th>
                    <th class="border border-gray-300 px-2 py-2">Hari</th>
                    <th class="border border-gray-300 px-2 py-2">Jam Mulai</th>
                    <th class="border border-gray-300 px-2 py-2">Jam Selesai</th>
                    <th class="border border-gray-300 px-2 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jadwals as $jadwal)
                    <tr align="center" class="bg-white border-b text-gray-900">
                        <th class="border border-gray-300 px-2 py-2">{{ $loop->iteration }}</th>
                        <td class="border border-gray-300 px-2 py-2">{{ $jadwal->dokter->user->name }}</td>
                        <td class="border border-gray-300 px-2 py-2">{{ $jadwal->poliklinik->nama_poli }}</td>
                        <td class="border border-gray-300 px-2 py-2">{{ $jadwal->hari }}</td>
                        <td class="border border-gray-300 px-2 py-2">{{ $jadwal->jam_mulai }}</td>
                        <td class="border border-gray-300 px-2 py-2">{{ $jadwal->jam_selesai }}</td>
                        <td class="flex items-center justify-center py-2 px-2">
                            <a href={{ url('/jadwal/edit/' . $jadwal->id) }} type="button"
                                class="text-white hover:bg-blue-200 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-1 py-1">
                                <svg class="w-5 h-5 text-gray-900 " aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                                </svg>
                            </a>
                            <a href={{ url('/jadwal/details/' . $jadwal->id) }} type="button"
                                class="text-gray-900 hover:bg-green-200 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-1 py-1">
                                <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11h2v5m-2 0h4m-2.592-8.5h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                  </svg>
                            </a>
                            <a href={{ url('/jadwal/delete/' . $jadwal->id) }}
                                onclick="return confirm('Anda Yakin ingin Menghapus Jadwal ini?')" type="button"
                                class="ms-2 text-white hover:bg-red-200 focus:ring-4 focus:ring-red-400 font-medium rounded-lg text-sm px-1 py-1">
                                <svg class="w-5 h-5 text-gray-900 " aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                </svg>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
