<main>
    <div id="default-carousel" class="relative w-full" data-carousel="slide">
        <!-- Carousel wrapper -->
        <div class="relative overflow-hidden rounded-lg h-224px md-h-600px">
            <!-- Item 1 -->
            <?php foreach ($banner as $b) { ?>
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="<?= base_url('assets/file/banner/'.$b['image']) ?>" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
            <?php } ?>
        </div>
        <!-- Slider indicators -->
        <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
            <?php
            $label = 1;
            $carousel = 0;
            foreach ($banner as $b) { ?>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide <?= $label++ ?>" data-carousel-slide-to="<?= $carousel++ ?>"></button>
            <?php } ?>
        </div>
        <!-- Slider controls -->
        <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4" />
                </svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>
        <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                </svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
    </div>

    <div class="max-w-screen-xl mx-auto px-4 my-4">
        <div class="flex items-center justify-between">
            <h1 class="text-blue-960 font-bold text-category">Kategori Produk</h1>
            <div class="arrow-category">
                <svg class="hover-pointer" onclick="scrollToLeft('scrollableElementKategori')" xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem" viewBox="0 0 24 24">
                    <path class="fill-svg" fill="none" stroke="#256fd0" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m5 12l6-6m-6 6l6 6m-6-6h14" />
                </svg>
                <svg class="hover-pointer" onclick="scrollToRight('scrollableElementKategori')" xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem" viewBox="0 0 24 24">
                    <path class="fill-svg" fill="none" stroke="#256fd0" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 12l-6-6m6 6l-6 6m6-6H5" />
                </svg>
            </div>
        </div>
        <div id="scrollableElementKategori" class="flex gap-4 md:gap-6 my-4 px-3 scrollbar-hide" style="overflow-x: scroll;">
            <?php foreach ($kategori as $value) { ?>
                <a href="<?= base_url('kategori/' . $value['id_kategori']) ?>" class="flex items-center justify-center block max-w-sm h-13 w-13 bg-white border border-blue-500 rounded-lg hover-border-2 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <div class="flex items-center flex-col">
                        <img src="<?= base_url('assets/file/iconkategori/' . $value['icon_kategori']) ?>" class="width-image" alt="icon">
                        <p class="text-center font-semibold text-blue-960 dark:text-gray-400 text-xs md-mt-3 md:text-lg"><?= ucwords(strtolower($value['nama_kategori'])) ?></p>
                    </div>
                </a>
            <?php } ?>
            <?php if (count($kategori) == 0) { ?>
                <div class="my-6 flex items-center justify-center flex-col gap-2">
                    <img src="<?= base_url('assets/img/data-kosong.png') ?>" width="200px" alt="">
                    <span>Data kategori kosong</span>
                </div>

            <?php } ?>
        </div>
        <div class="flex items-center justify-between">
            <h1 class="text-blue-960 font-bold text-category mt-10">Produk Terbaru</h1>
            <div class="arrow-category">
                <svg class="hover-pointer" onclick="scrollToLeft('scrollableElementLive')" xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem" viewBox="0 0 24 24">
                    <path class="fill-svg" fill="none" stroke="#256fd0" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m5 12l6-6m-6 6l6 6m-6-6h14" />
                </svg>
                <svg class="hover-pointer" onclick="scrollToRight('scrollableElementLive')" xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem" viewBox="0 0 24 24">
                    <path class="fill-svg" fill="none" stroke="#256fd0" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 12l-6-6m6 6l-6 6m6-6H5" />
                </svg>
            </div>
        </div>
        <div id="scrollableElementLive" class="flex gap-4 md:gap-6 my-4 px-3 scrollbar-hide" style="overflow-x: scroll;">

            <?php foreach ($live_produk as $value) { ?>
                <?php
                // Hitung waktu berakhirnya iklan (durasi iklan dalam detik)
                $waktu_berakhir = strtotime($value['update_date']) + ($value['durasi_iklan'] * 24 * 60 * 60);
                ?>
                <a href="<?= base_url('/detail/' . $value['id']) ?>">
                    <div class="max-w-lite bg-white border mx-8 border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <div class="grid gap-1 md-p-2">
                            <div class="relative">
                                <img class="h-200px max-w-full rounded-lg" src="<?= base_url('assets/file/iconproduk/' . $value['gambar1']) ?>" alt="">
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
                                        <span class="text-xs font-medium leading-none md:text-base" id="days<?= $value['id'] ?>"></span>
                                        <span class="text-time">Hari</span>
                                        <span class="text-xs font-medium leading-none md:text-base" id="hours<?= $value['id'] ?>"></span>
                                        <span class="text-time">Jam</span>
                                        <span class="mt-1 text-xs font-medium leading-none md:text-base" id="minutes<?= $value['id'] ?>"></span>
                                        <span class="text-time">Menit</span>
                                        <span class="mt-1 text-xs font-medium leading-none md:text-base" id="seconds<?= $value['id'] ?>"></span>
                                        <span class="text-time">Detik</span>
                                    </div>
                                </div>
                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        var targetDate = <?= json_encode($waktu_berakhir * 1000); ?>;
                                        updateCountdown(targetDate, <?= $value['id'] ?>);
                                    });
                                </script>

                            </div>
                            <div class="grid grid-cols-3 gap-1 px-025rem md:p-2">
                                <div>
                                    <img class="h-80px max-w-full rounded-lg" src="<?= base_url('assets/file/iconproduk/' . $value['gambar2']) ?>" alt="">
                                </div>
                                <div>
                                    <img class="h-80px max-w-full rounded-lg" src="<?= base_url('assets/file/iconproduk/' . $value['gambar3']) ?>" alt="">
                                </div>
                                <div>
                                    <img class="h-80px max-w-full rounded-lg" src="<?= base_url('assets/file/iconproduk/' . $value['gambar4']) ?>" alt="">
                                </div>
                            </div>
                        </div>

                        <div class="p-2 mt-4">
                            <h5 class="mb-2 text-title font-bold tracking-tight text-gray-900 dark:text-white"><?= ucwords(strtolower($value['nama_produk'])) ?></h5>
                            <div class="mt-4 mb-1 grid grid-cols-auto text-lite font-normal">
                                <div class="flex justify-between">
                                    <span class="text-gray-500">Harga Awal</span>
                                    <span class="text-red-500 font-bold">Rp <?= number_format(isset($value['hargaawal']) ? $value['hargaawal'] : 0, 0, ',', '.') ?></span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-500">Harga Tertinggi</span>
                                    <span class="text-green-500 font-bold">Rp <?= number_format(isset($value['harga_tertinggi']) ? $value['harga_tertinggi'] : 0, 0, ',', '.') ?></span>
                                </div>
                            </div>
                            <p class="mb-3 font-normal text-sm text-gray-500 dark:text-gray-400 truncate-text">
                                <?= $value['deskripsi_produk'] ?>
                            </p>
                            <div class="my-4 grid grid-cols-auto gap-1 text-xs font-normal">
                                <span class="text-gray-500">Penawaran Terakhir</span>
                                <span class="text-yellow-500 font-bold">Rp <?= number_format(isset($value['penawaran_terakhir']) ? $value['penawaran_terakhir'] : 0, 0, ',', '.') ?></span>
                            </div>
                        </div>
                        <div class="relative mt-6">
                            <div class="absolute right-0 bottom-0 rounded-br-md rounded-tl-md px-3 py-1 bg-green-500">
                                <span class="text-xs font-semibold text-white">OPEN BIDDING</span>
                            </div>
                        </div>
                    </div>
                </a>
            <?php } ?>
        </div>
        <?php if (count($live_produk) == 0) { ?>
            <div class="my-6 flex items-center justify-center flex-col gap-2">
                <img src="<?= base_url('assets/img/data-kosong.png') ?>" width="200px" alt="">
                <span>Data produk kosong</span>
            </div>

        <?php } ?>
        <h1 class="text-blue-960 font-bold text-category mt-10">Katalog Produk</h1>
        <div class="my-3 grid grid-cols-2 place-items-center gap-3 md:grid-cols-3 md:gap-2 lg:grid-cols-4 lg:gap-4">

            <?php foreach ($katalog as $value) { ?>
                <div class="max-w-lite bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="<?= base_url('/detail/' . $value['id']) ?>">
                        <div class="grid gap-1 md-p-2">
                            <div class="relative">
                                <img class="h-katalog max-w-full rounded-lg" src="<?= base_url('assets/img/image1.jpg') ?>" alt="">
                                <div class="absolute right-0 bottom-0 rounded-br-md rounded-tl-md px-3 py-1 bg-green-500">
                                    <span class="text-xs font-semibold text-white">OPEN BIDDING</span>
                                </div>
                            </div>
                        </div>

                        <div class="p-2 mt-2">
                            <h5 class="mb-2 text-title font-bold tracking-tight text-gray-900 dark:text-white"><?= ucwords(strtolower($value['nama_produk'])) ?></h5>
                            <div class="mt-4 mb-1 grid grid-cols-auto text-lite font-normal">
                                <div class="grid grid-cols">
                                    <span class="text-gray-500">Harga</span>
                                    <span class="text-red-500 font-bold text-lite-katalog">Rp <?= number_format(isset($value['harga_tertinggi']) ? $value['harga_tertinggi'] : 0, 0, ',', '.') ?></span>
                                </div>
                            </div>
                            <p class="mb-3 font-normal text-xs md:text-sm text-gray-500 dark:text-gray-400 truncate-text">
                                <?= $value['deskripsi_produk'] ?>
                            </p>
                        </div>
                    </a>
                </div>
            <?php } ?>

        </div>

        <?php if (count($katalog) > 0) { ?>
            <div class="flex justify-center">
                <a href="<?= base_url('/product') ?>" class="p-3 text-sm font-bold md:text-base border-blue rounded-lg text-blue bg-white hover:text-white md:p-4 hover:font-bold hover-bg-blue">Lihat Semua</a>
            </div>
        <?php } else { ?>
            <div class="my-6 flex items-center justify-center flex-col gap-2">
                <img src="<?= base_url('assets/img/data-kosong.png') ?>" width="200px" alt="">
                <span>Data katalog kosong</span>
            </div>
        <?php } ?>
    </div>

    <!-- Include JavaScript untuk perhitungan waktu -->
    <script src="<?= base_url('assets/js/countdown.js') ?>"></script>
    <script>
        function scrollToLeft(element) {
            var scrollableElement = document.getElementById(element);
            var scrollAmount = scrollableElement.clientWidth;

            // Menggulir ke kiri
            scrollableElement.scrollLeft -= scrollAmount;
        }

        function scrollToRight(element) {
            var scrollableElement = document.getElementById(element);
            var scrollAmount = scrollableElement.clientWidth;

            // Menggulir ke kanan
            scrollableElement.scrollLeft += scrollAmount;
        }
    </script>
</main>