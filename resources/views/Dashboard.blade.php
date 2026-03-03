<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pawon Djawa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body>
@include('layouts.Header')
<section class="hero">
    <!-- HERO CONTENT -->
    <div class="hero-content">

        <h1>
            Nikmati Sajian Jawa<br>
            Terbaik di Kota Denpasar
        </h1>

        <p>
            Rasakan Pengalaman Kuliner Khas Jawa
        </p>

        <a href="{{ route('daftarmenu') }}" class="btn">
            Lihat Menu
        </a>

    </div>

</section>

</body>
</html>
