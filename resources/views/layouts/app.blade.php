<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIAKAD | @yield('title', 'Dashboard')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }
        
        .glass-effect {
            backdrop-filter: blur(20px);
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .sidebar-item {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            margin-bottom: 4px;
            border-radius: 8px;
            color: #6b7280;
        }
        
        .sidebar-item:hover {
            background-color: #f3f4f6;
            color: #374151;
            transform: none;
        }
        
        .active-item {
            background: linear-gradient(135deg, #ec4899, #be185d);
            color: white;
            border-left: none;
        }
        
        .logo-gradient {
            background: linear-gradient(135deg, #ec4899, #be185d);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        /* Fixed Layout System */
        .layout-container {
            height: 100vh;
            overflow: hidden;
            display: flex;
        }
        
        .sidebar-container {
            width: 288px; /* w-72 = 288px */
            min-width: 288px;
            max-width: 288px;
            height: 100vh;
            overflow: hidden;
            position: relative;
            z-index: 30;
            background: white;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            border-right: 1px solid #e5e7eb;
        }
        
        .sidebar-content {
            height: 100vh;
            overflow-y: auto;
            overflow-x: hidden;
            display: flex;
            flex-direction: column;
        }
        
        .main-container {
            flex: 1;
            height: 100vh;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            min-width: 0; /* Prevents flex item from overflowing */
        }
        
        .main-header {
            flex-shrink: 0;
            position: sticky;
            top: 0;
            z-index: 20;
            background: white;
            border-bottom: 1px solid #e5e7eb;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
        }
        
        .main-content {
            flex: 1;
            overflow-y: auto;
            overflow-x: hidden;
        }
        
        /* Icon Alignment Fix */
        .icon-container {
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }
        
        .icon-container svg {
            width: 20px;
            height: 20px;
        }
        
        /* Custom Scrollbar */
        .sidebar-content::-webkit-scrollbar,
        .main-content::-webkit-scrollbar {
            width: 6px;
        }
        
        .sidebar-content::-webkit-scrollbar-track,
        .main-content::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 3px;
        }
        
        .sidebar-content::-webkit-scrollbar-thumb,
        .main-content::-webkit-scrollbar-thumb {
            background: rgba(236, 72, 153, 0.5);
            border-radius: 3px;
        }
        
        .sidebar-content::-webkit-scrollbar-thumb:hover,
        .main-content::-webkit-scrollbar-thumb:hover {
            background: rgba(236, 72, 153, 0.7);
        }
        
        /* Responsive Design */
        @media (max-width: 1024px) {
            .sidebar-container {
                width: 256px;
                min-width: 256px;
                max-width: 256px;
            }
        }
        
        @media (max-width: 768px) {
            .sidebar-container {
                position: fixed;
                left: -288px;
                transition: left 0.3s ease-in-out;
                z-index: 50;
            }
            
            .sidebar-container.mobile-open {
                left: 0;
            }
            
            .main-container {
                width: 100%;
            }
            
            .mobile-overlay {
                position: fixed;
                inset: 0;
                background: rgba(0, 0, 0, 0.5);
                z-index: 40;
                opacity: 0;
                visibility: hidden;
                transition: all 0.3s ease-in-out;
            }
            
            .mobile-overlay.active {
                opacity: 1;
                visibility: visible;
            }
        }
        
        /* Prevent text selection on navigation */
        .sidebar-item {
            user-select: none;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
        }
        
        /* Smooth transitions for all interactive elements */
        * {
            scroll-behavior: smooth;
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-900">

    <div class="layout-container">
        <!-- Mobile Overlay -->
        <div class="mobile-overlay md:hidden" id="mobileOverlay"></div>

        <!-- Elegant Sidebar -->
        <aside class="sidebar-container" id="sidebar">
            <div class="sidebar-content">
                <!-- Header Section -->
                <div class="p-6 lg:p-8 flex-shrink-0">
                    <!-- Mobile Menu Button -->
                    <button class="md:hidden mb-4 p-2 rounded-lg hover:bg-white/10 transition-colors" id="closeSidebar">
                        <div class="icon-container text-gray-400">
                            <i data-lucide="x"></i>
                        </div>
                    </button>
                    
                    <!-- Logo -->
                    <div class="text-center mb-8 lg:mb-12">
                        <h1 class="text-2xl lg:text-3xl font-bold logo-gradient mb-2">SIAKAD</h1>
                        <p class="text-xs lg:text-sm text-gray-400 font-light">Academic Information System</p>
                        <div class="w-12 lg:w-16 h-0.5 bg-gradient-to-r from-pink-500 to-rose-500 mx-auto mt-3"></div>
                    </div>
                    
                    <!-- Navigation -->
                    <nav class="space-y-1 lg:space-y-2">
                        <a href="{{route('admin.dashboard')}}" class="sidebar-item flex items-center gap-3 lg:gap-4 px-3 lg:px-4 py-2.5 lg:py-3 rounded-xl text-gray-700 hover:text-gray-900 @if(request()->is('dashboard')) active-item text-white @endif group">
                            <div class="icon-container text-emerald-400 group-hover:text-emerald-300">
                                <i data-lucide="home"></i>
                            </div>
                            <span class="font-medium text-sm lg:text-base">Dashboard</span>
                        </a>
                        
                        <a href="{{route('admin.mahasiswa.index')}}" class="sidebar-item flex items-center gap-3 lg:gap-4 px-3 lg:px-4 py-2.5 lg:py-3 rounded-xl text-gray-700 hover:text-gray-900 @if(request()->is('mahasiswa*')) active-item text-white @endif group">
                            <div class="icon-container text-blue-400 group-hover:text-blue-300">
                                <i data-lucide="graduation-cap"></i>
                            </div>
                            <span class="font-medium text-sm lg:text-base">Mahasiswa</span>
                        </a>
                        
                        <a href="{{route('admin.dosen.index')}}" class="sidebar-item flex items-center gap-3 lg:gap-4 px-3 lg:px-4 py-2.5 lg:py-3 rounded-xl text-gray-700 hover:text-gray-900 @if(request()->is('dosen*')) active-item text-white @endif group">
                            <div class="icon-container text-purple-400 group-hover:text-purple-300">
                                <i data-lucide="user-check"></i>
                            </div>
                            <span class="font-medium text-sm lg:text-base">Dosen</span>
                        </a>
                        
                        <a href="{{route('admin.fakultas.index')}}" class="sidebar-item flex items-center gap-3 lg:gap-4 px-3 lg:px-4 py-2.5 lg:py-3 rounded-xl text-gray-700 hover:text-gray-900 @if(request()->is('fakultas*')) active-item text-white @endif group">
                            <div class="icon-container text-orange-400 group-hover:text-orange-300">
                                <i data-lucide="building-2"></i>
                            </div>
                            <span class="font-medium text-sm lg:text-base">Fakultas</span>
                        </a>

                        <a href="{{route('admin.prodi.index')}}" class="sidebar-item flex items-center gap-3 lg:gap-4 px-3 lg:px-4 py-2.5 lg:py-3 rounded-xl text-gray-700 hover:text-gray-900 @if(request()->is('prodi*')) active-item text-white @endif group">
                            <div class="icon-container text-orange-400 group-hover:text-orange-300">
                                <i data-lucide="building-2"></i>
                            </div>
                            <span class="font-medium text-sm lg:text-base">Program Studi</span>
                        </a>
                        
                        <a href="{{route('admin.matakuliah.index')}}" class="sidebar-item flex items-center gap-3 lg:gap-4 px-3 lg:px-4 py-2.5 lg:py-3 rounded-xl text-gray-700 hover:text-gray-900 @if(request()->is('matakuliah*')) active-item text-white @endif group">
                            <div class="icon-container text-indigo-400 group-hover:text-indigo-300">
                                <i data-lucide="book-open"></i>
                            </div>
                            <span class="font-medium text-sm lg:text-base">Mata Kuliah</span>
                        </a>
                        
                        <a href="{{route('admin.kelas.index')}}" class="sidebar-item flex items-center gap-3 lg:gap-4 px-3 lg:px-4 py-2.5 lg:py-3 rounded-xl text-gray-700 hover:text-gray-900 @if(request()->is('kelas*')) active-item text-white @endif group">
                            <div class="icon-container text-cyan-400 group-hover:text-cyan-300">
                                <i data-lucide="users"></i>
                            </div>
                            <span class="font-medium text-sm lg:text-base">Kelas</span>
                        </a>
                        
                        <a href="{{route('admin.jadwal.index')}}" class="sidebar-item flex items-center gap-3 lg:gap-4 px-3 lg:px-4 py-2.5 lg:py-3 rounded-xl text-gray-700 hover:text-gray-900 @if(request()->is('jadwal*')) active-item text-white @endif group">
                            <div class="icon-container text-pink-400 group-hover:text-pink-300">
                                <i data-lucide="calendar"></i>
                            </div>
                            <span class="font-medium text-sm lg:text-base">Jadwal</span>
                        </a>
                        
                        <a href="{{route('admin.krs.index')}}" class="sidebar-item flex items-center gap-3 lg:gap-4 px-3 lg:px-4 py-2.5 lg:py-3 rounded-xl text-gray-700 hover:text-gray-900 @if(request()->is('krs*')) active-item text-white @endif group">
                            <div class="icon-container text-yellow-400 group-hover:text-yellow-300">
                                <i data-lucide="file-text"></i>
                            </div>
                            <span class="font-medium text-sm lg:text-base">KRS</span>
                        </a>
                    </nav>
                </div>
                
                <!-- Spacer -->
                <div class="flex-1"></div>
                
                <!-- Bottom Section -->
                <div class="p-4 lg:p-6 border-t border-white/10 flex-shrink-0">
                    <div class="space-y-1 lg:space-y-2 mb-4">
                        <a href="{{route('admin.profile.index')}}" class="sidebar-item flex items-center gap-3 lg:gap-4 px-3 lg:px-4 py-2.5 lg:py-3 rounded-xl text-gray-700 hover:text-gray-900 @if(request()->is('profile*')) active-item text-white @endif group">
                            <div class="icon-container text-gray-400 group-hover:text-gray-300">
                                <i data-lucide="user"></i>
                            </div>
                            <span class="font-medium text-sm lg:text-base">Profile</span>
                        </a>
                        
                        <a href="{{route('admin.user.index')}}" class="sidebar-item flex items-center gap-3 lg:gap-4 px-3 lg:px-4 py-2.5 lg:py-3 rounded-xl text-gray-700 hover:text-gray-900 @if(request()->is('user*')) active-item text-white @endif group">
                            <div class="icon-container text-red-400 group-hover:text-red-300">
                                <i data-lucide="settings"></i>
                            </div>
                            <span class="font-medium text-sm lg:text-base">User Management</span>
                        </a>
                    </div>
                    
                    <!-- User Info Card -->
                    <div class="p-3 lg:p-4 rounded-xl glass-effect">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 lg:w-10 lg:h-10 rounded-full bg-gradient-to-r from-pink-500 to-rose-500 flex items-center justify-center flex-shrink-0">
                                <i data-lucide="user" class="w-4 h-4 lg:w-5 lg:h-5 text-white"></i>
                            </div>
                            <div class="min-w-0 flex-1">
                                <p class="text-xs lg:text-sm font-medium text-white truncate">Admin</p>
                                <p class="text-xs text-gray-400 truncate">Administrator</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Main Content Area -->
        <main class="main-container">
            <!-- Top Header -->
            <header class="main-header">
                <div class="flex items-center justify-between">
                    <!-- Mobile Menu Button -->
                    <button class="md:hidden p-2 rounded-lg hover:bg-white/10 transition-colors mr-4" id="openSidebar">
                        <div class="icon-container text-gray-400">
                            <i data-lucide="menu"></i>
                        </div>
                    </button>
                    
                    <div class="flex-1 min-w-0">
                        <h2 class="text-xl lg:text-2xl font-bold text-gray-900 truncate">@yield('page-title', 'Dashboard')</h2>
                        <p class="text-gray-600 mt-1 text-sm lg:text-base truncate">@yield('page-description', 'Selamat datang di Sistem Informasi Akademik')</p>
                    </div>
                    
                    <div class="flex items-center gap-4 flex-shrink-0">
                        <!-- Area kosong untuk menjaga layout tetap seimbang -->
                    </div>
                </div>
            </header>
            
            <!-- Content -->
            <div class="main-content">
                <div class="p-4 lg:p-8">
                    @yield('content')
                </div>
            </div>
        </main>
    </div>

    <script>
        // Initialize Lucide icons
        lucide.createIcons();
        
        // Mobile menu functionality
        const sidebar = document.getElementById('sidebar');
        const openSidebar = document.getElementById('openSidebar');
        const closeSidebar = document.getElementById('closeSidebar');
        const mobileOverlay = document.getElementById('mobileOverlay');
        
        function toggleSidebar(show) {
            if (show) {
                sidebar.classList.add('mobile-open');
                mobileOverlay.classList.add('active');
                document.body.style.overflow = 'hidden';
            } else {
                sidebar.classList.remove('mobile-open');
                mobileOverlay.classList.remove('active');
                document.body.style.overflow = '';
            }
        }
        
        openSidebar?.addEventListener('click', () => toggleSidebar(true));
        closeSidebar?.addEventListener('click', () => toggleSidebar(false));
        mobileOverlay?.addEventListener('click', () => toggleSidebar(false));
        
        // Close sidebar on window resize if mobile
        window.addEventListener('resize', () => {
            if (window.innerWidth >= 768) {
                toggleSidebar(false);
            }
        });
        
        // Add loading animation
        document.addEventListener('DOMContentLoaded', function() {
            document.body.style.opacity = '0';
            setTimeout(() => {
                document.body.style.transition = 'opacity 0.5s ease-in-out';
                document.body.style.opacity = '1';
            }, 100);
        });
        
        // Prevent zoom issues
        document.addEventListener('gesturestart', function (e) {
            e.preventDefault();
        });
    </script>

</body>
</html>