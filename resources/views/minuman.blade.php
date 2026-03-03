<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Minuman - Pawon Djawa</title>

    <!-- FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/minuman.css') }}">
</head>
<body>
@include('layouts.Header')
<div class="container">

    <!-- TITLE -->
    <div class="title">
        MINUMAN
    </div>

    <!-- MENU LIST -->
    <div class="menu-list">

        <div class="menu-item">
            <img src="{{ asset('images/kopihitam.png') }}">
            <div class="menu-name">Kopi Hitam</div>
        </div>

        <div class="menu-item">
            <img src="{{ asset('images/eslimau.png') }}">
            <div class="menu-name">Es Limau</div>
        </div>

        <div class="menu-item">
            <img src="{{ asset('images/timunparut.png') }}">
            <div class="menu-name">Timun Parut</div>
        </div>

        <div class="menu-item">
            <img src="{{ asset('images/estehleci.png') }}">
            <div class="menu-name">Es Teh Leci</div>
        </div>

        <div class="menu-item">
            <img src="{{ asset('images/kelapajeruk.png') }}">
            <div class="menu-name">Kelapa Jeruk</div>
        </div>

    </div>

</div>

</body>
</html>