<x-layouts.app :title="__('Edit Booking')">

    <div class="card">

        <div class="card-header">
            <h5 class="mb-0">
                Edit Booking
            </h5>
        </div>

        <div class="card-body">

            <form action="{{ route('bookings.update', $booking) }}"
                method="POST">

                @csrf
                @method('PUT')

                <div class="row">

                    {{-- Client --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            Client
                        </label>

                        <select
                            name="client_id"
                            class="form-select"
                            required>

                            @foreach($clients as $client)

                            <option
                                value="{{ $client->id }}"
                                @selected($client->id == $booking->client_id)>

                                {{ $client->first_name }}
                                {{ $client->last_name }}

                            </option>

                            @endforeach

                        </select>
                    </div>

                    {{-- Flight --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            Flight
                        </label>

                        <select
                            name="flight_id"
                            class="form-select"
                            required>

                            @foreach($flights as $flight)

                            <option
                                value="{{ $flight->id }}"
                                @selected($flight->id == $booking->flight_id)>

                                {{ $flight->flight_number }}
                                |
                                {{ $flight->origin }}
                                →
                                {{ $flight->destination }}

                            </option>

                            @endforeach

                        </select>
                    </div>

                    {{-- Hotel --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            Hotel
                        </label>

                        <select
                            name="hotel_id"
                            class="form-select">

                            <option value="">
                                No Hotel
                            </option>

                            @foreach($hotels as $hotel)

                            <option
                                value="{{ $hotel->id }}"
                                @selected($hotel->id == $booking->hotel_id)>

                                {{ $hotel->name }}

                            </option>

                            @endforeach

                        </select>
                    </div>

                    {{-- Status --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            Status
                        </label>

                        <select
                            name="status"
                            class="form-select">

                            <option value="pending"
                                @selected($booking->status === 'pending')>
                                Pending
                            </option>

                            <option value="confirmed"
                                @selected($booking->status === 'confirmed')>
                                Confirmed
                            </option>

                            <option value="completed"
                                @selected($booking->status === 'completed')>
                                Completed
                            </option>

                            <option value="cancelled"
                                @selected($booking->status === 'cancelled')>
                                Cancelled
                            </option>

                        </select>
                    </div>

                    {{-- Amount --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            Amount
                        </label>

                        <input
                            type="number"
                            step="0.01"
                            name="amount"
                            class="form-control"
                            value="{{ old('amount', $booking->amount) }}">
                    </div>

                    {{-- Booking Reference --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            Reference
                        </label>

                        <input
                            type="text"
                            class="form-control"
                            value="{{ $booking->booking_reference }}"
                            disabled>
                    </div>

                    {{-- Notes --}}
                    <div class="col-12 mb-3">
                        <label class="form-label">
                            Notes
                        </label>

                        <textarea
                            name="notes"
                            rows="4"
                            class="form-control">{{ old('notes', $booking->notes) }}</textarea>
                    </div>

                </div>

                <div class="mt-4 d-flex justify-content-end gap-2 border-top pt-3">

                    <a href="{{ route('bookings.index') }}"
                        class="btn btn-outline-secondary">
                        <i class="bx bx-x me-1"></i>
                        Cancel
                    </a>

                    <button type="submit" class="btn btn-primary">
                        <i class="bx bx-save me-1"></i>
                        Update Booking
                    </button>

                </div>

            </form>

        </div>

    </div>

</x-layouts.app>