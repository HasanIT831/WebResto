<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Set Menu - Pawon Djawa</title>

    <!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/setmenu.css') }}">
</head>
<body>
@include('layouts.Header')
<div class="container">

    <!-- LOGO -->
    <a href="{{ route('paket') }}">
        <img src="{{ asset('images/logo.png') }}" class="logo">
    </a>

    <!-- TITLE -->
    <div class="title">
       PILIH PAKET MENU
    </div>

    <!-- NAV -->
    <div class="menu-nav">

        <a href="{{ route('setmenu') }}" class="menu-btn active">
            Set Menu
        </a>

        <a href="{{ route('prasmanan') }}" class="menu-btn">
            Prasmanan
        </a>

        <a href="{{ route('nasikotak') }}" class="menu-btn">
            Nasi Kotak
        </a>

    </div>

    <!-- CARD MENU -->
    <div class="card-container">
<div class="card-container">

@foreach($setmenus as $menu)
    <a href="{{ route('reservasi', ['kategori' => 'setmenu', 'menu' => $menu->Nama]) }}">
        <div class="card">

            <h2>{{ $menu->Nama }}</h2>

            <h3>Rp {{ number_format($menu->Harga, 0, ',', '.') }}</h3>

            <pre>{{ $menu->Makanan }}</pre>

        </div>
    </a>
@endforeach

</div>

</body>
</html>
