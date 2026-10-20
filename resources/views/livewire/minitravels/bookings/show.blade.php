<x-layouts.app :title="__('Booking Details')">

    <div class="card">

        <div class="card-header">
            <h5 class="mb-0">
                Booking {{ $booking->booking_reference }}
            </h5>
        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-6 mb-4">
                    <label class="form-label text-muted">
                        Booking Reference
                    </label>

                    <div class="fw-semibold">
                        {{ $booking->booking_reference }}
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <label class="form-label text-muted">
                        Status
                    </label>

                    <div>
                        {{ ucfirst($booking->status) }}
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <label class="form-label text-muted">
                        Client
                    </label>

                    <div>
                        {{ $booking->client?->first_name }}
                        {{ $booking->client?->last_name }}
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <label class="form-label text-muted">
                        Flight
                    </label>

                    <div>
                        {{ $booking->flight?->flight_number ?? '-' }}
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <label class="form-label text-muted">
                        Route
                    </label>

                    <div>
                        {{ $booking->flight?->origin ?? '-' }}
                        →
                        {{ $booking->flight?->destination ?? '-' }}
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <label class="form-label text-muted">
                        Hotel
                    </label>

                    <div>
                        {{ $booking->hotel?->name ?? '-' }}
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <label class="form-label text-muted">
                        Tour
                    </label>

                    <div>
                        {{ $booking->tour?->name ?? '-' }}
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <label class="form-label text-muted">
                        Amount
                    </label>

                    <div>
                        ${{ number_format($booking->amount ?? 0, 2) }}
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <label class="form-label text-muted">
                        Created
                    </label>

                    <div>
                        {{ $booking->created_at?->format('d/m/Y H:i') }}
                    </div>
                </div>

                <div class="col-12">
                    <label class="form-label text-muted">
                        Notes
                    </label>

                    <div class="border rounded p-3 bg-light">
                        {{ $booking->notes ?: 'No notes available.' }}
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