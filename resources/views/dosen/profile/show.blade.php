@extends('layouts.dosen')

@section('content')
<div class="min-h-screen p-8 bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900">
    <!-- Header Section -->
    <div class="mb-10">
        <div class="flex items-center gap-4 mb-6">
            <div class="w-14 h-14 bg-gradient-to-br from-pink-500 to-pink-600 rounded-2xl flex items-center justify-center shadow-xl shadow-pink-500/25 transform rotate-3 hover:rotate-0 transition-transform duration-300">
                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
            </div>
            <div>
                <h1 class="text-4xl font-bold bg-gradient-to-r from-pink-300 via-pink-400 to-rose-400 bg-clip-text text-transparent leading-tight">
                    Profile Pengguna
                </h1>
                <p class="text-slate-300 text-lg font-medium mt-2">Kelola informasi akun dan pengaturan sistem</p>
            </div>
        </div>
    </div>

    <!-- Main Profile Card -->
    <div class="max-w-5xl mx-auto">
        <div class="glass-effect rounded-3xl p-10 shadow-2xl shadow-pink-500/10 border border-pink-500/20 backdrop-blur-xl">
            <!-- Profile Header -->
            <div class="flex flex-col md:flex-row items-center md:items-start gap-10 mb-10">
                <!-- Avatar Section -->
                <div class="relative">
                    <div class="w-36 h-36 bg-gradient-to-br from-pink-500 to-pink-600 rounded-3xl flex items-center justify-center shadow-2xl shadow-pink-500/30 transform hover:scale-105 transition-transform duration-300">
                        <svg class="w-18 h-18 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <!-- Status Indicator -->
                    <div class="absolute -bottom-2 -right-2 w-10 h-10 bg-emerald-500 rounded-full border-4 border-slate-800 flex items-center justify-center shadow-lg">
                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                        </svg>
                    </div>
                </div>

                <!-- User Info -->
                <div class="flex-1 text-center md:text-left">
                    <h2 class="text-4xl font-bold bg-gradient-to-r from-pink-200 to-pink-300 bg-clip-text text-transparent mb-3">{{ $user->username }}</h2>
                    <div class="flex items-center justify-center md:justify-start gap-3 mb-6">
                        <div class="w-3 h-3 bg-emerald-400 rounded-full animate-pulse"></div>
                        <span class="text-emerald-400 font-semibold text-lg">Online</span>
                    </div>

                    <!-- Role Badge -->
                    <div class="inline-flex items-center gap-3 bg-gradient-to-r from-pink-500/20 to-pink-600/20 border border-pink-500/30 rounded-2xl px-6 py-3 mb-6 backdrop-blur-sm">
                        <svg class="w-5 h-5 text-pink-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                        </svg>
                        <span class="text-pink-200 font-bold text-lg capitalize">{{ $user->role }}</span>
                    </div>

                    <p class="text-slate-400 text-base font-medium mb-8">Member sejak {{ $user->created_at ? $user->created_at->format('d M Y') : 'N/A' }}</p>

                    <!-- Button Edit Akun -->
                    <div class="mt-8">
                        <a href="{{ route('dosen.profile.edit') }}"
                            class="inline-flex items-center gap-3 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white font-bold px-6 py-3 rounded-2xl shadow-xl shadow-blue-500/25 transition-all duration-300 hover:scale-105">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            Edit Akun
                        </a>
                    </div>
                </div>
            </div>

            <!-- Profile Information Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-10">
                <!-- Username Card -->
                <div class="bg-slate-800/50 rounded-2xl p-8 border border-slate-700/50 hover:border-pink-500/30 transition-all duration-300 backdrop-blur-sm">
                    <div class="flex items-center gap-5 mb-6">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center shadow-lg">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-pink-300 font-bold text-lg">Username</h3>
                            <p class="text-slate-400 text-sm font-medium">Identitas pengguna sistem</p>
                        </div>
                    </div>
                    <div class="bg-slate-700/50 rounded-xl p-5 border border-slate-600/50">
                        <p class="text-white font-semibold text-xl">{{ $user->username }}</p>
                    </div>
                </div>

                <!-- Email Card -->
                <div class="bg-slate-800/50 rounded-2xl p-8 border border-slate-700/50 hover:border-pink-500/30 transition-all duration-300 backdrop-blur-sm">
                    <div class="flex items-center gap-5 mb-6">
                        <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center shadow-lg">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-pink-300 font-bold text-lg">Email</h3>
                            <p class="text-slate-400 text-sm font-medium">Alamat email terdaftar</p>
                        </div>
                    </div>
                    <div class="bg-slate-700/50 rounded-xl p-5 border border-slate-600/50">
                        <p class="text-white font-semibold text-xl">{{ $user->email }}</p>
                    </div>
                </div>

                <!-- Role Card -->
                <div class="bg-slate-800/50 rounded-2xl p-8 border border-slate-700/50 hover:border-pink-500/30 transition-all duration-300 backdrop-blur-sm md:col-span-2">
                    <div class="flex items-center gap-5 mb-6">
                        <div class="w-12 h-12 bg-gradient-to-br from-pink-500 to-pink-600 rounded-2xl flex items-center justify-center shadow-lg">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-pink-300 font-bold text-lg">Role</h3>
                            <p class="text-slate-400 text-sm font-medium">Tingkat akses pengguna</p>
                        </div>
                    </div>
                    <div class="bg-slate-700/50 rounded-xl p-5 border border-slate-600/50">
                        <p class="text-white font-semibold text-xl capitalize">{{ $user->role }}</p>
                    </div>
                </div>
            </div>

            <!-- Account Statistics -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-10">
                <div class="text-center p-8 bg-gradient-to-br from-emerald-500/10 to-emerald-600/10 rounded-2xl border border-emerald-500/20 hover:scale-105 transition-transform duration-300">
                    <div class="w-16 h-16 bg-emerald-500 rounded-2xl mx-auto mb-4 flex items-center justify-center shadow-xl">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h4 class="text-emerald-300 font-bold text-lg mb-2">Status Akun</h4>
                    <p class="text-white font-bold text-xl">Aktif</p>
                </div>

                <div class="text-center p-8 bg-gradient-to-br from-blue-500/10 to-blue-600/10 rounded-2xl border border-blue-500/20 hover:scale-105 transition-transform duration-300">
                    <div class="w-16 h-16 bg-blue-500 rounded-2xl mx-auto mb-4 flex items-center justify-center shadow-xl">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h4 class="text-blue-300 font-bold text-lg mb-2">Last Login</h4>
                    <p class="text-white font-bold text-xl">{{ now()->format('d M Y') }}</p>
                </div>

                <div class="text-center p-8 bg-gradient-to-br from-pink-500/10 to-pink-600/10 rounded-2xl border border-pink-500/20 hover:scale-105 transition-transform duration-300">
                    <div class="w-16 h-16 bg-gradient-to-br from-pink-500 to-pink-600 rounded-2xl mx-auto mb-4 flex items-center justify-center shadow-xl">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                        </svg>
                    </div>
                    <h4 class="text-pink-300 font-bold text-lg mb-2">Privileges</h4>
                    <p class="text-white font-bold text-xl">Premium</p>
                </div>
            </div>

            <!-- Security Section -->
            <div class="bg-gradient-to-r from-slate-800/50 to-slate-700/50 rounded-2xl p-8 border border-slate-600/50 mb-10 backdrop-blur-sm">
                <div class="flex items-center gap-4 mb-6">
                    <div class="w-12 h-12 bg-emerald-500 rounded-2xl flex items-center justify-center shadow-lg">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-emerald-300 font-bold text-xl">Keamanan Akun</h3>
                        <p class="text-slate-400 text-sm font-medium">Akun Anda dilindungi dengan enkripsi tingkat tinggi</p>
                    </div>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
                    <div class="p-4 bg-slate-700/50 rounded-xl">
                        <div class="text-emerald-400 font-bold text-lg">256-bit</div>
                        <div class="text-slate-400 font-medium">Encryption</div>
                    </div>
                    <div class="p-4 bg-slate-700/50 rounded-xl">
                        <div class="text-emerald-400 font-bold text-lg">2FA</div>
                        <div class="text-slate-400 font-medium">Ready</div>
                    </div>
                    <div class="p-4 bg-slate-700/50 rounded-xl">
                        <div class="text-emerald-400 font-bold text-lg">SSL</div>
                        <div class="text-slate-400 font-medium">Secured</div>
                    </div>
                    <div class="p-4 bg-slate-700/50 rounded-xl">
                        <div class="text-emerald-400 font-bold text-lg">24/7</div>
                        <div class="text-slate-400 font-medium">Monitoring</div>
                    </div>
                </div>
            </div>

            <!-- Logout Section -->
            <div class="flex justify-center">
                <form action="{{ route("auth.logout") }}" method="POST">
                    @CSRF
                    @method("delete")
                    <button type="submit"
                            class="group inline-flex items-center gap-4 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-bold px-10 py-5 rounded-2xl transition-all duration-300 hover:scale-105 shadow-xl shadow-red-500/25">
                        <svg class="w-6 h-6 group-hover:rotate-12 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                        </svg>
                        Logout Sistem
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection