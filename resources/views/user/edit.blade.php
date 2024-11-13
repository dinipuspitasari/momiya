@extends('layouts.admin')

@section('title', 'Momiya Medical Clinic | User')

@section('content')

    {{--  Content --}}
    <div class="container pb-10">
        <div class="col">
        <h2 class="text-3xl"> Edit User</h2>
        <hr>
        </div>
            <div class="row">
                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <form action={{url('/user/update/'.$user->id)}} method="POST" enctype="multipart/form-data" class="w-3/5">
                                @csrf
    
                                <div class="form-group row mb-5">
                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nama</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-900 focus:border-gray-300 block w-full p-2.5 " name="name" value="{{$user->name}}" placeholder="Masukkan Nama">
                                    </div>
                                </div>
    
                                <div class="form-group row mb-5">
                                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-900 focus:border-gray-300 block w-full p-2.5 " name="email" value="{{$user->email}}" placeholder="Masukkan Email">
                                    </div>
                                </div>
                                
                                {{-- Input untuk NIK --}}
                                <div class="form-group row mb-5">
                                    <label for="nik" class="block mb-2 text-sm font-medium text-gray-900">NIK</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-900 focus:border-gray-300 block w-full p-2.5 " name="nik" value="{{$user->nik}}" placeholder="Masukkan NIK">
                                    </div>
                                </div>

                                {{-- Input untuk No KK --}}
                                <div class="form-group row mb-5">
                                    <label for="no_kk" class="block mb-2 text-sm font-medium text-gray-900">No KK</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-900 focus:border-gray-300 block w-full p-2.5 " name="no_kk" value="{{$user->no_kk}}" placeholder="Masukkan No KK">
                                    </div>
                                </div>

                                {{-- Input untuk No Telp --}}
                                <div class="form-group row mb-5">
                                    <label for="no_telp" class="block mb-2 text-sm font-medium text-gray-900">No Telp</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-900 focus:border-gray-300 block w-full p-2.5 " name="no_telp" value="{{$user->no_telp}}" placeholder="Masukkan No Telp">
                                    </div>
                                </div>

                                {{-- Input untuk Alamat --}}
                                <div class="form-group row mb-5">
                                    <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900">Alamat</label>
                                    <div class="col-sm-10">
                                        <textarea class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-900 focus:border-gray-300 block w-full p-2.5 " name="alamat" placeholder="Masukkan Alamat">{{$user->alamat}}</textarea>
                                    </div>
                                </div>

                                <button type="submit" class="text-white bg-gray-900 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
