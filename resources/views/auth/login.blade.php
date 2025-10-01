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

                <input type="text" name="username" placeholder="username" required>
                <input type="password" name="password" placeholder="your password" required>
                
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
                <p>Don't have an account? <a href="{{ route('register.role') }}">Register</a>
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
    const links = document.querySelectorAll('a'); // Pilih semua pautan

    // Fungsi untuk memulihkan keadaan muzik dari localStorage
    function restoreMusicState() {
        const musicTime = localStorage.getItem('musicTime');
        const isMuted = localStorage.getItem('isMuted') === 'true';

        music.muted = isMuted;
        if (musicTime) {
            music.currentTime = parseFloat(musicTime);
        }
        updateMuteButton();
        if (!isMuted) {
            music.play().catch(e => console.log("Autoplay disekat oleh pelayar"));
        }
    }

    // Fungsi untuk mengemas kini ikon butang
    function updateMuteButton() {
        if (music.muted) {
            icon.classList.remove("fa-volume-up");
            icon.classList.add("fa-volume-mute");
        } else {
            icon.classList.remove("fa-volume-mute");
            icon.classList.add("fa-volume-up");
        }
    }
    
    // Fungsi untuk menyimpan keadaan muzik
    function saveMusicState() {
        localStorage.setItem('musicTime', music.currentTime);
        localStorage.setItem('isMuted', music.muted);
    }

    // Dengar acara apabila tetingkap/tab akan ditutup atau dimuat semula
    window.addEventListener('beforeunload', saveMusicState);

    // Mula-mula, pulihkan keadaan muzik apabila halaman dimuatkan
    restoreMusicState();

    // Logik untuk butang Mute/Unmute
    muteBtn.addEventListener("click", () => {
        music.muted = !music.muted;
        updateMuteButton();
        localStorage.setItem('isMuted', music.muted);
        if (!music.muted) {
            music.play();
        }
    });

</script>
</body>
</html>
</body>
</html>
