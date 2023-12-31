<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>Tambah Data Pengguna</title>
</head>
<body class="bg-gray-50">
    <section class="bg-gray-50 ">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <a href="/" class="flex items-center mb-6 text-2xl font-semibold text-gray-900">
                <img class="w-64 h-16" src="{{ asset('assets/logo.svg') }}" alt="JelajahKayuh_logo">
            </a>

            <div class="w-full bg-white rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0 ">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    {{-- Title --}}
                    <h1 class="text-center pb-4 text-xl font-bold leading-tight tracking-normal text-gray-900 md:text-2xl">
                        Tambah Pengguna Baru
                    </h1>

                    <form action="{{ route('add_user_action') }}" method="POST" class="space-y-6" enctype="multipart/form-data" >
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
                        <div class="space-y-4">
                            <button  type="submit" class="w-full text-white bg-primary hover:bg-primary2 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-md px-5 py-2.5 text-center ">Tambah Pengguna</button>
                        </div>
                    </form>
                    <a href="{{  route('dashboardUsers') }}" class="block w-full text-primary bg-white  hover:ring-2 ring-primary  focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-md px-5 py-2.5 text-center">Kembali</a>


                </div>
            </div>
        </div>
    </section>
</body>
</html>
