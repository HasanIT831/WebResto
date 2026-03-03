<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Menu - Pawon Djawa</title>

    <!-- FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/daftarmenu.css') }}">
</head>
<body>
@include('layouts.Header')
<div class="container">

    <!-- LOGO -->
    <a href="{{ route('dashboard.page') }}">
        <img src="{{ asset('images/logo.png') }}" class="logo">
    </a>

    <!-- TITLE -->
    <div class="title">
        DAFTAR MENU
    </div>

    <!-- SUBTITLE -->
    <div class="subtitle">
        Kami menyediakan :
    </div>

    <!-- MENU BUTTON -->
    <div class="menu-buttons">

        <a href="{{ route('makanan') }}" class="menu-btn">
            Makanan
        </a>

        <a href="{{ route('sayuran') }}" class="menu-btn">
            Sayuran
        </a>

        <a href="{{ route('minuman') }}" class="menu-btn">
            Minuman
        </a>

    </div>

</div>

</body>
</html>