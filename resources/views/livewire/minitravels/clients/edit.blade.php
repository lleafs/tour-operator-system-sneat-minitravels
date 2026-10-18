<x-layouts.app :title="__('Edit Client')">

    <div class="card">

        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Edit Client</h5>

            <a href="{{ route('clients.index') }}"
                class="btn btn-secondary">
                <i class="bx bx-arrow-back me-1"></i>
                Back
            </a>
        </div>

        <div class="card-body">

            <form action="{{ route('clients.update', $client) }}"
                method="POST">

                @csrf
                @method('PUT')

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label class="form-label">First Name</label>

                        <input
                            type="text"
                            name="first_name"
                            class="form-control"
                            value="{{ old('first_name', $client->first_name) }}"
                            required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Last Name</label>

                        <input
                            type="text"
                            name="last_name"
                            class="form-control"
                            value="{{ old('last_name', $client->last_name) }}"
                            required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Email</label>

                        <input
                            type="email"
                            name="email"
                            class="form-control"
                            value="{{ old('email', $client->email) }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Phone</label>

                        <input
                            type="text"
                            name="phone"
                            class="form-control"
                            value="{{ old('phone', $client->phone) }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Birth Date</label>

                        <input
                            type="date"
                            name="birth_date"
                            class="form-control"
                            value="{{ old('birth_date', $client->birth_date) }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Passport Number</label>

                        <input
                            type="text"
                            name="passport_number"
                            class="form-control"
                            value="{{ old('passport_number', $client->passport_number) }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nationality</label>

                        <input
                            type="text"
                            name="nationality"
                            class="form-control"
                            value="{{ old('nationality', $client->nationality) }}">
                    </div>

                    <div class="col-12 mb-3">
                        <label class="form-label">Notes</label>

                        <textarea
                            name="notes"
                            rows="4"
                            class="form-control">{{ old('notes', $client->notes) }}</textarea>
                    </div>

                </div>

                <div class="mt-4">
                    <a href="{{ route('clients.index') }}"
                        class="btn btn-outline-secondary">
                        <i class="bx bx-x me-1"></i>
                        Cancel
                    </a>

                    <button type="submit" class="btn btn-primary">
                        <i class="bx bx-save me-1"></i>
                        Update Client
                    </button>

                </div>

            </form>

        </div>

    </div>

</x-layouts.app>