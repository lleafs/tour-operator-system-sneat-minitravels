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

                    @if(auth()->user()->role === 'admin')

                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            Agency
                        </label>

                        <select
                            name="agency_id"
                            class="form-select"
                            required>

                            <option value="">
                                Select Agency
                            </option>

                            @foreach($agencies as $agency)
                            <option
                                value="{{ $agency->id }}"
                                @selected(old('agency_id', $booking->agency_id) == $agency->id)>

                                {{ $agency->name }}

                            </option>
                            @endforeach

                        </select>
                    </div>

                    @endif

                    {{-- Client --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            Client
                        </label>

                        <select
                            name="client_id"
                            class="form-select"
                            required>

                            <option value="">
                                Select Client
                            </option>

                            @foreach($clients as $client)
                            <option
                                value="{{ $client->id }}"
                                @selected(old('client_id', $booking->client_id) == $client->id)>

                                {{ $client->first_name }}
                                {{ $client->last_name }}

                            </option>
                            @endforeach

                        </select>
                    </div>

                    {{-- Flight --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Flight</label>

                        <select
                            name="flight_id"
                            id="flight_id"
                            class="form-select">

                            <option value="">Select Flight</option>

                            @foreach($flights as $flight)
                            <option
                                value="{{ $flight->id }}"
                                data-price="{{ $flight->price }}"
                                @selected(old('flight_id', $booking->flight_id) == $flight->id)>

                                {{ $flight->flight_number }}
                                |
                                {{ $flight->origin }}
                                →
                                {{ $flight->destination }}
                                |
                                ${{ number_format($flight->price, 2) }}

                            </option>
                            @endforeach

                        </select>
                    </div>

                    <div class="row">

                        {{-- Hotel --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Hotel</label>

                            <select
                                name="hotel_id"
                                id="hotel_id"
                                class="form-select">

                                <option value="">
                                    No Hotel
                                </option>

                                @foreach($hotels as $hotel)
                                <option
                                    value="{{ $hotel->id }}"
                                    data-price="{{ $hotel->price_per_night }}"
                                    @selected(old('hotel_id', $booking->hotel_id) == $hotel->id)>
                                    {{ $hotel->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="row">

                            {{-- Room Type --}}
                            <div class="col-md-3 mb-3">
                                <label class="form-label">
                                    Room Type
                                </label>

                                <select
                                    id="room_type"
                                    name="room_type"
                                    class="form-select">

                                    <option value="">Select</option>
                                    <option value="Single"
                                        @selected(old('room_type', $booking->room_type) == 'Single')>
                                        Single</option>
                                    <option value="Double"
                                        @selected(old('room_type', $booking->room_type) == 'Double')>
                                        Double</option>
                                    <option value="Triple"
                                        @selected(old('room_type', $booking->room_type) == 'Triple')>
                                        Triple</option>
                                    <option value="Suite"
                                        @selected(old('room_type', $booking->room_type) == 'Suite')>
                                        Suite</option>
                                    <option value="Family"
                                        @selected(old('room_type', $booking->room_type) == 'Family')>
                                        Family</option>
                                </select>
                            </div>

                            {{-- Price Per Night --}}
                            <div class="col-md-3 mb-3">
                                <label class="form-label">
                                    Price Per Night
                                </label>

                                <div class="input-group">
                                    <span class="input-group-text">$</span>

                                    <input
                                        type="number"
                                        id="price_per_night"
                                        name="price_per_night"
                                        class="form-control"
                                        readonly>
                                </div>
                            </div>

                            {{-- Nights --}}
                            <div class="col-md-3 mb-3">
                                <label class="form-label">
                                    Nights
                                </label>

                                <select
                                    id="hotel_nights"
                                    name="hotel_nights"
                                    class="form-select">

                                    @for($i = 1; $i <= 30; $i++)
                                        <option value="{{ $i }}"
                                        @selected(old('hotel_nights', $booking->hotel_nights) == $i)>
                                        {{ $i }}
                                        </option>
                                        @endfor

                                </select>
                            </div>

                            {{-- Hotel Total --}}
                            <div class="col-md-3 mb-3">
                                <label class="form-label">
                                    Hotel Total
                                </label>

                                <div class="input-group">
                                    <span class="input-group-text">$</span>

                                    <input
                                        type="number"
                                        id="hotel_total"
                                        name="hotel_total"
                                        class="form-control"
                                        readonly>
                                </div>
                            </div>

                        </div>

                    </div>

                    {{-- Tours --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            Tour
                        </label>

                        <select
                            id="tour_id"
                            name="tour_id"
                            class="form-select">

                            <option value="">
                                Select Tour
                            </option>
                            @foreach($tours as $tour)
                            <option
                                value="{{ $tour->id }}"
                                data-price="{{ $tour->price }}"
                                data-days="{{ $tour->days }}"
                                data-nights="{{ $tour->nights }}"
                                @selected(old('tour_id', $booking->tour_id) == $tour->id)>

                                {{ $tour->name }}
                                |
                                ${{ number_format($tour->price, 2) }}
                                |
                                {{ $tour->days }}D/{{ $tour->nights }}N
                            </option>
                            @endforeach
                        </select>
                    </div>
                    {{-- Tour Days --}}
                    <div class="col-md-3 mb-3">
                        <label class="form-label">
                            Tour Days
                        </label>

                        <select
                            id="tour_days"
                            name="tour_days"
                            class="form-select">

                            @for($i = 1; $i <= 30; $i++)
                                <option value="{{ $i }}"
                                @selected(old('tour_days', $booking->tour_days) == $i)>
                                {{ $i }}
                                </option>
                                @endfor

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
                                @selected(old('status', $booking->status) == 'pending')>
                                Pending
                            </option>
                            <option value="confirmed"
                                @selected(old('status', $booking->status) == 'confirmed')>
                                Confirmed
                            </option>
                            <option value="completed"
                                @selected(old('status', $booking->status) == 'completed')>
                                Completed
                            </option>
                            <option value="cancelled"
                                @selected(old('status', $booking->status) == 'cancelled')>
                                Cancelled
                            </option>
                        </select>
                    </div>

                    {{-- Booking Reference --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            Booking Reference
                        </label>
                        <input
                            type="text"
                            class="form-control"
                            value="Generated automatically"
                            disabled>
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
                            id="amount"
                            class="form-control"
                            readonly>
                    </div>

                    {{-- Notes --}}
                    <div class="col-12 mb-3">
                        <label class="form-label">
                            Notes
                        </label>
                        <textarea
                            name="notes"
                            rows="4"
                            class="form-control"
                            placeholder="Special requests, traveller preferences, comments...">{{ old('notes', $booking->notes) }}</textarea>
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