<x-layouts.app :title="__('Client Details')">

    <div class="card">

        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">
                Client Details
            </h5>

            <a href="{{ route('clients.index') }}"
                class="btn btn-secondary">
                <i class="bx bx-arrow-back"></i>
                Back
            </a>
        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-6 mb-4">
                    <label class="form-label text-muted">
                        First Name
                    </label>

                    <div class="fw-semibold">
                        {{ $client->first_name }}
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <label class="form-label text-muted">
                        Last Name
                    </label>

                    <div class="fw-semibold">
                        {{ $client->last_name }}
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <label class="form-label text-muted">
                        Email
                    </label>

                    <div>
                        {{ $client->email ?: '-' }}
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <label class="form-label text-muted">
                        Phone
                    </label>

                    <div>
                        {{ $client->phone ?: '-' }}
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <label class="form-label text-muted">
                        Birth Date
                    </label>

                    <div>
                        {{ $client->birth_date ?: '-' }}
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <label class="form-label text-muted">
                        Passport Number
                    </label>

                    <div>
                        {{ $client->passport_number ?: '-' }}
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <label class="form-label text-muted">
                        Nationality
                    </label>

                    <div>
                        {{ $client->nationality ?: '-' }}
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <label class="form-label text-muted">
                        Created
                    </label>

                    <div>
                        {{ $client->created_at?->format('d/m/Y H:i') }}
                    </div>
                </div>

                <div class="col-12">
                    <label class="form-label text-muted">
                        Notes
                    </label>

                    <div class="border rounded p-3 bg-light">
                        {{ $client->notes ?: 'No notes available.' }}
                    </div>
                </div>

            </div>

        </div>

        <div class="card-footer">

            <a href="{{ route('clients.edit', $client) }}"
                class="btn btn-warning">
                <i class="bx bx-edit"></i>
                Edit Client
            </a>

            <a href="{{ route('clients.index') }}"
                class="btn btn-secondary">
                <i class="bx bx-x"></i>
                Close
            </a>

        </div>
    </div>

</x-layouts.app>