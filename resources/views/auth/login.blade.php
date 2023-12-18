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
                        Masuk ke Akun Anda
                    </h1>

                    <form method="POST" class="space-y-6" action="{{ route('login.action') }}">
                        @csrf
                        {{-- Email --}}
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="name@company.com" required="">
                        </div>
                        {{-- Pass --}}
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " required="">
                        </div>
                        {{-- Lupa Pass --}}
                        <div class="flex items-center justify-end">
                            <a href="#" class="text-sm font-medium  text-primary-600 hover:underline dark:text-primary-500">Lupa Password?</a>
                        </div>
                        <div class="space-y-4">
                            <button  type="submit" class="w-full text-white bg-primary hover:bg-primary2 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-md px-5 py-2.5 text-center ">Masuk</button>
                        </div>
                    </form>
                    <a href="{{ route('register') }}" class="block w-full text-primary bg-white hover:ring-2 ring-primary focus:ring-2 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-md px-5 py-2.5 text-center">Buat Akun</a>


                </div>
            </div>
        </div>

        <script src="{{ asset('js/toastr.js') }}"></script>

        <script>
                // toastr.success('This is a test notification');

            // @if(session('loginError'))
                toastr.error('{{ session('loginError') }}');
            // @endif
        </script>

@endsection
