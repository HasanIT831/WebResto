<link rel="stylesheet" href="{{ asset('css/Header.css') }}">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

<header class="header">
    
    <!-- Logo -->
    <div class="header-logo">
        <a href="{{ url('/') }}">
            <img src="{{ asset('images/logo.png') }}" alt="Pawon Djawa Logo">
        </a>
    </div>

    <!-- Navigation -->
    <nav class="header-nav">
        <a href="{{ url('/dashboard') }}">Dashboard</a>
        <a href="{{ url('/fasilitas') }}">Fasilitas</a>
        <a href="{{ url('/daftarmenu') }}">Menu</a>
        <a href="{{ url('/paket') }}">Reservasi</a>
        <a href="{{ url('/tentang') }}">Tentang Kami</a>
        <a href="{{ url('/login') }}">Logout</a>
    </nav>

</header>