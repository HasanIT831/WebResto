<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - Pawon Djawa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>

<section class="tentang-section">

    <!-- Logo -->
    <img src="{{ asset('images/logo.png') }}" class="logo" alt="Logo Pawon Djawa">

    <!-- Card Login -->
    <div class="login-card">
        <h2>LOGIN</h2>

       <form action="/login" method="POST">
    @csrf

    <label>Username</label>
    <input type="text" name="Username" required>

    <label>Password</label>
    <input type="password" name="password" id="password" required>

    @if(session('error'))
        <p style="color:red;">{{ session('error') }}</p>
    @endif

    <div class="options">
        <div class="left">
            <input type="checkbox" onclick="togglePassword()">
            <span>Tampilkan password</span>
        </div>
        <a href="#" class="forgot">Lupa password?</a>
    </div>

    <button type="submit" class="login-btn">LOGIN</button>

    <p class="register">
        Belum punya akun?
        <a href="{{ route('daftar') }}">Daftar</a>
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