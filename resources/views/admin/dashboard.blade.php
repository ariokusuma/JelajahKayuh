@extends('admin.adminlayout.mainadmin')

@section('title', 'Dashboard')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Dashboard</title>
</head>

<body >
    <div class="">
        <div class="antialiased bg-gray-50 h-screen dark:bg-gray-900">


    <main class="p-4 md:ml-64 h-auto pt-20">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">

            <div class="border-2 border-dashed border-gray-300 rounded-lg  h-32 md:h-64">
                {{-- Total Pengguna --}}
                <div class="w-auto ">
                    <a href="{{ url('dashboard-user') }}" class="  flex flex-col items-center px-[22px] bg-primary border  h-32 md:h-64 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-primary2">

                        <div class="">
                            {{-- Icons --}}
                            <div class=" w-16 h-16 rounded-md bg-hijau_hover ">
                                <div class="p-2 ">
                                    <svg fill="#FFFFFF" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <path d="M10 9a3 3 0 100-6 3 3 0 000 6zM6 8a2 2 0 11-4 0 2 2 0 014 0zM1.49 15.326a.78.78 0 01-.358-.442 3 3 0 014.308-3.516 6.484 6.484 0 00-1.905 3.959c-.023.222-.014.442.025.654a4.97 4.97 0 01-2.07-.655zM16.44 15.98a4.97 4.97 0 002.07-.654.78.78 0 00.357-.442 3 3 0 00-4.308-3.517 6.484 6.484 0 011.907 3.96 2.32 2.32 0 01-.026.654zM18 8a2 2 0 11-4 0 2 2 0 014 0zM5.304 16.19a.844.844 0 01-.277-.71 5 5 0 019.947 0 .843.843 0 01-.277.71A6.975 6.975 0 0110 18a6.974 6.974 0 01-4.696-1.81z"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col justify-between p-4 leading-normal">
                            <h5 class="mb-1 pt-1 text-2xl font-bold tracking-tight text-white dark:text-white">{{ $total_users }}</h5>
                            <p class="mb-1 font-bold text-2xl text-white dark:text-gray-400">Pengguna</p>
                        </div>
                    </a>
                </div>
            </div>




            <div class="border-2 border-dashed rounded-lg border-gray-300  h-32 md:h-64">
                {{-- Total Pengguna --}}
                <div class="w-auto ">
                    <a href="{{ url('dashboard-items') }}" class="  flex flex-col items-center px-[22px] bg-primary border  h-32 md:h-64 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-primary2">

                        <div class="">
                            {{-- Icons --}}
                            <div class=" w-16 h-16 rounded-md bg-hijau_hover ">
                                <div class="p-2 ">
                                    <svg fill="#FFFFFF" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <path d="M10 9a3 3 0 100-6 3 3 0 000 6zM6 8a2 2 0 11-4 0 2 2 0 014 0zM1.49 15.326a.78.78 0 01-.358-.442 3 3 0 014.308-3.516 6.484 6.484 0 00-1.905 3.959c-.023.222-.014.442.025.654a4.97 4.97 0 01-2.07-.655zM16.44 15.98a4.97 4.97 0 002.07-.654.78.78 0 00.357-.442 3 3 0 00-4.308-3.517 6.484 6.484 0 011.907 3.96 2.32 2.32 0 01-.026.654zM18 8a2 2 0 11-4 0 2 2 0 014 0zM5.304 16.19a.844.844 0 01-.277-.71 5 5 0 019.947 0 .843.843 0 01-.277.71A6.975 6.975 0 0110 18a6.974 6.974 0 01-4.696-1.81z"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col justify-between p-4 leading-normal">
                            <h5 class="mb-1 pt-1 text-2xl font-bold tracking-tight text-white dark:text-white">{{ $total_items }}</h5>
                            <p class="mb-1 font-bold text-2xl text-white dark:text-gray-400">Sepeda</p>
                        </div>
                    </a>
                </div>
            </div>


            <div class="border-2 border-dashed rounded-lg border-gray-300  h-32 md:h-64">
                {{-- Total Peminjam --}}
                <div class="w-auto ">
                    <a href="{{ url('dashboard-pengguna') }}" class="  flex flex-col items-center px-[22px] bg-primary border  h-32 md:h-64 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-primary2">

                        <div class="">
                            {{-- Icons --}}
                            <div class=" w-16 h-16 rounded-md bg-hijau_hover ">
                                <div class="p-2 ">
                                    <svg fill="#FFFFFF" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <path d="M10 9a3 3 0 100-6 3 3 0 000 6zM6 8a2 2 0 11-4 0 2 2 0 014 0zM1.49 15.326a.78.78 0 01-.358-.442 3 3 0 014.308-3.516 6.484 6.484 0 00-1.905 3.959c-.023.222-.014.442.025.654a4.97 4.97 0 01-2.07-.655zM16.44 15.98a4.97 4.97 0 002.07-.654.78.78 0 00.357-.442 3 3 0 00-4.308-3.517 6.484 6.484 0 011.907 3.96 2.32 2.32 0 01-.026.654zM18 8a2 2 0 11-4 0 2 2 0 014 0zM5.304 16.19a.844.844 0 01-.277-.71 5 5 0 019.947 0 .843.843 0 01-.277.71A6.975 6.975 0 0110 18a6.974 6.974 0 01-4.696-1.81z"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col p-4 leading-normal">
                            <h5 class="mb-1 pt-1 text-2xl font-bold tracking-tight text-white dark:text-white">{{ $total_orders }}</h5>
                            <p class="mb-1 font-bold text-2xl text-white dark:text-gray-400">Peminjam</p>
                        </div>
                    </a>
                </div>
            </div>



            <div class="border-2 border-dashed rounded-lg border-gray-300  h-32 md:h-64">
                {{-- Total Denda --}}
                <div class="w-auto ">
                    <a href="{{ url('dashboard-pengguna') }}" class="  flex flex-col items-center px-[22px] bg-red border  h-32 md:h-64 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-red2">

                        <div class="">
                            {{-- Icons --}}
                            <div class=" w-16 h-16 rounded-md bg-hijau_hover ">
                                <div class="p-2 ">
                                    <svg fill="#FFFFFF" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <path d="M10 9a3 3 0 100-6 3 3 0 000 6zM6 8a2 2 0 11-4 0 2 2 0 014 0zM1.49 15.326a.78.78 0 01-.358-.442 3 3 0 014.308-3.516 6.484 6.484 0 00-1.905 3.959c-.023.222-.014.442.025.654a4.97 4.97 0 01-2.07-.655zM16.44 15.98a4.97 4.97 0 002.07-.654.78.78 0 00.357-.442 3 3 0 00-4.308-3.517 6.484 6.484 0 011.907 3.96 2.32 2.32 0 01-.026.654zM18 8a2 2 0 11-4 0 2 2 0 014 0zM5.304 16.19a.844.844 0 01-.277-.71 5 5 0 019.947 0 .843.843 0 01-.277.71A6.975 6.975 0 0110 18a6.974 6.974 0 01-4.696-1.81z"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col p-4 leading-normal">
                            <h5 class="mb-1 pt-1 text-2xl font-bold tracking-tight text-white dark:text-white">{{ $total_orders }}</h5>
                            <p class="mb-1 font-bold text-2xl text-white dark:text-gray-400">Denda</p>
                        </div>
                    </a>
                </div>

            </div>
        </div>

        {{-- <div class="border-2 border-dashed rounded-lg border-gray-300  h-96 mb-4"></div>

        <div class="grid grid-cols-2 gap-4 mb-4">
            <div class="border-2 border-dashed rounded-lg border-gray-300  h-48 md:h-72"></div>
            <div class="border-2 border-dashed rounded-lg border-gray-300  h-48 md:h-72"></div>
            <div class="border-2 border-dashed rounded-lg border-gray-300  h-48 md:h-72"></div>
            <div class="border-2 border-dashed rounded-lg border-gray-300  h-48 md:h-72"></div>
        </div>

        <div class="border-2 border-dashed rounded-lg border-gray-300  h-96 mb-4"></div> --}}
    </main>
    </div>
    </div>





</body>
@endsection
</html>
