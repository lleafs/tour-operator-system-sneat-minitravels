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
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('Director') }}</th>
                            <th>{{ __('Account') }}</th>
                            <th>{{ __('License Date') }}</th>
                            <th>{{ __('Commission') }}</th>
                            <th>{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($agencies as $agency)
                            <tr>
                                <td>{{ $agency->name }}</td>
                                <td>{{ $agency->director }}</td>
                                <td>{{ $agency->account }}</td>
                                <td>{{ $agency->license_date }}</td>
                                <td>{{ $agency->commission }}%</td>
                                <td>
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
