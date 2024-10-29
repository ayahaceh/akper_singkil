@extends(landingTemplate())
@section('title', $title)
@section('container')
    <div class="container mt-5">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <td style="width: 4rem;" class="text-center">No</td>
                        <td class="text-nowrap">Nama Kerjasama</td>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($kolaborasi as $data)
                        <tr>
                            <td class="text-center">
                                {{ $loop->iteration }}
                            </td>
                            <td>
                                {{ $data->nama }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center" colspan="99">Data tidak ditemukan</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <x-pagination-bs5-comp :data="$kolaborasi" />
    </div>
@endsection
