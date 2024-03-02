<x-app-layout>
    <div class="w-full bg-orange- p-4"> 
        <div class="max-lg:mx-auto mx-8">
            <section class="bg- dark:bg-gray-900">
                <div class="py-8 px-4 mx-auto">                   
                    <form action="{{ route('book.update', ['id' => $book->id_buku]) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="flex max-md:flex-col items-start w-full mb-8">
                            <div class="flex flex-col justify-start items-center ml-[-40px] py-4 max-md:mt-[-40px] w-[30%] max-md:w-full max-md:ml-0">
                                <div class="flex w-64 h-64 max-md:w-64 items-center justify-center p-4 mx-16 max-md:mx-2 rounded-xl shadow-md bg-white dark:bg-gray-700">
                                    <img class="h-full" src="/storage/{{ $book->cover }}" alt="">
                                </div>
                            </div>
                            <div class="lg:w-[70%] w-full grid gap-4 lg:grid-cols-2 sm:gap-6 lg:py-8 lg:pl-8 lg:mt-[-15px]">
                                <div class="sm:col-span-2">
                                    <label for="judul" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul Buku</label>
                                    <input type="text" name="judul" id="judul" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ $book->judul }}" placeholder="Judul buku..." required="">
                                    @error('judul')
                                        <div class="text-red-500">{{ $message }}</div>
                                    @enderror
                                </div>   
    
                                <div class="sm:col-span-2">
                                    <label for="penulis" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Penulisa</label>
                                    <input type="text" name="penulis" id="penulis" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ $book->penulis }}" placeholder="Nama Penulis buku..." required="">
                                    @error('penulis')
                                        <div class="text-red-500">{{ $message }}</div>
                                    @enderror
                                </div>  

                                <div class="sm:col-span-2">
                                    <label for="kategori" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori buku</label>
                                    <select name="kategori[]" class="" id="kategori" multiple>
                                        @php
                                            $selectedCategories = json_decode($book->kategori) ?? [];
                                        @endphp
                                        @foreach ($kategori as $item)
                                            <option value="{{ $item->nama }}" {{ in_array($item->nama, $selectedCategories) ? 'selected' : '' }}>{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                </div> 
                            </div>
                        </div>
                        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">  
                            <div class="sm:col-span-2">
                                <label for="deskripsi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi Buku</label>
                                <textarea id="deskripsi" name="deskripsi" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Deskripsi buku..." required>{{ $book->deskripsi }}</textarea>
                                @error('deskripsi')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="sm:col-span-2">
                                <label for="sinopsis" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sinopsis Buku</label>
                                <textarea id="sinopsis" name="sinopsis" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Sinopsis buku..." required>{{ $book->sinopsis }}"</textarea>
                                @error('sinopsis')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="w-full">
                                <label for="halaman" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah Halaman</label>
                                <input type="text" name="halaman" id="halaman" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ $book->halaman }}" placeholder="Jumlah Halaman buku..." >
                                @error('halaman')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="w-full">
                                <label for="penerbit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Penerbit</label>
                                <input type="text" name="penerbit" id="penerbit" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ $book->penerbit }}" placeholder="Penerbit buku..." >
                                @error('penerbit')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="w-full">
                                <label for="isbn" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ISBN</label>
                                <input type="text" name="isbn" id="isbn" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ $book->isbn }}" placeholder="ISBN buku..." >
                                @error('isbn')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="w-full">
                                <label for="tanggal" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Terbit</label>
                                <input type="date" name="tanggal" id="tanggal" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ $tanggal }}" placeholder="Tanggal Terbit buku..." >
                                @error('tanggal')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="w-full">
                                <label for="panjang" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Panjang</label>
                                <input type="text" name="panjang" id="panjang" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ $book->panjang }}" placeholder="Panjang buku..." >
                                @error('panjang')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="w-full">
                                <label for="berat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Berat</label>
                                <input type="text" name="berat" id="berat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ $book->berat }}" placeholder="Berat buku..." >
                                @error('berat')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="flex justify-center">
                            <button type="submit" id="submitBtn" class="flex items-center justify-center w-full cursor-pointer text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-md shadow-blue-500/50 dark:shadow-md dark:shadow-blue-800/80 font-medium rounded-lg mt-8 text-sm px-5 py-3 me-2">
                                <p class="font-semibold text-sm">Ubah</p>
                            </button>
                        </div>                         
                    </form>
                </div>
            </section>
        </div>  
    </div>

    <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/js/multi-select-tag.js"></script>
    <script>
        // Skrip untuk selescted kategori
        new MultiSelectTag('kategori', {
                rounded: true,    // default true
                shadow: true,      // default false
                placeholder: 'Search',  // default Search...
                tagColor: {
                    textColor: '#3377cc',
                    borderColor: '#F3F4F6',
                    bgColor: '#F3F4F6',
                },
                onChange: function(values) {
                    console.log(values)
                }
            })
    </script>    
</x-app-layout>