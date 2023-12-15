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
                <img class="w-24 h-24 rounded-full" src="{{ Auth::user()->photo }}" alt="Jese image">
                <div class="ps-3">
                    <div class="text-xl font-semibold">{{\Illuminate\Support\Facades\Auth::user()->name}}</div>
                    <div class="text-lg font-normal text-gray-400">{{\Illuminate\Support\Facades\Auth::user()->email}}</div>
                </div>
            </div>
            <button id="editItemData" data-modal-toggle="editItemData-{{ Auth::user()->id }}" class="w-[103px] bg-primary text-white inline-flex items-center hover:text-white border border-cyan hover:bg-turqoise focus:ring-4 focus:outline-none focus:ring-cyanoutline font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="submit">
                <svg class="mr-1 -ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path>
                    <path clip-rule="evenodd" fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"></path>
                </svg>
                Edit
            </button>
            {{-- <a href="{{ route('update_user', ['id' => Auth::user()->id]) }}" class="text-grey-900 bg-gray-100 hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ml-auto">Ubah Profil</a> --}}

                <!-- Pop-Up Edit -->
                <div id="editItemData-{{ Auth::user()->id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                        {{-- Isi Modal Edit --}}
                        <div class="relative p-4 bg-white rounded-lg shadow base:p-5">
                            <!-- Header Modal Edit -->
                            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b base:mb-5 dark:border-gray-600">
                                <h3 class="text-lg font-semibold text-gray-900">
                                    Edit Data Pengguna
                                </h3>
                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-base p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="editItemData-{{ Auth::user()->id }}">
                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                    <span class="sr-only">Tutup modal</span>
                                </button>
                            </div>

                            <!-- Modal body -->
                            <form action="{{ route('edit_rofile', ['id' => Auth::user()->id]) }}" method="POST" enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="pb-8">
                                    {{-- Nama Pengguna --}}
                                    <div>
                                        <label for="name" class="block mb-2 text-base text-start font-medium text-gray-900 ">Nama Pengguna</label>
                                        <input value="{{ Auth::user()->name }}" required type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-turqoise focus:border-turqoise block w-full p-2.5 " placeholder="SERTIFIKASI">
                                    </div>

                                    {{-- Email --}}
                                    <div>
                                        <label for="email" class="block mb-2 mt-4 text-base font-medium text-gray-900 dark:text-white">Harga</label>
                                        <input value="{{ Auth::user()->email }}" type="text" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 base:text-base rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="asep@mail.com" required="">
                                    </div>
                                    {{-- nohp --}}
                                    <div>
                                        <label for="nohp" class="block mb-2 mt-4 text-base text-start font-medium text-gray-900 ">Nomor Hp </label>
                                        <input value="{{ Auth::user()->nohp }}" type="text" name="nohp" id="nohp" class="bg-gray-50 border border-gray-300 text-gray-900 base:text-base rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="asep@mail.com" required="">
                                    </div>

                                    {{-- Photo --}}
                                    <div>
                                        <label for="photo" class="block mb-2 mt-4 text-base font-medium text-gray-900">Upload file</label>
                                        <input type="file" name="photo" id="photo" class="block w-full text-base text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50  focus:outline-none" aria-describedby="file_input_help" id="file_input" >
                                        <input type="hidden" name="default_photo" id="default_photo" value="{{ Auth::user()->photo }}">
                                        <p class="mt-1 text-base text-gray-500 dark:text-gray-300" id="file_input_help">Format yang diterima : JPEG, PNG, JPG Maks, 2 Mb</p>
                                    </div>
                                </div>

                                {{-- CTA Buttons --}}
                                <div class="flex justify-center items-center space-x-4">
                                    <button type="submit" class="text-white bg-primary hover:bg-primary2 focus:ring-4 focus:outline-cyanoutline focus:ring-cyanoutline font-medium rounded-lg text-base px-5 py-2.5 text-center ">
                                        Ubah Data
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                                        {{-- End of Edit --}}
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
                        <span class="text-white-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">
                            @if($data->status == 1)
                                <div class="">
                                    <p class="flex items-center text-center justify-center bg-red text-white rounded ">Belum Kirim Bukti</p>
                                </div>
                            @elseif($data->status == 0)
                                <div class=" ">
                                    <p class="flex items-center justify-center bg-green-500 text-white rounded ">Disetujui</p>
                                </div>
                            @elseif($data->status == 2)
                                <div class=" ">
                                    <p class="flex items-center  text-center justify-center bg-yellow-300 text-gray-800 rounded ">Bukti Terkirim - Menunggu Verifikasi</p>
                                </div>
                            @elseif($data->status == 3)
                                <div class=" ">
                                    <p class="flex items-center  text-center justify-center bg-yellow-300 text-gray-800 rounded ">Ditolak</p>
                                </div>
                            @elseif($data->status == 4)
                                <div class=" ">
                                    <p class="flex items-center  text-center justify-center bg-yellow-300 text-gray-800 rounded ">Pengembailan Diajukan</p>
                                </div>
                            @elseif($data->status == 5)
                                <div class=" ">
                                    <p class="flex items-center  text-center justify-center bg-green-500 text-white rounded "> Pengembalian diterima</p>
                                </div>
                            @elseif($data->status == 6)
                                <div class=" ">
                                    <p class="flex items-center  text-center justify-center bg-red text-white rounded "> Telat - Denda</p>
                                </div>
                            @endif
                        </span>
                    </td>

                    <!-- Modal toggle -->

                    @if($data->status == 1)
                    <td>
                        <a href="{{route('payment' , ['id'=>$data->id])}}" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                            Upload Bukti Transfer
                        </a>

                        <button data-modal-target="default-modalU{{$data->id}}" data-modal-toggle="default-modalU{{$data->id}}" class="block text-white bg-red hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                            Delete Data
                        </button>
                    </td>
                    @elseif($data->status == 0)
                    <td>
                        <form action="{{ route('update_order_user', ['id' => $data->id]) }}" method="POST" >
                            @method('put')
                            @csrf
                            <button type="submit" name="status" value="4" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Ajukan Pengembailan</button>
                        </form>
                    </td>
                    @else
                    <td>
                        -
                    </td>
                    @endif

                    <td class="px-6 py-4">
                        @if($data->status == 4)
                         Hubungi Admin +6281323454678
                        @elseif($data->status == 6)
                        Anda Melewati Batas Selesai Sewa
                            <p class="flex items-center  text-center justify-center bg-red text-white rounded "> Denda : Rp500.000</p>

                        @else
                            -
                        @endif
                    </td>


                    </td>
                </tr>
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


    <script src="{{ asset('js/flowbite.js') }}"></script>
</section>
{{-- Form --}}




@endsection
