<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@500&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
</head>

<body style="font-family: Inter,sans-serif;">


    <nav class="bg-white border-gray-200 dark:bg-gray-900">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Flowbite</span>
            </a>
            <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="<?= base_url('/') ?>" class="block py-2 px-3 <?php active(''); ?> rounded md:hover:bg-transparent md:bg-transparent md:p-0 md:hover:text-blue-700 dark:text-white md:dark:text-blue-500">Home</a>
                    </li>
                    <li>
                        <a href="<?= base_url('/product') ?>" class="block py-2 px-3 <?php active(['product', 'kategori', 'detail']); ?> rounded md:hover:bg-transparent md:bg-transparent md:p-0 md:hover:text-blue-700 dark:text-white md:dark:text-blue-500">Product</a>
                    </li>
                    <li>
                        <a href="<?= base_url('/profile-perusahaan') ?>" class="block py-2 px-3 <?php active('profile-perusahaan'); ?> rounded md:hover:bg-transparent md:bg-transparent md:p-0 md:hover:text-blue-700 dark:text-white md:dark:text-blue-500">Profile</a>
                    </li>
                    <li>
                        <a href="<?= base_url('/struktur-perusahaan') ?>" class="block py-2 px-3 <?php active('struktur-perusahaan'); ?> rounded md:hover:bg-transparent md:bg-transparent md:p-0 md:hover:text-blue-700 dark:text-white md:dark:text-blue-500">Struktur Perusahaan</a>
                    </li>
                    <li>
                        <a href="<?= base_url('/info') ?>" class="block py-2 px-3 <?php active('info'); ?> rounded md:hover:bg-transparent md:bg-transparent md:p-0 md:hover:text-blue-700 dark:text-white md:dark:text-blue-500">Info</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>