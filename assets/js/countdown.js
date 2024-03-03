// Include skrip ini di dalam file countdown-script.js

function updateCountdown(targetDate, id_produk) {
    var countdownContainer = document.getElementById('days' + id_produk);

    // Update waktu mundur setiap detik
    var countdownInterval = setInterval(function () {
        var now = new Date().getTime(); // Waktu sekarang
        var timeRemaining = targetDate - now; // Hitung selisih waktu

        // Hitung hari, jam, menit, dan detik
        var days = Math.floor(timeRemaining / (1000 * 60 * 60 * 24));
        var hours = Math.floor((timeRemaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);

        // Tampilkan hasil perhitungan di elemen HTML
        // Tampilkan hasil perhitungan di elemen HTML
        document.getElementById('days'+id_produk).innerHTML = days;
        document.getElementById('hours'+id_produk).innerHTML = hours;
        document.getElementById('minutes'+id_produk).innerHTML = minutes;
        document.getElementById('seconds'+id_produk).innerHTML = seconds;

        // Jika waktu berakhir, hentikan interval
        if (timeRemaining <= 0) {
            clearInterval(countdownInterval);
        }
    }, 1000); // Jalankan setiap 1 detik
}

