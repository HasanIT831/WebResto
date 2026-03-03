<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Transaksi - Pawon Djawa</title>
    <link rel="stylesheet" href="{{ asset('css/transaksi.css') }}">
</head>
<body>

@php
    // Ambil data reservasi dan setmenu
    $reservasi = session('reservasi');
    $setmenu = session('setmenu');
    
    // Fungsi untuk menghitung biaya reservasi flat per rombongan
    function hitungBiayaReservasi($jumlah_orang) {
        if ($jumlah_orang <= 10) {
            return 100000;
        } elseif ($jumlah_orang <= 20) {
            return 200000;
        } elseif ($jumlah_orang <= 35) {
            return 350000;
        } elseif ($jumlah_orang <= 50) {
            return 500000;
        } elseif ($jumlah_orang <= 70) {
            return 700000;
        } elseif ($jumlah_orang <= 100) {
            return 1000000;
        } else {
            return 0;
        }
    }
    
    $biaya_reservasi = $reservasi ? hitungBiayaReservasi($reservasi->jumlah_orang) : 0;
    $harga_paket = $setmenu ? $setmenu->Harga : 0; // Harga paket tetap, tidak dikali jumlah orang
    $total_sebelum_ppn = $biaya_reservasi + $harga_paket;
    $ppn = $total_sebelum_ppn * 0.11;
    $total_keseluruhan = $total_sebelum_ppn + $ppn;
@endphp

<div class="hero">
    <div class="overlay"></div>

    <!-- Logo -->
    <div class="logo">
        <img src="{{ asset('images/logo.png') }}" alt="Logo">
    </div>

    <div class="container">

        <h1 class="title">TRANSAKSI</h1>

        @if(session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

       <form action="{{ route('transaksi.store') }}" method="POST">
    @csrf

            <!-- Row 1 - Tanggal Transaksi (dari reservasi) -->
            <div class="form-row">
                <div class="fake-input">TANGGAL</div>
                <input type="date" name="tanggal_transaksi"
                    value="{{ $reservasi->tanggal ?? '' }}" readonly>
            </div>

            <!-- Row 2 - Paket (dari setmenu) -->
            <div class="form-row">
                <div class="fake-input">PAKET</div>
                <input type="text" name="jenis_paket"
    value="{{ $setmenu->Nama ?? '' }} - Rp {{ number_format($setmenu->Harga ?? 0, 0, ',', '.') }}"
    readonly>
            </div>

            <!-- Row 3 - Jumlah Orang (dari reservasi) -->
            <div class="form-row">
                <div class="fake-input">JUMLAH ORANG</div>
                <input type="text" name="jumlah_orang"
                    value="{{ $reservasi->jumlah_orang ?? '' }}" readonly>
            </div>

            <!-- Row 4 - Biaya Reservasi (OTOMATIS) -->
<!-- Row 4 - Biaya Reservasi (OTOMATIS) -->
<div class="form-row">
    <div class="fake-input">BIAYA RESERVASI</div>
    <input type="text" name="biaya_reservasi"
        value="Rp {{ number_format($biaya_reservasi, 0, ',', '.') }}" 
        readonly style="background-color: #e9ecef;">
</div>

<!-- Row 5 - PPN 11% -->
<div class="form-row">
    <div class="fake-input">PPN 11%</div>
    <input type="text" name="ppn"
        value="Rp {{ number_format($ppn, 0, ',', '.') }}" 
        readonly style="background-color: #e9ecef;">
</div>

<!-- Row 6 - TOTAL (Paket + Reservasi + PPN) -->
<div class="form-row">
    <div class="fake-input">TOTAL</div>
    <input type="text" name="total"
        value="Rp {{ number_format($total_keseluruhan, 0, ',', '.') }}" 
        readonly style="background-color: #e9ecef; font-weight: bold; color: #28a745;">
</div>

            <div class="button-wrapper">
                <a href="{{ url()->previous() }}" class="btn-pesan">Kembali</a>
               <button type="submit" class="btn-pesan">Pesan Sekarang</button>
            </div>

        </form>
    </div>
</div>

</body>
</html>