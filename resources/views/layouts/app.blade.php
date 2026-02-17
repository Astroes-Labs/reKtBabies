<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'REKT Babies') }}</title>

    @vite('resources/css/app.css')

    <style>
        .profile-pulse {
            animation: pulse 2s infinite ease-in-out;
        }

        @keyframes pulse {
            0%, 100% { filter: drop-shadow(0 0 10px #00ff80); }
            50% { filter: drop-shadow(0 0 20px #00ff80); }
        }

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

        .footer-icon {
            transition: all 0.3s ease;
        }

        .footer-icon:hover {
            transform: scale(1.2);
            filter: drop-shadow(0 0 10px #00ff80);
        }

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

    <!-- Shared Background -->
    <div class="fixed inset-0 -z-10">
        <img src="{{ asset('images/cyberpunk-bg.png') }}" alt="Background" class="w-full h-full object-cover opacity-60">
        <div class="absolute inset-0 bg-[radial-gradient(circle,_rgba(0,255,128,0.2),transparent_70%)] mix-blend-overlay pointer-events-none"></div>

        <div class="absolute inset-0 pointer-events-none">
            <svg class="w-full h-full">
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
        <div class="text-3xl font-black tracking-wide uppercase drop-shadow-lg">
            {{ config('app.name', 'REKT Babies') }}
        </div>

        <div class="flex items-center gap-4">
            <div class="w-12 h-12 flex items-center justify-center profile-pulse">
                <svg width="48" height="48" viewBox="0 0 600 600" fill="#00FF80">
                    <circle cx="300" cy="230" r="115"/>
                    <circle cx="300" cy="550" r="205"/>
                </svg>
            </div>

            <button class="px-5 py-2 bg-green-600 hover:bg-green-700 text-black rounded-lg font-bold shadow-lg hover:scale-105 transition-transform duration-300 glitch">
                Connect
            </button>
        </div>
    </header>

    <!-- Page Content -->
    <main class="relative z-20">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="w-full py-8 relative z-10 flex flex-col items-center gap-6 text-center">
        <a href="#about" class="neon-about">
            About
        </a>

        <div class="flex items-center gap-12 mt-4">
            @include('partials.social-icons')
        </div>
    </footer>

</body>
</html>
