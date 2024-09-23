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

    <script>
        // Skrip untuk tutup modal pesan
        var closeButton = document.getElementById('popup-close-button');

        closeButton.addEventListener('click', function() {
            document.getElementById('popup-modal').style.display = 'none';
        });
    </script>    
</x-app-layout>