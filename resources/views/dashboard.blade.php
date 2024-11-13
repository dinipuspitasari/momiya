@extends('layouts.admin')

@section('title', 'Electric Pay | Pelanggan')

@section('content')

    {{--  Content --}}
    <div class="flex items-center justify-between p-6 bg-white card mb-6">
            <!-- Header -->
                <div>
                    <h1 class="text-2xl font-bold">Hai, {{ Auth::user()->name }}</h1>
                    <p class="text-gray-500">Semoga harimu menyenangkan dan jangan lupa menjaga kesehatan!</p>
                </div>
                <div>
                    <img src="/assets/img/11.png" alt="Doctor Image" class="w-44">
                </div>
            </div>
    
            @if (Auth::user()->level_id == 1)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="p-6 bg-white card " id="info-card">
                    <h2 class="text-xl font-semibold item"><svg class="w-20 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm-1.5 8a4 4 0 0 0-4 4 2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-3Zm6.82-3.096a5.51 5.51 0 0 0-2.797-6.293 3.5 3.5 0 1 1 2.796 6.292ZM19.5 18h.5a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-1.1a5.503 5.503 0 0 1-.471.762A5.998 5.998 0 0 1 19.5 18ZM4 7.5a3.5 3.5 0 0 1 5.477-2.889 5.5 5.5 0 0 0-2.796 6.293A3.501 3.501 0 0 1 4 7.5ZM7.1 12H6a4 4 0 0 0-4 4 2 2 0 0 0 2 2h.5a5.998 5.998 0 0 1 3.071-5.238A5.505 5.505 0 0 1 7.1 12Z" clip-rule="evenodd"/>
                      </svg> 
                      Total Pasien</h2>
                    <p class="text-2xl font-bold text-red-500">{{$getTotalPasien}}</p>
                </div>
            @endif
@endsection
