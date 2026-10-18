<x-layouts.app :title="'Agency ' . $agency->name">

    <div class="card">

        <div class="card-header d-flex justify-content-between align-items-center">

            <div>
                <h4 class="mb-0">
                    <i class="bx bx-building"></i>
                    {{ $agency->name }}
                </h4>

                <small class="text-muted">
                    Agency Details
                </small>
            </div>

            <a href="{{ route('agencies.index') }}"
               class="btn btn-secondary">
                <i class="bx bx-arrow-back me-1"></i>
                Back
            </a>

        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Agency Name</label>
                    <div>{{ $agency->name }}</div>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Slug</label>
                    <div>
                        <span class="badge bg-label-primary">
                            {{ $agency->slug }}
                        </span>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Email</label>
                    <div>{{ $agency->email }}</div>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Phone</label>
                    <div>{{ $agency->phone }}</div>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Created</label>
                    <div>
                        {{ $agency->created_at->format('d/m/Y H:i') }}
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Updated</label>
                    <div>
                        {{ $agency->updated_at->format('d/m/Y H:i') }}
                    </div>
                </div>

            </div>

        </div>

        <div class="card-footer d-flex justify-content-end gap-2">

            <a href="{{ route('agencies.edit', $agency) }}"
               class="btn btn-warning">
                <i class="bx bx-edit me-1"></i>
                Edit Agency
            </a>

            <a href="{{ route('agencies.index') }}"
               class="btn btn-outline-secondary">
                Close
            </a>

        </div>

    </div>

</x-layouts.app>