@if (@$data)
    @if ($data->total() > $data->perPage())
        <div class="{{ @$class }}">
            {{ $data->links('vendor.pagination.startup') }}
        </div>
    @endif
@endif
