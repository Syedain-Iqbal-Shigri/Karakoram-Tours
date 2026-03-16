@extends('layouts.app')

@section('title', $tour->title)

@section('content')
<div class="bg-pearl-100 min-h-screen">
    <!-- Hero -->
    <div class="relative h-96 bg-earth-900">
        <img src="{{ $tour->thumbnail_url }}" alt="{{ $tour->title }}" class="w-full h-full object-cover opacity-70">
        <div class="absolute inset-0 bg-gradient-to-t from-earth-900/80 to-transparent"></div>
        <div class="absolute bottom-0 left-0 right-0 p-8">
            <div class="max-w-7xl mx-auto">
                <div class="flex items-center gap-2 text-white/70 text-sm mb-2">
                    <span>{{ $tour->destination }}</span>
                    <span>·</span>
                    <span class="capitalize">{{ $tour->difficulty }}</span>
                    <span>·</span>
                    <span>{{ $tour->duration_days }} Days</span>
                </div>
                <h1 class="font-display text-4xl font-bold text-white">{{ $tour->title }}</h1>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Content -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-xl p-8 shadow-sm border border-pearl-200 mb-8">
                    <h2 class="font-display text-2xl font-semibold text-earth-900 mb-4">About This Expedition</h2>
                    <div class="prose text-earth-600">
                        {!! $tour->description !!}
                    </div>
                </div>

                @if($tour->highlights)
                <div class="bg-white rounded-xl p-8 shadow-sm border border-pearl-200 mb-8">
                    <h2 class="font-display text-2xl font-semibold text-earth-900 mb-4">Highlights</h2>
                    <ul class="space-y-3">
                        @foreach($tour->highlights as $highlight)
                        <li class="flex items-start gap-3 text-earth-600">
                            <span class="text-accent-500 mt-1">✓</span>
                            {{ $highlight }}
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-xl p-6 shadow-sm border border-pearl-200 sticky top-24">
                    <div class="text-center mb-6">
                        <div class="text-sm text-earth-500 mb-1">Starting from</div>
                        <div class="text-3xl font-bold text-earth-900">${{ number_format($tour->base_price, 0) }}</div>
                        @if($tour->sale_price)
                        <div class="text-lg text-accent-600">Sale: ${{ number_format($tour->sale_price, 0) }}</div>
                        @endif
                        <div class="text-sm text-earth-500">per person</div>
                    </div>

                    <a href="#" class="block w-full bg-earth-900 text-white text-center py-3 rounded-lg font-semibold hover:bg-earth-800 transition-colors">
                        Book Now
                    </a>

                    <div class="mt-6 space-y-3 text-sm">
                        <div class="flex justify-between text-earth-600">
                            <span>Duration</span>
                            <span class="font-medium">{{ $tour->duration_days }} Days</span>
                        </div>
                        <div class="flex justify-between text-earth-600">
                            <span>Group Size</span>
                            <span class="font-medium">Max {{ $tour->max_group_size }}</span>
                        </div>
                        <div class="flex justify-between text-earth-600">
                            <span>Difficulty</span>
                            <span class="font-medium capitalize">{{ $tour->difficulty }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection