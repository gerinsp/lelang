<main>

    <section class="bg-center bg-no-repeat bg-[url('https://flowbite.s3.amazonaws.com/docs/jumbotron/conference.jpg')] bg-gray-700 bg-blend-multiply">
        <div class="px-4 mx-auto max-w-screen-xl text-center py-24 lg:py-56">
            <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl">Visi misi perusahaan kami</h1>
            <p class="mb-8 text-lg font-normal text-gray-300 lg:text-xl sm:px-16 lg:px-48"><?= isset($tentangkami->visi_misi) ? $tentangkami->visi_misi : '' ?></p>
        </div>
    </section>

    <div class="flex flex-col items-center mt-10 mb-10 mx-25">
        <h1 class="mb-4 text-xl font-bold tracking-tight leading-none text-gray-800 md:text-5xl">
            Sejarah Perusahaan
        </h1>
        <p class="text-gray-700 leading-relaxed">
            <?= isset($tentangkami->sejarah) ? $tentangkami->sejarah : '' ?>
        </p>
    </div>



</main>