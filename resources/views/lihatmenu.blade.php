<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Lihat Menu - Pawon Djawa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            color: white;
        }

        /* BACKGROUND */
        .hero {

            min-height: 100vh;

            background:
            linear-gradient(rgba(77,54,12,0.65), rgba(77,54,12,0.65)),
            url("{{ asset('images/paket.png') }}");

            background-size: cover;
            background-position: center;

            padding: 30px 60px;
        }

        /* HEADER */
        .header {

            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo {
            width: 130px;
            cursor: pointer;
        }

        /* SECTION */
        .menu-section {

            margin-top: 20px;
            position: relative;
        }

        .section-title {

            text-align: center;
            font-size: 48px;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .section-price {

            position: absolute;
            right: 0;
            top: 10px;
            font-size: 22px;
            text-align: right;
        }

        /* GRID */
        .menu-grid {

            display: flex;
            justify-content: center;
            gap: 30px;
            margin-top: 20px;
            flex-wrap: wrap;
        }

        .menu-item {

            width: 220px;
            text-align: center;
        }

        .menu-item img {

            width: 100%;
            height: 140px;

            object-fit: cover;

            border-radius: 12px;

            box-shadow: 0 5px 15px rgba(0,0,0,0.6);
        }

        .menu-name {

            margin-top: 8px;
            font-size: 20px;
        }

        /* hover */
        .menu-item img:hover {

            transform: scale(1.05);
            transition: 0.3s;
        }

    </style>

</head>
<body>
@include('layouts.Header')
<section class="hero">

    <!-- HEADER -->
    <div class="header">

        <a href="{{ route('dashboard.page') }}">
            <img src="{{ asset('images/logo.png') }}" class="logo">
        </a>

    </div>


    <!-- KEPITING -->
    <div class="menu-section">

        <div class="section-title">KEPITING</div>


        <div class="menu-grid">

            <div class="menu-item">
                <img src="{{ asset('images/sauscabe.png') }}">
                <div class="menu-name">Saus Cabe</div>
            </div>

            <div class="menu-item">
                <img src="{{ asset('images/asammanis.png') }}">
                <div class="menu-name">Asam Manis</div>
            </div>

            <div class="menu-item">
                <img src="{{ asset('images/mentega.png') }}">
                <div class="menu-name">Mentega</div>
            </div>

            <div class="menu-item">
                <img src="{{ asset('images/ladahitam.png') }}">
                <div class="menu-name">Lada Hitam</div>
            </div>

        </div>

    </div>


    <!-- GURAME -->
    <div class="menu-section">

        <div class="section-title">GURAME</div>


        <div class="menu-grid">

            <div class="menu-item">
                <img src="{{ asset('images/goreng.png') }}">
                <div class="menu-name">Goreng</div>
            </div>

            <div class="menu-item">
                <img src="{{ asset('images/asammanis.png') }}">
                <div class="menu-name">Asam Manis</div>
            </div>

            <div class="menu-item">
                <img src="{{ asset('images/panggang.png') }}">
                <div class="menu-name">Panggang</div>
            </div>

            <div class="menu-item">
                <img src="{{ asset('images/taocao.png') }}">
                <div class="menu-name">Tauco</div>
            </div>

        </div>

    </div>


</section>

</body>
</html>
