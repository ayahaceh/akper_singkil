@extends(adminTemplate())
@section('right-menu')
    <a href="{{ route('user.tim.create') }}" class="btn btn-primary">
        <i data-feather="plus" class="me-25"></i>
        <span>Baru</span>
    </a>
@endsection
@section('container')
    <x-searching-info-comp class="mb-2" />

    <div class="card">
        <div class="card-header">
            <div class="card-title">Daftar {{ $title }}</div>
            <div class="card-tools">
                <form action="" method="get">
                    <div class="input-group input-group-sm">
                        <input type="text" name="cari" class="form-control form-control-sm"
                            value="{{ request('cari') }}" placeholder="Pencarian..." autocomplete="off">
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 1rem;">No</th>
                        <th>Profil</th>
                        <th class="text-nowrap">Jenis Pegawai</th>
                        <th>Tentang</th>
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
                                        <p class="mb-0 text-nowrap">{{ $user->nama }}</p>
                                        <p class="mb-0 text-nowrap text-muted">NIP. {{ $user->nip ?? '-' }}</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                {{ $user->joinRefJenisTim->nama_jenis }}
                            </td>
                            <td>
                                <p class="mb-50">{{ Illuminate\Support\Str::limit($user->tentang, 192) }}</p>
                                <div class="d-flex">
                                    @if ($user->twitter)
                                        <a href="{{ $user->link_twitter }}" target="_blank"
                                            class="btn btn-icon btn-sm btn-outline-primary mx-25">
                                            <i data-feather="twitter"></i>
                                        </a>
                                    @endif
                                    @if ($user->facebook)
                                        <a href="{{ $user->link_facebook }}" target="_blank"
                                            class="btn btn-icon btn-sm btn-outline-primary mx-25">
                                            <i data-feather="facebook"></i>
                                        </a>
                                    @endif
                                    @if ($user->instagram)
                                        <a href="{{ $user->link_instagram }}" target="_blank"
                                            class="btn btn-icon btn-sm btn-outline-primary mx-25">
                                            <i data-feather="instagram"></i>
                                        </a>
                                    @endif
                                    @if ($user->linkedin)
                                        <a href="{{ $user->link_linkedin }}" target="_blank"
                                            class="btn btn-icon btn-sm btn-outline-primary mx-25">
                                            <i data-feather="linkedin"></i>
                                        </a>
                                    @endif
                                </div>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('user.tim.ubah', ['id' => $user->id]) }}"
                                    class="btn btn-outline-primary btn-sm my-25 text-nowrap">
                                    <i data-feather="edit" class="me-25"></i>
                                    <span>Ubah</span>
                                </a>
                                <button type="button" class="btn btn-danger btn-sm my-25 text-nowrap"
                                    onclick="confirmDelete('{{ route('user.tim.delete', ['id' => $user->id]) }}')">
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
