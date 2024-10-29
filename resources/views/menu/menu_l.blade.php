@extends(adminTemplate())
@section('container')
    <x-searching-info-comp class="mb-2" />

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Daftar {{ $title }}</h4>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 1rem;">No</th>
                        <th>Nama Menu</th>
                        <th>Jenis</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @forelse ($menus as $key => $menu)
                        @if ($menu->menu_id === null)
                            <tr>
                                <td class="text-center">
                                    {{ $i }}
                                </td>
                                <td>
                                    {{ $menu->nama_menu }}
                                </td>
                                <td>
                                    @if (count($menu->joinSubMenus) === 0)
                                        {{ $menu->joinRefJenisMenu->nama_jenis }}
                                    @endif
                                </td>
                                <td class="text-end">
                                    @if ($menu->ref_jenis_menu_id == REF_JENIS_MENU_LAMAN)
                                        <a href="{{ route('menu.laman.create-or-update', ['menu_id' => $menu->id, 'laman_id' => $menu->laman_id]) }}"
                                            class="btn btn-outline-primary btn-sm my-25 my-md-0 text-nowrap">
                                            <i data-feather="globe" class="me-25"></i>
                                            <span>Laman</span>
                                        </a>
                                    @elseif ($menu->ref_jenis_menu_id == REF_JENIS_MENU_LINK)
                                        <button type="button"
                                            class="btn btn-outline-primary btn-sm my-25 my-md-0 text-nowrap btn-ubah"
                                            data-bs-toggle="modal" data-bs-target="#changeLinkModal"
                                            data-route="{{ route('menu.change-link', ['id' => $menu->id]) }}"
                                            data-link="{{ $menu->redirect_link }}">
                                            <i data-feather="link" class="me-25"></i>
                                            <span>Ubah Link</span>
                                        </button>
                                    @endif
                                </td>
                            </tr>

                            @foreach ($menu->joinSubMenus as $sub_menu)
                                <tr>
                                    <td></td>
                                    <td>
                                        <i class="fas fa-minus me-1"></i> {{ $sub_menu->nama_menu }}
                                    </td>
                                    <td>
                                        @if (count($sub_menu->joinSubMenus) === 0)
                                            {{ $sub_menu->joinRefJenisMenu->nama_jenis }}
                                        @endif
                                    </td>
                                    <td class="text-end">
                                        @if ($sub_menu->ref_jenis_menu_id == REF_JENIS_MENU_LAMAN)
                                            <a href="{{ route('menu.laman.create-or-update', ['menu_id' => $sub_menu->id, 'laman_id' => $sub_menu->laman_id]) }}"
                                                class="btn btn-outline-primary btn-sm my-25 my-md-0 text-nowrap">
                                                <i data-feather="globe" class="me-25"></i>
                                                <span>Laman</span>
                                            </a>
                                        @elseif ($sub_menu->ref_jenis_menu_id == REF_JENIS_MENU_LINK)
                                            <button type="button"
                                                class="btn btn-outline-primary btn-sm my-25 my-md-0 text-nowrap btn-ubah"
                                                data-bs-toggle="modal" data-bs-target="#changeLinkModal"
                                                data-route="{{ route('menu.change-link', ['id' => $sub_menu->id]) }}"
                                                data-link="{{ $sub_menu->redirect_link }}">
                                                <i data-feather="link" class="me-25"></i>
                                                <span>Ubah Link</span>
                                            </button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach

                            @php
                                $i++;
                            @endphp
                        @endif
                    @empty
                        <x-data-not-found-comp />
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('modal')
    <div class="modal fade" id="changeLinkModal" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-transparent">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pb-5 px-sm-5 pt-50">
                    <div class="text-center mb-2">
                        <h1>Ubah Link</h1>
                    </div>
                    <form action="xxx" method="post" class="row gy-1 pt-75">
                        @csrf
                        @method('put')

                        <x-input-comp label="Link" type="text" name="link" required />

                        <div class="col-12 text-center mt-2 pt-50">
                            <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light">
                                Simpan
                            </button>
                            <button type="reset" class="btn btn-outline-secondary waves-effect" data-bs-dismiss="modal"
                                aria-label="Close">
                                Batal
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('.btn-ubah').click(function() {
            const modal = $('#changeLinkModal')

            modal.find('form').attr('action', $(this).data('route'))
            modal.find('#link').val($(this).data('link'))
        })
    </script>
@endsection
