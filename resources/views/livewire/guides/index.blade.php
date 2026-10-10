<div>
    {{-- Do your work, then step back. --}}
</div>
@section('title', __('Guides'))
<x-layouts.app :title="__('Guides')">

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">{{ __('Guides') }}</h5>
            <a href="{{ route('guides.create') }}" class="btn btn-primary btn-sm">
                <i class="bx bx-plus"></i> {{ __('Add Guide') }}
            </a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('Language') }}</th>
                            <th>{{ __('Experience') }}</th>
                            <th>{{ __('Phone') }}</th>
                            <th>{{ __('Email') }}</th>
                            <th>{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($guides as $guide)
                            <tr>
                                <td>{{ $guide->name }}</td>
                                <td>{{ $guide->language }}</td>
                                <td>{{ $guide->experience }} {{ __('years') }}</td>
                                <td>{{ $guide->phone }}</td>
                                <td>{{ $guide->email }}</td>
                                <td>
                                    <a href="{{ route('guides.show', $guide) }}" class="btn btn-sm btn-info">
                                        <i class="bx bx-show"></i>
                                    </a>
                                    <a href="{{ route('guides.edit', $guide) }}" class="btn btn-sm btn-warning">
                                        <i class="bx bx-edit"></i>
                                    </a>
                                    <form action="{{ route('guides.destroy', $guide) }}" method="POST" class="d-inline">
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
                {{ $guides->links() }}
            </div>
        </div>
    </div>

</x-layouts.app>
