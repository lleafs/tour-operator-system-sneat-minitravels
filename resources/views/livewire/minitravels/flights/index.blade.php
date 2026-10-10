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
                            <th>{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($flights as $flight)
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
                                <td>
                                    <a href="{{ route('flights.show', $flight) }}" class="btn btn-sm btn-info">
                                        <i class="bx bx-show"></i>
                                    </a>
                                    <a href="{{ route('flights.edit', $flight) }}" class="btn btn-sm btn-warning">
                                        <i class="bx bx-edit"></i>
                                    </a>
                                    <form action="{{ route('flights.destroy', $flight) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="bx bx-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                {{ $flights->links() }}
            </div>
        </div>
    </div>

</x-layouts.app>
