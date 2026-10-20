<x-layouts.app :title="__('Booking Details')">

    <div class="card">

        <div class="card-header">
            <h5 class="mb-0">
                Booking Reference
                {{ $booking->booking_reference }}
            </h5>
        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-6 mb-4">
                    <label class="form-label text-muted">
                        <strong>Client</strong>
                    </label>

                    <div>
                        {{ $booking->client?->first_name }}
                        {{ $booking->client?->last_name }}
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <label class="form-label text-muted">
                        <strong>Created</strong>
                    </label>

                    <div>
                        {{ $booking->created_at?->format('d/m/Y H:i') }}
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <label class="form-label text-muted">
                        <strong>Status</strong>
                    </label>

                    <div>
                        {{ ucfirst($booking->status) }}
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header">
                        📅 Travel Itinerary
                    </div>

                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-3">
                                <strong>Hotel Check-In</strong><br>
                                {{ $booking->hotel_check_in ?? '-' }}
                            </div>

                            <div class="col-md-3">
                                <strong>Hotel Check-Out</strong><br>
                                {{ $booking->hotel_check_out ?? '-' }}
                            </div>

                            <div class="col-md-3">
                                <strong>Tour Start</strong><br>
                                {{ $booking->tour_start_date ?? '-' }}
                            </div>

                            <div class="col-md-3">
                                <strong>Tour End</strong><br>
                                {{ $booking->tour_end_date ?? '-' }}
                            </div>

                        </div>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header">
                        ✈ Flight Details
                    </div>

                    <div class="card-body">
                        <p>
                            <strong>Flight:</strong>
                            {{ $booking->flight?->flight_number ?? '-' }}
                        </p>

                        <p>
                            <strong>Route:</strong>
                            {{ $booking->flight?->origin ?? '-' }}
                            →
                            {{ $booking->flight?->destination ?? '-' }}
                        </p>

                        <p>
                            <strong>Departure:</strong>
                            {{ $booking->flight?->departure_date ?? '-' }}
                        </p>

                        <p>
                            <strong>Arrival:</strong>
                            {{ $booking->flight?->arrival_date ?? '-' }}
                        </p>

                        <p>
                            <strong>Price:</strong>
                            ${{ number_format($booking->flight?->price ?? 0, 2) }}
                        </p>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header">
                        🏨 Hotel Details
                    </div>

                    <div class="card-body">
                        <p>
                            <strong>Hotel:</strong>
                            {{ $booking->hotel?->name ?? '-' }}
                        </p>

                        <p>
                            <strong>Room Type:</strong>
                            {{ $booking->room_type ?? '-' }}
                        </p>

                        <p>
                            <strong>Nights:</strong>
                            {{ $booking->hotel_nights ?? 0 }}
                        </p>

                        <p>
                            <strong>Rate / Night:</strong>
                            ${{ number_format($booking->price_per_night ?? 0, 2) }}
                        </p>

                        <p>
                            <strong>Total:</strong>
                            ${{ number_format($booking->hotel_total ?? 0, 2) }}
                        </p>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">
                        🧭 Tour Details
                    </div>

                    <div class="card-body">
                        <p>
                            <strong>Tour:</strong>
                            {{ $booking->tour?->name ?? '-' }}
                        </p>

                        <p>
                            <strong>Location:</strong>
                            {{ $booking->tour?->destination ?? '-' }}
                        </p>

                        <p>
                            <strong>Duration:</strong>
                            {{ $booking->tour?->days ?? '-' }}
                            Days
                        </p>

                        <p>
                            <strong>Price:</strong>
                            ${{ number_format($booking->tour?->price ?? 0, 2) }}
                        </p>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header">
                        🏨 Hotel Details
                    </div>

                    <div class="card-body">
                        <p>
                            <strong>Hotel:</strong>
                            {{ $booking->hotel?->name ?? '-' }}
                        </p>

                        <p>
                            <strong>Room Type:</strong>
                            {{ $booking->room_type ?? '-' }}
                        </p>

                        <p>
                            <strong>Nights:</strong>
                            {{ $booking->hotel_nights ?? 0 }}
                        </p>

                        <p>
                            <strong>Rate / Night:</strong>
                            ${{ number_format($booking->price_per_night ?? 0, 2) }}
                        </p>

                        <p>
                            <strong>Total:</strong>
                            ${{ number_format($booking->hotel_total ?? 0, 2) }}
                        </p>
                    </div>
                </div>


                <div class="card border-primary mb-4">
                    <div class="card-header">
                        💰 Price Breakdown
                    </div>

                    <div class="card-body">

                        <div class="d-flex justify-content-between">
                            <span>Flight</span>
                            <span>
                                ${{ number_format($booking->flight?->price ?? 0, 2) }}
                            </span>
                        </div>

                        <div class="d-flex justify-content-between">
                            <span>
                                Hotel
                                ({{ $booking->hotel_nights }}
                                ×
                                ${{ number_format($booking->price_per_night ?? 0, 2) }})
                            </span>
                            <span>
                                ${{ number_format($booking->hotel_total ?? 0, 2) }}
                            </span>
                        </div>

                        <div class="d-flex justify-content-between">
                            <span>Tour</span>
                            <span>
                                ${{ number_format($booking->tour?->price ?? 0, 2) }}
                            </span>
                        </div>

                        <hr>

                        <div class="d-flex justify-content-between fw-bold">
                            <span>Grand Total</span>
                            <span>
                                ${{ number_format($booking->amount ?? 0, 2) }}
                            </span>
                        </div>

                    </div>
                </div>
            </div>

            <div class="card-footer">

                <a href="{{ route('bookings.edit', $booking) }}"
                    class="btn btn-warning">
                    <i class="bx bx-edit"></i>
                    Edit Booking
                </a>

                <a href="{{ route('bookings.index') }}"
                    class="btn btn-secondary">
                    <i class="bx bx-x"></i>
                    Close
                </a>

            </div>
        </div>

    </div>

</x-layouts.app>