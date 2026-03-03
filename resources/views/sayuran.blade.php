<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Makanan - Pawon Djawa</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/makanan.css') }}">
</head>
<body>
@include('layouts.Header')
<div class="container">

    <!-- KEPITING -->
    <div class="section">

        <div class="section-header">

            <h1 class="section-title">SAYURAN</h1>

        </div>

        <div class="menu-row">

            <div class="menu-card">
                <img src="{{ asset('images/kangkung.png') }}">
                <p>Kangkung</p>
            </div>

            <div class="menu-card">
                <img src="{{ asset('images/capcay.png') }}">
                <p>capcay</p>
            </div>

            <div class="menu-card">
                <img src="{{ asset('images/tumispare.png') }}">
                <p>tumis pare</p>
            </div>

            <div class="menu-card">
                <img src="{{ asset('images/urap.png') }}">
                <p>Urap-Urap</p>
            </div>

        </div>

    </div>

</body>
</html>