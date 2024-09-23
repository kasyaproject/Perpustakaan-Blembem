@if (session('success'))
    <div id="popup-modal" tabindex="-1" class="flex dark:bg-gray-500 dark:bg-opacity-75 overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">            
                <div class="p-4 md:p-5 text-center">
                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">{{ session('success') }}</h3>
                    <button id="popup-close-button" data-modal-hide="popup-modal" type="button" class="mt-4 text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                        Oke
                    </button>
                </div>
            </div>
        </div>
    </div>
@elseif (session('error'))
    <div id="popup-modal" tabindex="-1" class="flex dark:bg-gray-500 dark:bg-opacity-75 overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <div class="p-4 md:p-5 text-center">
                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">{{ session('error') }}</h3>
                    <button id="popup-close-button" data-modal-hide="popup-modal" type="button" class="mt-4 text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                        Oke
                    </button>
                </div>
            </div>
        </div>
    </div>    
@endif

<x-app-layout>
    <div class="w-full flex flex-col justify-center items-center bg- p-2 px-4">
        {{-- <div class="flex justify-center items-center w-full h-[90vh] p-4 mb-4 bg-blue-400">
            <p>{{ $book->judul }}</p>
        </div> --}}
        <div class="flex w-full max-lg:flex-col justify-between bg-yellow- p-4">
            <div class="flex justify-center max-lg:w-full w-[30%]">
                <button class="flex items-center px-8 py-6 h-96 rounded-xl shadow-md bg-white" data-modal-target="static-modal" data-modal-toggle="static-modal">
                    <img class="w-52" src="/storage/{{ $book->cover }}" alt="">
                </button>
            </div>
            <div class="max-lg:w-full w-[70%] bg-blue- p-4">
                {{-- JUDUL BUKU --}}
                <div class="flex justify-between">
                    <div class="mr-1">
                        <p class="text-lg font-semibold text-gray-800 dark:text-gray-200 line-clamp-2">{{ $book->penulis }}</p>
                        <p class="text-3xl font-bold dark:text-white">{{ $book->judul }}</p>
                    </div>
                    <div class="flex max-sm:flex-col  dark:text-white">
                        <a href="{{ route('book.edit', ['id' => $book->id_buku]) }}" class="flex justify-center h-8 w-8 mx-1 font-medium rounded-lg text-sm p-2 text-center items-center cursor-pointer text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-md shadow-blue-500/50 dark:shadow-md dark:shadow-blue-800/80">
                            <svg class="w-5 h-5 mt-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 21">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                            </svg>
                        </a> 
                    </div>
                </div>

                <hr class="h-1 my-4 bg-white border-0 dark:bg-gray-700">

                {{-- DESKRIPSI BUKU --}}
                <div class="mt-8 mb-2">
                    <p class="my-2 font-semibold dark:text-white">Deskripsi Buku :</p>
                    <p class="text-justify dark:text-white">{!! nl2br(e($book->deskripsi)) !!}.</p>
                </div>

                <div class="content">                    
                    {{-- SINOPSIS BUKU --}}
                    <div class="my-8">
                        <p class="my-2 font-semibold dark:text-white">Sinopsis :</p>
                        <p class="text-justify dark:text-white">{!! nl2br(e($book->sinopsis)) !!}.</p>
                    </div>      

                    <div class="my-8">
                        <p class="my-2 text-sm dark:text-white">Kategori : 
                            @foreach(json_decode($book->kategori) ?? [] as $kategori)
                                {{ $kategori }}, 
                            @endforeach
                        </p>
                    </div>             
                </div>

                <hr class="h-[2px] my-4 bg-white border-0 dark:bg-gray-700">

                {{-- DETAIL BUKU --}}
                <div class="my-8 px-8">
                    <p class="font-semibold dark:text-white">Detail</p>
                    <div class="grid grid-cols-2 max-sm:grid-cols-1 gap-4 p-3">
                        <div>
                            <p class="text-sm font-semibold text-gray-700 dark:text-gray-300">Jumlah Halaman</p>
                            <p class="dark:text-white">{{ $book->halaman }}</p>
                        </div>       
                        <div>
                            <p class="text-sm font-semibold text-gray-700 dark:text-gray-300">Penerbit</p>
                            <p class="dark:text-white">{{ $book->penerbit }}</p>
                        </div>       
                        <div>
                            <p class="text-sm font-semibold text-gray-700 dark:text-gray-300">Tanggal Terbit</p>
                            <p class="dark:text-white">{{ $book->tanggal }}</p>
                        </div>       
                        <div>
                            <p class="text-sm font-semibold text-gray-700 dark:text-gray-300">Berat</p>
                            <p class="dark:text-white"> {{ $book->berat }} <span>kg</span></p>
                        </div>       
                        <div>
                            <p class="text-sm font-semibold text-gray-700 dark:text-gray-300">ISBN</p>
                            <p class="dark:text-white">{{ $book->isbn }}</p>
                        </div>          
                        <div>
                            <p class="text-sm font-semibold text-gray-700 dark:text-gray-300">Panjang</p>
                            <p class="dark:text-white"> {{ $book->panjang }} <span>kg</span></p>
                        </div>       
                    </div>
                </div> 
            </div>
        </div>
    </div>

    <!-- Main modal -->
    <div id="static-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-5xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <div class="flex p-1">
                    <p class="px-4 pt-2 dark:text-white">buku/ <span class="font-semibold text-base dark:text-white">{{ $book->judul }}</p>                                
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="static-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4 mt-[-25px]">
                    <div class="flipbook-viewport flex justify-center items-center h-[90vh] max-lg:h-full py-4 max-lg:px-12 max-sm:px-0 px-12">
                        <div class="container flex justify-center w-full bg-red-">                                                    
                            <div class="flipbook justify-center w-[461px] h-[600px] max-sm:w-[300px] max-sm:h-[425px] max-lg:w-[600px] max-lg:h-[750px]">
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

    <!-- Scripts -->
    <script type="text/javascript">
        // Function to initialize flipbook and Zoom.js
        function loadApp() {
            // Create the flipbook
            $('.flipbook').turn({
                elevation: 50,
                gradients: true,
                autoCenter: true
            });
        }
        
        // Load the HTML4 version if there's not CSS transform
        yepnope({
            test : Modernizr.csstransforms,
            yep: ['../../lib/turn.js'],
            nope: ['../../lib/turn.html4.min.js'],
            both: ['css/basic.css'],
            complete: loadApp
        });
    </script>

    <script>
        // Skrip untuk tutup modal pesan
        var closeButton = document.getElementById('popup-close-button');

        closeButton.addEventListener('click', function() {
            document.getElementById('popup-modal').style.display = 'none';
        });
    </script>
</x-app-layout>