@extends('layouts.app')

@section('content')

<div class="relative z-20 w-full overflow-hidden">

    <!-- ========================= -->
    <!-- CHAOTIC CAROUSEL SECTION  -->
    <!-- ========================= -->

    <section class="w-full py-20">

        <div class="relative overflow-hidden">

            <div id="carousel"
                 class="flex gap-8 cursor-pointer active:cursor-grabbing select-none animate-scroll">

                <!-- Card 1 -->
                <div class="card">
                    <img src="{{ asset('images/card1.png') }}">
                </div>

                <!-- Card 2 -->
                <div class="card">
                    <img src="{{ asset('images/card2.png') }}">
                </div>

                <!-- Card 3 -->
                <div class="card">
                    <img src="{{ asset('images/card3.png') }}">
                </div>

                <!-- Card 4 -->
                <div class="card">
                    <img src="{{ asset('images/card4.png') }}">
                </div>

                <!-- Duplicate for infinite loop illusion -->
                <div class="card">
                    <img src="{{ asset('images/card1.png') }}">
                </div>

                <div class="card">
                    <img src="{{ asset('images/card2.png') }}">
                </div>

                <div class="card">
                    <img src="{{ asset('images/card3.png') }}">
                </div>

                <div class="card">
                    <img src="{{ asset('images/card4.png') }}">
                </div>

            </div>

        </div>

    </section>


    <!-- ========================= -->
    <!-- ABOUT TEXT SECTION        -->
    <!-- ========================= -->

    <section class="max-w-4xl mx-auto px-6 pb-28 text-center">

        <h2 class="text-5xl md:text-6xl font-black mb-10 tracking-widest glitch-text">
            MARKET COLLAPSE. DIGITAL REBIRTH.
        </h2>

        <p class="text-lg md:text-xl leading-relaxed text-green-300">
            REKT Babies is born from volatility. From charts that nuked to zero.
            From wallets drained. From degens who refused to log off.
        </p>

        <p class="text-lg md:text-xl leading-relaxed text-green-300 mt-6">
            This project captures chaos, survival, and meme-fueled resilience.
            Every asset tells a story of collapse and comeback.
        </p>

    </section>

</div>


<!-- ========================= -->
<!-- STYLES                    -->
<!-- ========================= -->

<style>

/* Infinite scroll */
@keyframes scroll {
    0% { transform: translateX(0); }
    100% { transform: translateX(-50%); }
}

.animate-scroll {
    animation: scroll 30s linear infinite;
}

/* Pause animation on hover */
#carousel:hover {
    animation-play-state: paused;
}

/* Card styling */
.card {
    min-width: 280px;
    height: 380px;
    background: rgba(0, 0, 0, 0.6);
    border: 2px solid rgba(0, 255, 128, 0.3);
    border-radius: 16px;
    overflow: hidden;
    transition: all 0.4s ease;
    box-shadow: 0 0 10px rgba(0,255,128,0.1);
}

@media (min-width: 768px) {
    .card {
        min-width: 320px;
        height: 420px;
    }
}

.card img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/* Hover glow */
.card:hover {
    transform: scale(1.05) rotate(-1deg);
    box-shadow:
        0 0 20px rgba(0,255,128,0.6),
        0 0 40px rgba(0,255,128,0.4);
    border-color: rgba(0,255,128,0.8);
}

/* Glitch headline */
@keyframes glitch {
    0% { text-shadow: 2px 2px #ff0055; }
    50% { text-shadow: -2px -2px #00ff80; }
    100% { text-shadow: 2px -2px #ff0055; }
}

.glitch-text:hover {
    animation: glitch 0.3s infinite;
}

</style>


<!-- ========================= -->
<!-- DRAG / SWIPE SCRIPT       -->
<!-- ========================= -->
<script>
const carousel = document.getElementById('carousel');

let isDragging = false;
let startX = 0;
let scrollLeft = 0;
let moved = false;

/* ===== Mouse Events ===== */

carousel.addEventListener('mousedown', (e) => {
    isDragging = true;
    moved = false;
    startX = e.pageX;
    scrollLeft = carousel.scrollLeft;

    // Pause animation while dragging
    carousel.style.animationPlayState = "paused";
});

carousel.addEventListener('mousemove', (e) => {
    if (!isDragging) return;

    const walk = (e.pageX - startX) * 2;

    if (Math.abs(walk) > 5) {
        moved = true;
    }

    carousel.scrollLeft = scrollLeft - walk;
});

carousel.addEventListener('mouseup', () => {
    if (isDragging) {
        isDragging = false;

        // Resume animation
        carousel.style.animationPlayState = "running";
    }
});

carousel.addEventListener('mouseleave', () => {
    if (isDragging) {
        isDragging = false;
        carousel.style.animationPlayState = "running";
    }
});

/* ===== Touch Events ===== */

carousel.addEventListener('touchstart', (e) => {
    startX = e.touches[0].pageX;
    scrollLeft = carousel.scrollLeft;

    carousel.style.animationPlayState = "paused";
});

carousel.addEventListener('touchmove', (e) => {
    const walk = (e.touches[0].pageX - startX) * 2;
    carousel.scrollLeft = scrollLeft - walk;
});

carousel.addEventListener('touchend', () => {
    carousel.style.animationPlayState = "running";
});
</script>


@endsection
