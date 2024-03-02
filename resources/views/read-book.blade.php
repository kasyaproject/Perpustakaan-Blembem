<x-guest-layout>   

    <!-- Main modal -->
    <div id="static-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-5xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <div class="flex p-1">
                    <p class="px-4 pt-2 dark:text-white">buku/ <span class="font-semibold text-base dark:text-white">{{ $buku->judul }}</p>                                
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="static-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4 mt-[-25px]">
                    <div class="flipbook-viewport flex justify-center items-center h-[90vh] max-lg:h-full py-4 max-lg:px-12 max-sm:px-0 px-3">
                        <div class="container flex max-lg:justify-center w-full bg-red-">                                                    
                            <div class="flipbook justify-center w-[922px] h-[600px] max-sm:w-[300px] max-sm:h-[425px] max-lg:w-[600px] max-lg:h-[750px]">
                                @foreach ($imageFiles as $imageFile)
                                    <div class="cover" style="background-image: url('{{ asset($imageFile) }}'); background-size: 100% 100%; background-repeat: no-repeat;"></div>
                                @endforeach
                            </div>
                        </div>
                    </div>                  
                </div>
            </div>
        </div>
    </div>

    {{-- DETAIL BUKU --}}
    <div class="flex max-lg:flex-col justify-between w-full bg-white dark:bg-gray-800 p-2 mt-6 mb-10 rounded-md">
        {{-- COVER BUKU --}}
        <div class="min-lg:w-3/12 bg-blue- p-4">
            <button data-modal-target="static-modal" data-modal-toggle="static-modal" class="flex justify-center items-center p-4 w-full h-96 mb-4 border-2 rounded-xl shadow-lg dark:border-gray-700 shadow-slate-400 dark:shadow-gray-700 dark:hover:shadow-gray-500 hover:shadow-slate-600">
                <div class="h-80">
                    <img class="w-full h-full" src="/storage/{{ $buku->cover }}" alt="">
                </div>                
            </button>
            <div>
                {{-- <p>text</p> --}}
            </div>
        </div>

        {{-- DETAIL BUKU --}}
        <div class="lg:w-6/12 bg-green- px-8 py-4">
            <input type="checkbox" class="hidden" id="ch">
            {{-- JUDUL BUKU --}}
            <div class="flex justify-between">
                <div class="">
                    <p class="text-lg text-gray-800 dark:text-gray-200 line-clamp-1">{{ $buku->penulis }}</p>
                    <p class="text-3xl font-bold line-clamp-2 dark:text-white">{{ $buku->judul }}</p>
                </div>                
            </div>

            <hr class="h-px my-4 bg-gray-200 border-0 dark:bg-gray-700">

            <div class="flex justify-end dark:text-white">
                <button class="flex m-1 p-2 rounded-md hover:bg-gray-300 dark:hover:bg-gray-600" data-modal-target="static-modal" data-modal-toggle="static-modal">
                    <span class="underline max-md:hidden">Read</span>
                    <svg class="w-7 h-7 md:hidden" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-eyeglasses" viewBox="0 0 16 16">
                        <path d="M4 6a2 2 0 1 1 0 4 2 2 0 0 1 0-4m2.625.547a3 3 0 0 0-5.584.953H.5a.5.5 0 0 0 0 1h.541A3 3 0 0 0 7 8a1 1 0 0 1 2 0 3 3 0 0 0 5.959.5h.541a.5.5 0 0 0 0-1h-.541a3 3 0 0 0-5.584-.953A2 2 0 0 0 8 6c-.532 0-1.016.208-1.375.547M14 8a2 2 0 1 1-4 0 2 2 0 0 1 4 0"/>
                    </svg>
                </button>
                <a href="{{ asset('/storage/' . $buku->buku) }}" download="{{ $buku->buku }}" class="flex m-1 p-2 rounded-md hover:bg-gray-300 dark:hover:bg-gray-600">
                    <span class="underline max-md:hidden">download</span>
                    <svg class="w-7 h-7 md:hidden" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                        <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5"/>
                        <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708z"/>
                    </svg>
                </a>
            </div>

            {{-- SINOPSIS BUKU --}}
            <div class="mt-[-35px] mb-2">
                <p class="my-2 font-semibold dark:text-white">Sinopsis Buku :</p>
                <p class="text-justify dark:text-white">{!! nl2br(e($buku->sinopsis)) !!}.</p>
            </div>
            <div class="flex justify-end mb-8" id="toggleButtonmore">                
                <label class="font-semibold text-blue-600 dark:text-white cursor-pointer" for="ch">Lihat lebih banyak</label>
            </div>

            <div class="content">                  
                {{-- DESKRIPSI BUKU --}}
                <div class="my-8 hidden">
                    <p class="my-2 dark:text-white">Deskripsi :</p>
                    <p class="text-justify dark:text-white">{!! nl2br(e($buku->deskripsi)) !!}.</p>
                </div>
                <div class="my-8 dark:text-white hidden">
                    <label for="">Kategori : </label>
                    @foreach(json_decode($buku->kategori) ?? [] as $kategori)
                        <label>{{ $kategori }}, </label>                                
                    @endforeach
                </div>
                {{-- DETAIL BUKU --}}
                <div class="my-8 hidden">
                    <p class="my-2 dark:text-white">Detail :</p>
                    <p class="text-justify dark:text-white">Jumlah halaman : {{ $buku->halaman }}</p>
                    <p class="text-justify dark:text-white">Tanggal terbit : {{ $buku->tanggal }}</p>
                    <p class="text-justify dark:text-white">Penerbit : {{ $buku->penerbit }}</p>
                    <p class="text-justify dark:text-white">Penulis : {{ $buku->penulis }}</p>
                    <p class="text-justify dark:text-white">ISBN : {{ $buku->isbn }}</p>
                    <p class="text-justify dark:text-white">Berat : {{ $buku->berat }} kg</p>
                    <p class="text-justify dark:text-white">Panjang : {{ $buku->panjang }} cm</p>
                </div>
                <div class="flex justify-end" >
                    <div class="hidden" id="toggleButtonless">                
                        <label class="font-semibold text-blue-600 dark:text-white cursor-pointer" for="ch">Lihat lebih sedikit</label>
                    </div>
                </div>                
            </div>        
            

            <hr class="h-px my-4 bg-gray-200 border-0 dark:bg-gray-700">

            {{-- DETAIL BUKU --}}
            <div class="my-8">
                <p class="font-semibold dark:text-white">Detail</p>
                <div class="grid grid-cols-2 max-sm:grid-cols-1 gap-4 p-3">
                    <div>
                        <p class="text-sm font-semibold text-gray-700 dark:text-gray-300">Jumlah Halaman</p>
                        <p class="dark:text-white">{{ $buku->halaman }}</p>
                    </div>       
                    <div>
                        <p class="text-sm font-semibold text-gray-700 dark:text-gray-300">Penerbit</p>
                        <p class="dark:text-white">{{ $buku->penerbit }}</p>
                    </div>       
                    <div>
                        <p class="text-sm font-semibold text-gray-700 dark:text-gray-300">Tanggal Terbit</p>
                        <p class="dark:text-white">{{ $buku->tanggal }}</p>
                    </div>       
                    <div>
                        <p class="text-sm font-semibold text-gray-700 dark:text-gray-300">Berat</p>
                        <p class="dark:text-white">{{ $buku->berat }}<span>kg</span></p>
                    </div>       
                    <div>
                        <p class="text-sm font-semibold text-gray-700 dark:text-gray-300">ISBN</p>
                        <p class="dark:text-white">{{ $buku->isbn }}</p>
                    </div>       
                    <div>
                        <p class="text-sm font-semibold text-gray-700 dark:text-gray-300">Panjang</p>
                        <p class="dark:text-white"> {{ $buku->panjang }} <span>kg</span></p>
                    </div>       
                </div>
            </div>            
        </div>       
        
        {{-- REKOMENDED BUKU --}}
        <div class="lg:w-3/12 bg-yellow- px-2 py-8">
            <p class="font-semibold my-2 border-b-2 dark:text-white border-black dark:border-white">Rekomendasi Buku :</p>
            <div class="grid grid-cols-2 gap-4 py-4">
                @foreach ($rekomendasi as $rekomendasi)
                    <a href="{{ route('read-book', ['id' => $rekomendasi->id_buku]) }}" class="w-full bg-blue- p-2 rounded-md border-1 shadow-sm dark:border-gray-700 shadow-slate-400 dark:shadow-gray-700 dark:hover:shadow-gray-500 hover:shadow-slate-600">
                        <div class="w-full h-36 dark:bg-gray-700 rounded-md p-2">
                            <img class="object-scale-down w-full h-full" src="/storage/{{ $rekomendasi->cover }}" alt="">
                        </div>
                        <p class="text-xs font-semibold pt-4 line-clamp-1 dark:text-white">{{ $rekomendasi->judul }}</p>
                        <p class="text-[9px] py-1 line-clamp-1 dark:text-white">{{ $rekomendasi->penulis }}</p>
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script type="text/javascript">
        // Function to initialize flipbook
        function loadApp() {
            // Create the flipbook
            $('.flipbook').turn({
                elevation: 50,
                gradients: true,
                autoCenter: true
            });
        }

        // Fungsi untuk memeriksa lebar layar perangkat
        function checkScreenWidth() {
            return window.innerWidth;
        }
        // Logika untuk memuat versi HTML4 atau CSS transform berdasarkan lebar layar
        function loadVersion() {
            var screenWidth = checkScreenWidth();
            if (screenWidth >= 1024 && Modernizr.csstransforms) {
                // Memuat versi dengan CSS transform
                yepnope({
                    test : Modernizr.csstransforms,
                    yep: ['../../lib/turn_double.js'],
                    nope: ['../../lib/turn.html4.min.js'],
                    both: ['css/basic.css'],
                    complete: loadApp
                });
            } else {
                // Memuat versi HTML4
                yepnope({
                    test : Modernizr.csstransforms,
                    yep: ['../../lib/turn_single.js'],
                    nope: ['../../lib/turn.html4.min.js'],
                    both: ['css/basic.css'],
                    complete: loadApp
                });
            }
        }

        // Memanggil fungsi untuk memuat versi berdasarkan lebar layar saat halaman dimuat
        window.onload = function() {
            loadVersion();
        };

        // Menambahkan event listener untuk memuat versi berdasarkan perubahan lebar layar
        window.addEventListener('resize', function() {
            loadVersion();
        });
        
        // Load the HTML4 version if there's not CSS transform
        // yepnope({
        //     test : Modernizr.csstransforms,
        //     yep: ['../../lib/turn.js'],
        //     nope: ['../../lib/turn.html4.min.js'],
        //     both: ['css/basic.css'],
        //     complete: loadApp
        // });
    </script>    
</x-guest-layout>