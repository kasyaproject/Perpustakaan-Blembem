<x-guest-layout>
    {{-- REKOMENDASI BUKU --}}
    <div class="font-semibold text-xl mx-6 pt-8 dark:text-white max-md:hidden">
        <p>Rekomendasi buku :</p>
    </div>
    <div class="px-0 py-2 overflow-x-auto max-md:hidden">        
        <div class="flex relative min-w-min justify-start items-center">
            @foreach ($rekomendasi as $item)
                <a href="{{ route('read-book', ['judul' => $item->judul]) }}" class="flex flex-col bg-white mr-3 m-1 w-52 h-80 rounded-md items-center p-2 dark:text-white dark:bg-gray-800 hover:bg-gray-200 dark:hover:bg-gray-600">
                    <img src="/storage/{{ $item->cover }}" class="flex object-cover w-36 h-56 p-2 rounded-md" alt="">
                    <span class="w-full px-2 pt-2 text-sm text-left ine-clamp-1 text-gray-600 dark:text-gray-400">{{ $item->penulis }}</span>
                    <span class="w-full px-1 font-semibold text-left line-clamp-2">{{ $item->judul }}</span>
                </a>    
            @endforeach               
        </div>
    </div>
    

    {{-- KATEGORI --}}
    <div class="flex justify-center h-40 items-center max-sm:px-0 lg:px-0 py-6 mt-4 max-md:border-t-0 border-t-2">
        <div class="bg-white dark:bg-gray-800 w-full h-full rounded-md ">
            <div class="grid grid-cols-5 gap-4 p-3 max-md:pt-5">
                @if (empty($fillter))
                    <a href="{{ route('guest') }}" class="block p-4 text-center rounded-lg bg-gray-100/95 hover:bg-gray-200 dark:bg-gray-700 dark:hover:bg-gray-600 group">
                        <img src="/asset/pelajaran.png" class="mx-auto mb-2 w-7 h-7" alt="pelajaran">
                        <div class="text-sm font-medium text-gray-900 dark:text-white max-sm:hidden">Semua Buku</div>
                    </a>
                    @foreach ($kategori as $item)
                        @if ($loop->index < 4)
                            <form action="{{ route('guest') }}" class="block p-4 text-center rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 group">
                                <button href="" class="w-full h-full">
                                    <img src="/storage/{{ $item->icon }}" class="mx-auto mb-2 w-7 h-7" alt="{{ $item->nama }}">
                                    <div class="text-sm font-medium text-gray-900 dark:text-white max-sm:hidden">{{ $item->nama }}</div>
                                    <input class="hidden" name="fillter" type="text" value="{{ $item->nama }}">
                                </button>
                            </form>                        
                        @endif
                    @endforeach  
                @else
                    <a href="{{ route('guest') }}" class="block p-4 text-center rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 group">
                        <img src="/asset/pelajaran.png" class="mx-auto mb-2 w-7 h-7" alt="pelajaran">
                        <div class="text-sm font-medium text-gray-900 dark:text-white max-sm:hidden">Semua Buku</div>
                    </a>
                    @foreach ($kategori as $item)
                        @if ($loop->index < 4)
                            <form action="{{ route('guest') }}" class="block p-4 text-center rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 group {{ $fillter == $item->nama ? 'dark:bg-gray-700 bg-gray-100/95' : '' }}">
                                <button href="" class="w-full h-full">
                                    <img src="/storage/{{ $item->icon }}" class="mx-auto mb-2 w-7 h-7" alt="{{ $item->nama }}">
                                    <div class="text-sm font-medium text-gray-900 dark:text-white max-sm:hidden">{{ $item->nama }}</div>
                                    <input class="hidden" name="fillter" type="text" value="{{ $item->nama }}">
                                </button>
                            </form>                        
                        @endif
                    @endforeach  
                @endif     
            </div>            
        </div>
    </div>

    {{-- BOOK LIST --}}
    <div class="flex justify-center h-full items-center max-md:px-2 lg:px-0 pb-8">
        <div class="py-4 px-8 bg-white dark:bg-gray-800 w-full h-full rounded-md">
            <form class="flex mb-6 my-4" action="{{ route('guest') }}" method="GET" id="searchFormBuku">
                <div>
                    <input class="ml-4 mr-[-1px] w-72 rounded-l-xl max-sm:w-full" type="text" name="searchBuku" id="searchInputBuku" value="{{ $search }}" placeholder="Cari buku...">
                    <p class="absolute py-1 px-1 mt-[-40px] ml-[280px] w-4 font-semibold text-lg text-red-500 cursor-pointer hidden" id="clearSearchBuku">x</p>    
                </div>
                <button class="w-12 h-[41px] bg-slate-200 rounded-r-xl" type="submit" id="SearchbtnBuku">
                    <img src="/asset/search.svg" class="mx-auto w-5 h-5">
                </button>
            </form>            
            <div class="grid grid-cols-5 max-2xl:grid-cols-4 max-lg:grid-cols-3 max-sm:grid-cols-2 gap-4 p-3">
                @foreach ($buku as $data)
                    <a href="{{ route('read-book', ['judul' => $data->judul]) }}" class="flex flex-col justify-between p-4 h-full max-sm:h-full text-center rounded-lg border-2 border-gray-200 hover:bg-gray-200 dark:hover:bg-gray-600 dark:border-gray-600">
                        <div class="text-start">
                            <img src="/storage/{{ $data->cover }}" class="object-cover p-1 mb-4 w-full max-sm:h-36 md:h-72 max-lg:mb-2" alt="cover">
                            <p class="text-lg font-semibold line-clamp-2 dark:text-white">{{ $data->judul }}</p>
                            <p class="text-sm underline-offset-2 line-clamp-1 underline dark:text-white">{{ $data->penulis }}</p>
                        </div>
                        <div class="place-self-end text-xs text-end mt-10 max-md:line-clamp-1 dark:text-white">
                            @foreach(json_decode($data->kategori) ?? [] as $kategori)
                                <label>{{ $kategori }}, </label>                                
                            @endforeach
                        </div>
                    </a> 
                @endforeach  
            </div>           
            {{ $buku->links() }}  
        </div>
    </div>

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
</x-guest-layout>