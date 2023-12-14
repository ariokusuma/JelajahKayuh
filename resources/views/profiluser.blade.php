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
                <img class="w-24 h-24 rounded-full" src="{{  Auth::user()->photo }}" alt="Jese image">
                <div class="ps-3">
                    <div class="text-xl font-semibold">{{Auth::user()->name}}</div>
                    <div class="text-lg font-normal text-gray-400">{{Auth::user()->email}}</div>
                </div>
                <div class="w-64 text-center text-xl font-semibold">{{ Auth::user()->role == 0 ? 'Admin' : 'Personal' }}</div>
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


                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b ">
                    @if ($noTransactionData)
                    <td colspan="10" class="px-6 py-4 text-xl text-center ">
                        <p>Belum ada data pesanan</p>
                    </td>
                    @else
                    @foreach ($AllOrdersData as $data)
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
                        <img class="w-24 h-24" src="{{asset('bukti_transfer/' . $data->payment_evidence )}}" alt="evidence">
                    </td>
                    <td class="px-6 py-4">
                        <span id="statusSpan" class="bg-red-100 text-red-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">{{ $data->status }}</span>
                    </td>

                    <script>    
                        // Mendapatkan nilai status dari elemen HTML
                        var status = document.getElementById("statusSpan").innerText;
                    
                        // Fungsi untuk menerjemahkan status angka menjadi teks
                        function translateStatus(status) {
                            switch (status) {
                                case "1":
                                    return "Waiting for Payment";
                                case "2":
                                    return "Done";
                                case "3":
                                    return "Rejected";
                                // Tambahkan kasus lain jika diperlukan
                                default:
                                    return "Unknown Status";
                            }
                        }
                    
                        // Mengganti teks status dengan teks terjemahan
                        document.getElementById("statusSpan").innerText = translateStatus(status);
                    </script>
                    
                    <!-- Modal toggle -->

                    @if($data->status == 1)
                        <td>
                    <button data-modal-target="default-modal{{$data->id}}" data-modal-toggle="default-modal{{$data->id}}" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                        Upload Bukti Transfer
                    </button>
                        </td>

                    @else
                        <td>

                        </td>
                    @endif
                    <td class="px-6 py-4">
                        {{ $data->comments }}
                    </td>
                </tr>
                {{-- @endforeach --}}

                <!-- Main modal -->
                <div id="default-modal{{$data->id}}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
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
                </div>

                @endforeach
                @endif
            </tbody>
        </table>
    </div>

    {{-- Tabel Pesanan End --}}



</section>
{{-- Form --}}




@endsection
