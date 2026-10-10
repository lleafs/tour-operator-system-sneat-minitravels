<div>
    {{-- The best athlete wants his opponent at his best. --}}
</div>
@section('title', __('Vouchers'))
<x-layouts.app :title="__('Vouchers')">

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">{{ __('Vouchers') }}</h5>
            <a href="{{ route('vouchers.create') }}" class="btn btn-primary btn-sm">
                <i class="bx bx-plus"></i> {{ __('Add Voucher') }}
            </a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>{{ __('Code') }}</th>
                            <th>{{ __('Client') }}</th>
                            <th>{{ __('Issued Date') }}</th>
                            <th>{{ __('Amount') }}</th>
                            <th>{{ __('Status') }}</th>
                            <th>{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($vouchers as $voucher)
                            <tr>
                                <td>{{ $voucher->code }}</td>
                                <td>{{ $voucher->client->name }}</td>
                                <td>{{ $voucher->issued_at->format('d/m/Y') }}</td>
                                <td>{{ $voucher->amount }}</td>
                                <td>
                                    <span class="badge bg-{{ $voucher->status === 'active' ? 'success' : 'secondary' }}">
                                        {{ ucfirst($voucher->status) }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('vouchers.show', $voucher) }}" class="btn btn-sm btn-info">
                                        <i class="bx bx-show"></i>
                                    </a>
                                    <a href="{{ route('vouchers.edit', $voucher) }}" class="btn btn-sm btn-warning">
                                        <i class="bx bx-edit"></i>
                                    </a>
                                    <form action="{{ route('vouchers.destroy', $voucher) }}" method="POST" class="d-inline">
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
                {{ $vouchers->links() }}
            </div>
        </div>
    </div>

</x-layouts.app>
