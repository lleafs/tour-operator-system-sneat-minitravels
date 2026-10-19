<x-layouts.app :title="'Hotel ' . $hotel->name">

    <div class="card">

        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                <h4 class="mb-0">
                    Hotel {{ $hotel->name }}
                </h4>

                <small class="text-muted">
                    Hotel Information
                </small>
            </div>

            <a href="{{ route('hotels.index') }}"
                class="btn btn-secondary">
                <i class="bx bx-arrow-back"></i>
                Back
            </a>
        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-6 mb-4">
                    <label class="form-label text-muted">
                        Hotel Name
                    </label>

                    <div class="fw-semibold">
                        {{ $hotel->name }}
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <label class="form-label text-muted">
                        City
                    </label>

                    <div>
                        {{ $hotel->city ?? '-' }}
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <label class="form-label text-muted">
                        Country
                    </label>

                    <div>
                        {{ $hotel->country ?? '-' }}
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <label class="form-label text-muted">
                        Address
                    </label>

                    <div>
                        {{ $hotel->address ?? '-' }}
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <label class="form-label text-muted">
                        Phone
                    </label>

                    <div>
                        {{ $hotel->phone ?? '-' }}
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <label class="form-label text-muted">
                        Email
                    </label>

                    <div>
                        {{ $hotel->email ?? '-' }}
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <label class="form-label text-muted">
                        Price Per Night
                    </label>

                    <div>
                        ${{ number_format($hotel->price_per_night, 2) }}
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <label class="form-label text-muted">
                        Stars
                    </label>

                    <div>
                        @if($hotel->stars)
                        {{ $hotel->stars }} ★
                        @else
                        -
                        @endif
                    </div>
                </div>

                <div class="col-12 mb-4">
                    <label class="form-label text-muted">
                        Description
                    </label>

                    <div class="border rounded p-3 bg-light">
                        {{ $hotel->description ?: 'No description available.' }}
                    </div>
                </div>

                <div class="col-12 mb-4">
                    <label class="form-label text-muted">
                        Notes
                    </label>

                    <div class="border rounded p-3 bg-light">
                        {{ $hotel->notes ?: 'No notes available.' }}
                    </div>
                </div>

                <div class="col-md-6">
                    <label class="form-label text-muted">
                        Created
                    </label>

                    <div>
                        {{ $hotel->created_at?->format('d/m/Y H:i') }}
                    </div>
                </div>

                <div class="col-md-6">
                    <label class="form-label text-muted">
                        Last Updated
                    </label>

                    <div>
                        {{ $hotel->updated_at?->format('d/m/Y H:i') }}
                    </div>
                </div>

            </div>

        </div>

        <div class="card-footer">

            <a href="{{ route('hotels.edit', $hotel) }}"
                class="btn btn-warning">
                <i class="bx bx-edit"></i>
                Edit Flight
            </a>

            <a href="{{ route('hotels.index') }}"
                class="btn btn-secondary">
                <i class="bx bx-x"></i>
                Close
            </a>

        </div>

    </div>

</x-layouts.app>