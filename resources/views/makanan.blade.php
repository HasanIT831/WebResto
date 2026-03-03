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

            <h1 class="section-title">KEPITING</h1>

        </div>

        <div class="menu-row">

            <div class="menu-card">
                <img src="{{ asset('images/sauscabe.png') }}">
                <p>Saus Cabe</p>
            </div>

            <div class="menu-card">
                <img src="{{ asset('images/asammanis.png') }}">
                <p>Asam Manis</p>
            </div>

            <div class="menu-card">
                <img src="{{ asset('images/mentega.png') }}">
                <p>Mentega</p>
            </div>

            <div class="menu-card">
                <img src="{{ asset('images/ladahitam.png') }}">
                <p>Lada Hitam</p>
            </div>

        </div>

    </div>


    <!-- GURAME -->
    <div class="section">

        <div class="section-header">

            <h1 class="section-title">GURAME</h1>


        </div>

        <div class="menu-row">

            <div class="menu-card">
                <img src="{{ asset('images/goreng.png') }}">
                <p>Goreng</p>
            </div>

            <div class="menu-card">
                <img src="{{ asset('images/asammanis.png') }}">
                <p>Asam Manis</p>
            </div>

            <div class="menu-card">
                <img src="{{ asset('images/panggang.png') }}">
                <p>Panggang</p>
            </div>

            <div class="menu-card">
                <img src="{{ asset('images/taocao.png') }}">
                <p>Tauco</p>
            </div>

        </div>

    </div>

</div>

</body>
</html>