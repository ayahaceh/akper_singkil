@extends(adminTemplate())
@section('right-menu')
    <a href="{{ route('user.admin.create') }}" class="btn btn-primary">
        <i data-feather="plus" class="me-25"></i>
        <span>Baru</span>
    </a>
@endsection
@section('container')
    <div class="card">
        <div class="card-header">
            <div class="card-title">Daftar {{ $title }}</div>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 1rem;">No</th>
                        <th>Profil</th>
                        <th>Email</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $key => $user)
                        <tr>
                            <td class="text-center">
                                {{ $users->firstItem() + $key }}
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-group me-1">
                                        <div data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                            class="avatar pull-up my-0">
                                            <img src="{{ $user->foto_profil_compress }}" alt="Avatar" height="50"
                                                width="50" />
                                        </div>
                                    </div>
                                    <div>
                                        <p class="mb-0">{{ $user->nama }}</p>
                                        <p class="mb-0 text-muted">{{ '@' . $user->username }}</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                {{ $user->email }}
                            </td>
                            <td class="text-center">
                                @if ($user->role == USER_ROLE_SUPER_ADMIN)
                                    <span class="badge badge-light-success">Super Admin</span>
                                @elseif ($user->role == USER_ROLE_ADMIN)
                                    <span class="badge badge-light-warning">Admin</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('user.admin.ubah', ['id' => $user->id]) }}"
                                    class="btn btn-outline-primary btn-sm my-25 text-nowrap @if ($user->id === @user('id')) disabled @endif">
                                    <i data-feather="edit" class="me-25"></i>
                                    <span>Ubah</span>
                                </a>
                                <button type="button" class="btn btn-danger btn-sm my-25 text-nowrap"
                                    @if ($user->id === @user('id')) disabled="disabled" @endif
                                    onclick="confirmDelete('{{ route('user.admin.delete', ['id' => $user->id]) }}')">
                                    <i data-feather="trash" class="me-25"></i>
                                    <span>Hapus</span>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <x-data-not-found-comp />
                    @endforelse
                </tbody>
            </table>
        </div>
        <x-pagination-comp :data="$users" />
    </div>
@endsection

@section('script')
    <script>
        function confirmDelete(route) {
            confirm('default', 'Data yang dipilih akan dihapus.', function() {
                ajaxDelete(route, "{{ csrf_token() }}");
            }, 'Ya, Hapus');
        }
    </script>
@endsection
