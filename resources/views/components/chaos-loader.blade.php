<div id="chaosLoader" class="fixed inset-0 flex items-center justify-center bg-black z-50 hidden">

    <div class="relative text-green-400 font-mono text-xl animate-pulse">
        INITIALIZING REKT PROTOCOL...
    </div>

    <div class="absolute inset-0 pointer-events-none opacity-20">
        <div class="w-full h-full animate-matrix"></div>
    </div>

</div>

<style>
@keyframes matrix {
    0% { background-position: 0 0; }
    100% { background-position: 0 1000px; }
}

.animate-matrix {
    background-image: repeating-linear-gradient(
        0deg,
        rgba(0,255,128,0.2) 0px,
        rgba(0,255,128,0.2) 2px,
        transparent 2px,
        transparent 20px
    );
    animation: matrix 10s linear infinite;
}
</style>
