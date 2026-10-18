<x-layouts.app :title="__('Create Agency')">

    <div class="card">

        <div class="card-header">
            <h5 class="mb-0">
                <i class="bx bx-building"></i>
                Create Agency
            </h5>
        </div>

        <div class="card-body">

            <form action="{{ route('agencies.store') }}" method="POST">

                @csrf

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
                            placeholder="MiniTravels Chile">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Agency Email</label>
                        <input type="email"
                            name="email"
                            class="form-control"
                            placeholder="info@agency.cl">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Phone</label>
                        <input type="text"
                            name="phone"
                            class="form-control">
                    </div>

                    <div class="col-12">
                        <hr>
                        <h6 class="text-primary">
                            Administrator Account
                        </h6>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Admin Name</label>
                        <input type="text"
                            name="admin_name"
                            class="form-control">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Login Email</label>
                        <input type="email"
                            name="login_email"
                            class="form-control">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Temporary Password</label>
                        <input type="text"
                            name="temporary_password"
                            class="form-control"
                            value="welcome123">
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
                        Create Agency
                    </button>

                </div>

            </form>

        </div>

    </div>

</x-layouts.app>