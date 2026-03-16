<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Karakoram Tours | Expert-Led Expeditions to K2, Everest & Beyond</title>
    <meta name="description" content="Join expert-led expeditions to K2 Base Camp, Concordia, Hunza Valley, and Everest. 25+ years of safe, unforgettable mountain adventures.">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Inter', system-ui, sans-serif;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            background-color: #F9F6F0;
        }
        .font-display {
            font-family: 'Playfair Display', Georgia, serif;
        }
        .hero-section {
            background-color: #2A1F14;
            min-height: 100vh;
            position: relative;
            overflow: hidden;
        }
        .hero-image {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0.8;
        }
        .hero-vignette {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(42,31,20,0.9) 0%, rgba(42,31,20,0.4) 50%, rgba(42,31,20,0.3) 100%);
        }
        .hero-content {
            position: relative;
            z-index: 10;
        }
    </style>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-pearl-100 text-earth-800">
    
    <a href="#main-content" class="sr-only focus:not-sr-only focus:absolute focus:top-4 focus:left-4 bg-earth-800 text-white px-4 py-2 rounded">
        Skip to main content
    </a>

    <!-- NAVIGATION -->
    <nav class="fixed top-0 left-0 right-0 z-50 transition-all duration-300" id="navbar" role="navigation" aria-label="Main navigation">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 md:h-20 items-center">
                <a href="{{ url('/') }}" class="flex items-center space-x-3 group" aria-label="Karakoram Tours Home">
                    <span class="text-2xl md:text-3xl" aria-hidden="true">🏔️</span>
                    <span class="text-lg md:text-xl font-display font-semibold text-white tracking-tight">
                        Karakoram<span class="font-normal ml-1">Tours</span>
                    </span>
                </a>
                
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('tours.index') }}" class="text-white/80 hover:text-white text-sm font-medium transition-colors">
                        Expeditions
                    </a>
                    <a href="#destinations" class="text-white/80 hover:text-white text-sm font-medium transition-colors">
                        Destinations
                    </a>
                    <a href="#about" class="text-white/80 hover:text-white text-sm font-medium transition-colors">
                        About
                    </a>
                    <a href="#contact" class="text-white/80 hover:text-white text-sm font-medium transition-colors">
                        Contact
                    </a>
                    
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-white/80 hover:text-white text-sm font-medium transition-colors">
                            Dashboard
                        </a>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="text-white/80 hover:text-white text-sm font-medium transition-colors">
                                Sign Out
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="text-white/80 hover:text-white text-sm font-medium transition-colors">
                            Sign In
                        </a>
                        <a href="{{ route('register') }}" class="bg-white text-earth-800 px-5 py-2.5 rounded text-sm font-semibold hover:bg-pearl-200 transition-colors">
                            Start Your Journey
                        </a>
                    @endauth
                </div>
                
                <button type="button" class="md:hidden text-white p-2" id="mobile-menu-btn" aria-expanded="false" aria-controls="mobile-menu" aria-label="Toggle menu">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>
        
        <div class="hidden md:hidden bg-earth-800/95 backdrop-blur" id="mobile-menu" role="menu">
            <div class="px-4 py-4 space-y-3">
                <a href="{{ route('tours.index') }}" class="block text-white/80 hover:text-white py-2" role="menuitem">Expeditions</a>
                <a href="#destinations" class="block text-white/80 hover:text-white py-2" role="menuitem">Destinations</a>
                <a href="#about" class="block text-white/80 hover:text-white py-2" role="menuitem">About</a>
                <a href="#contact" class="block text-white/80 hover:text-white py-2" role="menuitem">Contact</a>
                @auth
                    <a href="{{ url('/dashboard') }}" class="block text-white/80 hover:text-white py-2" role="menuitem">Dashboard</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="block text-white/80 hover:text-white py-2 w-full text-left">Sign Out</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="block text-white/80 hover:text-white py-2" role="menuitem">Sign In</a>
                    <a href="{{ route('register') }}" class="block bg-white text-earth-800 px-4 py-2 rounded text-center font-semibold mt-2" role="menuitem">Start Your Journey</a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- HERO -->
    <header class="hero-section" role="banner">
        <img 
            src="{{ asset('images/hero-k2.jpg') }}" 
            alt="K2 Mountain - Karakoram Range, Pakistan"
            class="hero-image"
            width="1920"
            height="1080"
            loading="eager"
            fetchpriority="high"
            decoding="async">
        
        <div class="hero-vignette" aria-hidden="true"></div>
        
        <div class="hero-content min-h-screen flex items-center">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 md:py-32 text-center">
                
                <div class="inline-flex items-center px-4 py-1.5 bg-white/10 backdrop-blur-sm rounded-full text-white/70 text-xs tracking-wide mb-8">
                    <span class="w-1.5 h-1.5 bg-amber-500 rounded-full mr-2"></span>
                    Now Booking 2026 Season — Limited Groups
                </div>
                
                <h1 class="font-display text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-semibold text-white leading-tight mb-6">
                    Journey Beyond<br class="hidden sm:block">
                    <span class="text-amber-200">the Ordinary</span>
                </h1>
                
                <p class="text-lg md:text-xl text-white/60 max-w-2xl mx-auto mb-10 leading-relaxed">
                    Expert-led expeditions to K2, Everest, and the world's most 
                    remarkable mountain destinations. Small groups, authentic experiences, 
                    memories that last a lifetime.
                </p>
                
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('tours.index') }}" class="inline-flex items-center justify-center bg-white text-earth-800 px-8 py-4 text-base font-semibold hover:bg-pearl-200 transition-colors group">
                        View Expeditions
                        <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                </div>
                
                <div class="mt-16 grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-8 max-w-3xl mx-auto">
                    <div class="text-center">
                        <div class="text-2xl md:text-3xl font-semibold text-white">500+</div>
                        <div class="text-white/50 text-sm mt-1">Travelers</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl md:text-3xl font-semibold text-white">25+</div>
                        <div class="text-white/50 text-sm mt-1">Years</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl md:text-3xl font-semibold text-white">98%</div>
                        <div class="text-white/50 text-sm mt-1">Success Rate</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl md:text-3xl font-semibold text-white">4.9</div>
                        <div class="text-white/50 text-sm mt-1">Rating</div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="absolute bottom-8 left-1/2 -translate-x-1/2" aria-hidden="true">
            <svg class="w-5 h-5 text-white/40 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
            </svg>
        </div>
    </header>

    <!-- MAIN CONTENT -->
    <main id="main-content">
        
        <!-- Featured Expeditions -->
        @if($featuredTours->count() > 0)
        <section class="py-16 md:py-24 bg-pearl-100" aria-labelledby="expeditions-heading">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                
                <header class="text-center mb-12 md:mb-16">
                    <span class="text-amber-600 text-sm font-medium tracking-wide uppercase">Handcrafted Experiences</span>
                    <h2 id="expeditions-heading" class="font-display text-3xl md:text-4xl lg:text-5xl font-semibold text-earth-800 mt-3 mb-4">
                        Signature Expeditions
                    </h2>
                    <p class="text-earth-500 text-lg max-w-2xl mx-auto">
                        Thoughtfully planned adventures led by expert guides. Every detail handled, 
                        so you can focus on what matters most.
                    </p>
                </header>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
                    @foreach($featuredTours as $tour)
                    <article class="group bg-white rounded-xl overflow-hidden border border-pearl-200 hover:border-pearl-300 hover:shadow-lg transition-all duration-300">
                        
                        {{-- Card Image --}}
                        <a href="{{ route('tours.show', $tour->slug) }}" class="block relative aspect-[4/3] overflow-hidden bg-pearl-200">
                            @php
                                $imageMap = [
                                    'k2' => 'k2-base-camp.jpg',
                                    'concordia' => 'concordia-glacier.jpg',
                                    'hunza' => 'hunza-valley.jpg',
                                    'everest' => 'everest-base-camp.jpg',
                                    'annapurna' => 'annapurna-circuit.jpg',
                                    'kailash' => 'mount-kailash.jpg',
                                    'fairy' => 'k2-base-camp.jpg',
                                    'skardu' => 'hunza-valley.jpg',
                                ];
                                $dest = strtolower($tour->destination ?? '');
                                $imageFile = collect($imageMap)->first(fn($v, $k) => str_contains($dest, $k)) ?? 'k2-base-camp.jpg';
                            @endphp
                            <img 
                                src="{{ asset('storage/tours/' . $imageFile) }}" 
                                alt="{{ $tour->title }}"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                loading="lazy"
                                decoding="async">
                            
                            {{-- Badges --}}
                            <div class="absolute top-3 left-3 flex gap-2">
                                @if($tour->is_featured)
                                    <span class="bg-amber-500 text-white text-xs font-semibold px-2 py-1 rounded">Featured</span>
                                @endif
                                @if($tour->sale_price && $tour->base_price > 0)
                                    <span class="bg-earth-700 text-white text-xs font-semibold px-2 py-1 rounded">
                                        Save {{ round((1 - $tour->sale_price / $tour->base_price) * 100) }}%
                                    </span>
                                @endif
                            </div>
                            
                            {{-- Duration --}}
                            <span class="absolute bottom-3 right-3 bg-earth-900/80 text-white text-xs px-2 py-1 rounded">
                                {{ $tour->duration_days }} Days
                            </span>
                        </a>
                        
                        {{-- Card Content --}}
                        <div class="p-5">
                            <div class="flex items-center text-sm text-earth-500 mb-2">
                                <span>{{ $tour->destination }}</span>
                                <span class="mx-2" aria-hidden="true">·</span>
                                <span class="capitalize">{{ $tour->difficulty }}</span>
                            </div>
                            
                            <h3 class="font-display text-lg font-semibold text-earth-800 mb-2 group-hover:text-amber-600 transition-colors">
                                <a href="{{ route('tours.show', $tour->slug) }}" class="hover:underline">
                                    {{ $tour->title }}
                                </a>
                            </h3>
                            
                            <p class="text-earth-500 text-sm mb-4 line-clamp-2">
                                {{ Str::limit($tour->short_description ?? $tour->description, 80) }}
                            </p>
                            
                            <div class="flex items-end justify-between pt-3 border-t border-pearl-200">
                                <div>
                                    <span class="text-xs text-earth-400">From</span>
                                    <div class="flex items-baseline gap-2">
                                        @if($tour->sale_price && $tour->base_price > $tour->sale_price)
                                            <span class="text-earth-400 line-through text-sm">${{ number_format($tour->base_price, 0) }}</span>
                                            <span class="text-xl font-semibold text-earth-800">${{ number_format($tour->sale_price, 0) }}</span>
                                        @else
                                            <span class="text-xl font-semibold text-earth-800">${{ number_format($tour->base_price ?? 0, 0) }}</span>
                                        @endif
                                    </div>
                                </div>
                                <span class="text-amber-600 text-sm font-medium group-hover:underline">Details →</span>
                            </div>
                        </div>
                    </article>
                    @endforeach
                </div>
                
                <div class="text-center mt-12">
                    <a href="{{ route('tours.index') }}" class="inline-flex items-center bg-earth-900 text-white px-8 py-3 font-medium hover:bg-earth-800 transition-colors">
                        View All Expeditions
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                </div>
            </div>
        </section>
        @else
        <section class="py-16 md:py-24 bg-pearl-100">
            <div class="max-w-3xl mx-auto px-4 text-center">
                <div class="bg-white rounded-xl border border-pearl-200 p-12 md:p-16">
                    <span class="text-5xl mb-6 block" aria-hidden="true">🏔️</span>
                    <h2 class="font-display text-2xl font-semibold text-earth-800 mb-3">Expeditions Coming Soon</h2>
                    <p class="text-earth-500">We're preparing extraordinary adventures. Check back soon or subscribe to be notified.</p>
                </div>
            </div>
        </section>
        @endif

        <!-- Why Choose Us -->
        <section id="about" class="py-16 md:py-24 bg-white" aria-labelledby="about-heading">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">
                    
                    <div>
                        <span class="text-amber-600 text-sm font-medium tracking-wide uppercase">Why Karakoram Tours</span>
                        <h2 id="about-heading" class="font-display text-3xl md:text-4xl font-semibold text-earth-800 mt-3 mb-6">
                            25 Years of Extraordinary Adventures
                        </h2>
                        <p class="text-earth-600 text-lg leading-relaxed mb-8">
                            We don't just lead tours—we craft meaningful experiences. Every expedition 
                            is thoughtfully designed with your safety, comfort, and sense of wonder at heart.
                        </p>
                        
                        <dl class="space-y-6">
                            <div class="flex items-start gap-4">
                                <div class="w-10 h-10 bg-pearl-200 rounded-lg flex items-center justify-center flex-shrink-0" aria-hidden="true">
                                    <svg class="w-5 h-5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                    </svg>
                                </div>
                                <div>
                                    <dt class="font-semibold text-earth-800">Safety First, Always</dt>
                                    <dd class="text-earth-500 mt-1">Certified guides, comprehensive emergency protocols, 24/7 satellite communication.</dd>
                                </div>
                            </div>
                            
                            <div class="flex items-start gap-4">
                                <div class="w-10 h-10 bg-pearl-200 rounded-lg flex items-center justify-center flex-shrink-0" aria-hidden="true">
                                    <svg class="w-5 h-5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                    </svg>
                                </div>
                                <div>
                                    <dt class="font-semibold text-earth-800">Expert Local Guides</dt>
                                    <dd class="text-earth-500 mt-1">Native to the region, sharing trails, stories, culture, and hidden gems.</dd>
                                </div>
                            </div>
                            
                            <div class="flex items-start gap-4">
                                <div class="w-10 h-10 bg-pearl-200 rounded-lg flex items-center justify-center flex-shrink-0" aria-hidden="true">
                                    <svg class="w-5 h-5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                    </svg>
                                </div>
                                <div>
                                    <dt class="font-semibold text-earth-800">Small Groups, Personal Attention</dt>
                                    <dd class="text-earth-500 mt-1">Maximum 12 travelers per expedition for authentic connections.</dd>
                                </div>
                            </div>
                        </dl>
                    </div>
                    
                    <div class="bg-earth-900 rounded-xl p-8 md:p-10 text-white">
                        <dl class="grid grid-cols-2 gap-6 md:gap-8">
                            <div class="text-center">
                                <dd class="text-4xl md:text-5xl font-semibold">500+</dd>
                                <dt class="text-white/60 mt-2">Happy Travelers</dt>
                            </div>
                            <div class="text-center">
                                <dd class="text-4xl md:text-5xl font-semibold">98%</dd>
                                <dt class="text-white/60 mt-2">Success Rate</dt>
                            </div>
                            <div class="text-center">
                                <dd class="text-4xl md:text-5xl font-semibold">25+</dd>
                                <dt class="text-white/60 mt-2">Years Experience</dt>
                            </div>
                            <div class="text-center">
                                <dd class="text-4xl md:text-5xl font-semibold">4.9</dd>
                                <dt class="text-white/60 mt-2">Average Rating</dt>
                            </div>
                        </dl>
                        
                        <div class="mt-8 pt-8 border-t border-white/20 text-center">
                            <div class="inline-flex items-center gap-2 bg-amber-500/20 px-4 py-2 rounded-full">
                                <span class="text-amber-400">✓</span>
                                <span class="text-sm">Member, Adventure Travel Association</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Testimonials -->
        <section class="py-16 md:py-24 bg-pearl-100" aria-labelledby="testimonials-heading">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <header class="text-center mb-12">
                    <span class="text-amber-600 text-sm font-medium tracking-wide uppercase">Testimonials</span>
                    <h2 id="testimonials-heading" class="font-display text-3xl md:text-4xl font-semibold text-earth-800 mt-3">
                        Stories From Our Adventurers
                    </h2>
                </header>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8">
                    <article class="bg-white rounded-xl p-6 md:p-8 border border-pearl-200">
                        <blockquote>
                            <p class="text-earth-600 leading-relaxed mb-6">
                                "An absolutely life-changing experience. The guides were exceptional, the scenery beyond words. 
                                Karakoram Tours made my dream of seeing K2 a reality."
                            </p>
                        </blockquote>
                        <footer class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-amber-100 rounded-full flex items-center justify-center text-amber-700 font-semibold text-sm">
                                JD
                            </div>
                            <div>
                                <cite class="not-italic font-semibold text-earth-800">John Davidson</cite>
                                <p class="text-earth-400 text-sm">K2 Base Camp, 2025</p>
                            </div>
                        </footer>
                        <div class="flex text-amber-500 mt-4" aria-label="5 out of 5 stars">★★★★★</div>
                    </article>
                    
                    <article class="bg-white rounded-xl p-6 md:p-8 border border-pearl-200">
                        <blockquote>
                            <p class="text-earth-600 leading-relaxed mb-6">
                                "Professional from start to finish. Every detail was perfectly planned. The Hunza Valley 
                                exceeded all expectations—the people, landscapes, food."
                            </p>
                        </blockquote>
                        <footer class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-amber-100 rounded-full flex items-center justify-center text-amber-700 font-semibold text-sm">
                                SM
                            </div>
                            <div>
                                <cite class="not-italic font-semibold text-earth-800">Sarah Mitchell</cite>
                                <p class="text-earth-400 text-sm">Hunza Valley, 2025</p>
                            </div>
                        </footer>
                        <div class="flex text-amber-500 mt-4" aria-label="5 out of 5 stars">★★★★★</div>
                    </article>
                    
                    <article class="bg-white rounded-xl p-6 md:p-8 border border-pearl-200">
                        <blockquote>
                            <p class="text-earth-600 leading-relaxed mb-6">
                                "Third trip with Karakoram Tours and they never disappoint. The attention to safety and 
                                authentic experiences keeps me coming back."
                            </p>
                        </blockquote>
                        <footer class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-amber-100 rounded-full flex items-center justify-center text-amber-700 font-semibold text-sm">
                                MK
                            </div>
                            <div>
                                <cite class="not-italic font-semibold text-earth-800">Michael Kim</cite>
                                <p class="text-earth-400 text-sm">Everest Base Camp, 2024</p>
                            </div>
                        </footer>
                        <div class="flex text-amber-500 mt-4" aria-label="5 out of 5 stars">★★★★★</div>
                    </article>
                </div>
            </div>
        </section>

        <!-- Destinations -->
        <section id="destinations" class="py-16 md:py-24 bg-earth-900 text-white" aria-labelledby="destinations-heading">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <header class="text-center mb-12">
                    <span class="text-amber-400 text-sm font-medium tracking-wide uppercase">Explore</span>
                    <h2 id="destinations-heading" class="font-display text-3xl md:text-4xl font-semibold mt-3">
                        World-Class Destinations
                    </h2>
                    <p class="text-white/60 mt-4 max-w-xl mx-auto">
                        From the towering peaks of the Karakoram to the ancient valleys of the Himalayas.
                    </p>
                </header>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <a href="{{ route('tours.index') }}" class="group relative h-64 md:h-80 rounded-xl overflow-hidden bg-earth-800 hover:shadow-2xl transition-shadow">
                        <div class="absolute inset-0 bg-gradient-to-t from-earth-900/90 via-earth-900/40 to-transparent"></div>
                        <div class="absolute inset-0 flex flex-col justify-end p-6">
                            <h3 class="text-xl font-semibold mb-1">Pakistan</h3>
                            <p class="text-white/70 text-sm mb-2">K2, Concordia, Hunza Valley</p>
                            <span class="text-amber-400 text-sm font-medium group-hover:underline">12 Expeditions →</span>
                        </div>
                    </a>
                    
                    <a href="{{ route('tours.index') }}" class="group relative h-64 md:h-80 rounded-xl overflow-hidden bg-earth-800 hover:shadow-2xl transition-shadow">
                        <div class="absolute inset-0 bg-gradient-to-t from-earth-900/90 via-earth-900/40 to-transparent"></div>
                        <div class="absolute inset-0 flex flex-col justify-end p-6">
                            <h3 class="text-xl font-semibold mb-1">Nepal</h3>
                            <p class="text-white/70 text-sm mb-2">Everest, Annapurna, Kathmandu</p>
                            <span class="text-amber-400 text-sm font-medium group-hover:underline">8 Expeditions →</span>
                        </div>
                    </a>
                    
                    <a href="{{ route('tours.index') }}" class="group relative h-64 md:h-80 rounded-xl overflow-hidden bg-earth-800 hover:shadow-2xl transition-shadow">
                        <div class="absolute inset-0 bg-gradient-to-t from-earth-900/90 via-earth-900/40 to-transparent"></div>
                        <div class="absolute inset-0 flex flex-col justify-end p-6">
                            <h3 class="text-xl font-semibold mb-1">Tibet</h3>
                            <p class="text-white/70 text-sm mb-2">Mount Kailash, Lhasa</p>
                            <span class="text-amber-400 text-sm font-medium group-hover:underline">5 Expeditions →</span>
                        </div>
                    </a>
                </div>
            </div>
        </section>

        <!-- Newsletter -->
        <section id="contact" class="py-16 md:py-24 bg-pearl-100" aria-labelledby="contact-heading">
            <div class="max-w-2xl mx-auto px-4 text-center">
                <span class="text-amber-600 text-sm font-medium tracking-wide uppercase">Stay Updated</span>
                <h2 id="contact-heading" class="font-display text-3xl md:text-4xl font-semibold text-earth-800 mt-3 mb-4">
                    Get Early Access
                </h2>
                <p class="text-earth-600 mb-8">
                    Be the first to know about new expeditions, special offers, and stories from the mountains.
                </p>
                
                <form class="flex flex-col sm:flex-row gap-3" action="#" method="POST">
                    @csrf
                    <label for="email" class="sr-only">Email address</label>
                    <input 
                        type="email" 
                        id="email"
                        name="email" 
                        placeholder="Your email address" 
                        required
                        class="flex-1 px-5 py-3 rounded-lg border border-pearl-300 focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20 outline-none bg-white text-earth-800">
                    <button type="submit" class="bg-earth-900 text-white px-6 py-3 font-medium hover:bg-earth-800 transition-colors whitespace-nowrap rounded-lg">
                        Subscribe
                    </button>
                </form>
                
                <p class="text-sm text-earth-400 mt-4">No spam, unsubscribe anytime. Join 5,000+ adventurers.</p>
            </div>
        </section>
    </main>

    <!-- FOOTER -->
    <footer class="bg-earth-900 text-white pt-16 pb-8" role="contentinfo">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 mb-12">
                
                <div>
                    <a href="{{ url('/') }}" class="flex items-center space-x-2 mb-4">
                        <span class="text-2xl" aria-hidden="true">🏔️</span>
                        <span class="font-display text-lg font-semibold">Karakoram Tours</span>
                    </a>
                    <p class="text-white/50 text-sm leading-relaxed">
                        Creating extraordinary mountain adventures since 1999. Your journey of a lifetime starts here.
                    </p>
                </div>
                
                <nav aria-label="Quick links">
                    <h3 class="font-semibold mb-4">Quick Links</h3>
                    <ul class="space-y-2 text-white/60 text-sm">
                        <li><a href="{{ route('tours.index') }}" class="hover:text-white transition-colors">All Expeditions</a></li>
                        <li><a href="#about" class="hover:text-white transition-colors">About Us</a></li>
                        <li><a href="#contact" class="hover:text-white transition-colors">Contact</a></li>
                    </ul>
                </nav>
                
                <nav aria-label="Destinations">
                    <h3 class="font-semibold mb-4">Destinations</h3>
                    <ul class="space-y-2 text-white/60 text-sm">
                        <li><a href="{{ route('tours.index') }}" class="hover:text-white transition-colors">Pakistan</a></li>
                        <li><a href="{{ route('tours.index') }}" class="hover:text-white transition-colors">Nepal</a></li>
                        <li><a href="{{ route('tours.index') }}" class="hover:text-white transition-colors">Tibet</a></li>
                    </ul>
                </nav>
                
                <div>
                    <h3 class="font-semibold mb-4">Contact</h3>
                    <address class="not-italic text-white/60 text-sm space-y-2">
                        <p>📧 info@karakoramtours.com</p>
                        <p>📞 +1 (555) 123-4567</p>
                        <p>📍 Skardu, Pakistan</p>
                    </address>
                </div>
            </div>
            
            <div class="border-t border-white/10 pt-8 flex flex-col md:flex-row justify-between items-center text-white/40 text-sm">
                <p>© {{ date('Y') }} Karakoram Tours. All rights reserved.</p>
                <nav class="flex space-x-6 mt-4 md:mt-0" aria-label="Legal">
                    <a href="#" class="hover:text-white transition-colors">Privacy</a>
                    <a href="#" class="hover:text-white transition-colors">Terms</a>
                    <a href="#" class="hover:text-white transition-colors">Refunds</a>
                </nav>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const navbar = document.getElementById('navbar');
            let ticking = false;
            
            window.addEventListener('scroll', function() {
                if (!ticking) {
                    window.requestAnimationFrame(function() {
                        if (window.scrollY > 50) {
                            navbar.classList.add('bg-earth-900/95', 'backdrop-blur-sm', 'shadow-lg');
                        } else {
                            navbar.classList.remove('bg-earth-900/95', 'backdrop-blur-sm', 'shadow-lg');
                        }
                        ticking = false;
                    });
                    ticking = true;
                }
            });
            
            const menuBtn = document.getElementById('mobile-menu-btn');
            const mobileMenu = document.getElementById('mobile-menu');
            
            if (menuBtn && mobileMenu) {
                menuBtn.addEventListener('click', function() {
                    const expanded = menuBtn.getAttribute('aria-expanded') === 'true';
                    menuBtn.setAttribute('aria-expanded', !expanded);
                    mobileMenu.classList.toggle('hidden');
                });
            }
        });
    </script>
</body>
</html>