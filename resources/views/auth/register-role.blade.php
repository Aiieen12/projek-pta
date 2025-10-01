<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Peranan - Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('asset/css/register-role.css') }}">
</head>
<body> 
    <audio id="bg-music" autoplay loop>
        <source src="{{ asset('asset/sounds/bg_sound.mp3') }}" type="audio/mpeg">
    </audio>

    <button id="mute-btn" class="mute-btn">
        <i class="fas fa-volume-up"></i>
    </button>
    <div class="min-h-screen flex items-center justify-center custom-bg">
        <div class="transparent-form-container max-w-4xl w-full">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">Pilih Peranan Anda</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <a href="{{ route('register.teacher') }}" class="role-card guru">
                    <span class="text-4xl">👩‍🏫</span>
                    <p class="mt-3 text-lg font-semibold">Guru</p>
                </a>
                <a href="{{ route('register.student') }}" class="role-card pelajar">
                    <span class="text-4xl">🧒</span>
                    <p class="mt-3 text-lg font-semibold">Pelajar</p>
                </a>
            </div>
        </div>
    </div>

    <script>
        const music = document.getElementById("bg-music");
        const muteBtn = document.getElementById("mute-btn");
        const icon = muteBtn.querySelector("i");
        
        // Fungsi untuk memulihkan keadaan muzik dari localStorage
        function restoreMusicState() {
            const musicTime = localStorage.getItem('musicTime');
            const isMuted = localStorage.getItem('isMuted') === 'true';

            music.muted = true; // Sentiasa mulakan sebagai senyap untuk elak ralat autoplay
            updateMuteButton();

            if (musicTime) {
                music.currentTime = parseFloat(musicTime);
            }
            
            // Unmute hanya jika pengguna mahu ia berbunyi
            if (!isMuted) {
                music.muted = false;
                music.play().catch(e => console.log("Autoplay disekat oleh pelayar. Perlukan interaksi pengguna."));
            }
            updateMuteButton();
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
        
        // Fungsi untuk menyimpan keadaan muzik sebelum meninggalkan halaman
        function saveMusicState() {
            localStorage.setItem('musicTime', music.currentTime);
            localStorage.setItem('isMuted', music.muted);
        }

        // Simpan state apabila pengguna cuba navigasi ke halaman lain
        window.addEventListener('beforeunload', saveMusicState);

        // Apabila halaman sedia, pulihkan state muzik
        document.addEventListener('DOMContentLoaded', restoreMusicState);

        // Fungsi untuk butang mute/unmute
        muteBtn.addEventListener("click", () => {
            music.muted = !music.muted;
            updateMuteButton();
            localStorage.setItem('isMuted', music.muted); // Simpan pilihan pengguna
            if (!music.muted) {
                music.play();
            }
        });
    </script>
    </body>
</html>