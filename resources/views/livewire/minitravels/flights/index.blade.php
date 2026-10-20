<div>
    {{-- In work, do what you enjoy. --}}
</div>
@section('title', __('Flights'))
<x-layouts.app :title="__('Flights')">

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">{{ __('Flights') }}</h5>
            <a href="{{ route('flights.create') }}" class="btn btn-primary btn-sm">
                <i class="bx bx-plus"></i> {{ __('Add Flight') }}
            </a>
        </div>
        @if(session('success'))
        <div class="alert alert-success alert-dismissible mb-3">
            {{ session('success') }}

            <button type="button"
                class="btn-close"
                data-bs-dismiss="alert">
            </button>
        </div>
        @endif
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>{{ __('Flight No') }}</th>
                            <th>{{ __('Origin') }}</th>
                            <th>{{ __('Destination') }}</th>
                            <th>{{ __('Departure Date') }}</th>
                            <th>{{ __('Arrival Date') }}</th>
                            <th>{{ __('Status') }}</th>
                            <th>{{ __('Price') }}</th>
                            <th>{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($flights as $flight)
                        <tr>
                            <td>{{ $flight->flight_number }}</td>
                            <td>{{ $flight->origin }}</td>
                            <td>{{ $flight->destination }}</td>
                            <td>{{ $flight->departure_date->format('d/m/Y H:i') }}</td>
                            <td>{{ $flight->arrival_date->format('d/m/Y H:i') }}</td>
                            <td>
                                <span class="badge bg-{{ $flight->status === 'scheduled' ? 'info' : ($flight->status === 'delayed' ? 'warning' : 'success') }}">
                                    {{ ucfirst($flight->status) }}
                                </span>
                            </td>
                            <td>${{ number_format($flight->price, 2) }}</td>
                            {{-- Actions --}}
                            <td>
                                <a href="{{ route('flights.show', $flight) }}" class="btn btn-sm btn-info">
                                    <i class="bx bx-show"></i>
                                </a>
                                <a href="{{ route('flights.edit', $flight) }}" class="btn btn-sm btn-warning">
                                    <i class="bx bx-edit"></i>
                                </a>
                                <form action="{{ route('flights.destroy', $flight) }}"
                                    method="POST"
                                    class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                        class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this flight?')">
                                        <i class="bx bx-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center">
                                No flights found.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                {{ $flights->links() }}
            </div>
        </div>
    </div>

</x-layouts.app>