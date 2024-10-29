@if (@$data)
    @if ($data->total() > $data->perPage())
        <div class="card-footer {{ @$class }}">
            {{ $data->links('vendor.pagination.bootstrap-5') }}
        </div>
    @endif
@endif
