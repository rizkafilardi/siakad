<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIAKAD | @yield('title', 'Dashboard')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        
        .sidebar-particles {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 1;
            pointer-events: none;
        }
        
        .sidebar-particle {
            position: absolute;
            background: linear-gradient(45deg, #ec4899, #db2777, #be185d);
            border-radius: 50%;
            animation: sidebar-float 15s infinite linear;
            opacity: 0.08;
        }
        
        .sidebar-particle:nth-child(1) { width: 4px; height: 4px; left: 20%; animation-delay: 0s; }
        .sidebar-particle:nth-child(2) { width: 5px; height: 5px; left: 60%; animation-delay: 3s; }
        .sidebar-particle:nth-child(3) { width: 3px; height: 3px; left: 80%; animation-delay: 6s; }
        .sidebar-particle:nth-child(4) { width: 4px; height: 4px; left: 40%; animation-delay: 9s; }
        .sidebar-particle:nth-child(5) { width: 3px; height: 3px; left: 70%; animation-delay: 12s; }
        
        @keyframes sidebar-float {
            0% { transform: translateY(100vh) rotate(0deg); opacity: 0; }
            10% { opacity: 0.08; }
            90% { opacity: 0.08; }
            100% { transform: translateY(-100vh) rotate(360deg); opacity: 0; }
        }
        
        .sidebar-glass {
            backdrop-filter: blur(25px);
            background: linear-gradient(135deg, 
                rgba(255, 255, 255, 0.12) 0%, 
                rgba(255, 255, 255, 0.06) 50%, 
                rgba(236, 72, 153, 0.08) 100%);
            border-right: 1px solid rgba(255, 255, 255, 0.25);
            box-shadow: 
                4px 0 30px rgba(236, 72, 153, 0.15),
                0 0 0 1px rgba(255, 255, 255, 0.1) inset;
        }
        
        .logo-container {
            animation: logo-float 6s ease-in-out infinite;
            position: relative;
        }
        
        @keyframes logo-float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            33% { transform: translateY(-10px) rotate(2deg); }
            66% { transform: translateY(-5px) rotate(-2deg); }
        }
        
        .logo-glow {
            background: linear-gradient(135deg, #ec4899, #db2777, #be185d);
            background-size: 300% 300%;
            animation: logo-glow-animation 4s ease-in-out infinite;
            padding: 4px;
            border-radius: 24px;
        }
        
        @keyframes logo-glow-animation {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }
        
        .logo-inner {
            background: linear-gradient(135deg, rgba(15, 23, 42, 0.95), rgba(30, 41, 59, 0.9));
            border-radius: 20px;
            padding: 1.25rem;
        }
        
        .menu-item {
            position: relative;
            overflow: hidden;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.08), rgba(255, 255, 255, 0.04));
            border: 1px solid rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
        }
        
        .menu-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(236, 72, 153, 0.15), transparent);
            transition: left 0.5s;
        }
        
        .menu-item:hover::before {
            left: 100%;
        }
        
        .menu-item:hover {
            transform: translateX(10px);
            background: linear-gradient(135deg, rgba(236, 72, 153, 0.15), rgba(219, 39, 119, 0.08));
            border-color: rgba(236, 72, 153, 0.4);
            box-shadow: 0 8px 25px rgba(236, 72, 153, 0.25);
        }
        
        .menu-item.active {
            background: linear-gradient(135deg, rgba(236, 72, 153, 0.25), rgba(219, 39, 119, 0.15));
            border-color: rgba(236, 72, 153, 0.5);
            transform: translateX(10px);
            box-shadow: 0 10px 30px rgba(236, 72, 153, 0.35);
        }
        
        .menu-icon {
            transition: all 0.3s ease;
        }
        
        .menu-item:hover .menu-icon {
            transform: scale(1.15) rotate(8deg);
            background: linear-gradient(135deg, #ec4899, #db2777);
        }
        
        .menu-item.active .menu-icon {
            background: linear-gradient(135deg, #ec4899, #db2777);
            transform: scale(1.15);
        }
        
        .siakad-text {
            background: linear-gradient(135deg, #ec4899, #db2777, #be185d, #a21caf);
            background-size: 300% 300%;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: text-gradient 3s ease-in-out infinite;
            font-weight: 900;
        }
        
        @keyframes text-gradient {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }
        
        .sidebar-sparkle {
            position: absolute;
            width: 4px;
            height: 4px;
            background: linear-gradient(45deg, #ec4899, #db2777);
            border-radius: 50%;
            animation: sparkle 2s infinite;
            box-shadow: 0 0 8px rgba(236, 72, 153, 0.5);
        }
        
        @keyframes sparkle {
            0%, 100% { opacity: 0; transform: scale(0) rotate(0deg); }
            50% { opacity: 1; transform: scale(1) rotate(180deg); }
        }
        
        .sidebar-sparkle:nth-child(1) { top: 20%; left: 20%; animation-delay: 0s; }
        .sidebar-sparkle:nth-child(2) { top: 40%; right: 15%; animation-delay: 0.7s; }
        .sidebar-sparkle:nth-child(3) { bottom: 30%; left: 25%; animation-delay: 1.4s; }
        .sidebar-sparkle:nth-child(4) { bottom: 50%; right: 20%; animation-delay: 2.1s; }
        
        .pulse-ring {
            animation: pulse-ring 2s infinite;
        }
        
        @keyframes pulse-ring {
            0% { transform: scale(1); opacity: 0.4; }
            100% { transform: scale(1.4); opacity: 0; }
        }
        
        .menu-text {
            font-weight: 700;
        }
        
        .menu-subtitle {
            font-weight: 500;
        }
        
        .gradient-divider {
            background: linear-gradient(90deg, #ec4899, #db2777, #be185d);
        }
    </style>
</head>
<body class="min-h-screen bg-gradient-to-br from-gray-900 via-black to-pink-900 text-white">

    <div class="flex min-h-screen w-full">

        <!-- Premium Sidebar -->
        <aside class="w-80 sidebar-glass relative overflow-hidden">
            <!-- Floating Particles -->
            <div class="sidebar-particles">
                <div class="sidebar-particle"></div>
                <div class="sidebar-particle"></div>
                <div class="sidebar-particle"></div>
                <div class="sidebar-particle"></div>
                <div class="sidebar-particle"></div>
            </div>
            
            <!-- Sparkles -->
            <div class="sidebar-sparkle"></div>
            <div class="sidebar-sparkle"></div>
            <div class="sidebar-sparkle"></div>
            <div class="sidebar-sparkle"></div>
            
            <!-- Background Gradient -->
            <div class="absolute inset-0 bg-gradient-to-b from-slate-900 via-slate-800 to-slate-900"></div>
            
            <!-- Sidebar Content -->
            <div class="relative z-10 h-full flex flex-col p-8">
                
                <!-- Logo Section -->
                <div class="mb-14 text-center">
                    <div class="logo-container mb-8">
                        <div class="relative inline-block">
                            <!-- Pulse Ring -->
                            <div class="absolute inset-0 bg-pink-400 rounded-full pulse-ring"></div>
                            
                            <!-- Logo Container -->
                            <div class="logo-glow">
                                <div class="logo-inner flex items-center justify-center">
                                    <img src="{{ asset('storage/logo-untad.png') }}" alt="Logo Untad" class="w-18 h-18 object-contain">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <h1 class="text-4xl font-black siakad-text mb-3">SIAKAD</h1>
                    <p class="text-gray-300 text-base font-semibold">Universitas Tadulako</p>
                    <div class="w-20 h-1.5 gradient-divider mx-auto mt-4 rounded-full"></div>
                </div>
                
                <!-- Navigation Menu -->
                <nav class="flex-1 space-y-5">
                    <!-- Dashboard -->
                    <a href="{{ route('mahasiswa.dashboard') }}" class="menu-item {{ request()->is('dashboard') ? 'active' : '' }} flex items-center gap-5 p-5 rounded-2xl text-white transition-all duration-300">
                        <div class="menu-icon w-12 h-12 bg-gradient-to-br from-pink-500 to-pink-600 rounded-2xl flex items-center justify-center shadow-lg">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h4a2 2 0 012 2v3H8V5z"></path>
                            </svg>
                        </div>
                        <div>
                            <div class="menu-text text-lg">Dashboard</div>
                            <div class="menu-subtitle text-sm text-gray-400">Beranda Utama</div>
                        </div>
                    </a>
                    
                    <!-- KRS -->
                    <a href="{{ route('mahasiswa.krs.index') }}" class="menu-item {{ request()->is('mahasiswa/krs*') ? 'active' : '' }} flex items-center gap-5 p-5 rounded-2xl text-white transition-all duration-300">
                        <div class="menu-icon w-12 h-12 bg-gradient-to-br from-pink-500 to-pink-600 rounded-2xl flex items-center justify-center shadow-lg">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                            </svg>
                        </div>
                        <div>
                            <div class="menu-text text-lg">KRS</div>
                            <div class="menu-subtitle text-sm text-gray-400">Kartu Rencana Studi</div>
                        </div>
                    </a>
                    
                    <!-- KHS -->
                    <a href="{{ route('mahasiswa.khs.index') }}" class="menu-item {{ request()->is('mahasiswa/khs*') ? 'active' : '' }} flex items-center gap-5 p-5 rounded-2xl text-white transition-all duration-300">
                        <div class="menu-icon w-12 h-12 bg-gradient-to-br from-pink-500 to-pink-600 rounded-2xl flex items-center justify-center shadow-lg">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <div>
                            <div class="menu-text text-lg">KHS</div>
                            <div class="menu-subtitle text-sm text-gray-400">Kartu Hasil Studi</div>
                        </div>
                    </a>
                    
                    <!-- Profile -->
                    <a href="{{ route('mahasiswa.profile.index') }}" class="menu-item {{ request()->is('profile*') ? 'active' : '' }} flex items-center gap-5 p-5 rounded-2xl text-white transition-all duration-300">
                        <div class="menu-icon w-12 h-12 bg-gradient-to-br from-pink-500 to-pink-600 rounded-2xl flex items-center justify-center shadow-lg">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <div>
                            <div class="menu-text text-lg">Profile</div>
                            <div class="menu-subtitle text-sm text-gray-400">Profil Mahasiswa</div>
                        </div>
                    </a>
                </nav>
                
                <!-- Footer -->
                <div class="mt-10 pt-8 border-t border-gray-600">
                    <div class="text-center">
                        <p class="text-gray-400 text-sm font-medium">© 2025 SIAKAD Untad</p>
                        <p class="text-gray-500 text-sm mt-2 font-medium">Universitas Tadulako</p>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6 overflow-y-auto">
            @yield('content')
        </main>
    </div>

</body>
</html>