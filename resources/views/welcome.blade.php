<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'REKT Babies') }}</title>

    @vite('resources/css/app.css')

    <!-- Font Awesome for icons -->
    <script src="https://kit.fontawesome.com/your_kit_code.js" crossorigin="anonymous"></script>

    <style>

         /* Neon pulse animation for profile icon */
        .profile-pulse {
            animation: pulse 2s infinite ease-in-out;
        }

        @keyframes pulse {
            0%, 100% { filter: drop-shadow(0 0 10px #00ff80); }
            50% { filter: drop-shadow(0 0 20px #00ff80); }
        }


        /* Glitch effect for buttons */
        .glitch:hover {
            animation: glitch 0.3s infinite;
        }

        @keyframes glitch {
            0% { transform: translate(0px, 0px) skew(0deg); }
            20% { transform: translate(-2px, 2px) skew(-2deg); }
            40% { transform: translate(2px, -2px) skew(2deg); }
            60% { transform: translate(-1px, 1px) skew(-1deg); }
            80% { transform: translate(1px, -1px) skew(1deg); }
            100% { transform: translate(0px, 0px) skew(0deg); }
        }

        /* Footer icon hover glow */
        .footer-icon {
            transition: all 0.3s ease;
        }

        .footer-icon:hover {
            transform: scale(1.2);
            filter: drop-shadow(0 0 10px #00ff80);
        }

        /* Neon About link */
        .neon-about {
            position: relative;
            display: inline-block;
            padding: 0.5rem 1.5rem;
            color: #00FF80;
            font-weight: bold;
            text-transform: uppercase;
            border-radius: 0.75rem;
            border: 2px solid #00FF80;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .neon-about::before {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            border-radius: 0.75rem;
            background: #00FF80;
            opacity: 0;
            filter: blur(8px);
            transition: all 0.3s ease;
            z-index: -1;
        }

        .neon-about:hover {
            transform: scale(1.05);
            background: rgba(0,255,128,0.1);
        }

        .neon-about:hover::before {
            opacity: 0.5;
        }
    </style>
</head>

<body class="bg-black text-green-400 font-mono overflow-x-hidden">

    <!-- Background Image & Overlays -->
    <div class="fixed inset-0 -z-10">
        {{-- <img src="{{ asset('images/cyberpunk-bg.png') }}" alt="Background" class="w-full h-full object-cover opacity-60"> --}}

        <!-- Neon particle overlay -->
        <div class="absolute inset-0 bg-[radial-gradient(circle,_rgba(0,255,128,0.2),transparent_70%)] mix-blend-overlay pointer-events-none"></div>

        <!-- Grid lines -->
        <div class="absolute inset-0 pointer-events-none">
            <svg class="w-full h-full" width="100%" height="100%">
                <defs>
                    <pattern id="grid" width="20" height="20" patternUnits="userSpaceOnUse">
                        <line x1="0" y1="0" x2="0" y2="20" stroke="rgba(0,255,128,0.1)" stroke-width="1"/>
                        <line x1="0" y1="20" x2="20" y2="20" stroke="rgba(0,255,128,0.1)" stroke-width="1"/>
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#grid)">
                    <animate attributeName="x" from="0" to="20" dur="10s" repeatCount="indefinite"/>
                    <animate attributeName="y" from="0" to="20" dur="10s" repeatCount="indefinite"/>
                </rect>
            </svg>
        </div>
    </div>

    <!-- Header -->
    <header class="flex items-center justify-between px-8 py-6 relative z-20">
        <div class="text-3xl font-black text-green-400 tracking-wide uppercase drop-shadow-lg">
            {{ config('app.name', 'REKT Babies') }}
        </div>

        <div class="flex items-center gap-4">
           

              <!-- Profile SVG with glowing pulse -->
            <div class="w-12 h-12 flex items-center justify-center profile-pulse">
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 600 600" fill="#00FF80">
                    <circle cx="300" cy="230" r="115"/>
                    <circle cx="300" cy="550" r="205"/>
                </svg>
            </div>

            <!-- Connect Button -->
            <button class="px-5 py-2 bg-green-600 hover:bg-green-700 text-black rounded-lg font-bold shadow-lg hover:scale-105 transition-transform duration-300 glitch">
                Connect
            </button>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex flex-col items-center justify-center h-[80vh] text-center relative z-20">
        <h1 class="text-7xl font-extrabold text-green-400 mb-6 drop-shadow-xl animate-pulse">
            Welcome to the Matrix
        </h1>
        <p class="text-xl text-green-300 max-w-xl mb-8">
             Rekt Babies: Because rugs shouldn't only happen to adults.
        </p>

        <!-- Get REKTD Button -->
        <button class="relative px-8 py-3 font-bold text-black bg-green-600 rounded-lg shadow-lg overflow-hidden hover:bg-green-700 transition-colors duration-300 group glitch">
            <span class="absolute inset-0 bg-green-400 opacity-20 blur-lg animate-pulse rounded-lg"></span>
            <span class="relative z-10 group-hover:translate-x-1 group-hover:translate-y-1 transition-transform duration-200">
                Get REKTD
            </span>
        </button>
    </main>

    <!-- Footer -->
    <footer class="w-full py-8 relative z-10 flex flex-col items-center gap-6 text-center">
        <!-- About Link -->
        <a href="#about" class="neon-about">
            About
        </a>

        <!-- Icons row -->
        <div class="flex items-center gap-12 mt-4">
            <!-- OpenSea SVG -->
            <a href="https://opensea.io/collection/rektbabies" target="_blank" class="footer-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50" fill="none">
                    <path d="M25,2C12.317,2,2,12.317,2,25s10.317,23,23,23s23-10.317,23-23S37.683,2,25,2z M19,15c4,5,1,10,1,10h-7L19,15z M41,29 l-2.895,1.447c-0.708,0.354-1.246,0.974-1.496,1.725v0C35.648,35.055,32.95,38,29.911,38h-9.123c-4.551,0-8.491-4.161-9.478-8.603 L11,28h8c0,1.657,1.343,3,3,3h3v-4h-3c5-7-1-14-1-14s1.798,0.559,4,1.244V12c0-0.553,0.447-1,1-1s1,0.447,1,1v2.867 C38,21.4,30,27,30,27h-3v4h3.242c0.494,0,0.977-0.146,1.388-0.42L34,29l7-2V29z" fill="#00FF80"/>
                </svg>
            </a>

            <!-- X Icon SVG -->
            <a href="https://projectx.com" target="_blank" class="footer-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50" fill="none">
                    <path d="M 11 4 C 7.134 4 4 7.134 4 11 L 4 39 C 4 42.866 7.134 46 11 46 L 39 46 C 42.866 46 46 42.866 46 39 L 46 11 C 46 7.134 42.866 4 39 4 L 11 4 z M 13.085938 13 L 21.023438 13 L 26.660156 21.009766 L 33.5 13 L 36 13 L 27.789062 22.613281 L 37.914062 37 L 29.978516 37 L 23.4375 27.707031 L 15.5 37 L 13 37 L 22.308594 26.103516 L 13.085938 13 z M 16.914062 15 L 31.021484 35 L 34.085938 35 L 19.978516 15 L 16.914062 15 z" fill="#00FF80"/>
                </svg>
            </a>
        </div>
    </footer>

</body>
</html>
