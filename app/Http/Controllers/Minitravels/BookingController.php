<?php

namespace App\Http\Controllers\Minitravels;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Agency;
use App\Models\Tour;
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

        $tours = auth()->user()->role === 'admin'
            ? Tour::orderBy('name')->get()
            : Tour::where('agency_id', auth()->user()->agency_id)
            ->orderBy('name')
            ->get();

        return view(
            'livewire.minitravels.bookings.create',
            compact(
                'agencies',
                'clients',
                'flights',
                'hotels',
                'tours'
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
            'room_type' => 'nullable|string',
            'price_per_night' => 'nullable|numeric|min:0',
            'hotel_nights' => 'nullable|integer|min:1',
            'hotel_total' => 'nullable|numeric|min:0',
            'tour_id' => 'nullable|exists:tours,id',
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

        $flight = Flight::findOrFail($request->flight_id);
        $tour = Tour::findOrFail($request->tour_id);

        $hotelNights = (int) $request->hotel_nights;
        $tourDays = (int) $tour->days;

        $hotelCheckIn = Carbon::parse($flight->departure_date);

        $hotelCheckOut = $hotelCheckIn
            ->copy()
            ->addDays($hotelNights + 1);

        $tourStartDate = $hotelCheckIn->copy();

        $tourEndDate = $tourStartDate
            ->copy()
            ->addDays($tourDays - 1);

        $validated['hotel_check_in'] = $hotelCheckIn->toDateString();
        $validated['hotel_check_out'] = $hotelCheckOut->toDateString();

        $validated['tour_start_date'] = $tourStartDate->toDateString();
        $validated['tour_end_date'] = $tourEndDate->toDateString();

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
        $flightTotal = $booking->flight->price ?? 0;
        $tourTotal = $booking->tour->price ?? 0;

        return view(
            'livewire.minitravels.bookings.show',
            compact(
                'booking',
                'flightTotal',
                'tourTotal'
            )
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

        $tours = auth()->user()->role === 'admin'
            ? Tour::orderBy('name')->get()
            : Tour::where('agency_id', auth()->user()->agency_id)
            ->orderBy('name')
            ->get();
        return view(
            'livewire.minitravels.bookings.edit',
            compact(
                'booking',
                'clients',
                'flights',
                'hotels',
                'tours'
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
            'room_type' => 'nullable|string',
            'price_per_night' => 'nullable|numeric|min:0',
            'hotel_nights' => 'nullable|integer|min:1',
            'hotel_total' => 'nullable|numeric|min:0',
            'tour_id' => 'nullable|exists:tours,id',
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
    public function destroy(Booking $booking)
    {
        if (auth()->user()->role !== 'admin') {

            abort_if(
                $booking->agency_id !== auth()->user()->agency_id,
                403
            );
        }

        $booking->delete();

        return redirect()
            ->route('bookings.index')
            ->with('success', 'Booking deleted successfully');
    }
}
