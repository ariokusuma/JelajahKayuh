
@extends('layoutmain.main')

@section('container')


{{-- Hero --}}
<section class="bg-center bg-no-repeat bg-[url('https://images.unsplash.com/photo-1501147830916-ce44a6359892?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')] bg-gray-700 bg-blend-multiply">
    <div class="px-4 mx-auto max-w-screen-xl text-center py-24 lg:py-56">
        <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl">Peminjaman Sepeda Mudah untuk Petualanganmu</h1>
        <p class="mb-8 text-lg font-normal text-gray-300 lg:text-xl sm:px-16 lg:px-48">Menyewa sepeda dengan mudah di Journify untuk menjelajah kemanapun dan menciptakan momen tak terlupakan.</p>
        <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">
        <a href="#DAFTAR" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
            Pesan Sekarang!

        </a>

    </div>
</div>
</section>
{{-- Hero End --}}

{{-- Daftar Sepeda --}}
<section id="DAFTAR" class="px-4 mx-auto max-w-screen-xl text-center py-24 lg:py-56">

    <h2 class="mb-4 text-5xl font-bold tracking-tight leading-none text-grey-900 ">Pilih Sepeda sesuai Kebutuhanmu!</h2>
    <p class="mb-8 text-lg font-normal text-gray-400 lg:text-xl sm:px-16 lg:px-48">Daftar sepeda terbaik yang dapat kamu pinjam.</p>


<div class="flex flex-wrap  gap-4 justify-center">
    @foreach ($AllItemsData as $data)
        <div class="max-w-sm bg-slate-50 border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            @if ($data->photo)
                <img class="rounded-t-lg object-cover w-full h-52" src="{{ asset('img/'.$data->photo) }}" alt="" />
            @else
                <img class="rounded-t-lg" src="{{ asset('storage/default_profile.png') }}" alt="" />
            @endif

            <div class="p-5">
                <a href="#">
                    <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $data->item_name }}</h5>
                </a>
                <p class="px-1 py-0.5 text-sm mb-3 font-normal text-gray-500 bg-gray-100 border border-gray-300">{{ $data->category }}</p>
                <p class="mb-3 font-normal text-sm text-gray-700 dark:text-gray-400">{{ $data->desc }}</p>
                <div class="flex items-center justify-between">
                    <div class="flex items-baseline">
                        <span class="text-xl font-bold text-blue-700 dark:text-white">Rp{{ $data->price }}</span>
                        <span class="ms-1 text-sm font-normal text-gray-500 dark:text-gray-400">/24 jam</span>
                    </div>
                        <a href="pemesanan/{{ $data->id }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-md px-5 py-1.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ml-12">Pesan</a>
                </div>
            </div>
        </div>
    @endforeach

</div>


</section>
{{--  --}}

@endsection

