<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mathventure - Sign In</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('asset/css/login-style.css') }}"> 
</head>
<body>
    <!-- Audio autoplay loop -->
    <audio id="bg-music" autoplay loop muted>
        <source src="{{ asset('asset/sounds/bg_sound.mp3') }}" type="audio/mpeg">
        Your browser does not support the audio element.
    </audio>

    <!-- Butang mute/unmute -->
    <button id="mute-btn" class="mute-btn">
        <i class="fas fa-volume-up"></i>
    </button>

    <div class="container">
        
        <!-- Login Box -->
        <div class="login-box">
            <h2>Sign In</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <input type="text" name="username" placeholder="dinoStudent" required>
                <input type="password" name="password" placeholder="••••••" required>
                
                <select name="role" required>
                    <option value="">Pilih peranan</option>
                    <option value="student">Pelajar</option>
                    <option value="teacher">Guru</option>
                </select>

                <button type="submit">Enter</button>
            </form>

            <div class="social-login">
                <p>or Sign in with</p>
                <div class="icons">
                    <a href="#" class="icon facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="icon google"><i class="fab fa-google"></i></a>
                </div>
            </div>

            <div class="register-link">
                <p>Don't have an account? <a href="register-role.blade.php">Register</a></p>
            </div>
        </div>

        <!-- Dino Box -->
        <div class="dino-box">
            <div class="signboard">
                Selamat datang ke Mathventure! 🦖
            </div>
            <img src="{{ asset('asset/images/dino.png') }}" alt="Dino Mascot" class="dino-img">
        </div>

    </div>

    <script>
        const music = document.getElementById("bg-music");
        const muteBtn = document.getElementById("mute-btn");
        const icon = muteBtn.querySelector("i");

        muteBtn.addEventListener("click", () => {
                music.muted = !music.muted;
        if (music.muted) {
            icon.classList.remove("fa-volume-up");
            icon.classList.add("fa-volume-mute");
        } else {
            icon.classList.remove("fa-volume-mute");
            icon.classList.add("fa-volume-up");
            music.play(); // force play selepas unmute
            }
        });
    </script>
</body>
</html>
