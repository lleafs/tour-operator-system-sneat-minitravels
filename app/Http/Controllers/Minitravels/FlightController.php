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
        $data = $request->validate([
            'flight_number' => 'required|max:20',

            'origin' => [
                'required',
                'size:3',
                'regex:/^[A-Za-z]{3}$/',
            ],

            'destination' => [
                'required',
                'size:3',
                'regex:/^[A-Za-z]{3}$/',
            ],

            'departure_date' => 'required|date',

            'arrival_date' => 'required|date|after:departure_date',

            'price' => 'required|numeric|min:0',

            'status' => 'required|in:scheduled,boarding,airborne,delayed,landed,cancelled',
        ]);

        $data['origin'] = strtoupper($data['origin']);

        $data['destination'] = strtoupper($data['destination']);

        Flight::create($data);

        return redirect()
            ->route('flights.index')
            ->with('success', 'Flight created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Flight $flight)
    {
        return view(
            'livewire.minitravels.flights.show',
            compact('flight')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Flight $flight)
    {
        return view(
            'livewire.minitravels.flights.edit',
            compact('flight')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Flight $flight)
    {
        $data = $request->validate([
            'flight_number' => 'required|max:20',

            'origin' => [
                'required',
                'size:3',
                'regex:/^[A-Za-z]{3}$/',
            ],

            'destination' => [
                'required',
                'size:3',
                'regex:/^[A-Za-z]{3}$/',
            ],

            'departure_date' => 'required|date',

            'arrival_date' => 'required|date|after:departure_date',

            'price' => 'required|numeric|min:0',

            'status' => 'required|in:scheduled,boarding,airborne,delayed,landed,cancelled',
        ]);

        $data['origin'] = strtoupper($data['origin']);
        $data['destination'] = strtoupper($data['destination']);

        $flight->update($data);

        return redirect()
            ->route('flights.show', $flight)
            ->with('success', 'Flight updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Flight $flight)
    {
        $flight->delete();

        return redirect()
            ->route('flights.index')
            ->with('success', 'Flight deleted successfully.');
    }
}
