@extends('layoutmain.main')

@section('container')

<section class="px-4 mx-auto max-w-screen-xl py-32 ">
    <div class="px-4 mx-auto text-center pb-12">
        <h1 class="mb-4 text-5xl font-bold tracking-tight leading-none text-grey-900 ">My Profile</h1>
    </div>
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

    {{-- user profil --}}
    <div class="px-4 mx-auto pb-12">
        <div class="flex items-center justify-between px-64 py-4 text-gray-900 whitespace-nowrap dark:text-white">
            <div class="flex items-center gap-2  ">
                <img class="w-24 h-24 rounded-full" src="https://images.unsplash.com/photo-1607990281513-2c110a25bd8c?q=80&w=1868&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Jese image">
                <div class="ps-3">
                    <div class="text-xl font-semibold">{{\Illuminate\Support\Facades\Auth::user()->name}}</div>
                    <div class="text-lg font-normal text-gray-400">{{\Illuminate\Support\Facades\Auth::user()->email}}</div>
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
                        Total Harga
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
                        {{ $data->categories->category_name }}
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
                        Rp{{ $data->item->price * (\Carbon\Carbon::parse($data->start_date)->diffInDays(\Carbon\Carbon::parse($data->end_date)))  }}
                    </td>
                    <td class="px-6 py-4">
                        <img class="w-24 h-24" src="{{asset('bukti_transfer/' . $data->payment_evidence )}}" alt="evidence">
                    </td>
                    <td class="px- py-4">
                        <span class="bg-yellow-100 text-white-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">
                            @if($data->status == 1)
                            Belum Kirim Bukti
                            @elseif($data->status == 2)
                            Bukti Terkirim - Menunggu Verifikasi
                            @endif
                        </span>
                    </td>
                    
                    <!-- Modal toggle -->

                    @if($data->status == 1)
                    <td>
                        <a href="{{route('payment' , ['id'=>$data->id])}}" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                            Upload Bukti Transfer
                        </a>

                        <button data-modal-target="default-modalU{{$data->id}}" data-modal-toggle="default-modalU{{$data->id}}" class="block text-white bg-blue-400 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                            Delete Data
                        </button>
                    </td>
                    @else
                    <td>
                        <button data-modal-target="default-modalU{{$data->id}}" data-modal-toggle="default-modalU{{$data->id}}" class="block text-white bg-blue-400 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                           Delete Data
                        </button>
                    </td>
                    @endif
                    <td class="px-6 py-4">
                        {{ $data->comments }}
                    </td>
                </tr>

                <!-- Main modal -->
                {{-- <div id="default-modal{{$data->id}}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-2xl max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <!-- Modal header -->
                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                    Terms of Service
                                </h3>
                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal{{$data->id}}">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <div class="p-4 md:p-5 space-y-4">
                                <form action="{{route('bukti' , ['id'=>$data->id])}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <!-- Field lainnya -->
                                    <label for="bukti_transfer">Bukti Transfer:</label>
                                    <input type="file" name="bukti_transfer" >

                                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div> --}}
                <div id="default-modalU{{$data->id}}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-2xl max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <!-- Modal header -->
                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                   Edit Data
                                </h3>
                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modalU{{$data->id}}">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <div class="p-4 md:p-5 space-y-4">
                                Apakah Anda Yakin Menghapus Data ini ?
                                <form method="post" action="{{route('transactions.destroy' , ['id'=>$data->id])}}">
                                    @csrf
                                    @method('delete')
                                <button type="submit" class="focus:outline-none text-white bg-blue-400 hover:bg-blue-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Hapus</button>
                                </form>
                                <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Batal</button>
                            </div>
                        </div>
                    </div>
                </div>



                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Tabel Pesanan End --}}



</section>
{{-- Form --}}




@endsection
