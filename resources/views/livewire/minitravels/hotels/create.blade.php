{{-- resources/views/livewire/minitravels/flights/create.blade.php --}}

<x-layouts.app :title="__('Add Hotel')">

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                <h5 class="mb-0">Add Hotel</h5>
                <small class="text-muted">
                    Create a new hotel record
                </small>
            </div>

            <a href="{{ route('hotels.index') }}"
                class="btn btn-outline-secondary">
                <i class="bx bx-arrow-back"></i>
                Back to Hotels
            </a>
        </div>

        <div class="card-body">

            <form action="{{ route('hotels.store') }}"
                method="POST">
                @csrf

                <div class="row g-3">

                    {{-- Hotel Name --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Hotel Name</label>

                        <input
                            type="text"
                            name="name"
                            class="form-control"
                            value="{{ old('name') }}"
                            required>
                    </div>

                    {{-- City --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">City</label>

                        <input
                            type="text"
                            name="city"
                            class="form-control"
                            value="{{ old('city') }}">
                    </div>

                    {{-- Country --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Country</label>

                        <input
                            type="text"
                            name="country"
                            class="form-control"
                            value="{{ old('country') }}">
                    </div>
                    {{-- Address --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Address</label>

                        <input
                            type="text"
                            name="address"
                            class="form-control"
                            value="{{ old('address') }}">
                    </div>

                    {{-- Phone --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            Phone
                        </label>

                        <input
                            type="text"
                            name="phone"
                            class="form-control"
                            value="{{ old('phone') }}"
                            placeholder="+56 2 2234 5678">
                    </div>

                    {{-- Email --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            Email
                        </label>

                        <input
                            type="email"
                            name="email"
                            class="form-control"
                            value="{{ old('email') }}"
                            placeholder="reservations@hotel.com">
                    </div>

                    {{-- Stars --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Stars</label>

                        <select
                            name="stars"
                            class="form-select"
                            required>
                            <option value="">Select</option>
                            <option value="1">1 Star</option>
                            <option value="2">2 Stars</option>
                            <option value="3">3 Stars</option>
                            <option value="4">4 Stars</option>
                            <option value="5">5 Stars</option>
                        </select>
                    </div>

                    {{-- Description --}}
                    <div class="col-12 mb-3">
                        <label class="form-label">Description</label>

                        <textarea
                            name="description"
                            rows="4"
                            class="form-control">{{ old('description') }}</textarea>
                    </div>

                    {{-- Notes --}}
                    <div class="col-12">
                        <label class="form-label">Notes</label>
                        <textarea name="notes"
                            rows="4"
                            class="form-control"
                            placeholder="Additional hotel information..."></textarea>
                    </div>

                </div>

                <div class="mt-4 d-flex justify-content-end gap-2 border-top pt-3">

                    <a href="{{ route('hotels.index') }}"
                        class="btn btn-outline-secondary">
                        <i class="bx bx-arrow-back me-1"></i>
                        Cancel
                    </a>

                    <button type="submit" class="btn btn-primary">
                        <i class="bx bx-save me-1"></i>
                        Save Hotel
                    </button>

                </div>
            </form>

        </div>
    </div>

</x-layouts.app>