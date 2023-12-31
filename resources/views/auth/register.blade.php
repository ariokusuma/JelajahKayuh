@extends('layoutmain.main')

@section('container')

        <div class="flex flex-col items-center justify-center px-6 py-24 mx-auto ">
            <a href="/" class="flex items-center mb-6 text-2xl font-semibold text-gray-900">
                <img class="w-64 h-16" src="{{ asset('assets/logo.svg') }}" alt="JelajahKayuh_logo">
            </a>

            <div class="w-full bg-white rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0 ">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    {{-- Title --}}
                    <h1 class="text-xl font-bold leading-tight tracking-normal text-gray-900 md:text-2xl">
                        Buat Akun Baru
                    </h1>

                    <form action="{{ route('register.action') }}" method="POST" class="space-y-6" enctype="multipart/form-data" >
                        @csrf
                        {{-- Nama --}}
                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                            <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="Maria Veronica" required="">
                        </div>
                        {{-- No hp --}}
                        <div>
                            <label for="nohp" class="block mb-2 text-sm font-medium text-gray-900 ">Nomor Hp</label>
                            <input type="text" name="nohp" id="nohp" pattern="[0-9]+" title="Mohon hanya mengisi angka saja" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="08473859643" required="">
                        </div>
                        {{-- Email --}}
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="asep@mail.com" required="">
                            @error('email')
                            <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        {{-- Photo --}}
                        <div>
                            <label for="photo" class="block mb-2 text-sm font-medium text-gray-900">Upload file</label>
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
                        {{-- Lupa Pass --}}
                        <div class="flex items-center justify-end">
                            <a href="#" class="text-sm font-medium  text-primary-600 hover:underline dark:text-primary-500">Lupa Password?</a>
                        </div>
                        <div class="space-y-4">
                            <button  type="submit" class="w-full text-white bg-primary hover:bg-primary2 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-md px-5 py-2.5 text-center ">Buat Akun</button>
                        </div>
                    </form>
                    <a href="{{  route('login') }}" class="block w-full text-primary bg-white  hover:ring-2 ring-primary  focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-md px-5 py-2.5 text-center">Masuk</a>


                </div>
            </div>
        </div>

        <script src="{{ asset('js/toastr.js') }}"></script>

        <script>
            // Check if there are login error messages in the session
            @if(session('loginError'))
                // Display an error notification using Toastr
                toastr.error('{{ session('loginError') }}');
            @endif
        </script>
        {{-- <script src="{{ asset('css/toastr.css') }}"></script> --}}

@endsection
