<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Dashboard</title>
</head>

<body>
    <div>

    </div>

    <div>
        <div class="antialiased bg-gray-50 dark:bg-gray-900">
            <nav
                class="bg-white border-b border-gray-200 px-4 py-2.5 dark:bg-gray-800 dark:border-gray-700 fixed left-0 right-0 top-0 z-50">
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
                                    class="block text-sm font-semibold text-gray-900 dark:text-white">{{ Auth::user()->name }}</span>
                                <span
                                    class="block text-sm text-gray-900 truncate dark:text-white">{{ Auth::user()->email }}</span>
                            </div>
                            <ul class="py-1 text-gray-700 dark:text-gray-300" aria-labelledby="dropdown">
                                <li>
                                    <a href="#"
                                        class="block py-2 px-4 text-sm hover:bg-primary hover:text-white">My profile</a>
                                </li>
                                {{-- Log Out --}}
                                <li>
                                    <a
                                        href="{{ route('logout') }}"class="block py-2 px-4 text-sm hover:text-white hover:bg-red-700 ">Log
                                        out</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Sidebar -->

            <aside
                class="fixed top-0 left-0 z-40 w-64 h-screen pt-14 transition-transform -translate-x-full bg-white border-r border-gray-200 md:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
                aria-label="Sidenav" id="drawer-navigation">
                <div class="overflow-y-auto py-5 px-3 h-full bg-white dark:bg-gray-800">


                    <ul class="space-y-2">
                        <li>
                            <a href="#"
                                class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                <svg aria-hidden="true"
                                    class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                                    <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                                </svg>
                                <span class="ml-3">Ringkasan</span>
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                <svg aria-hidden="true"
                                    class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                                    <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                                </svg>
                                <span class="ml-3">Daftar Peminjam</span>
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                <svg aria-hidden="true"
                                    class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                                    <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                                </svg>
                                <span class="ml-3">Daftar User</span>
                            </a>
                        </li>

                    </ul>


                </div>

                {{-- ======= END --}}
                <a href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:text-white dark:text-gray-300 dark:hover:bg-gray-600" role="menuitem"></a>
        </div>
    </div>
    </aside>

    <main class="p-4 md:ml-64 h-auto pt-20">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
            <div class="border-2 border-dashed border-gray-300 rounded-lg  h-32 md:h-64">A</div>
            <div class="border-2 border-dashed rounded-lg border-gray-300  h-32 md:h-64">a</div>
            <div class="border-2 border-dashed rounded-lg border-gray-300  h-32 md:h-64">a</div>
            <div class="border-2 border-dashed rounded-lg border-gray-300  h-32 md:h-64">a</div>
        </div>

        <div class="border-2 border-dashed rounded-lg border-gray-300  h-96 mb-4"></div>

        <div class="grid grid-cols-2 gap-4 mb-4">
            <div class="border-2 border-dashed rounded-lg border-gray-300  h-48 md:h-72"></div>
            <div class="border-2 border-dashed rounded-lg border-gray-300  h-48 md:h-72"></div>
            <div class="border-2 border-dashed rounded-lg border-gray-300  h-48 md:h-72"></div>
            <div class="border-2 border-dashed rounded-lg border-gray-300  h-48 md:h-72"></div>
        </div>
        <div class="border-2 border-dashed rounded-lg border-gray-300  h-96 mb-4"></div>
    </main>
    </div>
    </div>





</body>

</html>
