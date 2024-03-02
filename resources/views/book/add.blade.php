<x-app-layout>
    <div class="w-full bg-orange- p-4"> 
        <div class="max-lg:mx-auto mx-8">
            <section class="bg-white dark:bg-gray-900">
                <div class="py-8 px-4 mx-auto">
                    <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Menambah buku baru</h2>
                    <form action="{{ route('book.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="uploader" value="{{ $uploader->name }}">
                        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                            <div class="sm:col-span-2">
                                <label for="judul" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul Buku</label>
                                <input type="text" name="judul" id="judul" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ old('judul') }}" placeholder="Judul buku..." required="">
                                @error('judul')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>   

                            <div class="sm:col-span-2">
                                <label for="penulis" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Penulisa</label>
                                <input type="text" name="penulis" id="penulis" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ old('penulis') }}" placeholder="Nama Penulis buku..." required="">
                                @error('penulis')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>     

                            <div class="sm:col-span-1">
                                <label for="cover" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cover buku</label>
                                <input type="file" name="cover" id="cover" accept="image/jpeg, image/png" value="{{ old('cover') }}" class="bg-gray-50 border mb-2 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                                <div id="image-preview" class="w-full p-6 mb-4 bg-gray-100 dark:bg-gray-800 border-dashed border-2 border-gray-400  rounded-lg items-center mx-auto text-center cursor-">
                                    <label for="cover" style="pointer-events: none;">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-700 mx-auto mb-4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                                        </svg>
                                        <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-700">Upload picture</h5>
                                        <p class="font-normal text-sm text-gray-400 md:px-6">Choose photo size should be less than <b class="text-gray-600">2mb</b></p>
                                        <p class="font-normal text-sm text-gray-400 md:px-6">and should be in <b class="text-gray-600">JPG, PNG, or GIF</b> format.</p>
                                        <span id="filename" class="text-gray-500 bg-gray-200 z-50"></span>
                                    </label>
                                </div>
                                @error('cover')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>                            
                            <div class="sm:col-span-1">
                                <label for="buku" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upload buku</label>
                                <input type="file" name="buku" id="buku" accept="application/pdf" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ old('buku') }}" required="">
                                @error('buku')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                                <p class="my-4 dark:text-white">Pastikan file berbentuk .pdf dan kurang dari 30mb</p>
                            </div>  
                            
                            <div class="sm:col-span-2">
                                <label for="kategori" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori buku</label>
                                <select name="kategori[]" class="" id="kategori" multiple>
                                    @foreach ($kategori as $item)
                                        <option value="{{ $item->nama }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                                @error('kategori')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="sm:col-span-2">
                                <label for="deskripsi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi Buku</label>
                                <textarea id="deskripsi" name="deskripsi" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Deskripsi buku..." required>{{ old('deskripsi') }}</textarea>
                                @error('deskripsi')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="sm:col-span-2">
                                <label for="sinopsis" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sinopsis Buku</label>
                                <textarea id="sinopsis" name="sinopsis" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Sinopsis buku..." required>{{ old('sinopsis') }}</textarea>
                                @error('sinopsis')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="w-full">
                                <label for="halaman" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah Halaman</label>
                                <input type="text" name="halaman" id="halaman" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ old('halaman') }}" placeholder="Jumlah Halaman buku..." >
                                @error('halaman')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="w-full">
                                <label for="penerbit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Penerbit</label>
                                <input type="text" name="penerbit" id="penerbit" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ old('penerbit') }}" placeholder="Penerbit buku..." >
                                @error('penerbit')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="w-full">
                                <label for="isbn" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ISBN</label>
                                <input type="text" name="isbn" id="isbn" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ old('isbn') }}" placeholder="ISBN buku..." >
                                @error('isbn')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="w-full">
                                <label for="tanggal" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Terbit</label>
                                <input type="date" name="tanggal" id="tanggal" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ old('tanggal') }}" placeholder="Tanggal Terbit buku..." >
                                @error('tanggal')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="w-full">
                                <label for="panjang" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Panjang</label>
                                <input type="text" name="panjang" id="panjang" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ old('panjang') }}" placeholder="Panjang buku..." >
                                @error('panjang')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="w-full">
                                <label for="berat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Berat</label>
                                <input type="text" name="berat" id="berat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ old('berat') }}" placeholder="Berat buku..." >
                                @error('berat')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="flex justify-center">
                            <button type="submit" id="submitBtn" class="flex items-center justify-center w-full cursor-pointer text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-md shadow-blue-500/50 dark:shadow-md dark:shadow-blue-800/80 font-medium rounded-lg mt-8 text-sm px-5 py-3 me-2">
                                <p class="font-semibold text-sm">Tambahkan Buku</p>
                            </button>
                        </div>                         
                    </form>
                </div>
            </section>
        </div>  
    </div>

    <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/js/multi-select-tag.js"></script>
    <script>
        // Skrip untuk cover buku
        const uploadInput = document.getElementById('cover');
        const filenameLabel = document.getElementById('filename');
        const imagePreview = document.getElementById('image-preview');
        const submitButton = document.getElementById('submitBtn');
      
        // Check if the event listener has been added before
        let isEventListenerAdded = false;
      
        uploadInput.addEventListener('change', (event) => {
            const file = event.target.files[0];

            if (file) {
                // Cek ukuran file
                if (file.size > 2 * 1024 * 1024) {
                    // Jika ukuran file melebihi 2MB, tampilkan pesan error
                    filenameLabel.textContent = 'File cover melebihi size 2MB';
                    imagePreview.classList.add('border-dashed', 'border-2', 'border-red-500');
                    submitButton.disabled = true;
                    return;
                }

                submitButton.disabled = false;
                // Tampilkan nama file yang dipilih
                filenameLabel.textContent = file.name;

                const reader = new FileReader();
                reader.onload = (e) => {
                    imagePreview.innerHTML =
                        `<img src="${e.target.result}" class="max-h-48 rounded-lg mx-auto" alt="Image preview" />`;
                    imagePreview.classList.remove('border-dashed', 'border-2', 'border-gray-400');
                };
                reader.readAsDataURL(file);
            } 
        });

    
        uploadInput.addEventListener('click', (event) => {
            event.stopPropagation();
        });


        // Skrip untuk buku
        const bukuInput = document.getElementById('buku');
        const maxFileSize = 20 * 1024 * 1024; // 30MB

        bukuInput.addEventListener('change', (event) => {
            const file = event.target.files[0];

            if (file && file.size > maxFileSize) {
                // Jika ukuran file melebihi 30MB, tampilkan pesan error dan nonaktifkan tombol submit
                alert('Ukuran file melebihi batas maksimum (30MB).');
                bukuInput.value = ''; // Reset nilai input file
            }
        });

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