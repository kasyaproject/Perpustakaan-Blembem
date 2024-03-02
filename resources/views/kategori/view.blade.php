<x-app-layout>  
    @section('sidebar#2', 'block')
    @section('sidebar#kategori', 'bg-gray-100 dark:bg-gray-700')
    
    <div class="w-full p-8 mt-4">
        <div class="flex justify-between mx-8 mb-4">
            <div class="hidden max-sm:block"></div>
            <div></div>
            <button data-modal-toggle="authentication-modal" data-modal-target="authentication-modal" class="flex mx-3 items-center cursor-pointer text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-md shadow-blue-500/50 dark:shadow-md dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2 text-center me-2 ">
                Tambah +
            </button>   
        </div>        
        
        <div class="w-full rounded-lg pt-4 pb-1 mb-4 bg-gray-100 dark:bg-gray-700 max-sm:overflow-x-auto shadow-lg mx-auto">
            <table class="relative w-full px-auto text-sm mb-4 text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Kode
                        </th>                            
                        <th scope="col" class="px-6 w-[20%] py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kategori as $data)                       
                    <tr class="bg-white items-center border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="flex pt- py-4 justify-center items-center font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <img class="w-20 px-1" src="/storage/{{ $data->icon }}" alt="">
                        </th>
                        <td class="px-6 py-4">
                            {{ $data->nama }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $data->kode }}
                            
                        </td>
                        <td class="px-6 max-md:flex max-md:px-8 py-8">
                            @if ($data->id_kategori > 4)                     
                            <div class="flex justify-center">
                                <button data-modal-target="popup-modal-{{ $data->id_kategori }}" data-modal-toggle="popup-modal-{{ $data->id_kategori }}" class="flex justify-center cursor-pointer text-white bg-gradient-to-r from-red-500 via-red-600 to-red-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-md shadow-red-500/50 dark:shadow-md dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 max-md:px-2 py-2 text-center me-2" type="button">
                                    <svg class="" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                                    </svg>
                                    <p class="max-sm:hidden block pl-2">Hapus</p>                                    
                                </button>
                            </div>
                            @else
                                <div class="flex justify-center">
                                    <svg class="w-6 h-6 ml-[-4px] text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" d="M8 10V7a4 4 0 1 1 8 0v3h1a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2v-7c0-1.1.9-2 2-2h1Zm2-3a2 2 0 1 1 4 0v3h-4V7Zm2 6c.6 0 1 .4 1 1v3a1 1 0 1 1-2 0v-3c0-.6.4-1 1-1Z" clip-rule="evenodd"/>
                                    </svg>
                                </div>                                
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>            
        </div>    
        {{ $kategori->links() }}   
    </div>

    {{-- Modal Tambah --}}
    <div id="authentication-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full"> 
        <div class="relative p-4 w-full max-w-xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Tambah data akun
                    </h3>
                    <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="authentication-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5">
                    <form class="space-y-4" action="{{ route('kategori.add') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Input nama kategori</label>
                            <input type="text" name="nama" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" value="{{ old('nama') }}" placeholder="Buku pelajaran" required>
                            @error('nama')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>                        
                        <div>
                            <label for="icon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Input gambar kategori</label>
                            <input type="file" name="icon" id="icon" accept="image/jpeg, image/png" value="{{ old('icon') }}" class="bg-gray-50 border mb-2 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full dark:bg-gray-600 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                            @error('icon')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="w-full mt-8 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div> 

    {{-- Modal Edit --}}
    {{-- @foreach ($akun as $data)
        <div id="static-modal-{{ $data->id }}" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Ubah data akun
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="static-modal-{{ $data->id }}">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form action="{{ route('akun.update', ['id' => $data->id]) }}" class="w-full p-4 md:p-5" method="POST" onsubmit="return validateForm()">
                        @csrf
                        @method('PUT')
                        <div class="grid gap-4 mb-4 grid-cols-2">
                            <div class="col-span-2">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" 
                                value="{{ $data->name }}" required>
                            </div>
                            <div class="col-span-2">
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                <input type="text" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                value="{{ $data->email }}" required>
                            </div>                            
                            <div class="col-span-2">
                                <input id="ch_{{ $data->id }}" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="ch_{{ $data->id }}" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Ganti Password</label>
                            </div>  
                            <div class="pass hidden col-span-1 max-md:col-span-2" id="passwordFields_{{ $data->id }}">
                                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                                <input type="password" name="password" id="password_{{ $data->id }}" value="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            </div>
                            <div class="pass hidden col-span-1 max-md:col-span-2" id="confirmPasswordFields_{{ $data->id }}">
                                <label for="confirm_password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm Password</label>
                                <input type="password" name="confirm_password" id="confirm_password_{{ $data->id }}" value="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <p class="text-sm text-red-400 hidden" id="pesan-edit_{{ $data->id }}">Konfirmasi password tidak sesuai !</p>
                            </div>                           
                            <div class="col-span-2">
                                <label for="description" class="block mb- text-sm font-medium text-gray-900 dark:text-white">Product Description</label>
                                <select name="akses" class=" bg-gray-50 border mb-2 text-base font-semibold border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                                    <option value="user" {{ old('akses', $data->akses) == 'user' ? 'selected' : '' }} class="m-2 text-base">user</option>
                                    <option value="admin" {{ old('akses', $data->akses) == 'admin' ? 'selected' : '' }} class="m-2 text-base">admin</option>
                                </select>                    
                            </div>
                            <div class="col-span-2 flex justify-end w-full"> <!-- Menambahkan kelas flex justify-center -->
                                <button type="submit" id="submit_{{ $data->id }}" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-10 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Ubah
                                </button>
                            </div>
                        </div>                                  
                    </form>                    
                </div>
            </div>
        </div> 
    @endforeach     --}}

    {{-- Modal Hapus --}}
    @foreach ($kategori as $data)
        <div id="popup-modal-{{ $data->id_kategori }}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-lg max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal-{{ $data->id_kategori }}">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <form action="{{ route('kategori.delete', ['id' => $data->id_kategori]) }}" class="" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="p-4 md:p-5 text-center">
                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                            </svg>
                            <p></p>
                            <h3 class="mb-2 text-lg font-normal text-gray-500 dark:text-gray-400">Apa anda yakin ingin menghapus data ini?</h3>
                            <div class="flex justify-center mt-8">
                                <img class="w-20" src="/storage/{{ $data->icon }}" alt="">
                            </div>
                            <p class="my-2 text-lg font-semibold text-gray-500 dark:text-gray-400">{{ $data->nama }} - {{ $data->kode }}</p>
                            <button data-modal-hide="popup-modal" type="submit" class="text-white mt-4 bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                Ya, saya yakin
                            </button>
                            <button data-modal-hide="popup-modal-{{ $data->id_kategori }}" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Tidak</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    {{-- <script>
        // Skrip untuk search
        document.addEventListener('DOMContentLoaded', function () {
            const searchInput = document.getElementById('searchInput');
            const searchForm = document.getElementById('searchForm');
            const clearSearchBtn = document.getElementById('clearSearch');

            if (searchInput.value !== '') {
                clearSearchBtn.classList.remove('hidden');
            } else {
                clearSearchBtn.classList.add('hidden');
            }

            // Event listener untuk tombol "X"
            clearSearchBtn.addEventListener('click', function() {
                // Reset nilai input search
                searchInput.value = '';
                // Kirim formulir
                searchForm.submit();
            });

            // Event listener untuk input search
            searchInput.addEventListener('input', function() {
                if (searchInput.value !== '') {
                    // Jika nilai input tidak kosong, tampilkan elemen clearSearch
                    clearSearch.classList.remove('hidden');
                } else {
                    // Jika nilai input kosong, sembunyikan elemen clearSearch
                    clearSearch.classList.add('hidden');
                }
            });
        });

        // Skrip untuk reset input di modal tambah saat di tutup MODAL TAMBAH
        document.addEventListener('DOMContentLoaded', function () {
            const passwordField = document.getElementById('password');
            const confirmPasswordField = document.getElementById('confirm_password');
            const errorMessage = document.getElementById('pesan');
            const submitButton = document.querySelector('button[type="submit"]');

            confirmPasswordField.addEventListener('input', function () {
                if (confirmPasswordField.value !== passwordField.value) {
                    confirmPasswordField.classList.add('dark:text-red-500');
                    confirmPasswordField.classList.add('focus:ring-red-500');
                    errorMessage.classList.remove('hidden');
                    submitButton.disabled = true;
                } else {
                    confirmPasswordField.classList.remove('dark:text-red-500');
                    confirmPasswordField.classList.remove('focus:ring-red-500');
                    errorMessage.classList.add('hidden');
                    submitButton.disabled = false;
                }
            });
        });

        // Skrip untuk memunculkan ganti password
        @foreach ($akun as $data)
            document.getElementById("ch_{{ $data->id }}").addEventListener("change", function() {
                var passwordField = document.getElementById("passwordFields_{{ $data->id }}");
                var confirmPasswordField = document.getElementById("confirmPasswordFields_{{ $data->id }}");
                var passwordInput = document.getElementById("password_{{ $data->id }}");
                var confirmPasswordInput = document.getElementById("confirm_password_{{ $data->id }}");
                var submitButton = document.getElementById("submit_{{ $data->id }}");
                
                if (this.checked) {
                    passwordField.style.display = "block";
                    confirmPasswordField.style.display = "block";
                    submitButton.disabled = true;
                } else {
                    passwordField.style.display = "none";
                    confirmPasswordField.style.display = "none";
                    passwordInput.value = "";
                    confirmPasswordInput.value = "";
                    submitButton.disabled = false;
                }
            });  

            document.getElementById("confirm_password_{{ $data->id }}").addEventListener("input", function () {
                var passwordInput = document.getElementById("password_{{ $data->id }}");
                var confirmPasswordInput = document.getElementById("confirm_password_{{ $data->id }}");
                var errorMessage = document.getElementById("pesan-edit_{{ $data->id }}");
                var submitButton = document.getElementById("submit_{{ $data->id }}");

                if (confirmPasswordInput.value !== passwordInput.value) {
                    confirmPasswordInput.classList.add("dark:text-red-500");
                    confirmPasswordInput.classList.add("focus:ring-red-500");
                    errorMessage.classList.remove('hidden');
                    submitButton.disabled = true;
                } else {
                    confirmPasswordInput.classList.remove("dark:text-red-500");
                    confirmPasswordInput.classList.remove("focus:ring-red-500");
                    errorMessage.classList.add("hidden");
                    submitButton.disabled = false;
                }
            });
        @endforeach     
    </script> --}}
    
</x-app-layout>