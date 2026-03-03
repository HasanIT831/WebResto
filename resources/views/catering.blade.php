<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Catering - Pawon Djawa</title>

    <!-- FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- CSS EXTERNAL -->
    <link rel="stylesheet" href="{{ asset('css/catering.css') }}">
</head>
<body>
@include('layouts.Header')
<div class="container">

    <!-- LOGO -->
    <a href="{{ route('dashboard') }}">
        <img src="{{ asset('images/logo.png') }}" class="logo">
    </a>

    <!-- TITLE -->
    <div class="title">
        PAKET MENU
    </div>

    <!-- NAV -->
    <div class="menu-nav">

        <a href="{{ route('setmenu') }}" class="menu-btn">
            Set Menu
        </a>

        <a href="{{ route('catering') }}" class="menu-btn active">
            Catering
        </a>

        <a href="{{ route('prasmanan') }}" class="menu-btn">
            Prasmanan
        </a>

        <a href="{{ route('nasikotak') }}" class="menu-btn">
            Nasi Kotak
        </a>

    </div>

    <!-- CARD -->
    <div class="card-container">

        <!-- Catering A -->
        <div class="card">

            <h2>Catering A</h2>
            <div class="price">Rp 150.000</div>

            <b>Makanan</b>
            <ul>
                <li>Ayam Goreng / Panggang</li>
                <li>Daging Ikan Asam Manis</li>
                <li>Sate Ayam (2tsk/pax)</li>
                <li>Sambel Kentang Teri</li>
                <li>Tumis Tahu Cabe Ijo</li>
                <li>Urap / Tempe Sambal Teri</li>
                <li>Lalapan + Sambal Terasi</li>
                <li>Kerupuk Udang</li>
                <li>Nasi Putih</li>
                <li>Buah-Buahan / Rujak Buah</li>
            </ul>

            <b>Minuman</b>
            <ul>
                <li>Air Mineral Cup</li>
            </ul>

        </div>

        <!-- Catering B -->
        <div class="card">

            <h2>Catering B</h2>
            <div class="price">Rp 198.000</div>

            <b>Makanan</b>
            <ul>
                <li>Ayam Goreng / Panggang</li>
                <li>Udang Goreng Mentega</li>
                <li>Kari Kambing / Dendeng Sapi</li>
                <li>Ikan Kakap Gulai / Cabe Ijo</li>
                <li>Sate Ayam (2tsk/pax)</li>
                <li>Sambel Kentang Teri</li>
                <li>Urap / Tempe Sambal Teri</li>
                <li>Lalapan + Sambal Terasi</li>
                <li>Kerupuk Udang</li>
                <li>Nasi Putih</li>
                <li>Buah-Buahan / Rujak Buah</li>
            </ul>

            <b>Minuman</b>
            <ul>
                <li>Air Mineral Botol</li>
            </ul>

        </div>

        <!-- Catering C -->
        <div class="card">

            <h2>Catering C</h2>
            <div class="price">Rp 230.000</div>

            <b>Makanan</b>
            <ul>
                <li>Ayam Goreng / Panggang</li>
                <li>Ikan Kakap Gulai / Asam Manis</li>
                <li>Udang Goreng Mentega</li>
                <li>Kari Kambing / Dendeng Sapi</li>
                <li>Sate Ayam (3tsk/pax)</li>
                <li>Sambel Kentang Teri</li>
                <li>Terong Sambal Balado</li>
                <li>Urap / Tempe Sambal Teri</li>
                <li>Lalapan + Sambal Terasi</li>
                <li>Kerupuk Udang</li>
                <li>Nasi Putih</li>
                <li>Buah-Buahan / Rujak Kweni</li>
            </ul>

            <b>Minuman</b>
            <ul>
                <li>Air Mineral Botol</li>
            </ul>

        </div>

    </div>

</div>

</body>
</html>
