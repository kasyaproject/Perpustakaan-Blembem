<x-app-layout>
    @section('sidebar#2', 'block')
    @section('sidebar#buku', 'bg-gray-100 dark:bg-gray-700')

    <div class="w-full p-8 mt-4">
        <div class="flex justify-between mx-8 mb-4">
            <div class="hidden max-sm:block"></div>
            <form class="flex items-center relative max-sm:hidden" action="{{ route('book.index') }}" method="GET" id="searchFormBuku">
                <div class="">
                    <input class="w-72 rounded-l-full pl-6 border-[1px] border-gray-300" type="text" name="searchBuku" value="{{ $search }}" id="searchInputBuku" placeholder="Cari buku...">       
                    <p class="absolute py-1 px-1 mt-[-40px] ml-[265px] w-4 font-semibold text-lg text-red-500 cursor-pointer hidden" id="clearSearchBuku">x</p>
                </div>
                
                <button class="w-12 h-[42px] p-1 rounded-r-full bg-gray-300 dark:bg-gray-500" type="submit" id="SearchbtnBuku">
                    <svg class="w-8 m-1 text-gray-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                    </svg>
                </button>
            </form>
            <a href="{{ route('book.add') }}" class="flex mx-3 items-center cursor-pointer text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-md shadow-blue-500/50 dark:shadow-md dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2 text-center me-2 ">
                Tambah +
            </a>   
        </div>        
        
        <div class="flex rounded-lg pt-4 mb-4 bg-gray-100 dark:bg-gray-700 max-sm:overflow-x-auto shadow-lg mx-auto ">
            <table class="relative w-full text-sm mb-4 text-left rounded- rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase rounded- bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-center">
                            Cover
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Penulis
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Judul
                        </th>                            
                        <th scope="col" class="px-6 py-3">
                            Kategori
                        </th>                            
                        <th scope="col" class="px-6 py-3">
                            Upload By
                        </th>                            
                        <th scope="col" class="px-6 w-[20%] py-3">
                            <span class="sr-only">Detail</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($buku as $book)                       
                    <tr class=" bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="flex justify-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <img class="w-20" src="/storage/{{ $book->cover }}" alt="">
                        </th>
                        <td class="px-6 py-4">
                            <p>{{ $book->penulis }}</p>
                        </td>
                        <td class="px-6 py-4">
                            <p>{{ $book->judul }}</p>
                        </td>
                        <td class="px-6 py-4 w-40">
                            @foreach(json_decode($book->kategori) ?? [] as $kategori)
                                <label>{{ $kategori }}, </label>                                
                            @endforeach
                        </td>
                        <td class="px-6 py-4 w-40">
                            <p>{{ $book->uploader }}</p>
                        </td>
                        <td class="max-md:flex h-full px-2 py-2">
                            <a href="{{ route('book.detail', ['id' => $book->id_buku]) }}" class="mx-1 cursor-pointer text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-md shadow-blue-500/50 dark:shadow-md dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 max-md:px-2 py-2 text-center">
                                <span class="max-md: ">Detail</span>
                            </a> 
                            <button class="mx-1 cursor-pointer text-white bg-gradient-to-r from-red-500 via-red-600 to-red-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-md shadow-red-500/50 dark:shadow-md dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 max-md:px-2 py-2 text-center" data-modal-target="popup-modal-{{ $book->id_buku }}" data-modal-toggle="popup-modal-{{ $book->id_buku }}">
                                <span class="max-md: ">Hapus</span>
                            </button>
                    </tr>
                    @endforeach
                </tbody>
            </table>            
        </div>     
        {{ $buku->links() }}   
    </div>

    {{-- Modal Hapus --}}
    @foreach ($buku as $book)
        <div id="popup-modal-{{ $book->id_buku }}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-lg max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal-{{ $book->id_buku }}">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <form action="{{ route('book.delete', ['id' => $book->id_buku]) }}" class="" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="p-4 md:p-5 text-center">
                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                            </svg>
                            <p></p>
                            <h3 class="mb-2 text-lg font-normal text-gray-500 dark:text-gray-400">Apa anda yakin ingin menghapus buku ini?</h3>
                            <div class="flex justify-center mt-8">
                                <img class="w-20" src="/storage/{{ $book->cover }}" alt="">
                            </div>
                            <p class="mb-10 mt-4 text-lg font-semibold text-gray-500 dark:text-gray-400">{{ $book->judul }} - {{ $book->penulis }}</p>
                            <button data-modal-hide="popup-modal" type="submit" class="text-white mt-4 bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                Ya, saya yakin
                            </button>
                            <button data-modal-hide="popup-modal-{{ $book->id_buku }}" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Tidak</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    <script>
        // Skrip untuk search
        document.addEventListener('DOMContentLoaded', function () {
            const searchInputBuku = document.getElementById('searchInputBuku');
            const searchFormBuku = document.getElementById('searchFormBuku');
            const clearSearchBtnBuku = document.getElementById('clearSearchBuku');

            if (searchInputBuku.value !== '') {
                clearSearchBtnBuku.classList.remove('hidden');
            } else {
                // Jika nilai input kosong, sembunyikan elemen clearSearch
                clearSearchBtnBuku.classList.add('hidden');
            }

            // Event listener untuk tombol "X"
            clearSearchBtnBuku.addEventListener('click', function() {
                // Reset nilai input search
                searchInputBuku.value = '';
                // Kirim formulir
                searchFormBuku.submit();
            });

            // Event listener untuk input search
            searchInputBuku.addEventListener('input', function() {
                if (searchInputBuku.value !== '') {
                    // Jika nilai input tidak kosong, tampilkan elemen clearSearch
                    clearSearchBtnBuku.classList.remove('hidden');
                } else {
                    // Jika nilai input kosong, sembunyikan elemen clearSearch
                    clearSearchBtnBuku.classList.add('hidden');
                }
            });
        });
    </script>
</x-app-layout>