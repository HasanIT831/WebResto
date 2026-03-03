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

    <!-- Card Login -->
    <div class="login-card">
        <h2>DAFTAR AKUN</h2>

      <form action="{{ route('register.proses') }}" method="POST">
    @csrf

    <label>Username</label>
    <input type="text" name="username" required>

    <label>Nama</label>
    <input type="text" name="nama" required>

    <label>NO Tlpn</label>
    <input type="text" name="no_tlpn" required>

    <label>Email</label>
    <input type="text" name="email" required>

    <label>Password</label>
    <input type="password" name="password" id="password" required>

    <div class="options">
        <div class="left">
            <input type="checkbox" onclick="togglePassword()">
            <span>Tampilkan password</span>
        </div>
    </div>

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