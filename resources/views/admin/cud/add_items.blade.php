<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>Tambah Data Barang</title>
</head>
<body class="bg-gray-50">
    <section class="bg-gray-50 ">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <a href="/" class="flex items-center mb-6 text-2xl font-semibold text-gray-900">
                <img class="w-64 h-16" src="{{ asset('assets/logo.svg') }}" alt="JelajahKayuh_logo">
            </a>

            <div class="w-full bg-white rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0 ">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    {{-- Title --}}
                    <h1 class="text-xl font-bold leading-tight tracking-normal text-gray-900 md:text-2xl">
                        Tambah Barang Baru
                    </h1>

                    <form action="{{ route('add_data.action') }}" method="POST" class="space-y-6" enctype="multipart/form-data" >
                        @csrf
                        {{-- Nama Item --}}
                        <div>
                            <label for="item_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Barang</label>
                            <input type="text" name="item_name" id="item_name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="Maria Veronica" required="">
                        </div>
                        {{-- category --}}
                        <div>
                            <label for="category" class="block mb-2 text-sm font-medium text-gray-900 ">Kategori</label>
                            <input type="text" name="category" id="category" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="08473859643" required="">
                        </div>
                        {{-- desc --}}
                        <div>
                            <label for="desc" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                            <input type="text" name="desc" id="desc" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="asep@mail.com" required="">
                        </div>
                        {{-- Photo --}}
                        <div>
                            <label for="photo" class="block mb-2 text-sm font-medium text-gray-900">Upload file</label>
                            <input type="file" name="photo" id="photo" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50  focus:outline-none" aria-describedby="file_input_help" id="file_input" >
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">Format yang diterima : JPEG, PNG, JPG Maks, 2 Mb</p>
                        </div>
                        {{-- Harga --}}
                        <div>
                            <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">harga sewa</label>
                            <input type="text" name="price" id="price" placeholder="Rp21341" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " required="">
                        </div>
                        <div class="space-y-4">
                            <button  type="submit" class="w-full text-white bg-primary hover:bg-primary2 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-md px-5 py-2.5 text-center ">Tambah Barang</button>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </section>
</body>
</html>
