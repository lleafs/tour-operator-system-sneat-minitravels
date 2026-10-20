<div>
    {{-- Success is as dangerous as failure. --}}
</div>
@section('title', __('Bookings'))
<x-layouts.app :title="__('Bookings')">

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">{{ __('Bookings') }}</h5>
            <a href="{{ route('bookings.create') }}" class="btn btn-primary btn-sm">
                <i class="bx bx-plus"></i> {{ __('Add Booking') }}
            </a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>{{ __('Client') }}</th>

                            <th>{{ __('Date') }}</th>
                            <th>{{ __('Status') }}</th>
                            <th>{{ __('Total') }}</th>
                            <th>{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($bookings as $booking)
                        <tr>
                            <td>
                                {{ $booking->client?->first_name }}
                                {{ $booking->client?->last_name }}
                            </td>
                            <td>{{ $booking->created_at?->format('d/m/Y') }}</td>
                            <td>
                                <span class="badge bg-{{ $booking->status === 'confirmed' ? 'success' : 'secondary' }}">
                                    {{ ucfirst($booking->status) }}
                                </span>
                            </td>
                            <td>${{ number_format($booking->amount, 2) }} {{ __('USD') }}</td>
                            <td>
                                <a href="{{ route('bookings.show', $booking) }}" class="btn btn-sm btn-info">
                                    <i class="bx bx-show"></i>
                                </a>
                                <a href="{{ route('bookings.edit', $booking) }}" class="btn btn-sm btn-warning">
                                    <i class="bx bx-edit"></i>
                                </a>
                                <form action="{{ route('bookings.destroy', $booking) }}"
                                    method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this booking?')">
                                        <i class="bx bx-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center">
                                No bookings found.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                {{ $bookings->links() }}
            </div>
        </div>
    </div>
</x-layouts.app>