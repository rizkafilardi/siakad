<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIAKAD | @yield('title', 'Dashboard')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        .font-playfair { font-family: 'Playfair Display', serif; }
        .font-inter { font-family: 'Inter', sans-serif; }
        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .pink-gradient {
            background: linear-gradient(135deg, #ec4899 0%, #db2777 50%, #be185d 100%);
        }
        .luxury-shadow {
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5), 0 0 0 1px rgba(236, 72, 153, 0.1);
        }
        .sidebar-item {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .sidebar-item:hover {
            transform: translateX(8px);
        }
    </style>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'pink': {
                            50: '#fdf2f8',
                            100: '#fce7f3',
                            200: '#fbcfe8',
                            300: '#f9a8d4',
                            400: '#f472b6',
                            500: '#ec4899',
                            600: '#db2777',
                            700: '#be185d',
                            800: '#9d174d',
                            900: '#831843',
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="min-h-screen bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 text-white font-inter">

    <div class="flex min-h-screen w-full">

        <!-- Luxury Sidebar -->
        <aside class="w-80 relative overflow-hidden">
            <!-- Background with luxury pattern -->
            <div class="absolute inset-0 bg-gradient-to-b from-slate-800 via-slate-900 to-black"></div>
            <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 25% 25%, #ec4899 0%, transparent 50%), radial-gradient(circle at 75% 75%, #db2777 0%, transparent 50%);"></div>
            
            <div class="relative z-10 h-full flex flex-col">
                <!-- Logo Section -->
                <div class="p-8 text-center border-b border-pink-500/20">
                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-full pink-gradient mb-4 luxury-shadow">
                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 3L1 9l4 2.18v6L12 21l7-3.82v-6l2-1.09V17h2V9L12 3zm6.82 6L12 12.72 5.18 9 12 5.28 18.82 9zM17 15.99l-5 2.73-5-2.73v-3.72L12 15l5-2.73v3.72z"/>
                        </svg>
                    </div>
                    <h1 class="text-3xl font-playfair font-bold bg-gradient-to-r from-pink-300 to-pink-500 bg-clip-text text-transparent mb-2">SIAKAD</h1>
                    <p class="text-slate-400 text-sm font-light">Academic Excellence</p>
                </div>

                <!-- Navigation -->
                <nav class="flex-1 p-6 space-y-2">
                    <a href="{{route("dosen.dashboard")}}" class="sidebar-item group flex items-center gap-4 px-6 py-4 rounded-xl @if(request()->is('dashboard')) bg-gradient-to-r from-pink-500/20 to-pink-600/20 border border-pink-500/30 @else hover:bg-slate-800/50 @endif">
                        <div class="flex items-center justify-center w-10 h-10 rounded-lg @if(request()->is('dashboard')) pink-gradient @else bg-slate-700 group-hover:bg-slate-600 @endif transition-all duration-300">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <span class="font-medium @if(request()->is('dashboard')) text-pink-300 @else text-white group-hover:text-pink-300 @endif transition-colors">Dashboard</span>
                            <p class="text-xs text-slate-400 mt-0.5">Beranda Utama</p>
                        </div>
                    </a>

                    <a href="{{route("dosen.absensi.index")}}" class="sidebar-item group flex items-center gap-4 px-6 py-4 rounded-xl @if(request()->is('absensi*')) bg-gradient-to-r from-pink-500/20 to-pink-600/20 border border-pink-500/30 @else hover:bg-slate-800/50 @endif">
                        <div class="flex items-center justify-center w-10 h-10 rounded-lg @if(request()->is('absensi*')) pink-gradient @else bg-slate-700 group-hover:bg-slate-600 @endif transition-all duration-300">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <span class="font-medium @if(request()->is('absensi*')) text-pink-300 @else text-white group-hover:text-pink-300 @endif transition-colors">Absensi</span>
                            <p class="text-xs text-slate-400 mt-0.5">Kelola Kehadiran</p>
                        </div>
                    </a>

                    <a href="{{route("dosen.khs.index")}}" class="sidebar-item group flex items-center gap-4 px-6 py-4 rounded-xl @if(request()->is('khs*')) bg-gradient-to-r from-pink-500/20 to-pink-600/20 border border-pink-500/30 @else hover:bg-slate-800/50 @endif">
                        <div class="flex items-center justify-center w-10 h-10 rounded-lg @if(request()->is('khs*')) pink-gradient @else bg-slate-700 group-hover:bg-slate-600 @endif transition-all duration-300">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <span class="font-medium @if(request()->is('khs*')) text-pink-300 @else text-white group-hover:text-pink-300 @endif transition-colors">KHS</span>
                            <p class="text-xs text-slate-400 mt-0.5">Hasil Studi</p>
                        </div>
                    </a>

                    <a href="{{route("dosen.profile.index")}}" class="sidebar-item group flex items-center gap-4 px-6 py-4 rounded-xl @if(request()->is('profile*')) bg-gradient-to-r from-pink-500/20 to-pink-600/20 border border-pink-500/30 @else hover:bg-slate-800/50 @endif">
                        <div class="flex items-center justify-center w-10 h-10 rounded-lg @if(request()->is('profile*')) pink-gradient @else bg-slate-700 group-hover:bg-slate-600 @endif transition-all duration-300">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <span class="font-medium @if(request()->is('profile*')) text-pink-300 @else text-white group-hover:text-pink-300 @endif transition-colors">Profile</span>
                            <p class="text-xs text-slate-400 mt-0.5">Pengaturan Akun</p>
                        </div>
                    </a>
                </nav>

                <!-- Footer -->
                <div class="p-6 border-t border-slate-700/50">
                    <div class="glass-effect rounded-xl p-4 text-center">
                        <div class="w-8 h-8 pink-gradient rounded-full mx-auto mb-2 flex items-center justify-center">
                            <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                            </svg>
                        </div>
                        <p class="text-xs text-slate-400">Akun Dosen</p>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 relative overflow-hidden">
            <!-- Background Pattern -->
            <div class="absolute inset-0 opacity-5">
                <div class="absolute inset-0" style="background-image: radial-gradient(circle at 20% 80%, #ec4899 0%, transparent 50%), radial-gradient(circle at 80% 20%, #db2777 0%, transparent 50%), radial-gradient(circle at 40% 40%, #be185d 0%, transparent 50%);"></div>
            </div>
            
            <div class="relative z-10 h-full overflow-y-auto">
                @yield('content')
            </div>
        </main>
    </div>

</body>
</html>