<x-layouts.app :title="'Edit Agency ' . $agency->name">

    <div class="card">

        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                <h5 class="mb-0">
                    <i class="bx bx-building"></i>
                    Edit Agency
                </h5>

                <small class="text-muted">
                    Update agency information
                </small>
            </div>

            <a href="{{ route('agencies.index') }}"
                class="btn btn-outline-secondary">
                <i class="bx bx-arrow-back me-1"></i>
                Back
            </a>
        </div>

        <div class="card-body">

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            <form action="{{ route('agencies.update', $agency) }}"
                method="POST">

                @csrf
                @method('PUT')

                <div class="row g-4">

                    <div class="col-12">
                        <h6 class="text-primary">
                            Agency Information
                        </h6>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Agency Name</label>

                        <input type="text"
                            name="name"
                            class="form-control"
                            value="{{ old('name', $agency->name) }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Slug</label>

                        <input type="text"
                            class="form-control"
                            value="{{ $agency->slug }}"
                            disabled>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Email</label>

                        <input type="email"
                            name="email"
                            class="form-control"
                            value="{{ old('email', $agency->email) }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Phone</label>

                        <input type="text"
                            name="phone"
                            class="form-control"
                            value="{{ old('phone', $agency->phone) }}">
                    </div>

                </div>

                <div class="mt-4 d-flex justify-content-end gap-2 border-top pt-3">

                    <a href="{{ route('agencies.index') }}"
                        class="btn btn-outline-secondary">
                        <i class="bx bx-x me-1"></i>
                        Cancel
                    </a>

                    <button type="submit"
                        class="btn btn-primary">
                        <i class="bx bx-save me-1"></i>
                        Update Agency
                    </button>

                </div>

            </form>

        </div>

    </div>

</x-layouts.app>