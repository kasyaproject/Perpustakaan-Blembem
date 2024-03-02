<x-app-layout>
    @section('sidebar#1', 'bg-gray-100 dark:bg-gray-700')

    <div class="flex justify-center items-center">
        <div class="w-full bg-">
            <div class="grid grid-cols-3 max-sm:grid-cols-1 gap-4 p-8 pt-14">
                <div class="transition ease-in-out delay-100 hover:-translate-y-1 hover:scale-10 duration-30" href="">
                    <div class="flex justify-between items-center px-6 h-52 rounded-md shadow-lg bg-gradient-to-l from-cyan-500 to-blue-600 dark:shadow-gray-800 hover:transform dark:bg-gray-700">
                        <div class="flex w-1/2 h-24 items-center justify-center">
                            <img class="w-20 " src="/asset/pelajaran.png" alt="">
                        </div>
                        <div class="w-1/2 justify-start">
                            <p class="font-semibold text-6xl text-white">{{ $totalBooks }}</p>
                            <p class="font-semibold text-xl text-white">Jumlah Buku</p>
                        </div>                    
                    </div>
                </div>                
                <div class="transition ease-in-out delay-100 hover:-translate-y-1 hover:scale-10 duration-30" href="">
                    <div class="flex justify-between items-center px-6 h-52 rounded-md shadow-lg dark:shadow-gray-800 hover:transform bg-gradient-to-l from-pink-500 to-cyan-500 dark:bg-gray-700">
                        <div class="flex w-1/2 h-24 items-center justify-center">
                            <img class="w-20 " src="/asset/rak-book.png" alt="">
                        </div>
                        <div class="w-1/2 justify-start">
                            <p class="font-semibold text-6xl text-white">{{ $totalKategori }}</p>
                            <p class="font-semibold text-xl text-white">Kategori</p>
                        </div>                    
                    </div>
                </div>  
                <div class="transition ease-in-out delay-100 hover:-translate-y-1 hover:scale-10 duration-30">
                    <div class="flex justify-between items-center px-6 h-52 rounded-md shadow-lg dark:shadow-gray-800 hover:transform bg-gradient-to-l from-yellow-500 to-pink-500 dark:bg-gray-700">
                        <div class="flex w-1/2 h-24 items-center justify-center">
                            <img class="w-20 " src="/asset/reading.png" alt="">
                        </div>
                        <div class="w-1/2 justify-start">
                            <p class="font-semibold text-6xl text-white">{{ $totalRead }}</p>
                            <p class="font-semibold text-xl text-white">Jumlah Pembaca</p>
                        </div>                    
                    </div>
                </div>  
            </div>
        </div>        
    </div>
    
</x-app-layout>
