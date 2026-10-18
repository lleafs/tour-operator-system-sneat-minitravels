<x-layouts.app :title="'Edit Flight ' . $flight->flight_number">

    <div class="card">

        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                <h4 class="mb-0">
                    ✈️ Edit Flight {{ $flight->flight_number }}
                </h4>

                <small class="text-muted">
                    Update flight information
                </small>
            </div>

            <a href="{{ route('flights.index') }}"
                class="btn btn-secondary">
                <i class="bx bx-arrow-back me-1"></i>
                Back
            </a>
        </div>
        {{-- Alerts --}}
@if ($errors->any())
    <div class="alert alert-danger">
        <h6 class="mb-2">
            <i class="bx bx-error-circle"></i>
            Please correct the following errors:
        </h6>

        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        <i class="bx bx-check-circle"></i>
        {{ session('success') }}

        <button type="button"
                class="btn-close"
                data-bs-dismiss="alert">
        </button>
    </div>
@endif
        <div class="card-body">

            <form action="{{ route('flights.update', $flight) }}"
                method="POST">

                @csrf
                @method('PUT')

                <div class="row g-3">

                    <div class="col-md-6">
                        <label class="form-label">Flight Number</label>
                        <input type="text"
                            name="flight_number"
                            class="form-control"
                            value="{{ old('flight_number', $flight->flight_number) }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Status</label>

                        <select name="status" class="form-select">
                            <option value="scheduled" {{ $flight->status == 'scheduled' ? 'selected' : '' }}>
                                Scheduled
                            </option>

                            <option value="boarding" {{ $flight->status == 'boarding' ? 'selected' : '' }}>
                                Boarding
                            </option>

                            <option value="airborne" {{ $flight->status == 'airborne' ? 'selected' : '' }}>
                                Airborne
                            </option>

                            <option value="delayed" {{ $flight->status == 'delayed' ? 'selected' : '' }}>
                                Delayed
                            </option>

                            <option value="landed" {{ $flight->status == 'landed' ? 'selected' : '' }}>
                                Landed
                            </option>

                            <option value="cancelled" {{ $flight->status == 'cancelled' ? 'selected' : '' }}>
                                Cancelled
                            </option>
                        </select>
                    </div>

                    {{-- Origin --}}
                    <div class="col-md-6">
                        <label class="form-label">Origin (IATA)</label>

                        <input type="text"
                            name="origin"
                            maxlength="3"
                            class="form-control text-uppercase"
                            placeholder="SCL"
                            value="{{ old('origin', $flight->origin ?? '') }}">
                    </div>
                    {{-- Destination --}}
                    <div class="col-md-6">
                        <label class="form-label">Destination (IATA)</label>

                        <input type="text"
                            name="destination"
                            maxlength="3"
                            class="form-control text-uppercase"
                            placeholder="MIA"
                            value="{{ old('destination', $flight->destination ?? '') }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Departure</label>
                        <input type="datetime-local"
                            name="departure_date"
                            class="form-control"
                            value="{{ $flight->departure_date->format('Y-m-d\TH:i') }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Arrival</label>
                        <input type="datetime-local"
                            name="arrival_date"
                            class="form-control"
                            value="{{ $flight->arrival_date->format('Y-m-d\TH:i') }}">
                    </div>

                </div>

                <div class="mt-4 d-flex justify-content-end gap-2 border-top pt-3">

                    <a href="{{ route('flights.index') }}"
                        class="btn btn-outline-secondary">
                        <i class="bx bx-x me-1"></i>
                        Cancel
                    </a>

                    <button type="submit" class="btn btn-primary">
                        <i class="bx bx-save me-1"></i>
                        Update Flight
                    </button>

                </div>

            </form>

        </div>

    </div>

</x-layouts.app>