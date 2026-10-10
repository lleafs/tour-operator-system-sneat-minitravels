<div>
    {{-- Be like water. --}}
</div>
@section('title', __('Destinations'))
<x-layouts.app :title="__('Destinations')">

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">{{ __('Destinations') }}</h5>
            <a href="{{ route('destinations.create') }}" class="btn btn-primary btn-sm">
                <i class="bx bx-plus"></i> {{ __('Add Destination') }}
            </a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('Region') }}</th>
                            <th>{{ __('Country') }}</th>
                            <th>{{ __('Popular Season') }}</th>
                            <th>{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($destinations as $destination)
                            <tr>
                                <td>{{ $destination->name }}</td>
                                <td>{{ $destination->region }}</td>
                                <td>{{ $destination->country }}</td>
                                <td>{{ $destination->season }}</td>
                                <td>
                                    <a href="{{ route('destinations.show', $destination) }}" class="btn btn-sm btn-info">
                                        <i class="bx bx-show"></i>
                                    </a>
                                    <a href="{{ route('destinations.edit', $destination) }}" class="btn btn-sm btn-warning">
                                        <i class="bx bx-edit"></i>
                                    </a>
                                    <form action="{{ route('destinations.destroy', $destination) }}" method="POST" class="d-inline">
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
                {{ $destinations->links() }}
            </div>
        </div>
    </div>

</x-layouts.app>
