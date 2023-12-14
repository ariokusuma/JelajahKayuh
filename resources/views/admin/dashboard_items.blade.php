@extends('admin.adminlayout.mainadmin')

@section('title', 'Daftar Pengguna')

@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Daftar Pengguna</title>
</head>

    <body >
    <div class="p-4 md:ml-64 h-auto pt-20">


        <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
            <div class="mx-auto max-w-screen px-0">
                <!-- Start coding here -->
                <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                    <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                        <div class="w-full md:w-1/2">
                            {{-- Search Bar --}}
                            <form class="flex items-center">
                                <label for="simple-search" class="sr-only">Search</label>
                                <div class="relative w-full">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <input type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Search" required="">
                                </div>
                            </form>

                        </div>
                        <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                            <a href="{{ route('add_data') }}" type="button" class="flex items-center justify-center text-white bg-primary hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                                <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                                </svg>
                                Tambah Data
                            </a>
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-base text-left text-gray-500 dark:text-gray-400">
                            {{-- Table Header --}}
                            <thead class="text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr class="text-center">
                                    <th scope="col" class="px-4 py-3">Foto</th>
                                    <th scope="col" class="px-4 py-3">Nama Barang</th>
                                    <th scope="col" class="px-4 py-3">Kategori</th>
                                    <th scope="col" class="px-4 py-3">email</th>
                                    <th scope="col" class="px-4 py-3">Harga Sewa</th>
                                    <th scope="col" class="px-4 py-3">Aksi</th>
                                    {{-- <th scope="col" class="px-4 py-3">
                                        <span class="sr-only">Actions</span>
                                    </th> --}}
                                </tr>
                            </thead>

                            {{-- data --}}
                            <tbody>
                                @foreach ($AllItemsData as $data)
                                <tr class="border-b dark:border-gray-700">
                                    <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap ">
                                        <div class="grid grid-cols-2 md:grid-cols-3 gap-2 w-[100px]">
                                            {{-- Profile --}}
                                                {{-- Gambar --}}
                                                    <div class="pl-4 grid auto-cols-max">
                                                        {{-- <img class="w-16 h-16 aspect-square rounded-full" src="{{ asset('upload/foto-profile/' . auth()->user()->foto) }}" alt="user_pfp"> --}}
                                                        @if ($data->photo)
                                                            <img class="w-24 h-24 aspect-square rounded" src="{{ $data->photo }}" alt="user_pfp">
                                                        @else
                                                            <img class="w-24 h-24 aspect-square rounded" src="{{ asset('/default_profile.png') }}" alt="default_pfp">
                                                        @endif
                                                    </div>

                                                </div>
                                    </th>
                                    <td class="px-4 py-3">{{ $data->item_name }}</td>
                                    <td class="px-4 py-3">{{ $data->categories->category_name }}</td>
                                    <td class="px-4 py-3">{{ $data->desc }}</td>
                                    <td class="px-4 py-3">Rp{{ $data->price}}</td>

                                    <td class="w-36">
                                        {{-- Start of Edit --}}
                                            {{-- Button Toggle --}}
                                            <div class="flex justify-center items-center pb-2">
                                                <button id="editItemData" data-modal-toggle="editItemData-{{ $data->id }}" class="w-[103px] bg-primary text-white inline-flex items-center hover:text-white border border-cyan hover:bg-turqoise focus:ring-4 focus:outline-none focus:ring-cyanoutline font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="submit">
                                                    <svg class="mr-1 -ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path>
                                                        <path clip-rule="evenodd" fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"></path>
                                                    </svg>
                                                    Edit
                                                </button>
                                            </div>



                                            <!-- Pop-Up Edit -->
                                            <div id="editItemData-{{ $data->id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                                                <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                                                    {{-- Isi Modal Edit --}}
                                                    <div class="relative p-4 bg-white rounded-lg shadow sm:p-5">
                                                        <!-- Header Modal Edit -->
                                                        <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                                                            <h3 class="text-lg font-semibold text-gray-900">
                                                                Edit Data Barang
                                                            </h3>
                                                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="editItemData-{{ $data->id }}">
                                                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                                <span class="sr-only">Tutup modal</span>
                                                            </button>
                                                        </div>

                                                        <!-- Modal body -->
                                                        <form action="{{ route('update_item', ['id' => $data->id]) }}" method="POST" enctype="multipart/form-data">
                                                            @method('put')
                                                            @csrf
                                                            <div class="pb-8">
                                                                {{-- Nama Barang --}}
                                                                <div>
                                                                    <label for="item_name" class="block mb-2 text-base text-start font-medium text-gray-900 ">Nama Barang</label>
                                                                    <input value="{{ $data->item_name }}" required type="text" name="item_name" id="item_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-turqoise focus:border-turqoise block w-full p-2.5 " placeholder="SERTIFIKASI">
                                                                </div>

                                                                {{-- Kategori --}}
                                                                <div>
                                                                    <label for="category" class="block mb-2 mt-4 text-base text-start font-medium text-gray-900 ">Kategori</label>
                                                                    <select name="category" id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                                                                        @foreach($categories as $category)
                                                                            <option {{ $category['id'] == $data->category ? 'selected' : '' }} value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                                                                        @endforeach
                                                                        <option selected value="{{ $data->category }}">{{  $category['name'] }}</option>
                                                                    </select>
                                                                </div>
                                                                {{-- desc --}}
                                                                <div>
                                                                    <label for="item_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                                                                    <input value="{{ $data->desc }}" type="message" name="desc" id="desc" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="asep@mail.com" required="">
                                                                </div>
                                                                {{-- Photo --}}
                                                                <div>
                                                                    <label for="photo" class="block mb-2 text-sm font-medium text-gray-900">Upload file</label>
                                                                    <input type="file" name="photo" id="photo" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50  focus:outline-none" aria-describedby="file_input_help" id="file_input" >
                                                                    <input type="hidden" name="default_photo" id="default_photo" value="{{ $data->photo }}">
                                                                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">Format yang diterima : JPEG, PNG, JPG Maks, 2 Mb</p>
                                                                </div>
                                                                {{-- Harga --}}
                                                                <div>
                                                                    <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga</label>
                                                                    <input value="{{ $data->price }}" type="text" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="asep@mail.com" required="">
                                                                </div>
                                                            </div>

                                                            {{-- CTA Buttons --}}
                                                            <div class="flex justify-center items-center space-x-4">
                                                                <button type="submit" class="text-white bg-primary hover:bg-primary2 focus:ring-4 focus:outline-cyanoutline focus:ring-cyanoutline font-medium rounded-lg text-sm px-5 py-2.5 text-center ">
                                                                    Ubah Data
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                        {{-- End of Edit --}}

                                    {{-- Start of Delete --}}
                                    <div class="flex justify-center m-0 pb-0">
                                        <button id="deleteButton" data-modal-toggle="deleteModal-{{ $data->id }}" type="submit" class="bg-red text-white inline-flex items-center hover:text-white border border-red-600 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center " type="button">
                                            <svg class="mr-1 -ml-1 w-5 h-5" fill="#FFFFFF" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                            </svg>
                                            Hapus
                                        </button>
                                    </div>

                                        <!-- Delete modal -->
                                        <div id="deleteModal-{{ $data->id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                                            <div class="relative p-4 w-full max-w-xl h-full md:h-auto">
                                                <!-- Modal content -->
                                                <div class="relative p-4 text-center bg-white rounded-lg shadow sm:p-5">
                                                    <button type="button" class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="deleteModal-{{ $data->id }}">
                                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                        <span class="sr-only">Close modal</span>
                                                    </button>
                                                    <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                                    <p class="mb-2 text-gray-500"><span class="font-normal">Anda yakin ingin menghapus barang</span></p>
                                                    <p class="mb-8 text-turqoise">{{ $data->item_name }}</p>
                                                    <div class="flex justify-center items-center space-x-4">
                                                        <button data-modal-toggle="deleteModal-{{ $data->id }}" type="button" class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 ">
                                                            Kembali
                                                        </button>

                                                        <a href="{{ route('delete_item', ['id' => $data->id]) }}" class="py-2 px-3 text-sm bg-red font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                                                            Hapus Barang
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- End of Delete --}}

                                </td>


                                    {{-- <td class="px-4 py-3 flex items-center justify-end">



                                        <button id="{{ 'dropdown-' . $data->id }}-dropdown-button" data-dropdown-toggle="{{ 'dropdown-' . $data->id }}-dropdown" class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100" type="button">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                            </svg>
                                        </button>
                                        <div id="{{ 'dropdown-' . $data->id }}-dropdown" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="{{ 'dropdown-' . $data->id }}-dropdown-button">
                                                <li>
                                                    <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Show</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                                </li>
                                            </ul>
                                            <div class="py-1">
                                                <a href="{{ route('delete_item', ['id' => $data->id]) }}" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete</a>
                                            </div>
                                        </div>
                                    </td> --}}
                                </tr>


                                {{-- End Foreach --}}
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <nav class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4" aria-label="Table navigation">
                        <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                            Showing
                            <span class="font-semibold text-gray-900 dark:text-white">1-10</span>
                            of
                            <span class="font-semibold text-gray-900 dark:text-white">1000</span>
                        </span>
                        <ul class="inline-flex items-stretch -space-x-px">
                            <li>
                                <a href="#" class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white rounded-l-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 ">
                                    <span class="sr-only">Previous</span>
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 ">1</a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 ">2</a>
                            </li>
                            <li>
                                <a href="#" aria-current="page" class="flex items-center justify-center text-sm z-10 py-2 px-3 leading-tight text-primary-600 bg-primary-50 border border-primary-300 hover:bg-primary-100 hover:text-primary-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">3</a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 ">...</a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 ">100</a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center justify-center h-full py-1.5 px-3 leading-tight text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 ">
                                    <span class="sr-only">Next</span>
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            </section>






    </div>



    <script src="{{ asset('js/flowbite.js') }}"></script>

    </body>


@endsection
</html>
