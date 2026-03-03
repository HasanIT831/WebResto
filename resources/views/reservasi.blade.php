<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Reservasi - Pawon Djawa</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/reservasi.css') }}">
</head>
<body>
@php
    $kategori = request('kategori');
    $menu = request('menu');

    $kategoriMap = [
        'setmenu'   => 'Set Menu',
        'prasmanan' => 'Prasmanan',
        'paket'     => 'Nasi Kotak',
    ];

    $namaKategori = $kategoriMap[$kategori] ?? null;
    $namaPaket = ($namaKategori && $menu) 
        ? $namaKategori . ' - Paket ' . $menu 
        : null;
@endphp
<div class="container">
    <div class="back-button">
        <a href="{{ route('paket') }}" class="btn-back">← Kembali</a>
    </div>

    <div class="title">
        RESERVASI
    </div>

    <div class="content">

        <!-- FORM -->
        <div class="form-box">
<form action="{{ route('reservasi.store') }}" method="POST">
    @csrf

    <input type="hidden" name="menu" value="{{ $menu }}">
    <input type="text" name="nama" placeholder="Nama" required>
    <input type="text" name="no_tlpn" placeholder="Nomor Telephone" required>
    <input type="time" name="waktu" required>
    <input type="number" name="jumlah_orang" placeholder="Jumlah Orang" required>
    <input type="date" name="tanggal" required>

    <button type="submit" class="btn">
        Pesan Sekarang
    </button>
</form>

        </div>

        <!-- MAP -->
        <div class="map">
            <img src="{{ asset('images/peta.png') }}">
        </div>

    </div>

</div>

</body>
</html>