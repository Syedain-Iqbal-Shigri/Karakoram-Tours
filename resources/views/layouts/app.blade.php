<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Karakoram Tours')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-pearl-100 text-earth-800">
    <!-- Navigation -->
    <nav class="bg-white shadow-sm border-b border-pearl-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ url('/') }}" class="flex items-center space-x-2">
                        <span class="text-2xl">🏔️</span>
                        <span class="font-display text-xl font-semibold text-earth-900">Karakoram Tours</span>
                    </a>
                </div>
                <div class="flex items-center space-x-6">
                    <a href="{{ route('tours.index') }}" class="text-earth-600 hover:text-earth-900 font-medium">Expeditions</a>
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-earth-600 hover:text-earth-900 font-medium">Dashboard</a>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="text-earth-600 hover:text-earth-900 font-medium">Sign Out</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="text-earth-600 hover:text-earth-900 font-medium">Sign In</a>
                        <a href="{{ route('register') }}" class="bg-earth-900 text-white px-4 py-2 rounded-lg font-medium hover:bg-earth-800">Register</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-earth-900 text-white py-12 mt-16">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p class="text-white/60">© {{ date('Y') }} Karakoram Tours. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>