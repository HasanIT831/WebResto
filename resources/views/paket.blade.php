<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Paket Menu - Pawon Djawa</title>

    <!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/paket.css') }}">
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
        PILIH PAKET MENU
    </div>

    <!-- SUBTITLE -->
    <div class="subtitle">
        Kami menyediakan :
    </div>

    <!-- MENU BUTTON -->
    <div class="menu-list">

        <a href="{{ route('setmenu') }}" class="menu-btn">
            Set Menu
        </a>

        <a href="{{ route('prasmanan') }}" class="menu-btn">
            Prasmanan
        </a>

        <a href="{{ route('nasikotak') }}" class="menu-btn">
            Nasi Kotak
        </a>

    </div>

</div>

</body>
</html>
