<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Transaksi - Pawon Djawa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/Laporan.css') }}">
</head>
<body>

<section class="tentang-section">

    <!-- LOGO -->
    <a href="/">
        <img src="{{ asset('images/logo.png') }}" class="logo">
    </a>

    <!-- TITLE -->
    <div class="title">
        LAPORAN TRANSAKSI RESERVASI
    </div>

    <!-- SEARCH -->
    <div class="search-container">
        <input type="text" 
               placeholder="Cari transaksi..." 
               class="search-input"
               value="{{ request('search') }}">
        <button class="search-btn">Search</button>
    </div>

    <!-- TABLE -->
    <div class="table-container" id="transaksi-container">
        @include('partials.transaksi_table')
    </div>

</section>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const searchInput = document.querySelector('.search-input');
    const searchBtn = document.querySelector('.search-btn');
    const container = document.getElementById('transaksi-container');

    // ===============================
    // SEARCH BUTTON
    // ===============================
    searchBtn.addEventListener('click', function () {
        let search = searchInput.value.trim();
        let url = `?search=${encodeURIComponent(search)}`;
        loadTable(url);
    });

    // ===============================
    // ENTER KEY SEARCH
    // ===============================
    searchInput.addEventListener('keypress', function (e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            searchBtn.click();
        }
    });

    // ===============================
    // AJAX PAGINATION
    // ===============================
    document.addEventListener('click', function (e) {
        if (e.target.closest('.pagination a')) {
            e.preventDefault();
            let url = e.target.closest('.pagination a').getAttribute('href');
            loadTable(url);
        }
    });

    // ===============================
    // LOAD TABLE FUNCTION
    // ===============================
    function loadTable(url) {
        container.style.opacity = '0.5';

        fetch(url, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.text())
        .then(html => {
            container.innerHTML = html;
            container.style.opacity = '1';
            window.history.pushState({path: url}, '', url);
        })
        .catch(error => {
            console.error('Error:', error);
            container.style.opacity = '1';
        });
    }

});
</script>

</body>
</html>