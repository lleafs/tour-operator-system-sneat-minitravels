<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
</div>
@section('title', __('Hotels'))
<x-layouts.app :title="__('Hotels')">

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">{{ __('Hotels') }}</h5>
            <a href="{{ route('hotels.create') }}" class="btn btn-primary btn-sm">
                <i class="bx bx-plus"></i> {{ __('Add Hotel') }}
            </a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>City</th>
                            <th>Country</th>
                            <th>Stars</th>
                            <th>Price / Night</th>
                            <th>Created</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($hotels as $hotel)
                        <tr>
                            <td>{{ $hotel->name }}</td>
                            <td>{{ $hotel->city ?? '-' }}</td>
                            <td>{{ $hotel->country ?? '-' }}</td>
                            <td>
                                @if($hotel->stars)
                                {{ $hotel->stars }} ★
                                @else
                                -
                                @endif
                            </td>
                            <td>${{ number_format($hotel->price_per_night, 2) }}</td>
                            <td>{{ $hotel->created_at?->format('d/m/Y') }}</td>
                            {{-- Actions --}}
                            <td>
                                <a href="{{ route('hotels.show', $hotel) }}" class="btn btn-sm btn-info">
                                    <i class="bx bx-show"></i>
                                </a>
                                <a href="{{ route('hotels.edit', $hotel) }}" class="btn btn-sm btn-warning">
                                    <i class="bx bx-edit"></i>
                                </a>
                                <form action="{{ route('hotels.destroy', $hotel) }}"
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
                                No hotels found.
                            </td>
                        </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                {{ $hotels->links() }}
            </div>
        </div>
    </div>

</x-layouts.app>