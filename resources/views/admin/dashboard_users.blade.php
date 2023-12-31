@extends('admin.adminlayout.mainadmin')

@section('title', 'Daftar Pengguna')

@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Daftar Pengguna</title>
</head>

    <body >
    <div class="p-4 md:ml-64 h-auto pt-20">


        <section class="bg-gray-50 dark:bg-gray-900 p-3 base:p-5">
            <div class="mx-auto max-w-screen px-0">
                <!-- Start coding here -->
                <div class="bg-white dark:bg-gray-800 relative shadow-md base:rounded-lg overflow-hidden">
                    <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                        <div class="w-full md:w-1/2">
                        </div>
                        {{-- <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                            <a href="{{ route('add_user') }}" class="flex items-center justify-center text-white bg-primary hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-base px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                                <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                                </svg>
                                Tambah Data Pengguna
                            </a>
                        </div> --}}
                        <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                            <button id="tambahDataButton" data-modal-target="tambahData" data-modal-toggle="tambahData" class="flex items-center justify-center text-white bg-primary hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-base px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800" type="button">
                                <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                                </svg>
                                Tambah Data Pengguna
                            </button>
                        </div>
                        <!-- Main modal -->
                        <div id="tambahData" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                            <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                                <!-- Modal content -->
                                <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                                    <!-- Modal header -->
                                    <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                            Tambah Data Pengguna
                                        </h3>
                                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="tambahData">
                                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <!-- Modal body -->
                                    <form action="{{ route('add_user_action') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        {{-- Nama Item --}}
                                        <div>
                                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Pengguna</label>
                                            <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="Maria Veronica" required="">
                                        </div>
                                        {{-- category --}}
                                        <div>
                                            <label for="nohp" class="block mb-2 text-sm font-medium text-gray-900 ">No Hp</label>
                                            <input type="text" name="nohp" id="nohp" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="08473859643" required="">
                                        </div>
                                        {{-- desc --}}
                                        <div>
                                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">email</label>
                                            <input type="text" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="asep@mail.com" required="">
                                        </div>
                                        {{-- Photo --}}
                                        <div>
                                            <label for="photo" class="block mb-2 text-sm font-medium text-gray-900">Upload Foto</label>
                                            <input type="file" name="photo" id="photo" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50  focus:outline-none" aria-describedby="file_input_help" id="file_input" >
                                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">Format yang diterima : JPEG, PNG, JPG Maks, 2 Mb</p>
                                        </div>
                                        {{-- Pass --}}
                                        <div>
                                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                                            <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " required="">
                                            @error('password')
                                            <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        {{-- Konfirmasi Pass --}}
                                        <div>
                                            <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Konfirmasi Password</label>
                                            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " required="">
                                        </div>
                                        <button type="submit" class=" text-white inline-flex items-center bg-primary hover:bg-primary2 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                            <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                                            Tambahkan Kategori
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-base text-left text-gray-500 dark:text-gray-400">
                            {{-- Table Header --}}
                            <thead class="text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-4 py-3">Name</th>
                                    <th scope="col" class="px-4 py-3">Nomor Hp</th>
                                    <th scope="col" class="px-4 py-3">email</th>
                                    <th scope="col" class="px-4 py-3">Role</th>
                                    <th scope="col" class="px-4 py-3">Aksi</th>
                                </tr>
                            </thead>

                            {{-- data --}}
                            <tbody>
                                @foreach ($AllUserData as $data)
                                <tr class="border-b dark:border-gray-700">
                                    <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap ">
                                        <div class="grid grid-cols-2 md:grid-cols-3 gap-2 w-[100px]">
                                            {{-- Profile --}}
                                                {{-- Gambar --}}
                                                    <div class="pl-4 grid auto-cols-max">
                                                        {{-- <img class="w-16 h-16 aspect-square rounded-full" src="{{ asset('upload/foto-profile/' . auth()->user()->foto) }}" alt="user_pfp"> --}}
                                                        @if ($data->photo)
                                                            <img class="w-16 h-16 aspect-square rounded-full" src="{{ $data->photo }}" alt="user_pfp">
                                                        @else
                                                            <img class="w-16 h-16 aspect-square rounded-full" src="{{ asset('/default_profile.png') }}" alt="default_pfp">
                                                        @endif
                                                    </div>

                                                {{-- Nama --}}
                                                    <div class="flex items-center justify-start ">
                                                        <div class="pl-16 w-16 ">
                                                            <h1 class="  break-normal">{{ $data->name }}</h1>
                                                        </div>
                                                    </div>
                                                </div>
                                    </th>
                                    <td class="px-4 py-3">{{ $data->nohp }}</td>
                                    <td class="px-4 py-3">{{ $data->email }}</td>
                                    <td class="px-4 py-3">{{ $data->role == 0 ? 'Admin' : 'Personal' }}</td>


                                    <td class="w-36">
                                        {{-- Start of Edit --}}
                                            {{-- Button Toggle --}}
                                            <div class="flex justify-center items-center pb-2">
                                                <button id="editItemData" data-modal-toggle="editItemData-{{ $data->id }}" class="w-[103px] bg-primary text-white inline-flex items-center hover:text-white border border-cyan hover:bg-turqoise focus:ring-4 focus:outline-none focus:ring-cyanoutline font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="submit">
                                                    <svg class="mr-1 -ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path>
                                                        <path clip-rule="evenodd" fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"></path>
                                                    </svg>
                                                    Edit
                                                </button>
                                            </div>



                                            <!-- Pop-Up Edit -->
                                            <div id="editItemData-{{ $data->id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                                                <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                                                    {{-- Isi Modal Edit --}}
                                                    <div class="relative p-4 bg-white rounded-lg shadow base:p-5">
                                                        <!-- Header Modal Edit -->
                                                        <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b base:mb-5 dark:border-gray-600">
                                                            <h3 class="text-lg font-semibold text-gray-900">
                                                                Edit Data Pengguna
                                                            </h3>
                                                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-base p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="editItemData-{{ $data->id }}">
                                                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                                <span class="sr-only">Tutup modal</span>
                                                            </button>
                                                        </div>

                                                        <!-- Modal body -->
                                                        <form action="{{ route('update_user', ['id' => $data->id]) }}" method="POST" enctype="multipart/form-data">
                                                            @method('put')
                                                            @csrf
                                                            <div class="pb-8">
                                                                {{-- Nama Pengguna --}}
                                                                <div>
                                                                    <label for="name" class="block mb-2 text-base text-start font-medium text-gray-900 ">Nama Pengguna</label>
                                                                    <input value="{{ $data->name }}" required type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-turqoise focus:border-turqoise block w-full p-2.5 " placeholder="SERTIFIKASI">
                                                                </div>

                                                                {{-- Email --}}
                                                                <div>
                                                                    <label for="email" class="block mb-2 mt-4 text-base font-medium text-gray-900 dark:text-white">Harga</label>
                                                                    <input value="{{ $data->email }}" type="text" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 base:text-base rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="asep@mail.com" required="">
                                                                </div>
                                                                {{-- nohp --}}
                                                                <div>
                                                                    <label for="nohp" class="block mb-2 mt-4 text-base text-start font-medium text-gray-900 ">Nomor Hp </label>
                                                                    <input value="{{ $data->nohp }}" type="text" name="nohp" id="nohp" class="bg-gray-50 border border-gray-300 text-gray-900 base:text-base rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="asep@mail.com" required="">
                                                                </div>
                                                                {{-- Role --}}
                                                                <div>
                                                                    <label for="role" class="block mb-2 mt-4 text-base text-start font-medium text-gray-900 ">Role</label>
                                                                    <select name="role" id="role" class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                                                                        {{-- @foreach($roleType as $category) --}}
                                                                        @foreach($roleType as $value => $category)
                                                                            <option {{ $value == $data->role ? 'selected' : '' }} value="{{ $value }}">{{ $category }}</option>
                                                                            {{-- <option {{ $value == $data->role ? 'selected' : '' }} value="{{ $value }}">{{ $category }}</option> --}}
                                                                        @endforeach
                                                                        <option selected value="{{ $data->role }}">{{ $data->role == 0 ? 'Admin' : 'Personal' }}</option>
                                                                    </select>
                                                                </div>
                                                                {{-- Photo --}}
                                                                <div>
                                                                    <label for="photo" class="block mb-2 mt-4 text-base font-medium text-gray-900">Upload file</label>
                                                                    <input type="file" name="photo" id="photo" class="block w-full text-base text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50  focus:outline-none" aria-describedby="file_input_help" id="file_input" >
                                                                    <input type="hidden" name="default_photo" id="default_photo" value="{{ $data->photo }}">
                                                                    <p class="mt-1 text-base text-gray-500 dark:text-gray-300" id="file_input_help">Format yang diterima : JPEG, PNG, JPG Maks, 2 Mb</p>
                                                                </div>
                                                            </div>

                                                            {{-- CTA Buttons --}}
                                                            <div class="flex justify-center items-center space-x-4">
                                                                <button type="submit" class="text-white bg-primary hover:bg-primary2 focus:ring-4 focus:outline-cyanoutline focus:ring-cyanoutline font-medium rounded-lg text-base px-5 py-2.5 text-center ">
                                                                    Ubah Data
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                        {{-- End of Edit --}}

                                    {{-- Start of Delete --}}
                                    <div class="flex justify-center m-0 pb-0">
                                        <button id="deleteButton" data-modal-toggle="deleteModal-{{ $data->id }}" type="submit" class="bg-red text-white inline-flex items-center hover:text-white border border-red-600 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center " type="button">
                                            <svg class="mr-1 -ml-1 w-5 h-5" fill="#FFFFFF" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                            </svg>
                                            Hapus
                                        </button>
                                    </div>

                                        <!-- Delete modal -->
                                        <div id="deleteModal-{{ $data->id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                                            <div class="relative p-4 w-full max-w-xl h-full md:h-auto">
                                                <!-- Modal content -->
                                                <div class="relative p-4 text-center bg-white rounded-lg shadow base:p-5">
                                                    <button type="button" class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-base p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="deleteModal-{{ $data->id }}">
                                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                        <span class="sr-only">Close modal</span>
                                                    </button>
                                                    <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                                    <p class="mb-2 text-gray-500"><span class="font-normal">Anda yakin ingin menghapus Pengguna atas nama</span></p>
                                                    <p class="mb-8 text-turqoise">{{ $data->name }}</p>
                                                    <div class="flex justify-center items-center space-x-4">
                                                        <button data-modal-toggle="deleteModal-{{ $data->id }}" type="button" class="py-2 px-3 text-base font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 ">
                                                            Kembali
                                                        </button>

                                                        <a href="{{ route('delete_user', ['id' => $data->id]) }}" class="py-2 px-3 text-base bg-red font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                                                            Hapus Barang
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- End of Delete --}}

                                </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <nav class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4" aria-label="Table navigation">
                        <span class="text-base font-normal text-gray-500 dark:text-gray-400">
                            Showing
                            <span class="font-semibold text-gray-900 dark:text-white">1-10</span>
                            of
                            <span class="font-semibold text-gray-900 dark:text-white">1000</span>
                        </span>
                        <ul class="inline-flex items-stretch -space-x-px">
                            <li>
                                <a href="#" class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white rounded-l-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 ">
                                    <span class="sr-only">Previous</span>
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center justify-center text-base py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 ">1</a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center justify-center text-base py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 ">2</a>
                            </li>
                            <li>
                                <a href="#" aria-current="page" class="flex items-center justify-center text-base z-10 py-2 px-3 leading-tight text-primary-600 bg-primary-50 border border-primary-300 hover:bg-primary-100 hover:text-primary-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">3</a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center justify-center text-base py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 ">...</a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center justify-center text-base py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 ">100</a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center justify-center h-full py-1.5 px-3 leading-tight text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 ">
                                    <span class="sr-only">Next</span>
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            </section>






    </div>


    <script src="{{ asset('js/flowbite.js') }}"></script>

    </body>


@endsection
</html>
