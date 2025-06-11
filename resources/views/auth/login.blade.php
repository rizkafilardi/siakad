
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | SIAKAD</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #FFF5F7;
        }
        
        .login-input {
            transition: all 0.2s ease;
        }
        
        .login-input:focus {
            border-color: #EC4899;
            box-shadow: 0 0 0 2px rgba(236, 72, 153, 0.2);
        }
        
        .login-button {
            transition: all 0.2s ease;
        }
        
        .login-button:hover {
            transform: translateY(-1px);
        }
    </style>
</head>
<body class="bg-pink-50">
    <div class="min-h-screen flex items-center justify-center px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-md space-y-8">
            <!-- Simple Header -->
            <div class="text-center">
                <h1 class="text-3xl font-bold text-pink-600">SIAKAD</h1>
                <p class="mt-2 text-sm text-pink-500">Sistem Informasi Akademik</p>
            </div>
            
            <!-- Login Card -->
            <div class="bg-white rounded-lg shadow-sm border border-pink-100 p-6 sm:p-8">
                <div class="mb-6">
                    <h2 class="text-xl font-semibold text-pink-700">Sign In</h2>
                    <p class="text-sm text-pink-400 mt-1">Please enter your credentials to continue</p>
                </div>
                
                <form action="{{ route('auth.authenticate') }}" method="POST" class="space-y-5">
                    @csrf
                    
                    <div>
                        <label for="username" class="block text-sm font-medium text-pink-600 mb-1">Username</label>
                        <input 
                            type="text" 
                            name="username" 
                            id="username"
                            placeholder="Enter your username" 
                            class="login-input w-full px-3 py-2 border border-pink-200 rounded-md text-gray-800 placeholder-pink-300 focus:outline-none"
                            required
                        >
                        @error('username')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="password" class="block text-sm font-medium text-pink-600 mb-1">Password</label>
                        <input 
                            type="password" 
                            name="password" 
                            id="password"
                            placeholder="Enter your password" 
                            class="login-input w-full px-3 py-2 border border-pink-200 rounded-md text-gray-800 placeholder-pink-300 focus:outline-none"
                            required
                        >
                    </div>
                    
                    <div>
                        <button 
                            type="submit" 
                            class="login-button w-full flex justify-center items-center px-4 py-2 bg-pink-500 border border-transparent rounded-md font-medium text-white hover:bg-pink-600 focus:outline-none"
                        >
                            Sign In
                        </button>
                    </div>
                </form>
            </div>
            
            <!-- Footer -->
            <div class="text-center text-xs text-pink-400 mt-8">
                <p>© 2025 SIAKAD. All rights reserved.</p>
            </div>
        </div>
    </div>
</body>
</html>