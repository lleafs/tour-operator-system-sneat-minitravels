<x-layouts.app title="Create Tour">

    <div class="card">
        <div class="card-header">
            <h4 class="mb-0">Edit Tour</h4>
        </div>

        <div class="card-body">

            <form action="{{ route('tours.update', $tour) }}"
                method="POST"
                enctype="multipart/form-data">

                @csrf
                @method('PUT')

                {{-- alerts --}}
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <div class="row">
                    {{-- agencies --}}
                    @if(auth()->user()->role === 'admin')
                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            Agency <span class="text-danger">*</span>
                        </label>
                        <select
                            name="agency_id"
                            class="form-select @error('agency_id') is-invalid @enderror"
                            required>

                            <option value="">Select Agency</option>
                            @foreach($agencies as $agency)
                            <option
                                value="{{ $agency->id }}"
                                @selected(old('agency_id', $tour->agency_id) == $agency->id)>
                                {{ $agency->name }}
                            </option>
                            @endforeach
                        </select>
                        @error('agency_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    @endif
                    {{-- Tour Name --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            Tour Name <span class="text-danger">*</span>
                        </label>
                        <input
                            type="text"
                            name="name"
                            class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name', $tour->name) }}"
                            placeholder="e.g. Torres del Paine Adventure"
                            required>
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    {{-- Destination --}}
                    <div class="col-md-4 mb-3">
                        <label class="form-label">
                            Destination
                        </label>

                        <input
                            type="text"
                            name="destination"
                            class="form-control"
                            value="{{ old('destination', $tour->destination) }}"
                            placeholder="Puerto Natales, Chile">
                    </div>
                    {{-- Days --}}
                    <div class="col-md-2 mb-3">
                        <label class="form-label">
                            Days
                        </label>

                        <input
                            type="number"
                            id="days"
                            name="days"
                            class="form-control"
                            value="{{ old('days',$tour->days) }}"
                            min="1">
                    </div>

                    {{-- Nights --}}
                    <div class="col-md-2 mb-3">
                        <label class="form-label">
                            Nights
                        </label>

                        <input
                            type="number"
                            id="nights"
                            name="nights"
                            class="form-control"
                            value="{{ old('nights', $tour->nights) }}"
                            readonly>
                    </div>

                    {{-- Daily Rate --}}
                    <div class="col-md-2 mb-3">
                        <label class="form-label">
                            Rate / Day
                        </label>

                        <div class="input-group">
                            <span class="input-group-text">$</span>

                            <input
                                type="number"
                                id="daily_rate"
                                name="daily_rate"
                                class="form-control"
                                value="{{ old('daily_rate', $tour->daily_rate ?? 150) }}"
                                step="0.01">
                        </div>
                    </div>

                    {{-- Price --}}
                    <div class="col-md-2 mb-3">
                        <label class="form-label">
                            Total Price
                        </label>
                        <div class="input-group">
                            <span class="input-group-text">$</span>

                            <input
                                type="number"
                                id="price"
                                name="price"
                                class="form-control"
                                readonly>
                        </div>
                    </div>

                    @if($tour->featured_image)

                    <div class="mb-3">
                        <label class="form-label">
                            Current Image
                        </label>

                        <div>
                            <img
                                src="{{ asset('storage/' . $tour->featured_image) }}"
                                alt="{{ $tour->name }}"
                                class="img-fluid rounded"
                                style="max-height:200px;">
                        </div>
                    </div>
                    @endif
                </div>

                <div class="mb-3">
                    <label class="form-label">
                        Short Description
                    </label>

                    <textarea
                        name="short_description"
                        rows="3"
                        class="form-control"
                        placeholder="Brief summary displayed in listings...">{{ old('short_description', $tour->short_description) }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">
                        Description
                    </label>

                    <textarea
                        name="description"
                        rows="8"
                        class="form-control"
                        placeholder="Detailed tour information, highlights, itinerary, inclusions...">{{ old('description', $tour->description) }}</textarea>
                </div>

                <div class="row">

                    <div class="col-md-3 mb-3">
                        <div class="form-check form-switch">
                            <input
                                type="checkbox"
                                name="is_active"
                                value="1"
                                class="form-check-input"
                                @checked(old('is_active', $tour->is_active))>

                            <label class="form-check-label">
                                Active
                            </label>
                        </div>
                    </div>

                    <div class="col-md-3 mb-3">
                        <div class="form-check form-switch">
                            <input
                                type="checkbox"
                                name="is_featured"
                                value="1"
                                class="form-check-input"
                                @checked(old('is_featured', $tour->is_featured))>

                            <label class="form-check-label">
                                Featured
                            </label>
                        </div>
                    </div>

                </div>
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">
                        Update Tour
                    </button>
                    <a href="{{ route('tours.index') }}"
                        class="btn btn-outline-secondary">
                        <i class="bx bx-arrow-back me-1"></i>
                        Cancel
                    </a>
                </div>
        </div>

        </form>

    </div>
</x-layouts.app>
<script>
    document.addEventListener('DOMContentLoaded', function() {

        const days = document.getElementById('days');
        const nights = document.getElementById('nights');
        const rate = document.getElementById('daily_rate');
        const price = document.getElementById('price');

        function calculateTour() {

            const daysValue = parseInt(days.value || 0);
            const rateValue = parseFloat(rate.value || 0);

            // Nights = Days - 1
            nights.value = Math.max(0, daysValue - 1);

            // Price = Days × Rate
            price.value = (daysValue * rateValue).toFixed(2);
        }

        days.addEventListener('input', calculateTour);
        rate.addEventListener('input', calculateTour);

        calculateTour();
    });
</script>