@if (request()->has('cari') && strlen(request('cari')) !== 0)
    <p @if (@$class) class="{{ $class }}" @endif>
        Menampilkan hasil pencarian untuk <strong>{{ request('cari') }}</strong>
    </p>
@endif
