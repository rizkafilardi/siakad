<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIAKAD | @yield('title', 'Dashboard')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
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
            background: linear-gradient(45deg, #ef4444, #dc2626, #b91c1c);
            border-radius: 50%;
            animation: sidebar-float 15s infinite linear;
            opacity: 0.05;
        }
        
        .sidebar-particle:nth-child(1) { width: 3px; height: 3px; left: 20%; animation-delay: 0s; }
        .sidebar-particle:nth-child(2) { width: 4px; height: 4px; left: 60%; animation-delay: 3s; }
        .sidebar-particle:nth-child(3) { width: 2px; height: 2px; left: 80%; animation-delay: 6s; }
        .sidebar-particle:nth-child(4) { width: 3px; height: 3px; left: 40%; animation-delay: 9s; }
        .sidebar-particle:nth-child(5) { width: 2px; height: 2px; left: 70%; animation-delay: 12s; }
        
        @keyframes sidebar-float {
            0% { transform: translateY(100vh) rotate(0deg); opacity: 0; }
            10% { opacity: 0.05; }
            90% { opacity: 0.05; }
            100% { transform: translateY(-100vh) rotate(360deg); opacity: 0; }
        }
        
        .sidebar-glass {
            backdrop-filter: blur(20px);
            background: linear-gradient(135deg, 
                rgba(255, 255, 255, 0.1) 0%, 
                rgba(255, 255, 255, 0.05) 50%, 
                rgba(255, 255, 255, 0.1) 100%);
            border-right: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 
                4px 0 25px rgba(0, 0, 0, 0.3),
                0 0 0 1px rgba(255, 255, 255, 0.1) inset;
        }
        
        .logo-container {
            animation: logo-float 6s ease-in-out infinite;
            position: relative;
        }
        
        @keyframes logo-float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            33% { transform: translateY(-8px) rotate(1deg); }
            66% { transform: translateY(-4px) rotate(-1deg); }
        }
        
        .logo-glow {
            background: linear-gradient(135deg, #ef4444, #dc2626, #b91c1c);
            background-size: 300% 300%;
            animation: logo-glow-animation 4s ease-in-out infinite;
            padding: 3px;
            border-radius: 20px;
        }
        
        @keyframes logo-glow-animation {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }
        
        .logo-inner {
            background: linear-gradient(135deg, rgba(15, 23, 42, 0.95), rgba(30, 41, 59, 0.9));
            border-radius: 17px;
            padding: 1rem;
        }
        
        .menu-item {
            position: relative;
            overflow: hidden;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.05), rgba(255, 255, 255, 0.02));
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .menu-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(239, 68, 68, 0.1), transparent);
            transition: left 0.5s;
        }
        
        .menu-item:hover::before {
            left: 100%;
        }
        
        .menu-item:hover {
            transform: translateX(8px);
            background: linear-gradient(135deg, rgba(239, 68, 68, 0.1), rgba(220, 38, 38, 0.05));
            border-color: rgba(239, 68, 68, 0.3);
            box-shadow: 0 4px 15px rgba(239, 68, 68, 0.2);
        }
        
        .menu-item.active {
            background: linear-gradient(135deg, rgba(239, 68, 68, 0.2), rgba(220, 38, 38, 0.1));
            border-color: rgba(239, 68, 68, 0.4);
            transform: translateX(8px);
            box-shadow: 0 4px 20px rgba(239, 68, 68, 0.3);
        }
        
        .menu-icon {
            transition: all 0.3s ease;
        }
        
        .menu-item:hover .menu-icon {
            transform: scale(1.1) rotate(5deg);
            color: #ef4444;
        }
        
        .menu-item.active .menu-icon {
            color: #ef4444;
            transform: scale(1.1);
        }
        
        .siakad-text {
            background: linear-gradient(135deg, #ef4444, #dc2626, #b91c1c, #991b1b);
            background-size: 300% 300%;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: text-gradient 3s ease-in-out infinite;
        }
        
        @keyframes text-gradient {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }
        
        .sidebar-sparkle {
            position: absolute;
            width: 3px;
            height: 3px;
            background: #ef4444;
            border-radius: 50%;
            animation: sparkle 2s infinite;
        }
        
        @keyframes sparkle {
            0%, 100% { opacity: 0; transform: scale(0); }
            50% { opacity: 1; transform: scale(1); }
        }
        
        .sidebar-sparkle:nth-child(1) { top: 20%; left: 20%; animation-delay: 0s; }
        .sidebar-sparkle:nth-child(2) { top: 40%; right: 15%; animation-delay: 0.7s; }
        .sidebar-sparkle:nth-child(3) { bottom: 30%; left: 25%; animation-delay: 1.4s; }
        .sidebar-sparkle:nth-child(4) { bottom: 50%; right: 20%; animation-delay: 2.1s; }
        
        .pulse-ring {
            animation: pulse-ring 2s infinite;
        }
        
        @keyframes pulse-ring {
            0% { transform: scale(1); opacity: 0.3; }
            100% { transform: scale(1.3); opacity: 0; }
        }
    </style>
</head>
<body class="min-h-screen bg-gradient-to-br from-gray-900 via-black to-red-900 text-white">

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
            <div class="relative z-10 h-full flex flex-col p-6">
                
                <!-- Logo Section -->
                <div class="mb-12 text-center">
                    <div class="logo-container mb-6">
                        <div class="relative inline-block">
                            <!-- Pulse Ring -->
                            <div class="absolute inset-0 bg-red-400 rounded-full pulse-ring"></div>
                            
                            <!-- Logo Container -->
                            <div class="logo-glow">
                                <div class="logo-inner flex items-center justify-center">
                                    <img src="{{ asset('storage/logo-untad.png') }}" alt="Logo Untad" class="w-16 h-16 object-contain">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <h1 class="text-3xl font-bold siakad-text mb-2">SIAKAD</h1>
                    <p class="text-gray-300 text-sm font-medium">Universitas Tadulako</p>
                    <div class="w-16 h-1 bg-gradient-to-r from-red-400 to-red-600 mx-auto mt-3 rounded-full"></div>
                </div>
                
                <!-- Navigation Menu -->
                <nav class="flex-1 space-y-4">
                    <!-- Dashboard -->
                    <a href="{{ route('mahasiswa.dashboard') }}" class="menu-item {{ request()->is('dashboard') ? 'active' : '' }} flex items-center gap-4 p-4 rounded-xl text-white transition-all duration-300">
                        <div class="menu-icon w-10 h-10 bg-gradient-to-br from-red-500 to-red-600 rounded-xl flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h4a2 2 0 012 2v3H8V5z"></path>
                            </svg>
                        </div>
                        <div>
                            <div class="font-semibold">Dashboard</div>
                            <div class="text-xs text-gray-400">Beranda Utama</div>
                        </div>
                    </a>
                    
                    <!-- KRS -->
                    <a href="{{ route('mahasiswa.krs.index') }}" class="menu-item {{ request()->is('mahasiswa/krs*') ? 'active' : '' }} flex items-center gap-4 p-4 rounded-xl text-white transition-all duration-300">
                        <div class="menu-icon w-10 h-10 bg-gradient-to-br from-red-500 to-red-600 rounded-xl flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                            </svg>
                        </div>
                        <div>
                            <div class="font-semibold">KRS</div>
                            <div class="text-xs text-gray-400">Kartu Rencana Studi</div>
                        </div>
                    </a>
                    
                    <!-- KHS -->
                    <a href="{{ route('mahasiswa.khs.index') }}" class="menu-item {{ request()->is('mahasiswa/khs*') ? 'active' : '' }} flex items-center gap-4 p-4 rounded-xl text-white transition-all duration-300">
                        <div class="menu-icon w-10 h-10 bg-gradient-to-br from-red-500 to-red-600 rounded-xl flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <div>
                            <div class="font-semibold">KHS</div>
                            <div class="text-xs text-gray-400">Kartu Hasil Studi</div>
                        </div>
                    </a>
                    
                    <!-- Profile -->
                    <a href="{{ route('mahasiswa.profile.index') }}" class="menu-item {{ request()->is('profile*') ? 'active' : '' }} flex items-center gap-4 p-4 rounded-xl text-white transition-all duration-300">
                        <div class="menu-icon w-10 h-10 bg-gradient-to-br from-red-500 to-red-600 rounded-xl flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <div>
                            <div class="font-semibold">Profile</div>
                            <div class="text-xs text-gray-400">Profil Mahasiswa</div>
                        </div>
                    </a>
                </nav>
                
                <!-- Footer -->
                <div class="mt-8 pt-6 border-t border-gray-600">
                    <div class="text-center">
                        <p class="text-gray-400 text-xs">© 2025 SIAKAD Untad</p>
                        <p class="text-gray-500 text-xs mt-1">Universitas Tadulako</p>
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