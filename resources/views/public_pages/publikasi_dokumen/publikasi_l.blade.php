@extends(landingTemplate())
@section('title', $title)
@section('container')
    <div class="container mt-5">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Dokumen</th>
                        <th>Tanggal</th>
                        <th>Oleh</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($publikasi_dokumens as $data)
                        <tr>
                            <td class="align-middle">
                                {{ $loop->iteration }}
                            </td>
                            <td class="align-middle">
                                {{ $data->judul }}
                            </td>
                            <td class="align-middle">
                                {{ $data->created_at->format('d/m/Y H.i') }}
                            </td>
                            <td class="align-middle">
                                {{ @$data->joinCreatedBy->nama ?? 'Uknown' }}
                            </td>
                            <td class="align-middle text-end">
                                @if ($data->get_berkas_pendukung)
                                    <a href="{{ $data->get_berkas_pendukung }}" target="_blank"
                                        class="ht-btn ht-btn-xs text-nowrap">
                                        Lihat Dokumen
                                    </a>
                                @else
                                    <i>- Tidak ada berkas -</i>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center" colspan="99">
                                Data tidak ditemukan
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <x-pagination-bs5-comp :data="$publikasi_dokumens" />
    </div>
@endsection
