<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tentang Kami - Pawon Djawa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/Laporan.css') }}">
</head>
<body>
<section class="tentang-section">

    <!-- LOGO -->
    <a href="{{ route('dashboard.page') }}">
        <img src="{{ asset('images/logo.png') }}" class="logo">
    </a>

    <!-- TITLE -->
    <div class="title">
        LAPORAN TRANSAKSI RESERVASI
    </div>
  <!-- SEARCH -->
    <div class="search-container">
        <input type="text" placeholder="Cari transaksi..." class="search-input">
        <button class="search-btn">Search</button>
    </div>

    <!-- TABLE -->
    <div class="table-container" id="transaksi-container">
        @include('partials.transaksi_table')
    </div>

</section>

<script>
document.addEventListener('click', function (e) {
    if (e.target.closest('.pagination a')) {
        e.preventDefault();
        let url = e.target.closest('.pagination a').getAttribute('href');
        loadTable(url);
    }
});

function loadTable(url) {
    const container = document.getElementById('transaksi-container');
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
        // Push the new URL to address bar
        window.history.pushState({path: url}, '', url);
    })
    .catch(error => {
        console.warn('Something went wrong.', error);
        container.style.opacity = '1';
    });
}
</script>
</body>
</html>