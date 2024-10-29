@php
$header = @$header ?? true;
$footer = @$footer ?? true;
@endphp

<div class="modal" @if (@$id) id="{{ $id }}" @endif>
    <div class="modal-background"></div>
    @if (@$form)
        <form action="{{ @$form['action'] }}" method="{{ @$form['method'] }}" {!! @$moreFormAttr !!}>
    @endif
    <div class="modal-card">
        @if ($header === true)
            <header class="modal-card-head">
                <p class="modal-card-title">{!! @$title ?? 'Title' !!}</p>
                <button class="delete" aria-label="close"></button>
            </header>
        @endif
        <section
            class="modal-card-body {{ $header === false ? 'modal-body-rounded-top' : '' }} {{ $footer === false ? 'modal-body-rounded-bottom' : '' }}">
            {{ $slot }}
        </section>
        @if ($footer === true)
            <footer class="modal-card-foot is-flex is-justify-content-end">
                @if (!@$footerSlot)
                    <button class="button">Batal</button>
                    <button type="submit" class="button is-link">
                        {!! $submitText ?? '<i class="fa-solid fa-save mr-2"></i> Simpan' !!}
                    </button>
                @else
                    {!! $footerSlot !!}
                @endif
            </footer>
        @endif
    </div>
    @if (@$form)
        </form>
    @endif
</div>
