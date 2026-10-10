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
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('City') }}</th>
                            <th>{{ __('Stars') }}</th>
                            <th>{{ __('Contact') }}</th>
                            <th>{{ __('Phone') }}</th>
                            <th>{{ __('Email') }}</th>
                            <th>{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($hotels as $hotel)
                            <tr>
                                <td>{{ $hotel->name }}</td>
                                <td>{{ $hotel->city }}</td>
                                <td>{{ $hotel->stars }} ★</td>
                                <td>{{ $hotel->contact }}</td>
                                <td>{{ $hotel->phone }}</td>
                                <td>{{ $hotel->email }}</td>
                                <td>
                                    <a href="{{ route('hotels.show', $hotel) }}" class="btn btn-sm btn-info">
                                        <i class="bx bx-show"></i>
                                    </a>
                                    <a href="{{ route('hotels.edit', $hotel) }}" class="btn btn-sm btn-warning">
                                        <i class="bx bx-edit"></i>
                                    </a>
                                    <form action="{{ route('hotels.destroy', $hotel) }}" method="POST" class="d-inline">
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
                {{ $hotels->links() }}
            </div>
        </div>
    </div>

</x-layouts.app>
