<x-layouts.app :title="__('Create Booking')">

    <div class="card">

        <div class="card-header">
            <h5 class="mb-0">New Booking</h5>
        </div>

        <div class="card-body">

            <form action="{{ route('bookings.store') }}"
                method="POST">

                @csrf

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
                                @selected(old('agency_id')==$agency->id)>

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
                                value="{{ $client->id }}">

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
                                data-price="{{ $flight->price }}">

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

                    {{-- Hotel --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Hotel</label>

                        <select
                            name="hotel_id"
                            id="hotel_id"
                            class="form-select">

                            <option value="">No Hotel</option>

                            @foreach($hotels as $hotel)
                            <option
                                value="{{ $hotel->id }}"
                                data-price="{{ $hotel->price_per_night }}">

                                {{ $hotel->name }}
                                |
                                ${{ number_format($hotel->price_per_night, 2) }}/night

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

                            <option value="pending">
                                Pending
                            </option>

                            <option value="confirmed">
                                Confirmed
                            </option>

                            <option value="completed">
                                Completed
                            </option>

                            <option value="cancelled">
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
                            id="amount"
                            class="form-control"
                            readonly>
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

                    {{-- Notes --}}
                    <div class="col-12 mb-3">
                        <label class="form-label">
                            Notes
                        </label>

                        <textarea
                            name="notes"
                            rows="4"
                            class="form-control"
                            placeholder="Special requests, traveller preferences, comments..."></textarea>
                    </div>

                </div>

                <div class="mt-4">

                    <button
                        type="submit"
                        class="btn btn-primary">

                        Save Booking

                    </button>

                </div>

            </form>

        </div>

    </div>

</x-layouts.app>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        const flight = document.getElementById('flight_id');
        const hotel = document.getElementById('hotel_id');
        const amount = document.getElementById('amount');

        function calculateAmount() {

            let flightPrice = 0;
            let hotelPrice = 0;

            if (flight.selectedIndex >= 0) {
                flightPrice = parseFloat(
                    flight.options[flight.selectedIndex].dataset.price || 0
                );
            }

            if (hotel.selectedIndex >= 0) {
                hotelPrice = parseFloat(
                    hotel.options[hotel.selectedIndex].dataset.price || 0
                );
            }

            amount.value = (flightPrice + hotelPrice).toFixed(2);
        }

        flight.addEventListener('change', calculateAmount);
        hotel.addEventListener('change', calculateAmount);

        calculateAmount();
    });
</script>