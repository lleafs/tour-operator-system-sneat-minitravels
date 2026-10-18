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
                        <label class="form-label">
                            Flight
                        </label>

                        <select
                            name="flight_id"
                            class="form-select"
                            required>

                            <option value="">
                                Select Flight
                            </option>

                            @foreach($flights as $flight)
                                <option
                                    value="{{ $flight->id }}">

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
                                    value="{{ $hotel->id }}">

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
                            class="form-control"
                            placeholder="0.00">
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