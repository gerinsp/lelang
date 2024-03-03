<main class="md-mb-4">
    <div class="grid grid-cols-1 md:grid-cols-2 h-100 gap-4 md:gap-8">
        <div class="relative flex justify-center">
            <img id="main-image" class="max-w-full h-100vh" src="<?= base_url('assets/file/iconproduk/'.$detail->gambar1) ?>">
            <div class="scrollbar-hide absolute bottom-2 flex w-10-12 gap-4 overflow-scroll scroll-smooth p-8 md:bottom-10">
                <?php for ($i = 1; $i <= 12; $i++) : ?>
                    <?php if ($detail->{'gambar'.$i} != '') : ?>
                        <div class="flex aspect-square w-card-foto flex-none cursor-pointer rounded-lg border-4 border-solid border-white md:w-24">
                            <img onclick="ubahGambar(this)" id="image<?= $i ?>" src="<?= base_url('assets/file/iconproduk/'.$detail->{'gambar'.$i}) ?>" alt="" class="h-full w-full object-cover">
                        </div>
                    <?php endif; ?>
                <?php endfor; ?>
            </div>
        </div>
        <div class="md-mt-4 px-sm">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <li class="inline-flex items-center">
                        <a href="<?= base_url('/') ?>" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                            Home
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                            </svg>
                            <a href="#" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Katalog</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                            </svg>
                            <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400"><?= $detail->nama_produk ?></span>
                        </div>
                    </li>
                </ol>
            </nav>
            <div class="mt-8">
                <h3 class="mb-5 text-2xl text-ternary-gray-200"><?= ucwords(strtolower($detail->nama_produk)) ?></h3>
            </div>
            <div class="grid grid-cols-2 gap-4"><div><h4 class="text-xs font-bold text-ternary-gray-200">Harga</h4>
                    <h6 class="text-lg font-bold text-blue-960 md:text-xl lg:text-2xl">Rp<?= number_format($detail->harga_tertinggi ? $detail->harga_tertinggi : 0,0,',','.') ?></h6>
                </div>
                <div>
                    <h4 class="text-xs font-bold text-ternary-gray-200">Penawaran Terakhir</h4>
                    <h6 class="text-lg font-bold text-blue-960 md:text-xl lg:text-2xl">Rp<?= number_format($detail->penawaran_terakhir ? $detail->penawaran_terakhir : 0,0,',','.') ?></h6>
                </div>
                <div>
                    <h4 class="text-xs font-bold text-ternary-gray-200">Cara Penawaran</h4>
                    <h6 class="text-base font-light text-ternary-gray-200">OPENBIDDING</h6>
                </div>
                <div>
                    <h4 class="text-xs font-bold text-ternary-gray-200">Penyelenggara</h4>
                    <h6 class="text-base font-light text-ternary-gray-200">PT Lelang Indonesia</h6>
                </div>
                <div>
                    <h4 class="text-xs font-bold text-ternary-gray-200">Status Product</h4>
                    <h6 class="text-base font-light text-ternary-gray-200">Available</h6>
                </div>
                <div>
                    <h4 class="text-xs font-bold text-ternary-gray-200">Kode Product</h4>
                    <h6 class="text-base font-light text-ternary-gray-200">PRD<?= $detail->id ?></h6>
                </div>
            </div>
            <div class="mt-8 md-w-50 mb-4"> <!-- Sesuaikan dengan lebar yang diinginkan, contoh: w-1/2 -->
                <a href="https://mail.google.com/mail/?view=cm&fs=1&to=ptxxx@gmail.com&su=Pengajuan%20Harga%20Lelang&body=Isi%20Pesan" target="_blank" class="button-primary block w-full p-2 rounded-lg text-center">
                    <div class="flex justify-center items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                            <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414zM0 4.697v7.104l5.803-3.558zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586zm3.436-.586L16 11.801V4.697z"/>
                        </svg>
                        <span>IKUTI LELANG</span>
                    </div>
                </a>
            </div>


            <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist">
                    <li class="me-2" role="presentation">
                        <button class="inline-block p-4 border-b-2 rounded-t-lg" id="profile-tab" data-tabs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Deskripsi Product</button>
                    </li>
                    <li class="me-2" role="presentation">
                        <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab" aria-controls="dashboard" aria-selected="false">Info Penyelenggara</button>
                    </li>
                </ul>
            </div>
            <div id="default-tab-content">
                <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="text-sm text-gray-500 dark:text-gray-400"><?php echo $detail->deskripsi_produk ?></div>
                </div>
                <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                    <p class="text-sm text-gray-500 dark:text-gray-400">PT Lelang Indonesia menggunakan rekening BANK MANDIRI (PERSERO)
                        Jl. Bethesda Nomor 6 - 8 Gedung Keuangan negara Lt. IV, Manado - Kode Pos 95114</p>
                </div>

            </div>

        </div>
    </div>
    <script>
        function ubahGambar(clickedImage) {
            let image = clickedImage.src

            let mainImage = document.getElementById('main-image')
            mainImage.src = image
        }
    </script>
</main>
