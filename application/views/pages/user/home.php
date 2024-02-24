<main>
    <div id="default-carousel" class="relative w-full" data-carousel="slide">
        <!-- Carousel wrapper -->
        <div class="relative overflow-hidden rounded-lg h-224px md-h-600px">
            <!-- Item 1 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="<?= base_url('assets/carousel/lelang1.png'); ?>" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
            <!-- Item 2 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="<?= base_url('assets/carousel/lelang2.png'); ?>" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
            <!-- Item 3 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="<?= base_url('assets/carousel/lelang3.png'); ?>" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
        </div>
        <!-- Slider indicators -->
        <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
            <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
        </div>
        <!-- Slider controls -->
        <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
            </svg>
            <span class="sr-only">Previous</span>
        </span>
        </button>
        <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="sr-only">Next</span>
        </span>
        </button>
    </div>

    <div class="max-w-screen-xl mx-auto px-4 my-4">
        <div class="flex items-center justify-between">
            <h1 class="text-blue-960 font-bold text-category">Kategori Objek Lelang</h1>
            <div class="arrow-category">
                <svg class="hover-pointer" onclick="scrollToLeft()" xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem" viewBox="0 0 24 24"><path fill="none" stroke="#256fd0" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m5 12l6-6m-6 6l6 6m-6-6h14"/></svg>
                <svg class="hover-pointer" onclick="scrollToRight()" xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem" viewBox="0 0 24 24"><path fill="none" stroke="#256fd0" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 12l-6-6m6 6l-6 6m6-6H5"/></svg>
            </div>
        </div>
        <div id="scrollableElement" class="flex gap-4 md:gap-6 my-4 px-3 scrollbar-hide" style="overflow-x: scroll;">
            <a href="#" class="flex items-center justify-center block max-w-sm h-13 w-13 bg-white border border-blue-500 rounded-lg hover-border-2 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <p class="text-center font-semibold text-blue-960 dark:text-gray-400 text-base md:text-lg">Rumah</p>
            </a>
            <a href="#" class="flex items-center justify-center block max-w-sm h-13 w-13 bg-white border border-blue-500 rounded-lg hover-border-2 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <p class="text-center font-semibold text-blue-960 dark:text-gray-400 text-base md:text-lg">Mobil</p>
            </a>
            <a href="#" class="flex items-center justify-center block max-w-sm h-13 w-13 bg-white border border-blue-500 rounded-lg hover-border-2 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <p class="text-center font-semibold text-blue-960 dark:text-gray-400 text-base md:text-lg">Motor</p>
            </a>
            <a href="#" class="flex items-center justify-center block max-w-sm h-13 w-13 bg-white border border-blue-500 rounded-lg hover-border-2 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <p class="text-center font-semibold text-blue-960 dark:text-gray-400 text-base md:text-lg">Alat-alat</p>
            </a>
            <a href="#" class="flex items-center justify-center block max-w-sm h-13 w-13 bg-white border border-blue-500 rounded-lg hover-border-2 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <p class="text-center font-semibold text-blue-960 dark:text-gray-400 text-base md:text-lg">Lainnya</p>
            </a>
            <a href="#" class="flex items-center justify-center block max-w-sm h-13 w-13 bg-white border border-blue-500 rounded-lg hover-border-2 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <p class="text-center font-semibold text-blue-960 dark:text-gray-400 text-base md:text-lg">Motor</p>
            </a>
            <a href="#" class="flex items-center justify-center block max-w-sm h-13 w-13 bg-white border border-blue-500 rounded-lg hover-border-2 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <p class="text-center font-semibold text-blue-960 dark:text-gray-400 text-base md:text-lg">Alat-alat</p>
            </a>
            <a href="#" class="flex items-center justify-center block max-w-sm h-13 w-13 bg-white border border-blue-500 rounded-lg hover-border-2 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <p class="text-center font-semibold text-blue-960 dark:text-gray-400 text-base md:text-lg">Lainnya</p>
            </a>
            <a href="#" class="flex items-center justify-center block max-w-sm h-13 w-13 bg-white border border-blue-500 rounded-lg hover-border-2 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <p class="text-center font-semibold text-blue-960 dark:text-gray-400 text-base md:text-lg">Motor</p>
            </a>
            <a href="#" class="flex items-center justify-center block max-w-sm h-13 w-13 bg-white border border-blue-500 rounded-lg hover-border-2 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <p class="text-center font-semibold text-blue-960 dark:text-gray-400 text-base md:text-lg">Alat-alat</p>
            </a>
            <a href="#" class="flex items-center justify-center block max-w-sm h-13 w-13 bg-white border border-blue-500 rounded-lg hover-border-2 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <p class="text-center font-semibold text-blue-960 dark:text-gray-400 text-base md:text-lg">Lainnya</p>
            </a>
            <a href="#" class="flex items-center justify-center block max-w-sm h-13 w-13 bg-white border border-blue-500 rounded-lg hover-border-2 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <p class="text-center font-semibold text-blue-960 dark:text-gray-400 text-base md:text-lg">Motor</p>
            </a>
            <a href="#" class="flex items-center justify-center block max-w-sm h-13 w-13 bg-white border border-blue-500 rounded-lg hover-border-2 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <p class="text-center font-semibold text-blue-960 dark:text-gray-400 text-base md:text-lg">Alat-alat</p>
            </a>
            <a href="#" class="flex items-center justify-center block max-w-sm h-13 w-13 bg-white border border-blue-500 rounded-lg hover-border-2 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <p class="text-center font-semibold text-blue-960 dark:text-gray-400 text-base md:text-lg">Lainnya</p>
            </a>
        </div>
        <h1 class="text-blue-960 font-bold text-category mt-10">Lelang Sedang Berlangsung</h1>
        <div class="flex gap-4 md:gap-6 my-4 px-3 scrollbar-hide" style="overflow-x: scroll;">

            <a href="<?= base_url('/detail') ?>">
                <div class="max-w-lite bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div class="grid gap-1 md-p-2">
                        <div class="relative">
                            <img class="h-200px max-w-full rounded-lg" src="<?= base_url('assets/img/image1.jpg') ?>" alt="">
                            <div class="absolute left-10px top-10px flex items-center gap-2 rounded-md bg-red-500 px-2 py-1">
                                <span class="relative flex h-3 w-3">
                                    <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-white opacity-75">
                                    </span>
                                    <span class="relative inline-flex h-3 w-3 rounded-full bg-white">
                                    </span>
                                </span>
                                <p class="text-live font-bold text-white">LIVE</p>
                            </div>
                            <div class="absolute bottom-3 flex flex-col justify-center gap-1 rounded-br-md rounded-tr-md bg-red-500 p-1 md:bottom-4 md:p-2">
                                <p class="text-5rem font-bold text-white">Berakhir</p>
                                <div class="flex flex-col items-center text-white">
                                    <span class="text-xs font-medium leading-none md:text-base">1</span>
                                    <span class="text-time">Hari</span>
                                    <span class="text-xs font-medium leading-none md:text-base">14</span>
                                    <span class="text-time">Jam</span>
                                    <span class="mt-1 text-xs font-medium leading-none md:text-base">23</span>
                                    <span class="text-time">Menit</span>
                                    <span class="mt-1 text-xs font-medium leading-none md:text-base">33</span>
                                    <span class="text-time">Detik</span>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-3 gap-1 px-025rem md:p-2">
                            <div>
                                <img class="h-80px max-w-full rounded-lg" src="<?= base_url('assets/img/image1.jpg') ?>" alt="">
                            </div>
                            <div>
                                <img class="h-80px max-w-full rounded-lg" src="<?= base_url('assets/img/image1.jpg') ?>" alt="">
                            </div>
                            <div>
                                <img class="h-80px max-w-full rounded-lg" src="<?= base_url('assets/img/image1.jpg') ?>" alt="">
                            </div>
                        </div>
                    </div>

                    <div class="p-2 mt-4">
                        <a href="#">
                            <h5 class="mb-2 text-title font-bold tracking-tight text-gray-900 dark:text-white">Satu Paket Barang Inventaris</h5>
                        </a>
                        <div class="mt-4 mb-1 grid grid-cols-auto text-lite font-normal">
                            <div class="flex justify-between">
                                <span class="text-gray-500">Harga Awal</span>
                                <span class="text-red-500 font-bold">Rp. 100.000.000</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-500">Harga Tertinggi</span>
                                <span class="text-green-500 font-bold">Rp. 200.000.000</span>
                            </div>
                        </div>
                        <p class="mb-3 font-normal text-sm text-gray-500 dark:text-gray-400 truncate-text">
                            Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.
                            enterprise technology acquisitions of 2021 so far, in reverse chronological order.
                            enterprise technology acquisitions of 2021 so far, in reverse chronological order.
                            enterprise technology acquisitions of 2021 so far, in reverse chronological order.
                        </p>
                        <div class="my-4 grid grid-cols-auto gap-1 text-xs font-normal">
                            <span class="text-gray-500">Penawaran Terakhir</span>
                            <span class="text-yellow-500 font-bold">Rp. 200.000.000</span>
                        </div>
                    </div>
                    <div class="relative mt-6">
                        <div class="absolute right-0 bottom-0 rounded-br-md rounded-tl-md px-3 py-1 bg-green-500">
                            <span class="text-xs font-semibold text-white">OPEN BIDDING</span>
                        </div>
                    </div>
                </div>
            </a>

        </div>

        <h1 class="text-blue-960 font-bold text-category mt-10">Katalog Lelang</h1>
        <div class="my-3 grid grid-cols-2 place-items-center gap-3 md:grid-cols-3 md:gap-2 lg:grid-cols-4 lg:gap-4">

            <div class="max-w-lite bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <div class="grid gap-1 md-p-2">
                    <div class="relative">
                        <img class="h-katalog max-w-full rounded-lg" src="<?= base_url('assets/img/image1.jpg') ?>" alt="">
                        <div class="absolute right-0 bottom-0 rounded-br-md rounded-tl-md px-3 py-1 bg-green-500">
                            <span class="text-xs font-semibold text-white">OPEN BIDDING</span>
                        </div>
                    </div>
                </div>

                <div class="p-2 mt-2">
                    <a href="#">
                        <h5 class="mb-2 text-title font-bold tracking-tight text-gray-900 dark:text-white">Satu Paket Barang Inventaris</h5>
                    </a>
                    <div class="mt-4 mb-1 grid grid-cols-auto text-lite font-normal">
                        <div class="grid grid-cols">
                            <span class="text-gray-500">Harga</span>
                            <span class="text-red-500 font-bold text-lite-katalog">Rp. 100.000.000</span>
                        </div>
                    </div>
                    <p class="mb-3 font-normal text-xs md:text-sm text-gray-500 dark:text-gray-400 truncate-text">
                        Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.
                        enterprise technology acquisitions of 2021 so far, in reverse chronological order.
                        enterprise technology acquisitions of 2021 so far, in reverse chronological order.
                        enterprise technology acquisitions of 2021 so far, in reverse chronological order.
                    </p>
                </div>
            </div>
            <div class="max-w-lite bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <div class="grid gap-1 md-p-2">
                    <div class="relative">
                        <img class="h-katalog max-w-full rounded-lg" src="<?= base_url('assets/img/image1.jpg') ?>" alt="">
                        <div class="absolute right-0 bottom-0 rounded-br-md rounded-tl-md px-3 py-1 bg-green-500">
                            <span class="text-xs font-semibold text-white">OPEN BIDDING</span>
                        </div>
                    </div>
                </div>

                <div class="p-2 mt-2">
                    <a href="#">
                        <h5 class="mb-2 text-title font-bold tracking-tight text-gray-900 dark:text-white">Satu Paket Barang Inventaris</h5>
                    </a>
                    <div class="mt-4 mb-1 grid grid-cols-auto text-lite font-normal">
                        <div class="grid grid-cols">
                            <span class="text-gray-500">Harga</span>
                            <span class="text-red-500 font-bold text-lite-katalog">Rp. 100.000.000</span>
                        </div>
                    </div>
                    <p class="mb-3 font-normal text-xs md:text-sm text-gray-500 dark:text-gray-400 truncate-text">
                        Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.
                        enterprise technology acquisitions of 2021 so far, in reverse chronological order.
                        enterprise technology acquisitions of 2021 so far, in reverse chronological order.
                        enterprise technology acquisitions of 2021 so far, in reverse chronological order.
                    </p>
                </div>
            </div>
            <div class="max-w-lite bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <div class="grid gap-1 md-p-2">
                    <div class="relative">
                        <img class="h-katalog max-w-full rounded-lg" src="<?= base_url('assets/img/image1.jpg') ?>" alt="">
                        <div class="absolute right-0 bottom-0 rounded-br-md rounded-tl-md px-3 py-1 bg-green-500">
                            <span class="text-xs font-semibold text-white">OPEN BIDDING</span>
                        </div>
                    </div>
                </div>

                <div class="p-2 mt-2">
                    <a href="#">
                        <h5 class="mb-2 text-title font-bold tracking-tight text-gray-900 dark:text-white">Satu Paket Barang Inventaris</h5>
                    </a>
                    <div class="mt-4 mb-1 grid grid-cols-auto text-lite font-normal">
                        <div class="grid grid-cols">
                            <span class="text-gray-500">Harga</span>
                            <span class="text-red-500 font-bold text-lite-katalog">Rp. 100.000.000</span>
                        </div>
                    </div>
                    <p class="mb-3 font-normal text-xs md:text-sm text-gray-500 dark:text-gray-400 truncate-text">
                        Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.
                        enterprise technology acquisitions of 2021 so far, in reverse chronological order.
                        enterprise technology acquisitions of 2021 so far, in reverse chronological order.
                        enterprise technology acquisitions of 2021 so far, in reverse chronological order.
                    </p>
                </div>
            </div>
            <div class="max-w-lite bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <div class="grid gap-1 md-p-2">
                    <div class="relative">
                        <img class="h-katalog max-w-full rounded-lg" src="<?= base_url('assets/img/image1.jpg') ?>" alt="">
                        <div class="absolute right-0 bottom-0 rounded-br-md rounded-tl-md px-3 py-1 bg-green-500">
                            <span class="text-xs font-semibold text-white">OPEN BIDDING</span>
                        </div>
                    </div>
                </div>

                <div class="p-2 mt-2">
                    <a href="#">
                        <h5 class="mb-2 text-title font-bold tracking-tight text-gray-900 dark:text-white">Satu Paket Barang Inventaris</h5>
                    </a>
                    <div class="mt-4 mb-1 grid grid-cols-auto text-lite font-normal">
                        <div class="grid grid-cols">
                            <span class="text-gray-500">Harga</span>
                            <span class="text-red-500 font-bold text-lite-katalog">Rp. 100.000.000</span>
                        </div>
                    </div>
                    <p class="mb-3 font-normal text-xs md:text-sm text-gray-500 dark:text-gray-400 truncate-text">
                        Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.
                        enterprise technology acquisitions of 2021 so far, in reverse chronological order.
                        enterprise technology acquisitions of 2021 so far, in reverse chronological order.
                        enterprise technology acquisitions of 2021 so far, in reverse chronological order.
                    </p>
                </div>
            </div>

        </div>

        <div class="flex justify-center">
            <a href="#" class="p-3 border-blue rounded-lg text-blue bg-white hover:text-white md:p-4 hover:font-bold hover-bg-blue">Lihat Semua</a>
        </div>
    </div>
    <script>
        function scrollToLeft() {
            var scrollableElement = document.getElementById('scrollableElement');
            var scrollAmount = scrollableElement.clientWidth;

            // Menggulir ke kiri
            scrollableElement.scrollLeft -= scrollAmount;
        }

        function scrollToRight() {
            var scrollableElement = document.getElementById('scrollableElement');
            var scrollAmount = scrollableElement.clientWidth;

            // Menggulir ke kanan
            scrollableElement.scrollLeft += scrollAmount;
        }
    </script>
</main>