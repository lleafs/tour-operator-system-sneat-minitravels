<?php

namespace App\Http\Controllers\Minitravels;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Minitravels\Hotel;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hotels = Hotel::paginate(10);
        return response()->view('livewire.minitravels.hotels.index', compact('hotels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('livewire.minitravels.hotels.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'city' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:255',
            'price_per_night' => 'required|numeric|min:0',
            'stars' => 'nullable|integer|min:1|max:5',
            'description' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        Hotel::create($validated);

        return redirect()
            ->route('hotels.index')
            ->with('success', 'Hotel created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Hotel $hotel)
    {
        return view(
            'livewire.minitravels.hotels.show',
            compact('hotel')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hotel $hotel)
    {
        return view(
            'livewire.minitravels.hotels.edit',
            compact('hotel')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hotel $hotel)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'city' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:255',
            'price_per_night' => 'required|numeric|min:0',
            'stars' => 'nullable|integer|min:1|max:5',
            'description' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        $hotel->update($validated);

        return redirect()
            ->route('hotels.index')
            ->with(
                'success',
                'Hotel updated successfully.'
            );
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hotel $hotel)
    {
        $hotel->delete();

        return redirect()
            ->route('hotels.index')
            ->with('success', 'Hotel deleted successfully.');
    }
}
