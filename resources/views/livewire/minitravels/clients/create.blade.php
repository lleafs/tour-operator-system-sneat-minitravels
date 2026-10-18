<x-layouts.app :title="__('Add Client')">
<div class="card">
    <div class="card-header">
        <h4 class="mb-0">Create Client</h4>
    </div>

    <div class="card-body">
        <form action="{{ route('clients.store') }}" method="POST">

            @csrf

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label class="form-label">First Name</label>
                    <input
                        type="text"
                        name="first_name"
                        class="form-control @error('first_name') is-invalid @enderror"
                        value="{{ old('first_name') }}"
                        required>

                    @error('first_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Last Name</label>
                    <input
                        type="text"
                        name="last_name"
                        class="form-control @error('last_name') is-invalid @enderror"
                        value="{{ old('last_name') }}"
                        required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Email</label>
                    <input
                        type="email"
                        name="email"
                        class="form-control"
                        value="{{ old('email') }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Phone</label>
                    <input
                        type="text"
                        name="phone"
                        class="form-control"
                        value="{{ old('phone') }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Birth Date</label>
                    <input
                        type="date"
                        name="birth_date"
                        class="form-control"
                        value="{{ old('birth_date') }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Passport Number</label>
                    <input
                        type="text"
                        name="passport_number"
                        class="form-control"
                        value="{{ old('passport_number') }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Nationality</label>
                    <input
                        type="text"
                        name="nationality"
                        class="form-control"
                        value="{{ old('nationality') }}">
                </div>

                <div class="col-12 mb-3">
                    <label class="form-label">Notes</label>
                    <textarea
                        name="notes"
                        rows="4"
                        class="form-control">{{ old('notes') }}</textarea>
                </div>

            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary">
                    Save Client
                </button>
                <a href="{{ route('clients.index') }}"
                    class="btn btn-outline-secondary">
                    <i class="bx bx-arrow-back me-1"></i>
                    Cancel
                </a>
            </div>

        </form>
    </div>
</div>

</x-layouts.app>