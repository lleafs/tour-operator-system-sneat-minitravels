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

                {{-- alerts --}}
                @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="card-body">

                    <div class="row g-3">

                        {{-- Flight Number --}}
                        <div class="col-md-4">
                            <label class="form-label">Flight Number</label>
                            <input
                                type="text"
                                name="flight_number"
                                class="form-control"
                                placeholder="LA800"
                                value="{{ old('flight_number', $flight->flight_number ?? '') }}">
                        </div>

                        {{-- Airline --}}
                        <div class="col-md-4">
                            <label class="form-label">Airline</label>
                            <input
                                type="text"
                                name="airline"
                                class="form-control"
                                placeholder="LATAM Airlines"
                                value="{{ old('airline', $flight->airline ?? '') }}">
                        </div>

                        {{-- Aircraft --}}
                        <div class="col-md-4">
                            <label class="form-label">Aircraft</label>
                            <input
                                type="text"
                                name="aircraft"
                                class="form-control"
                                placeholder="Boeing 787-9"
                                value="{{ old('aircraft', $flight->aircraft ?? '') }}">
                        </div>

                        {{-- Origin --}}
                        <div class="col-md-6">
                            <label class="form-label">Origin (IATA)</label>

                            <input
                                type="text"
                                name="origin"
                                maxlength="3"
                                class="form-control text-uppercase"
                                placeholder="SCL"
                                value="{{ old('origin', $flight->origin ?? '') }}">
                        </div>

                        {{-- Destination --}}
                        <div class="col-md-6">
                            <label class="form-label">Destination (IATA)</label>

                            <input
                                type="text"
                                name="destination"
                                maxlength="3"
                                class="form-control text-uppercase"
                                placeholder="MIA"
                                value="{{ old('destination', $flight->destination ?? '') }}">
                        </div>

                        {{-- Departure --}}
                        <div class="col-md-6">
                            <label class="form-label">Departure</label>

                            <input
                                type="datetime-local"
                                name="departure_date"
                                class="form-control"
                                value="{{ old('departure_date', isset($flight) ? $flight->departure_date?->format('Y-m-d\TH:i') : '') }}">
                        </div>

                        {{-- Arrival --}}
                        <div class="col-md-6">
                            <label class="form-label">Arrival</label>

                            <input
                                type="datetime-local"
                                name="arrival_date"
                                class="form-control"
                                value="{{ old('arrival_date', isset($flight) ? $flight->arrival_date?->format('Y-m-d\TH:i') : '') }}">
                        </div>

                        {{-- Price --}}
                        <div class="col-md-6">
                            <label class="form-label">Price</label>

                            <input
                                type="number"
                                step="0.01"
                                min="0"
                                name="price"
                                class="form-control"
                                value="{{ old('price', $flight->price ?? '') }}"
                                placeholder="250.00">
                        </div>

                        {{-- Status --}}
                        <div class="col-md-6">
                            <label class="form-label">Status</label>

                            <select
                                name="status"
                                class="form-select">

                                <option value="scheduled">Scheduled</option>
                                <option value="boarding">Boarding</option>
                                <option value="airborne">Airborne</option>
                                <option value="delayed">Delayed</option>
                                <option value="landed">Landed</option>
                                <option value="cancelled">Cancelled</option>

                            </select>
                        </div>

                        {{-- Passenger Capacity --}}
                        <div class="col-md-6">
                            <label class="form-label">
                                Passenger Capacity
                            </label>

                            <input
                                type="number"
                                name="passengers"
                                min="0"
                                class="form-control"
                                value="{{ old('passengers', $flight->passengers ?? '') }}"
                                placeholder="250">
                        </div>

                        {{-- Notes --}}
                        <div class="col-12">
                            <label class="form-label">Notes</label>

                            <textarea
                                name="notes"
                                rows="4"
                                class="form-control"
                                placeholder="Additional flight information...">{{ old('notes', $flight->notes ?? '') }}</textarea>
                        </div>

                    </div>

                </div>

                <div class="mt-4 d-flex justify-content-end gap-2 border-top pt-3">

                    <a href="{{ route('flights.index') }}"
                        class="btn btn-outline-secondary">
                        <i class="bx bx-arrow-back me-1"></i>
                        Cancel
                    </a>

                    <button type="submit" class="btn btn-primary">
                        <i class="bx bx-save me-1"></i>
                        Save Flight
                    </button>

                </div>
            </form>

        </div>
    </div>

</x-layouts.app>