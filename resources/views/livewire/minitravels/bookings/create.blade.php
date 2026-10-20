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
    {{ \Carbon\Carbon::parse($flight->departure_date)->format('d/m/Y H:i') }}
    →
    {{ \Carbon\Carbon::parse($flight->arrival_date)->format('d/m/Y H:i') }}
    |
    {{ $flight->origin }} → {{ $flight->destination }}
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
                                    data-price="{{ $hotel->price_per_night }}">
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
                                    <option value="Single">Single</option>
                                    <option value="Double">Double</option>
                                    <option value="Triple">Triple</option>
                                    <option value="Suite">Suite</option>
                                    <option value="Family">Family</option>

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
                                        <option value="{{ $i }}">
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
                                data-nights="{{ $tour->nights }}">

                                {{ $tour->name }}
                                |
                                ${{ number_format($tour->price, 2) }}
                                |
                                {{ $tour->days }}D/{{ $tour->nights }}N
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
        const tour = document.getElementById('tour_id');

        const roomType = document.getElementById('room_type');
        const hotelNights = document.getElementById('hotel_nights');
        const pricePerNight = document.getElementById('price_per_night');
        const hotelTotal = document.getElementById('hotel_total');
        const amount = document.getElementById('amount');

        function updateHotelPrice() {
            let basePrice = 0;

            if (hotel.selectedIndex >= 0) {
                basePrice = parseFloat(
                    hotel.options[hotel.selectedIndex].dataset.price || 0
                );
            }

            let multiplier = 1;

            switch (roomType.value) {
                case 'Single':
                    multiplier = 1;
                    break;

                case 'Double':
                    multiplier = 1.25;
                    break;

                case 'Triple':
                    multiplier = 1.50;
                    break;

                case 'Suite':
                    multiplier = 2;
                    break;

                case 'Family':
                    multiplier = 2.5;
                    break;
            }

            const finalPrice = basePrice * multiplier;

            pricePerNight.value = finalPrice.toFixed(2);

            updateTotals();
        }

        function updateTotals() {

            let flightPrice = 0;
            let tourPrice = 0;

            if (flight.selectedIndex >= 0) {
                flightPrice = parseFloat(
                    flight.options[flight.selectedIndex].dataset.price || 0
                );
            }

            if (tour.selectedIndex >= 0) {
                tourPrice = parseFloat(
                    tour.options[tour.selectedIndex].dataset.price || 0
                );
            }

            const nightlyRate =
                parseFloat(pricePerNight.value || 0);

            const nights =
                parseInt(hotelNights.value || 0);

            const hotelTotalValue =
                nightlyRate * nights;

            hotelTotal.value =
                hotelTotalValue.toFixed(2);

            amount.value = (
                flightPrice +
                hotelTotalValue +
                tourPrice
            ).toFixed(2);
        }

        hotel.addEventListener('change', updateHotelPrice);
        roomType.addEventListener('change', updateHotelPrice);

        flight.addEventListener('change', updateTotals);
        tour.addEventListener('change', updateTotals);
        hotelNights.addEventListener('change', updateTotals);

        updateHotelPrice();
        updateTotals();

    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {

        const roomType = document.getElementById('room_type');
        const price = document.getElementById('price_per_night');

        function updatePrice() {

            const prices = {
                'Single': 80,
                'Double': 120,
                'Triple': 160,
                'Suite': 250,
                'Family': 220
            };

            price.value =
                prices[roomType.value] || 0;
        }

        roomType.addEventListener('change', updatePrice);

        updatePrice();
    });
</script>