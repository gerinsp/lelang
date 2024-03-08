<main>
    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md-w-60">
            <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Form Pendaftaran
                    </h1>
                    <form class="space-y-4 md:space-y-6" method="post" action="<?= base_url('/member/tambah') ?>" enctype="multipart/form-data">
                        <input type="hidden" name="id_sales" value="<?= $id_sales ?>">
                        <div>
                            <label for="nik" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIK</label>
                            <input type="number" name="nik" id="nik" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan NIK" required="">
                        </div>
                        <div>
                            <label for="nama_customer" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Lengkap</label>
                            <input type="text" name="nama_customer" id="nama_customer" placeholder="Masukan nama lengkap" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                        </div>
                        <div>
                            <label for="jenis_kelamin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Kelamin</label>
                            <select id="jenis_kelamin" name="jenis_kelamin" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                                <option value="laki-laki">Laki-laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div>
                            <label for="no_hp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No HP</label>
                            <input type="text" name="no_hp" id="no_hp" placeholder="Masukan no hp" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                        </div>
                        <div class="md:flex flex-cols gap-4">
                            <div class="w-full">
                                <label for="ktp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Foto KTP</label>
                                <div class="flex items-center justify-center w-full">
                                    <label for="ktp" class="flex flex-col items-center justify-center w-full h-34 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <div class="flex flex-col items-center justify-center" id="container-ktp">
                                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                                </svg>
                                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                            </div>
                                            <p class="text-xs text-gray-500 dark:text-gray-400" id="file-name-ktp">PNG, JPG (MAX. 800x400px)</p>
                                        </div>
                                        <input id="ktp" name="gambar1" onchange="getFileName(this, 'file-name-ktp', 'container-ktp')" type="file" class="hidden" accept="image/jpeg, image/jpg, image/png" />
                                    </label>
                                </div>
                            </div>
                            <div class="w-full mt-3 md:mt-0">
                                <label for="no_hp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Foto Diri</label>
                                <div class="flex items-center justify-center w-full">
                                    <label for="foto_diri" class="flex flex-col items-center justify-center w-full h-34 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <div class="flex flex-col items-center justify-center" id="container-diri">
                                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                                </svg>
                                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                            </div>
                                            <p class="text-xs text-gray-500 dark:text-gray-400" id="file-name-diri">PNG, JPG (MAX. 800x400px)</p>
                                        </div>
                                        <input id="foto_diri" name="gambar2" onchange="getFileName(this, 'file-name-diri','container-diri')" type="file" class="hidden" accept="image/jpeg, image/jpg, image/png" />
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div>
                            <label for="no_hp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Foto KK</label>
                            <div class="flex items-center justify-center w-full">
                                <label for="kk" class="flex flex-col items-center justify-center w-full h-34 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <div class="flex flex-col items-center justify-center" id="container-kk">
                                            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                            </svg>
                                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                        </div>
                                        <p class="text-xs text-gray-500 dark:text-gray-400" id="file-name-kk">PNG, JPG (MAX. 800x400px)</p>
                                    </div>
                                    <input id="kk" name="gambar3" onchange="getFileName(this, 'file-name-kk', 'container-kk')" type="file" class="hidden" accept="image/jpeg, image/jpg, image/png" />
                                </label>
                            </div>

                        </div>
                        <div>
                            <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                            <textarea id="alamat" name="alamat" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan alamat" required=""></textarea>
                        </div>
                        <button type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Daftar</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script>
        function getFileName(element, index, container) {
            const file = element.files[0];

            if (file) {
                const name = file.name;
                document.getElementById(index).innerText = name;

                const reader = new FileReader();

                reader.onload = function (e) {
                    const img = document.createElement('img');

                    img.src = e.target.result;

                    img.alt = name;
                    img.style.maxWidth = '250px'; // Adjust the maximum width if necessary
                    img.style.maxHeight = '170px';

                    const previewContainer = document.getElementById(container);
                    previewContainer.innerHTML = ''; // Clear previous preview
                    previewContainer.appendChild(img);
                };

                reader.readAsDataURL(file);
            }
        }

    </script>
</main>