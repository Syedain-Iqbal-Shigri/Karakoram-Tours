@extends('layouts.app')

@section('title', 'All Expeditions')

@section('content')
<div class="bg-pearl-100 min-h-screen py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h1 class="font-display text-4xl font-bold text-earth-900 mb-4">Our Expeditions</h1>
            <p class="text-earth-600 max-w-2xl mx-auto">Explore our carefully crafted adventures led by expert guides.</p>
        </div>

        @if($tours->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($tours as $tour)
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
            <article class="group bg-white rounded-xl overflow-hidden border border-pearl-200 hover:border-pearl-300 hover:shadow-lg transition-all duration-300">
                <a href="{{ route('tours.show', $tour->slug) }}" class="block relative aspect-[4/3] overflow-hidden bg-pearl-200">
                    <img 
                        src="{{ asset('storage/tours/' . $imageFile) }}" 
                        alt="{{ $tour->title }}"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                        loading="lazy">
                    
                    <div class="absolute top-3 left-3 flex gap-2">
                        @if($tour->is_featured)
                            <span class="bg-amber-500 text-white text-xs font-semibold px-2 py-1 rounded">Featured</span>
                        @endif
                        @if($tour->sale_price && $tour->base_price > $tour->sale_price)
                            <span class="bg-earth-700 text-white text-xs font-semibold px-2 py-1 rounded">
                                Save {{ round((1 - $tour->sale_price / $tour->base_price) * 100) }}%
                            </span>
                        @endif
                    </div>
                    
                    <span class="absolute bottom-3 right-3 bg-earth-900/80 text-white text-xs px-2 py-1 rounded">
                        {{ $tour->duration_days }} Days
                    </span>
                </a>
                
                <div class="p-5">
                    <div class="flex items-center text-sm text-earth-500 mb-2">
                        <span>{{ $tour->destination }}</span>
                        <span class="mx-2">·</span>
                        <span class="capitalize">{{ $tour->difficulty }}</span>
                    </div>
                    
                    <h3 class="font-display text-lg font-semibold text-earth-800 mb-2 group-hover:text-amber-600 transition-colors">
                        <a href="{{ route('tours.show', $tour->slug) }}" class="hover:underline">{{ $tour->title }}</a>
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
                        <a href="{{ route('tours.show', $tour->slug) }}" class="text-amber-600 hover:text-amber-700 text-sm font-medium">Details →</a>
                    </div>
                </div>
            </article>
            @endforeach
        </div>

        <div class="mt-12">
            {{ $tours->links() }}
        </div>
        @else
        <div class="text-center py-16">
            <span class="text-5xl mb-4 block">🏔️</span>
            <p class="text-earth-500 text-lg">No expeditions available at the moment.</p>
        </div>
        @endif
    </div>
</div>
@endsection