<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>@yield('title')</title>
</head>

<body>
    <nav
    class="bg-white border-b border-gray-200 px-4 py-2.5  fixed left-0 right-0 top-0 z-50">
    <div class="flex flex-wrap justify-between items-center">
        <div class="flex justify-start items-center">
            {{-- Logo --}}
            <a href="/" class="flex items-center justify-between mr-4">
                <img src="{{ asset('assets/logo.svg') }}" class="mr-3 h-8" alt="JelajahKayuh Logo" />
            </a>
        </div>

        {{-- User Detail --}}
        <div class="flex items-center lg:order-2">

            <button type="button"
                class="flex mx-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                id="user-menu-button" aria-expanded="false" data-dropdown-toggle="dropdown">
                <img class="w-12 h-12 rounded-full" src="{{ Auth::user()->photo }}" alt="user photo" />
            </button>
            <!-- Dropdown menu -->
            <div class="hidden z-50 my-4 w-56 text-base list-none bg-white rounded divide-y divide-gray-100 shadow  "
                id="dropdown">
                {{-- User Detail --}}
                <div class="py-3 px-4">
                    <span
                        class="block text-sm font-semibold text-gray-900 ">{{ Auth::user()->name }}</span>
                    <span
                        class="block text-sm text-gray-900 truncate ">{{ Auth::user()->email }}</span>
                </div>
                <ul class="py-1 text-gray-700 dark:text-gray-300" aria-labelledby="dropdown">
                    <li>
                        <a href="#"
                            class="block py-2 px-4 text-sm hover:bg-primary hover:text-white">My profile</a>
                    </li>
                    {{-- Log Out --}}
                    <li>
                        <a href="{{ route('logout') }}"class="block py-2 px-4 text-sm hover:text-white hover:bg-red ">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<!-- Sidebar -->

<aside
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-14 transition-transform -translate-x-full bg-white border-r border-gray-200 md:translate-x-0 "
    aria-label="Sidenav" id="drawer-navigation">
    <div class="overflow-y-auto py-5 px-3 h-full bg-white dark:bg-gray-800">


        <ul class="space-y-2">
            <li>
                <a href="dashboard" class="{{ Request::is('dashboard') ? 'btn-aktif' : 'btn-nonaktif' }}">
                    <svg aria-hidden="true"
                        class="w-6 h-6 {{ Request::is('dashboard') ? 'text-white transition duration-75' : ' text-gray-500 transition duration-75' }} "
                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                        <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                    </svg>
                    <span class="{{ Request::is('dashboard') ? ' ml-3 text-white' : ' ml-3 text-black' }}">Ringkasan</span>
                </a>
            </li>
            {{-- Daftar Pengguna --}}
            <li>
                <a href="{{ url('dashboard-user') }}"
                    class="{{ Request::is('dashboard-user') ? 'btn-aktif' : 'btn-nonaktif' }}">
                    <svg aria-hidden="true"
                        class="w-6 h-6 {{ Request::is('dashboard-user') ? 'text-white transition duration-75' : ' text-gray-500 transition duration-75' }}"
                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                        <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                    </svg>
                    <span class="{{ Request::is('dashboard-user') ? ' ml-3 text-white' : ' ml-3 text-black' }}">Daftar Pengguna</span>
                </a>
            </li>
            {{-- Daftar Pengguna --}}
            <li>
                <a href="{{  url('dashboard-items') }}"
                    class="{{ Request::is('dashboard-items') ? 'btn-aktif' : 'btn-nonaktif' }}">
                    <svg aria-hidden="true"
                        class="w-6 h-6 {{ Request::is('dashboard-items') ? 'text-white transition duration-75' : ' text-gray-500 transition duration-75' }}"
                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"> <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path> <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                    </svg>
                    <span class="{{ Request::is('dashboard-items') ? ' ml-3 text-white' : ' ml-3 text-black' }}">Daftar Barang</span>
                </a>
            </li>

            {{-- Daftar Pengguna --}}
            <li>
                <a href="{{  url('dashboard-orders') }}"
                    class="{{ Request::is('dashboard-orders') ? 'btn-aktif' : 'btn-nonaktif' }}">
                    <svg aria-hidden="true"
                        class="w-6 h-6 {{ Request::is('dashboard-orders') ? 'text-white transition duration-75' : ' text-gray-500 transition duration-75' }}"
                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"> <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path> <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                    </svg>
                    <span class="{{ Request::is('dashboard-orders') ? ' ml-3 text-white' : ' ml-3 text-black' }}">Daftar Peminjam</span>
                </a>
            </li>

        </ul>
    </div>

        {{-- ======= END --}}
        <a href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:text-white dark:text-gray-300 dark:hover:bg-gray-600" role="menuitem"></a>
</aside>
</body>
