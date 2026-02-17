@extends('layouts.app')

@section('content')

<div class="relative z-20 w-full">

    <!-- ===== Carousel Section ===== -->
    <section class="w-full overflow-hidden py-16">

        <div class="relative w-full">
            <div class="flex gap-8 animate-scroll whitespace-nowrap">

                <!-- Card 1 -->
                <div class="min-w-[300px] h-[400px] bg-black/60 border border-green-500 rounded-xl overflow-hidden shadow-lg">
                    <img src="{{ asset('images/card1.jpg') }}" class="w-full h-full object-cover">
                </div>

                <!-- Card 2 -->
                <div class="min-w-[300px] h-[400px] bg-black/60 border border-green-500 rounded-xl overflow-hidden shadow-lg">
                    <img src="{{ asset('images/card2.jpg') }}" class="w-full h-full object-cover">
                </div>

                <!-- Card 3 -->
                <div class="min-w-[300px] h-[400px] bg-black/60 border border-green-500 rounded-xl overflow-hidden shadow-lg">
                    <img src="{{ asset('images/card3.jpg') }}" class="w-full h-full object-cover">
                </div>

                <!-- Card 4 -->
                <div class="min-w-[300px] h-[400px] bg-black/60 border border-green-500 rounded-xl overflow-hidden shadow-lg">
                    <img src="{{ asset('images/card4.jpg') }}" class="w-full h-full object-cover">
                </div>

                <!-- Duplicate for infinite illusion -->
                <div class="min-w-[300px] h-[400px] bg-black/60 border border-green-500 rounded-xl overflow-hidden shadow-lg">
                    <img src="{{ asset('images/card1.jpg') }}" class="w-full h-full object-cover">
                </div>

                <div class="min-w-[300px] h-[400px] bg-black/60 border border-green-500 rounded-xl overflow-hidden shadow-lg">
                    <img src="{{ asset('images/card2.jpg') }}" class="w-full h-full object-cover">
                </div>

            </div>
        </div>

    </section>


    <!-- ===== About Content ===== -->
    <section class="max-w-4xl mx-auto px-6 pb-24 text-center">

        <h2 class="text-5xl font-extrabold mb-8 tracking-wide">
            About REKT Babies
        </h2>

        <p class="text-lg leading-relaxed text-green-300">
            REKT Babies is a chaotic digital experiment born from the trenches of web3.
            It represents volatility, meme culture, survival instinct, and the art of getting
            absolutely destroyed then coming back stronger.
        </p>

        <p class="text-lg leading-relaxed text-green-300 mt-6">
            This project blends cyberpunk aesthetics with raw market energy.
            Every piece tells a story of collapse, noise, and rebirth.
        </p>

    </section>

</div>

<style>
@keyframes scroll {
    0% {
        transform: translateX(0);
    }
    100% {
        transform: translateX(-50%);
    }
}

.animate-scroll {
    animation: scroll 25s linear infinite;
}
</style>

@endsection
