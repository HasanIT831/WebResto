<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar - Pawon Djawa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/daftarlogin.css') }}">
</head>
<body>

<section class="tentang-section">

    <!-- Logo -->
    <img src="{{ asset('images/logo.png') }}" class="logo" alt="Logo Pawon Djawa">

    <!-- Card -->
    <div class="login-card">
        <h2>DAFTAR AKUN</h2>

        <form action="{{ route('register.proses') }}" method="POST">
        @csrf

        <!-- Username -->
        <label>Username</label>
        <input type="text" name="username" value="{{ old('username') }}" required>
        @error('username')
            <p style="color:red; font-size:13px;">{{ $message }}</p>
        @enderror

        <!-- Nama -->
        <label>Nama</label>
        <input type="text" name="nama" value="{{ old('nama') }}" required>
        @error('nama')
            <p style="color:red; font-size:13px;">{{ $message }}</p>
        @enderror

        <!-- No Tlpn -->
        <label>NO Tlpn</label>
        <input type="text" name="no_tlpn" value="{{ old('no_tlpn') }}" required>
        @error('no_tlpn')
            <p style="color:red; font-size:13px;">{{ $message }}</p>
        @enderror

        <!-- Email -->
        <label>Email</label>
        <input type="text" name="email" value="{{ old('email') }}" required>
        @error('email')
            <p style="color:red; font-size:13px;">{{ $message }}</p>
        @enderror

        <!-- Password -->
        <label>Password</label>
        <input type="password" name="password" id="password" required>
        @error('password')
            <p style="color:red; font-size:13px;">{{ $message }}</p>
        @enderror

        <!-- Show Password -->
        <div class="options">
            <div class="left">
                <input type="checkbox" onclick="togglePassword()">
                <span>Tampilkan password</span>
            </div>
        </div>

        <!-- Button -->
        <button type="submit" class="login-btn">DAFTAR</button>

        <p class="register">
            Sudah punya akun?
            <a href="{{ route('login') }}">Login</a>
        </p>

        </form>
    </div>

</section>

<script>
function togglePassword() {
    const pass = document.getElementById("password");
    pass.type = pass.type === "password" ? "text" : "password";
}
</script>

</body>
</html>