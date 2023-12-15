<nav class="bg-white dark:bg-gray-900 fixed w-full z-20 top-0 start-0 border-b border-gray-200 dark:border-gray-600">

    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="assets/logo.svg" class="h-8" alt="JelajahKayuh Logo">
        </a>
        @auth()

        {{-- user --}}
            <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse  items-center justify-center">
                <h3 class="font-bold">Welcome {{ Auth::user()->name }}</h3>

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
                            <span
                                class="block text-sm text-gray-900 truncate ">{{ Auth::user()->role  == 0 ? 'Admin' : 'Personal' }}</span>
                        </div>
                        <ul class="py-1 text-gray-700 dark:text-gray-300" aria-labelledby="dropdown">
                            @if (Auth::user()->role==0)

                            <li>
                                <div class="py-2">
                                    <a href="{{ url('dashboard') }}" class="block py-2 px-4 text-sm hover:bg-primary hover:text-white">Dashboard</a>
                                </div>
                            </li>
                            @endif
                            <li>
                                <a href="myprofile"
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


            {{-- user details --}}
        @else
            <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                <a href="/login" type="submit"
                    class="inline-flex justify-center items-center text-center text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg px-5 py-2.5   dark:border-gray-600  dark:hover:border-gray-600 dark:focus:ring-gray-700">Login
                    <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>

                <button data-collapse-toggle="navbar-sticky" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400  dark:focus:ring-gray-600"
                    aria-controls="navbar-sticky" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
            </div>
        @endauth
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
            <ul
                class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white   ">
                <li>
                    <a href="#"
                        class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500"
                        aria-current="page">Beranda</a>
                </li>
                <li>
                    <a href="#"
                        class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500    ">Panduan</a>
                </li>
                <li>
                    <a href="#"
                        class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500    ">Tentang</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
