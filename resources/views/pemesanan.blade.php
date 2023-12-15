@extends('layoutmain.main')

@section('container')


{{-- Form --}}
<section class="px-4 mx-auto max-w-screen-xl py-32 ">
    <div class="px-4 mx-auto text-center pb-12">
        <h1 class="mb-4 text-5xl font-bold tracking-tight leading-none text-grey-900 ">Pengajuan Pinjaman</h1>
    </div>


    <form method="post" action="{{route('pesan' , ['id'=>$pemesanan->id])}}" class="max-w-lg mx-auto" enctype="multipart/form-data">
        @csrf
        @method('post')
        <div class="mb-5">
            <label  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sepeda</label>
            <p class="text-md font-regular text-gray-900 dark:text-white">{{ $pemesanan->item_name }}</p>
          </div>
          <div class="mb-5">
            <label  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga</label>
            <p id="harga" class="text-md font-regular text-gray-900 dark:text-white">{{ $pemesanan->price }}</p>
          </div>
          <div class="mb-5">
            <label  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
            <p name="category" class="text-md font-regular text-gray-900 dark:text-white">{{ $pemesanan->categories->category_name }}</p>
          </div>

        <div class="mb-5">
          <label  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Pemesan</label>
          <input type="text" name="name"  class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{\Illuminate\Support\Facades\Auth::user()->name}}" disabled readonly required>
        </div>
        <div class="mb-5">
            <label  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kontak yang bisa dihubungi</label>
            <input type="text" name="no_telp"  class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{\Illuminate\Support\Facades\Auth::user()->nohp}}" disabled readonly required>
        </div>

        <div class="mb-5">
            <label  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Masa Sewa</label>
            <select id="masa" name="masa" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" onchange="calculateTotal()">

                <option value="1">1 hari</option>
                <option value="2">2 hari</option>
                <option value="3">3 hari</option>
              </select>
        </div>



        <div class="mb-5">
            <label  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Mulai Sewa</label>
            <input type="date" name="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
        </div>

        <div class="mb-5">
          <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total Harga</label>
          {{-- <input id="total" name="price" value="Rp{{ $pemesanan->price }}" disabled class="text-2xl font-regular text-gray-900 "> --}}
          <input id="total" name="price" type="hidden" value="{{ $pemesanan->price }}">
          <input id="displayTotal" value="Rp{{ $pemesanan->price }}" disabled class="text-2xl font-regular text-gray-900">
        </div>

        <script>
            function calculateTotal() {
                // Mendapatkan nilai masa sewa dan harga dari elemen HTML
                var masaSewa = document.getElementById("masa").value;
                var harga = {{ $pemesanan->price }};

                // Melakukan perkalian
                var totalHarga = masaSewa * harga;


                // Menampilkan hasil perkalian pada elemen HTML dengan ID "total"
                // document.getElementById("total").innerText = totalHarga;
                document.getElementById("total").value = totalHarga;
            }
        </script>

        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Lanjutkan Pemesanan</button>
      </form>
</section>
{{-- Form --}}


@endsection
