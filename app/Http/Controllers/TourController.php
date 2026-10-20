<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Tour;
use App\Models\Agency;

class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->role === 'admin') {
            $tours = Tour::with('agency')
                ->latest()
                ->paginate(15);
        } else {
            $tours = Tour::where('agency_id', auth()->user()->agency_id)
                ->latest()
                ->paginate(15);
        }

        return view('livewire.tours.index', compact('tours'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $agencies = Agency::orderBy('name')->get();

        return view('livewire.tours.create', compact('agencies'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'destination' => 'nullable|max:255',
            'days' => 'required|integer|min:1',
            'nights' => 'required|integer|min:0',
            'price' => 'nullable|numeric',
            'short_description' => 'nullable',
            'description' => 'nullable',
            'featured_image' => 'nullable|image|max:2048',
            'is_active' => 'nullable|boolean',
            'is_featured' => 'nullable|boolean',
            'daily_rate' => 'required|numeric|min:0',
        ]);

        if (auth()->user()->role === 'admin') {

            $request->validate([
                'agency_id' => 'required|exists:agencies,id',
            ]);

            $validated['agency_id'] = $request->agency_id;
        } else {

            $validated['agency_id'] = auth()->user()->agency_id;
        }

        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request
                ->file('featured_image')
                ->store('tours', 'public');
        }

        $validated['is_active'] = $request->boolean('is_active');
        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['nights'] =
            max(0, $validated['days'] - 1);

        $validated['price'] =
            $validated['days'] * $validated['daily_rate'];

        $validated['slug'] = Str::slug($validated['name']);

        Tour::create($validated);

        return redirect()
            ->route('tours.index')
            ->with('success', 'Tour created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tour $tour)
    {
        if (
            auth()->user()->role !== 'admin' &&
            $tour->agency_id !== auth()->user()->agency_id
        ) {
            abort(403);
        }

        $tour->load('agency');

        return view('livewire.tours.show', compact('tour'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tour $tour)
    {
        if (
            auth()->user()->role !== 'admin' &&
            $tour->agency_id !== auth()->user()->agency_id
        ) {
            abort(403);
        }

        $agencies = Agency::orderBy('name')->get();

        return view('livewire.tours.edit', compact('tour', 'agencies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tour $tour)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'destination' => 'nullable|max:255',
            'days' => 'required|integer|min:1',
            'nights' => 'required|integer|min:0',
            'price' => 'nullable|numeric',
            'short_description' => 'nullable',
            'description' => 'nullable',
            'featured_image' => 'nullable|image|max:2048',
            'is_active' => 'nullable|boolean',
            'is_featured' => 'nullable|boolean',
            'daily_rate' => 'required|numeric|min:0',
        ]);

        if (auth()->user()->role === 'admin') {

            $request->validate([
                'agency_id' => 'required|exists:agencies,id',
            ]);

            $validated['agency_id'] = $request->agency_id;
        } else {

            abort_if(
                $tour->agency_id !== auth()->user()->agency_id,
                403
            );

            $validated['agency_id'] = auth()->user()->agency_id;
        }

        if ($request->hasFile('featured_image')) {

            if ($tour->featured_image) {
                Storage::disk('public')->delete($tour->featured_image);
            }

            $validated['featured_image'] = $request
                ->file('featured_image')
                ->store('tours', 'public');
        }

        $validated['nights'] = max(0, ($validated['days'] ?? 1) - 1);
        $validated['is_active'] = $request->boolean('is_active');
        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['nights'] =
            max(0, $validated['days'] - 1);

        $validated['price'] =
            $validated['days'] * $validated['daily_rate'];
            
        $validated['slug'] = Str::slug($validated['name']);

        $tour->update($validated);

        return redirect()
            ->route('tours.index')
            ->with('success', 'Tour updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tour $tour)
    {
        abort_if(
            $tour->agency_id !== auth()->user()->agency_id,
            403
        );

        if ($tour->featured_image) {
            Storage::disk('public')->delete($tour->featured_image);
        }

        $tour->delete();

        return redirect()
            ->route('tours.index')
            ->with('success', 'Tour deleted successfully');
    }
}
