<?php

namespace App\Http\Controllers\Minitravels;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Minitravels\Flight;

class FlightController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $flights = Flight::paginate(10);
        return response()->view('livewire.minitravels.flights.index', compact('flights'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('livewire.minitravels.flights.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Flight::create([
            'flight_number' => $request->flight_number,
            'origin' => $request->origin,
            'destination' => $request->destination,
            'departure_date' => $request->departure_date,
            'arrival_date' => $request->arrival_date,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('flights.index')
            ->with('success', 'Flight created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
