<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
</div>
@section('title', __('Packages'))
<x-layouts.app :title="__('Packages')">

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">{{ __('Packages') }}</h5>
            <a href="{{ route('packages.create') }}" class="btn btn-primary btn-sm">
                <i class="bx bx-plus"></i> {{ __('Add Package') }}
            </a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('Destination') }}</th>
                            <th>{{ __('Duration') }}</th>
                            <th>{{ __('Price') }}</th>
                            <th>{{ __('Status') }}</th>
                            <th>{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($packages as $package)
                            <tr>
                                <td>{{ $package->name }}</td>
                                <td>{{ $package->destination }}</td>
                                <td>{{ $package->duration }} {{ __('days') }}</td>
                                <td>{{ $package->price }} {{ __('USD') }}</td>
                                <td>
                                    <span class="badge bg-{{ $package->status === 'active' ? 'success' : 'secondary' }}">
                                        {{ ucfirst($package->status) }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('packages.show', $package) }}" class="btn btn-sm btn-info">
                                        <i class="bx bx-show"></i>
                                    </a>
                                    <a href="{{ route('packages.edit', $package) }}" class="btn btn-sm btn-warning">
                                        <i class="bx bx-edit"></i>
                                    </a>
                                    <form action="{{ route('packages.destroy', $package) }}" method="POST" class="d-inline">
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
                {{ $packages->links() }}
            </div>
        </div>
    </div>

</x-layouts.app>
