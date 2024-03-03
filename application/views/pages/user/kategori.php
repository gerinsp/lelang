<main class="mt-10 mb-10">
    <div class="max-w-screen-xl mx-auto px-4 my-4">

        <div class="flex items-center justify-between mt-10">
            <h1 class="text-blue-960 font-bold text-category"><?= $title_kategori ?></h1>
            <div class="flex flex-col gap-2 md:flex-row">
                <div class="relative inline-block text-left" data-headlessui-state="">
                    <div>
                        <button data-dropdown-toggle="dropdown-kategori" class="border-blue text-blue hover:text-white hover-bg-blue inline-flex w-full items-center justify-center rounded-md px-4 py-2 text-sm font-medium">
                            <span class="text-sm font-bold md:text-base lg:text-lg">Filter Semua</span>
                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" class="lg:text-2xl" aria-hidden="true" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path fill="none" d="M0 0h24v24H0V0z"></path><path d="M7.41 8.59L12 13.17l4.59-4.58L18 10l-6 6-6-6 1.41-1.41z"></path></svg>
                        </button>
                    </div>
                </div>
                <div data-dropdown-toggle="pengurutan" class="relative inline-block text-left" data-headlessui-state="">
                    <div>
                        <button class="border-blue text-blue hover:text-white hover-bg-blue inline-flex w-full items-center justify-center rounded-md px-4 py-2 text-sm font-medium">
                            <span class="text-sm font-bold md:text-base lg:text-lg">Urutkan</span>
                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" class="lg:text-2xl" aria-hidden="true" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path fill="none" d="M0 0h24v24H0V0z"></path><path d="M7.41 8.59L12 13.17l4.59-4.58L18 10l-6 6-6-6 1.41-1.41z"></path></svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div id="dropdown-kategori" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                <?php foreach ($kategori as $value) { ?>
                    <li>
                        <a href="<?= base_url('kategori/'.$value->id_kategori) ?>" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"><?= $value->nama_kategori ?></a>
                    </li>
                <?php } ?>
            </ul>
        </div>
        <div id="pengurutan" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-55 dark:bg-gray-700">
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                <li>
                    <a href="<?= base_url('kategori/'.$id_kategori.'/terbaru') ?>" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Terbaru</a>
                </li>
                <li>
                    <a href="<?= base_url('kategori/'.$id_kategori.'/termurah') ?>" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Harga (Termurah - Termahal)</a>
                </li>
                <li>
                    <a href="<?= base_url('kategori/'.$id_kategori.'/termahal') ?>" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Harga (Termahal - Termurah)</a>
                </li>
            </ul>
        </div>
        <div class="my-3 grid grid-cols-2 place-items-center gap-3 md:grid-cols-3 md:gap-2 lg:grid-cols-4 lg:gap-4">

            <?php foreach ($produk as $value) { ?>
                <div class="max-w-lite bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="<?= base_url('/detail/'.$value['id']) ?>">
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
                                    <span class="text-red-500 font-bold text-lite-katalog">Rp <?= number_format(isset($value['harga_tertinggi']) ? $value['harga_tertinggi'] : 0,0,',','.') ?></span>
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

        <?php if (count($produk) == 0) { ?>
            <div class="my-6 flex items-center justify-center flex-col gap-2">
                <img src="<?= base_url('assets/img/data-kosong.png') ?>" width="200px" alt="">
                <span>Data produk kosong</span>
            </div>
        <?php } ?>

        <?php if (count($produk_all) > count($produk)) { ?>
            <div class="flex justify-center">
                <a href="#" class="p-3 text-sm font-bold md:text-base border-blue rounded-lg text-blue bg-white hover:text-white md:p-4 hover:font-bold hover-bg-blue">Lihat Lebih Banyak</a>
            </div>
        <?php } ?>
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