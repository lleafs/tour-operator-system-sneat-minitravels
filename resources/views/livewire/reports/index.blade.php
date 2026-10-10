<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
</div>
@section('title', __('Reports'))
<x-layouts.app :title="__('Reports')">

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">{{ __('Reports') }}</h5>
            <a href="{{ route('reports.create') }}" class="btn btn-primary btn-sm">
                <i class="bx bx-plus"></i> {{ __('Generate Report') }}
            </a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>{{ __('Title') }}</th>
                            <th>{{ __('Type') }}</th>
                            <th>{{ __('Period') }}</th>
                            <th>{{ __('Created At') }}</th>
                            <th>{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reports as $report)
                            <tr>
                                <td>{{ $report->title }}</td>
                                <td>{{ ucfirst($report->type) }}</td>
                                <td>{{ $report->period }}</td>
                                <td>{{ $report->created_at->format('d/m/Y') }}</td>
                                <td>
                                    <a href="{{ route('reports.show', $report) }}" class="btn btn-sm btn-info">
                                        <i class="bx bx-show"></i>
                                    </a>
                                    <a href="{{ route('reports.edit', $report) }}" class="btn btn-sm btn-warning">
                                        <i class="bx bx-edit"></i>
                                    </a>
                                    <form action="{{ route('reports.destroy', $report) }}" method="POST" class="d-inline">
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
                {{ $reports->links() }}
            </div>
        </div>
    </div>

</x-layouts.app>
