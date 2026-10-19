<?php

namespace App\Http\Controllers\Minitravels;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Agency;
use App\Models\Minitravels\Booking;
use App\Models\Minitravels\Client;
use App\Models\Minitravels\Flight;
use App\Models\Minitravels\Hotel;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings = Booking::paginate(10);
        return response()->view('livewire.minitravels.bookings.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $agencies = Agency::orderBy('name')->get();

        $clients = Client::orderBy('first_name')->get();

        $flights = Flight::orderBy('departure_date')->get();

        $hotels = Hotel::orderBy('name')->get();

        return view(
            'livewire.minitravels.bookings.create',
            compact(
                'agencies',
                'clients',
                'flights',
                'hotels'
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'flight_id' => 'required|exists:flights,id',
            'hotel_id' => 'nullable|exists:hotels,id',
            'status' => 'required|in:pending,confirmed,completed,cancelled',
            'amount' => 'required|numeric|min:0',
            'notes' => 'nullable|string',
        ]);

        if (auth()->user()->role === 'admin') {
            $request->validate([
                'agency_id' => 'required|exists:agencies,id',
            ]);
        }

        if (auth()->user()->role === 'admin') {
            $validated['agency_id'] = $request->agency_id;
        } else {
            $validated['agency_id'] = auth()->user()->agency_id;
        }

        do {
            $reference =
                'BK-' .
                now()->format('Y') .
                '-' .
                strtoupper(fake()->bothify('??####'));
        } while (
            Booking::where(
                'booking_reference',
                $reference
            )->exists()
        );

        $validated['booking_reference'] = $reference;

        Booking::create($validated);

        return redirect()
            ->route('bookings.index')
            ->with(
                'success',
                'Booking created successfully.'
            );
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        return view(
            'livewire.minitravels.bookings.show',
            compact('booking')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        $clients = Client::orderBy('first_name')->get();

        $flights = Flight::orderBy('departure_date')->get();

        $hotels = Hotel::orderBy('name')->get();

        return view(
            'livewire.minitravels.bookings.edit',
            compact(
                'booking',
                'clients',
                'flights',
                'hotels'
            )
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'flight_id' => 'required|exists:flights,id',
            'hotel_id' => 'nullable|exists:hotels,id',
            'status' => 'required|in:pending,confirmed,completed,cancelled',
            'amount' => 'required|numeric|min:0',
            'notes' => 'nullable|string',
        ]);

        $booking->update($validated);

        return redirect()
            ->route('bookings.index')
            ->with(
                'success',
                'Booking updated successfully.'
            );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
