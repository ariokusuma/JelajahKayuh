@extends('layoutmain.main')

@section('container')

<section class="px-4 mx-auto max-w-screen-xl py-32 ">
    <div class="px-4 mx-auto text-center pb-12">
        <h1 class="mb-4 text-5xl font-bold tracking-tight leading-none text-grey-900 ">My Profile</h1>
    </div>

    {{-- user profil --}}
    <div class="px-4 mx-auto pb-12">
        <div class="flex items-center justify-between px-64 py-4 text-gray-900 whitespace-nowrap dark:text-white">
            <div class="flex items-center gap-2  ">
                <img class="w-24 h-24 rounded-full" src="https://images.unsplash.com/photo-1607990281513-2c110a25bd8c?q=80&w=1868&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Jese image">
                <div class="ps-3">
                    <div class="text-xl font-semibold">Neil Sims</div>
                    <div class="text-lg font-normal text-gray-400">neil.sims@flowbite.com</div>
                </div>  
            </div>
            <a href="/ubahprofil" class="text-grey-900 bg-gray-100 hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ml-auto">Ubah Profil</a>
        </div>
    </div>
    
    
    {{-- user profil close --}}

    {{-- Tabel Pesanan --}}
    
    <div class="px-4 mx-auto text-center pb-8">
        <h1 class="mb-4 text-3xl font-medium tracking-tight leading-none text-grey-900 ">Pesanan Saya</h1>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Sepeda
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Kategori
                    </th>
                   
                    <th scope="col" class="px-6 py-3">
                        Tanggal Mulai Sewa
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tanggal Selesai Sewa
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Harga
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Bukti Transfer
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Keterangan
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($AllOrdersData as $data)
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <td class="px-6 py-4">
                        1
                    </td>
                    <td class="px-6 py-4 font-medium">
                        {{ $data->item->item_name }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $data->item->category }}
                    </td>
                    
                    <td class="px-6 py-4">
                        {{ $data->start_date }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $data->end_date }}
                    </td>
                    <td class="px-6 py-4">
                        Rp{{ $data->item->price }}
                    </td>
                    <td class="px-6 py-4">
                        <img class="w-24 h-24" src="{{ $data->payment_evidence }}" alt="evidence">
                    </td>
                    <td class="px-6 py-4">
                        <span class="bg-red-100 text-red-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">{{ $data->status }}</span>
                    </td>
                    <td class="px-6 py-4">
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Aksi</button>
                    </td>
                    <td class="px-6 py-4">
                        {{ $data->comments }}
                    </td>
                </tr>
                @endforeach
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <td class="px-6 py-4 ">
                        2
                    </td>
                    
                    <td class="px-6 py-4 font-medium ">
                        Wimcycle Sepeda Gunung Storm - Aegyo Series
                    </td>
                    <td class="px-6 py-4">
                        Sepeda Gunung
                    </td>
                    <td class="px-6 py-4">
                        12/12/2024
                    </td>
                    <td class="px-6 py-4">
                        13/12/2024
                    </td>
                    <td class="px-6 py-4">
                        Rp250000
                    </td>
                    <td class="px-6 py-4">
                        bukti.png
                    </td>
                    <td class="px-6 py-4">
                        <span class="bg-red-100 text-red-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">Menunggu Pembayaran</span>
                    </td>
                    <td class="px-6 py-4">
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Aksi</button>
                    </td>
                    
                    <td class="px-6 py-4">
                        -
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    {{-- Tabel Pesanan End --}}

    
    
</section> 
{{-- Form --}}


@endsection