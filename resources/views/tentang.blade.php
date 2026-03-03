<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tentang Kami - Pawon Djawa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/tentang.css') }}">
</head>
<body>
@include('layouts.Header')
<section class="tentang-section">

    <!-- LOGO -->
    <a href="{{ route('dashboard.page') }}">
        <img src="{{ asset('images/logo.png') }}" class="logo">
    </a>

    <!-- TITLE -->
    <div class="title">
        TENTANG KAMI
    </div>

    <!-- TEXT BOX -->
    <div class="text-box">

        <h3>Sejak 2010</h3>

        <p>
            Pawon Djowo memiliki rasa dan kualitas makanan yang tidak tersaingi.
            Semua makanan disiapkan oleh chef profesional dengan cita rasa tinggi,
            staff kami akan melayani anda dengan maksimal.
        </p>

        <p>
            Kami menyediakan makanan khas Jawa yang menggugah selera dan cocok
            dengan selera orang Indonesia.
        </p>

    </div>

    <!-- LAYANAN -->
    <div class="layanan-box">

        <h3>
            KAMI<br>
            MENYEDIAKAN :
        </h3>

        <div class="layanan-list">

            <ul>
                <li>Prasmanan</li>
                <li>Reservasi</li>
            </ul>

            <ul>
                <li>Nasi Kotak</li>
                <li>Tumpeng</li>
            </ul>

        </div>

    </div>

</section>

</body>
</html>
