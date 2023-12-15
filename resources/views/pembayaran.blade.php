@extends('layoutmain.main')

@section('container')

<section class="px-4 mx-auto max-w-screen-xl py-32 ">
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
    <div class="px-4 mx-auto text-center pb-12">
        <h1 class="mb-4 text-5xl font-bold tracking-tight leading-none text-grey-900 ">Info Pembayaran</h1>
    </div>

    {{-- jumlah dibayar --}}
    <div class="mb-5 block max-w-auto p-6 bg-white border border-gray-200 rounded-lg shadow h dark:border-gray-700">
        <p class="text-2xl font-regular text-gray-900 dark:text-white mb-5">Informasi Pesanan</p>
        <div class="flex">
            <div class="flex-1">
                <p class="text-xl font-regular text-gray-400 dark:text-white">Nomor Pesanan</p>
                <p class="text-xl font-medium text-gray-900 dark:text-white">{{$data->id}}</p>
            </div>
            <div class="flex-1">
                <p class="text-xl font-regular text-gray-400 dark:text-white">Item dipesan</p>
                <p class="text-xl font-medium text-gray-900 dark:text-white">{{$data->item->item_name}}</p>
            </div>
            <div class="flex-1">
                <p class="text-xl font-regular text-gray-400 dark:text-white">Waktu Pemesanan</p>
                <p class="text-xl font-medium text-gray-900 dark:text-white">{{$data->start_date}}</p>
            </div>
            <div class="flex-1">
                <p class="text-xl font-regular text-gray-400 dark:text-white">Status</p>
                @if($data->status == 1)
                <span class="bg-red-100 text-red-800 text-lg font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">
                    Belum Kirim Bukti
                </span>
                @elseif($data->status == 2)
                    <span class="bg-green-100 text-green-800 text-lg font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">
                   Bukti Terkirim - Menunggu Verifikasi
                </span>
                    @endif
            </div>
        </div>
        
    </div>
    {{-- jumlah dibayar end --}}

    {{-- jumlah dibayar --}}
    <div class="mb-5 block max-w-auto p-6 bg-white border border-gray-200 rounded-lg shadow h dark:border-gray-700">
        <p class="text-2xl font-regular text-gray-900 dark:text-white mb-2">Jumlah yang harus dibayar</p>
        <p class="text-4xl font-bold text-gray-900 dark:text-white">
            Rp{{ number_format($data->item->price * (\Carbon\Carbon::parse($data->start_date)->diffInDays(\Carbon\Carbon::parse($data->end_date))), 0, ',', '.') }}
        </p>
    </div>
    {{-- jumlah dibayar end --}}

    {{-- card bank --}}
    <div class="mb-5 block max-w-auto p-6 bg-white border border-gray-200 rounded-lg shadow h dark:border-gray-700">
        <p class="text-2xl font-regular text-gray-900 dark:text-white mb-2">Silahkan Transfer melalui rekening dibawah ini.</p>
        
        {{-- list --}}
        <div class="flex gap-4">
            <div class="flex-1 block max-w-auto p-6 bg-white border border-gray-200 rounded-lg shadow h dark:border-gray-700 ">
                <img src="img/Bank_Central_Asia.svg" class="block border border-gray-200 rounded-lg shadow h dark:border-gray-700 p-2 w-16 h-16 mb-2" alt="">
                <p class="mb-3 text-xl font-medium text-gray-900 dark:text-white">BCA</p>
                <p class="text-xl text-gray-400 dark:text-white">Nama Rekening</p>
                <p class="mb-3 text-xl font-medium text-gray-900 dark:text-white">PT Jelajah Kayuh</p>
                <p class="text-xl text-gray-400 dark:text-white">No Rekening</p>
                <p class="text-xl font-medium text-gray-900 dark:text-white">032176589</p>
            </div>
            <div class="flex-1 block max-w-auto p-6 bg-white border border-gray-200 rounded-lg shadow h dark:border-gray-700 ">
                <img src="img/BNI.png" class="block border border-gray-200 rounded-lg shadow h dark:border-gray-700 px-2 py-6 w-16 h-auto mb-2" alt="">
                <p class="mb-3 text-xl font-medium text-gray-900 dark:text-white">BNI</p>
                <p class="text-xl text-gray-400 dark:text-white">Nama Rekening</p>
                <p class="mb-3 text-xl font-medium text-gray-900 dark:text-white">PT Jelajah Kayuh</p>
                <p class="text-xl text-gray-400 dark:text-white">No Rekening</p>
                <p class="text-xl font-medium text-gray-900 dark:text-white">3123163293</p>
            </div>
            <div class="flex-1 block max-w-auto p-6 bg-white border border-gray-200 rounded-lg shadow h dark:border-gray-700 ">
                <img src="img/BRI.png" class="block border border-gray-200 rounded-lg shadow h dark:border-gray-700 px-2 py-5 w-16 h-auto mb-2" alt="">
                <p class="mb-3 text-xl font-medium text-gray-900 dark:text-white">BRI</p>
                <p class="text-xl text-gray-400 dark:text-white">Nama Rekening</p>
                <p class="mb-3 text-xl font-medium text-gray-900 dark:text-white">PT Jelajah Kayuh</p>
                <p class="text-xl text-gray-400 dark:text-white">No Rekening</p>
                <p class="text-xl font-medium text-gray-900 dark:text-white">41522172319</p>
            </div>
            <div class="flex-1 block max-w-auto p-6 bg-white border border-gray-200 rounded-lg shadow h dark:border-gray-700 ">
                <img src="img/Bank_Syariah_Indonesia.png" class="block border border-gray-200 rounded-lg shadow h dark:border-gray-700 px-2 py-6 w-16 h-auto mb-2" alt="">
                <p class="mb-3 text-xl font-medium text-gray-900 dark:text-white">BSI</p>
                <p class="text-xl text-gray-400 dark:text-white">Nama Rekening</p>
                <p class="mb-3 text-xl font-medium text-gray-900 dark:text-white">PT Jelajah Kayuh</p>
                <p class="text-xl text-gray-400 dark:text-white">No Rekening</p>
                <p class="text-xl font-medium text-gray-900 dark:text-white">12425176589</p>
            </div>
        </div>
        {{-- list close --}}
    </div>
    {{-- card bank end --}}
    
    {{-- Upload Bukti --}}
    <div class="mb-5 block max-w-auto p-6 bg-white border border-gray-200 rounded-lg shadow h dark:border-gray-700">
        <p class="text-2xl font-regular text-gray-900 dark:text-white mb-2">Jumlah yang harus dibayar</p>
            Rp{{ number_format($data->item->price * (\Carbon\Carbon::parse($data->start_date)->diffInDays(\Carbon\Carbon::parse($data->end_date))), 0, ',', '.') }}
        
            <form action="{{route('bukti' , ['id'=>$data->id])}}" method="post" enctype="multipart/form-data">
            @csrf
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload file</label>
            <input name="bukti_transfer" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file">

            <button type="submit" class="my-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-ms w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"> Kirim Bukti Transfer</button>
        </form>  
    </div>
    {{-- Upload Bukti end --}}
    
</section> 
{{-- Form --}}


@endsection