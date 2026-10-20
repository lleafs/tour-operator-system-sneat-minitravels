<x-layouts.app title="{{ $tour->name }}">

    <div class="card">

        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0">{{ $tour->name }}</h4>

            <div class="d-flex gap-2">
                <a href="{{ route('tours.index') }}"
                    class="btn btn-secondary">
                    <i class="bx bx-arrow-back me-1"></i>
                    Back
                </a>
            </div>
        </div>

        <div class="card-body">

            <div class="row">

                @if($tour->featured_image)
                <div class="col-md-4 mb-4">
                    <img 
                    src="{{ asset('storage/' . $tour->featured_image) }}"
                    alt="{{ $tour->name }}"
                    class="img-fluid rounded shadow-sm">
                </div>
                @endif

                <div class="{{ $tour->featured_image ? 'col-md-8' : 'col-md-12' }}">
                    @if(auth()->user()->role === 'admin')
                    <div class="mb-3">
                        <strong>Agency:</strong>
                        {{ $tour->agency->name ?? '-' }}
                    </div>
                    @endif

                    <div class="mb-3">
                        <strong>Destination:</strong>
                        {{ $tour->destination ?: '-' }}
                    </div>

                    <div class="mb-3">
                        <strong>Duration:</strong>
                        {{ $tour->days }} Days /
                        {{ $tour->nights }} Nights
                    </div>

                    <div class="mb-3">
                        <strong>Price:</strong>

                        @if($tour->price)
                        ${{ number_format($tour->price, 2) }}
                        @else
                        -
                        @endif
                    </div>

                    <div class="mb-3">
                        <strong>Status:</strong>

                        @if($tour->is_active)
                        <span class="badge bg-label-success">
                            Active
                        </span>
                        @else
                        <span class="badge bg-label-danger">
                            Inactive
                        </span>
                        @endif

                        @if($tour->is_featured)
                        <span class="badge bg-label-warning ms-1">
                            Featured
                        </span>
                        @endif
                    </div>

                </div>

            </div>

            <hr>

            <div class="mb-4">
                <h6>Short Description</h6>

                <p class="mb-0">
                    {{ $tour->short_description ?: 'No short description provided.' }}
                </p>
            </div>

            <div>
                <h6>Description</h6>

                @if($tour->description)
                <div class="border rounded p-3 bg-light">
                    {!! nl2br(e($tour->description)) !!}
                </div>
                @else
                <p class="text-muted">
                    No description provided.
                </p>
                @endif
            </div>

        </div>

    </div>

</x-layouts.app>