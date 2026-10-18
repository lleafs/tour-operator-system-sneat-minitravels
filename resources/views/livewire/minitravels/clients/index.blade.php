<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
</div>
@section('title', __('Clients'))
<x-layouts.app :title="__('Clients')">

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">{{ __('Clients') }}</h5>
            <a href="{{ route('clients.create') }}" class="btn btn-primary btn-sm">
                <i class="bx bx-plus"></i> {{ __('Add Client') }}
            </a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Agency</th>
                            <th>Client</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Nationality</th>
                            <th>Passport</th>
                            <th>Created</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($clients as $client)
                        <tr>
                            <td>{{ $client->id }}</td>
                            <td>
                                @if($client->agency)
                                <span class="badge bg-label-primary">
                                    {{ $client->agency->name }}
                                </span>
                                @else
                                <span class="badge bg-label-warning">
                                    No Agency
                                </span>
                                @endif
                            </td>
                            <td>
                                <strong>
                                    {{ $client->first_name }}
                                    {{ $client->last_name }}
                                </strong>
                            </td>
                            <td>
                                {{ $client->email ?? '-' }}
                            </td>
                            <td>
                                {{ $client->phone ?? '-' }}
                            </td>
                            <td>
                                {{ $client->nationality ?? '-' }}
                            </td>
                            <td>
                                {{ $client->passport_number ?? '-' }}
                            </td>
                            <td>
                                {{ $client->created_at?->format('d/m/Y') }}
                            </td>
                            <td>
                                <a href="{{ route('clients.show', $client) }}" class="btn btn-sm btn-info">
                                    <i class="bx bx-show"></i>
                                </a>
                                <a href="{{ route('clients.edit', $client) }}" class="btn btn-sm btn-warning">
                                    <i class="bx bx-edit"></i>
                                </a>
                                <form action="{{ route('clients.destroy', $client) }}"
                                    method="POST"
                                    class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                        class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this client?')">
                                        <i class="bx bx-trash"></i>
                                    </button>

                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center">
                                No clients found.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                {{ $clients->links() }}
            </div>
        </div>
    </div>

</x-layouts.app>