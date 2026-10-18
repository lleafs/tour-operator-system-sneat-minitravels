{{-- resources/views/livewire/minitravels/flights/create.blade.php --}}

<x-layouts.app :title="__('Add Flight')">

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                <h5 class="mb-0">✈️ Add Flight</h5>
                <small class="text-muted">
                    Create a new flight record
                </small>
            </div>

            <a href="{{ route('flights.index') }}"
                class="btn btn-outline-secondary">
                <i class="bx bx-arrow-back"></i>
                Back to Flights
            </a>
        </div>

        <div class="card-body">

            <form action="{{ route('flights.store') }}"
                method="POST">
                @csrf

                <div class="row g-3">

                    {{-- Flight Number --}}
                    <div class="col-md-4">
                        <label class="form-label">Flight Number</label>
                        <input type="text"
                            name="flight_number"
                            class="form-control"
                            placeholder="LA800">
                    </div>

                    {{-- Airline --}}
                    <div class="col-md-4">
                        <label class="form-label">Airline</label>
                        <input type="text"
                            name="airline"
                            class="form-control"
                            placeholder="LATAM Airlines">
                    </div>

                    {{-- Aircraft --}}
                    <div class="col-md-4">
                        <label class="form-label">Aircraft</label>
                        <input type="text"
                            name="aircraft"
                            class="form-control"
                            placeholder="Boeing 787-9">
                    </div>

                    {{-- Origin --}}
                    <div class="col-md-6">
                        <label class="form-label">Origin Airport</label>
                        <input type="text"
                            name="origin"
                            class="form-control"
                            placeholder="SCL - Santiago">
                    </div>

                    {{-- Destination --}}
                    <div class="col-md-6">
                        <label class="form-label">Destination Airport</label>
                        <input type="text"
                            name="destination"
                            class="form-control"
                            placeholder="MIA - Miami">
                    </div>

                    {{-- Departure --}}
                    <div class="col-md-6">
                        <label class="form-label">Departure</label>
                        <input type="datetime-local"
                            name="departure_date"
                            class="form-control">
                    </div>

                    {{-- Arrival --}}
                    <div class="col-md-6">
                        <label class="form-label">Arrival</label>
                        <input type="datetime-local"
                            name="arrival_date"
                            class="form-control">
                    </div>

                    {{-- Status --}}
                    <div class="col-md-6">
                        <label class="form-label">Status</label>

                        <select name="status" class="form-select">
                            <option value="scheduled">Scheduled</option>
                            <option value="boarding">Boarding</option>
                            <option value="airborne">Airborne</option>
                            <option value="delayed">Delayed</option>
                            <option value="landed">Landed</option>
                            <option value="cancelled">Cancelled</option>
                        </select>
                    </div>
                </div>

                {{-- Passenger Count --}}
                <div class="col-md-6">
                    <label class="form-label">Passengers</label>
                    <input type="number"
                        name="passengers"
                        class="form-control"
                        min="0"
                        placeholder="250">
                </div>

                {{-- Notes --}}
                <div class="col-12">
                    <label class="form-label">Notes</label>
                    <textarea name="notes"
                        rows="4"
                        class="form-control"
                        placeholder="Additional flight information..."></textarea>
                </div>

        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-primary">
                <i class="bx bx-save"></i>
                Save Flight
            </button>

            <a href="{{ route('flights.index') }}"
                class="btn btn-secondary">
                Cancel
            </a>
        </div>
        </form>

    </div>
    </div>

</x-layouts.app>