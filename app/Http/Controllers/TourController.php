<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TourController extends Controller
{
    public function index(Request $request): View
    {
        $query = Tour::where('status', 'published')
            ->orderBy('is_featured', 'desc')
            ->orderBy('created_at', 'desc');

        if ($request->filled('destination')) {
            $query->where('destination', 'like', "%{$request->destination}%");
        }

        if ($request->filled('difficulty')) {
            $query->where('difficulty', $request->difficulty);
        }

        $tours = $query->paginate(12)->withQueryString();

        return view('tours.index', compact('tours'));
    }

    public function show(string $slug): View
    {
        $tour = Tour::where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        $tour->increment('views_count');

        $relatedTours = Tour::where('id', '!=', $tour->id)
            ->where('status', 'published')
            ->where(function($q) use ($tour) {
                $q->where('destination', $tour->destination)
                  ->orWhere('is_featured', true);
            })
            ->limit(4)
            ->get();

        return view('tours.show', compact('tour', 'relatedTours'));
    }
}