@extends('layoutmain.main')

@section('container')


{{-- Hero --}}
{{-- <section class="bg-center bg-no-repeat bg-[url('https://images.unsplash.com/photo-1501147830916-ce44a6359892?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')] bg-gray-700 bg-blend-multiply">
    <div class="px-4 mx-auto max-w-screen-xl text-center py-24 lg:py-56">
        <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl">Peminjaman Sepeda Mudah untuk Petualanganmu</h1>
        <p class="mb-8 text-lg font-normal text-gray-300 lg:text-xl sm:px-16 lg:px-48">Menyewa sepeda dengan mudah di JelajahKayuh untuk menjelajah kemanapun dan menciptakan momen tak terlupakan.</p>
        <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">
        <a href="#DAFTAR" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
            Pesan Sekarang!

        </a>

    </div>
</div>
</section> --}}
    <section class="relative bg-center bg-no-repeat   ">
        <video autoplay muted loop class="absolute inset-0 w-full h-full object-cover">
            <source src="{{ asset('movie/movie.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <div class="px-4 mx-auto max-w-screen-xl text-center py-24 lg:py-56 relative z-10 ">
            <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl">Peminjaman Sepeda Mudah untuk Petualanganmu</h1>
            <p class="mb-8 text-lg font-normal text-gray-300 lg:text-xl sm:px-16 lg:px-48">Menyewa sepeda dengan mudah di JelajahKayuh untuk menjelajah kemanapun dan menciptakan momen tak terlupakan.</p>
            <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">
                <a href="#DAFTAR" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                    Pesan Sekarang!
                </a>
            </div>
        </div>
    </section>


    @if(session('success'))
        <div class="flex mt-4 items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800" role="alert">
        <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
        </svg>
        <span class="sr-only">Info</span>
        <div>
            <span class="font-medium">Success ! </span>{{ session('success') }}
        </div>
    </div>
    @endif
{{-- Hero End --}}

{{-- Daftar Sepeda --}}
<section id="DAFTAR" class="px-4 mx-auto max-w-screen-xl text-center py-24 lg:py-56">

    <h2 class="mb-4 text-5xl font-bold tracking-tight leading-none text-grey-900 ">Pilih Sepeda sesuai Kebutuhanmu!</h2>
    <p class="mb-8 text-lg font-normal text-gray-400 lg:text-xl sm:px-16 lg:px-48">Daftar sepeda terbaik yang dapat kamu pinjam.</p>


<div class="flex flex-wrap  gap-4 justify-center">
    @foreach ($AllItemsData as $data)
        <div class="max-w-sm bg-slate-50 border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            @if ($data->photo)
                <img class="rounded-t-lg object-cover w-full h-52" src="{{ $data->photo }}" alt="" />
            @else
                <img class="rounded-t-lg" src="{{ asset('storage/default_profile.png') }}" alt="" />
            @endif

            <div class="p-5">
                <a href="#">
                    <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $data->item_name }}</h5>
                </a>
                <p class="px-1 py-0.5 text-sm mb-3 font-normal text-gray-500 bg-gray-100 border border-gray-300">{{ $data->categories->category_name}}</p>
                <p class="mb-3 font-normal text-sm text-gray-700 dark:text-gray-400">{{ $data->desc }}</p>
                <div class="flex items-center justify-between">
                    <div class="flex items-baseline">
                        <span class="text-xl font-bold text-blue-700 dark:text-white">Rp{{ $data->price }}</span>
                        <span class="ms-1 text-sm font-normal text-gray-500 dark:text-gray-400">/24 jam</span>
                    </div>

                        @auth()
                        @if($limit >= 2)
                            <a href="" class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-md px-5 py-1.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ml-12">Pesan</a>
                            <p>Melebihi Limit Pinjaman</p>
                        @else
                            <a href="pemesanan/{{ $data->id }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-md px-5 py-1.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ml-12">Pesan</a>
                        @endif
                        @else

                            <a href="" class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-md px-5 py-1.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ml-12">Pesan</a>
                            <p>Harap Login Terlebih Dahulu</p>
                        @endauth
                        </div>
            </div>
        </div>
    @endforeach

</div>


</section>
{{--  --}}

@endsection

