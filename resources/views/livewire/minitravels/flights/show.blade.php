<x-layouts.app :title="'Flight ' . $flight->flight_number">

    <div class="card">

        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                <h4 class="mb-0">
                    ✈️ Flight {{ $flight->flight_number }}
                </h4>

                <small class="text-muted">
                    Flight Information
                </small>
            </div>

            <a href="{{ route('flights.index') }}"
                class="btn btn-secondary">
                <i class="bx bx-arrow-back"></i>
                Back
            </a>
        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Flight Number</label>
                    <div>{{ $flight->flight_number }}</div>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Status</label>
                    <div>
                        <span class="badge bg-info">
                            {{ ucfirst($flight->status) }}
                        </span>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Origin</label>
                    <div>{{ $flight->origin }}</div>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Destination</label>
                    <div>{{ $flight->destination }}</div>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Departure</label>
                    <div>
                        {{ $flight->departure_date->format('d/m/Y H:i') }}
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Arrival</label>
                    <div>
                        {{ $flight->arrival_date->format('d/m/Y H:i') }}
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Created</label>
                    <div>
                        {{ $flight->created_at->format('d/m/Y H:i') }}
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Last Updated</label>
                    <div>
                        {{ $flight->updated_at->format('d/m/Y H:i') }}
                    </div>
                </div>

            </div>

        </div>

        <div class="card-footer">

            <a href="{{ route('flights.edit', $flight) }}"
                class="btn btn-warning">
                <i class="bx bx-edit"></i>
                Edit Flight
            </a>

            <a href="{{ route('flights.index') }}"
                class="btn btn-secondary">
                <i class="bx bx-x"></i>
                Close
            </a>

        </div>

    </div>

</x-layouts.app>