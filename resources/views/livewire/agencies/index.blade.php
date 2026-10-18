@section('title', __('Agencies'))
<x-layouts.app :title="__('Agencies')">

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">{{ __('Agencies') }}</h5>
            <a href="{{ route('agencies.create') }}" class="btn btn-primary btn-sm">
                <i class="bx bx-plus"></i> {{ __('Add Agency') }}
            </a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>{{ __('Agency') }}</th>
                            <th>{{ __('Email') }}</th>
                            <th>{{ __('Phone') }}</th>
                            <th>{{ __('Slug') }}</th>
                            <th>{{ __('Users') }}</th>
                            <th>{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($agencies as $agency)
                        <tr>
                            <td>{{ $agency->name }}</td>
                            <td>{{ $agency->email }}</td>
                            <td>{{ $agency->phone }}</td>
                            <td>
                                <span class="badge bg-label-primary">
                                    {{ $agency->slug }}
                                </span>
                            </td>
                            <td>
                                {{ $agency->users()->count() }}
                            </td>
                            <td>
                                <a href="{{ route('agencies.show', $agency) }}"
                                    class="btn btn-sm btn-info">
                                    <i class="bx bx-show"></i>
                                </a>
                                <a href="{{ route('agencies.edit', $agency) }}" class="btn btn-sm btn-warning">
                                    <i class="bx bx-edit"></i>
                                </a>
                                <form action="{{ route('agencies.destroy', $agency) }}" method="POST" class="d-inline">
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
                {{ $agencies->links() }}
            </div>
        </div>
    </div>

</x-layouts.app>