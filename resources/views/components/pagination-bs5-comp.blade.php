@if (@$data)
    @if ($data->total() > $data->perPage())
        <div class="{{ @$class }}">
            {{ $data->links('vendor.pagination.bootstrap-5') }}
        </div>
    @endif
@endif
