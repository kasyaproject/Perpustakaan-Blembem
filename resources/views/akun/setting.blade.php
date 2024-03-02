<x-app-layout>
    @section('sidebar#setting', 'bg-gray-100 dark:bg-gray-700')

    <div class="p-4 mb-10">
        <div class="flex justify-start px-12 py-4">            
            <p class="font-semibold text-xl dark:text-white">Akun Setting</p>
        </div>
        <div class="flex justify-between items-center text-base dark:text-white px-2 py-4 border-b-2 mx-8 max-md:mx-2">
            <div class="flex">
                <div class="mx-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-person-fill flex-shrink-0 w-12 h-12 border-[2px] text-gray-400 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                      </svg>
                </div>
                <div>
                    <p class="font-medium line-clamp-1">{{ $akun->name }}</p>
                    <p class="font-light text-gray-700 dark:text-gray-400 line-clamp-1">{{ $akun->email }}</p>
                </div>                
            </div>
            <div>
                <button data-modal-toggle="static-modal-{{ $akun->id }}" data-modal-target="static-modal-{{ $akun->id }}" class="px-3 py-1.5 max-md:rounded-md text-white bg-blue-400 dark:bg-gray-700 dark:hover:bg-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square lg:hidden" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                    </svg>
                    <span class="max-md:hidden">Ganti Password</span>
                </button>
            </div>
        </div> 
        <div class="dark:text-white px-2 py-4 pt-8 mx-8 max-md:mx-0">
            <p class="mx-8 max-md:mx-2 font-semibold">DAFTAR BUKU YANG DIUPLOAD : </p>
            <div class="mt-4">
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
        </div>               
    </div>

    {{-- Modal Edit --}}
    @foreach ($akun as $data)
    <div id="static-modal-{{ $akun->id }}" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Ubah data akun
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="static-modal-{{ $akun->id }}">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form action="{{ route('setting.update', ['id' => $akun->id]) }}" class="w-full p-4 md:p-5" method="POST" onsubmit="return validateForm()">
                    @csrf
                    @method('PUT')
                    <div class="grid gap-4 mb-4 grid-cols-2">       
                        <div class="pass col-span-2 max-md:col-span-2" id="passwordFields_{{ $akun->id }}">
                            <label for="passwordlama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password Lama</label>
                            <input type="password" name="passwordlama" id="passwordlama" value="{{ old('passwordlama') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            @error('passwordlama')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="pass col-span-2 max-md:col-span-2" id="passwordFields_{{ $akun->id }}">
                            <label for="passwordbaru" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password Baru</label>
                            <input type="password" name="passwordbaru" id="password_{{ $akun->id }}" value="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        </div>
                        <div class="pass col-span-2 max-md:col-span-2" id="confirmPasswordFields_{{ $akun->id }}">
                            <label for="confirm_password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm Password baru</label>
                            <input type="password" name="confirm_password" id="confirm_password_{{ $akun->id }}" value="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <p class="text-sm text-red-400 hidden" id="pesan-edit_{{ $akun->id }}">Konfirmasi password tidak sesuai !</p>
                        </div>         
                        <div class="col-span-2 flex justify-end w-full mt-4"> <!-- Menambahkan kelas flex justify-center -->
                            <button type="submit" id="submit_{{ $akun->id }}" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-10 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Ubah
                            </button>
                        </div>
                    </div>                                  
                </form>                    
            </div>
        </div>
    </div> 
    @endforeach  

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
        // Skrip untuk memunculkan ganti password
        document.getElementById("confirm_password_{{ $akun->id }}").addEventListener("input", function () {
            var passwordInput = document.getElementById("password_{{ $akun->id }}");
            var confirmPasswordInput = document.getElementById("confirm_password_{{ $akun->id }}");
            var errorMessage = document.getElementById("pesan-edit_{{ $akun->id }}");
            var submitButton = document.getElementById("submit_{{ $akun->id }}");

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
    </script>
</x-app-layout>