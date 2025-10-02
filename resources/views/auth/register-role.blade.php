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

  <!-- Loading Screen Dino Egg -->
  <div id="loading-overlay" class="loading-overlay hidden">
    <div class="egg-container">
      <img src="{{ asset('asset/images/egg.png') }}" class="egg" alt="Egg">
      <img src="{{ asset('asset/images/egg-crack.png') }}" class="egg-crack hidden" alt="Egg Crack">
      <p class="loading-text">Dino is hatching...</p>
    </div>
  </div>

  <div class="min-h-screen flex items-center justify-center custom-bg">
    <div class="transparent-form-container max-w-4xl w-full">
      <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">Pilih Peranan Anda</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <a href="{{ route('register.teacher') }}" class="role-card guru" data-target="{{ route('register.teacher') }}">
          <span class="text-4xl">👩‍🏫</span>
          <p class="mt-3 text-lg font-semibold">Guru</p>
        </a>
        <a href="{{ route('register.student') }}" class="role-card pelajar" data-target="{{ route('register.student') }}">
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

    // Music restore
    function restoreMusicState() {
      const musicTime = localStorage.getItem('musicTime');
      const isMuted = localStorage.getItem('isMuted') === 'true';
      music.muted = true;
      updateMuteButton();
      if (musicTime) music.currentTime = parseFloat(musicTime);
      if (!isMuted) {
        music.muted = false;
        music.play().catch(e => console.log("Autoplay disekat oleh pelayar."));
      }
      updateMuteButton();
    }
    function updateMuteButton() {
      if (music.muted) {
        icon.classList.remove("fa-volume-up");
        icon.classList.add("fa-volume-mute");
      } else {
        icon.classList.remove("fa-volume-mute");
        icon.classList.add("fa-volume-up");
      }
    }
    function saveMusicState() {
      localStorage.setItem('musicTime', music.currentTime);
      localStorage.setItem('isMuted', music.muted);
    }
    window.addEventListener('beforeunload', saveMusicState);
    document.addEventListener('DOMContentLoaded', restoreMusicState);
    muteBtn.addEventListener("click", () => {
      music.muted = !music.muted;
      updateMuteButton();
      localStorage.setItem('isMuted', music.muted);
      if (!music.muted) music.play();
    });

    // Dino Egg Loading
    const roleCards = document.querySelectorAll(".role-card");
    const overlay = document.getElementById("loading-overlay");
    const egg = document.querySelector(".egg");
    const eggCrack = document.querySelector(".egg-crack");

    roleCards.forEach(card => {
      card.addEventListener("click", function(e) {
        e.preventDefault();
        const targetUrl = this.dataset.target;

        overlay.classList.remove("hidden");

        // tukar ke crack selepas 1.5s
        setTimeout(() => {
          egg.classList.add("hidden");
          eggCrack.classList.remove("hidden");
        }, 1500);

        // redirect selepas 3s
        setTimeout(() => {
          window.location.href = targetUrl;
        }, 3000);
      });
    });
  </script>
</body>
</html>
