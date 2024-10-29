@php

if (@$value) {
    $valuee = old($name, $value);
} else {
    $valuee = old($name);
}

$label_requiredd = @$required ? '<span class="text-danger">*</span>' : '';
$requiredd = @$required ? 'required' : '';
$readonlyy = @$readonly ? 'readonly' : '';
$disabledd = @$disabled ? 'disabled=disabled' : '';
$minn = @$min ? 'min=' . $min . '' : '';
$maxx = @$max ? 'max=' . $max . '' : '';
$minlengthh = @$minlength ? 'minlength=' . $minlength . '' : '';
$maxlengthh = @$maxlength ? 'maxlength=' . $maxlength . '' : '';

$theme = @$theme ? $theme : 'vertical';

@endphp

@if ($theme == 'vertical')
    <div class="mb-1">
        @if (@$label)
            <label for="{{ $id ?? $name }}" class="form-label">
                {{ $label }}
                {!! $label_requiredd !!}
            </label>
        @endif
        <input class="form-control {{ @$class }} @error($name) is-invalid @enderror" type="{{ $type }}"
            name="{{ $name }}" id="{{ $id ?? $name }}"
            @if (@$valuee) value="{{ $valuee }}" @endif
            @if (@$autofocus) autofocus="{{ $autofocus }}" @endif
            @if (@$placeholder) placeholder="{{ $placeholder }}" @endif
            @if (@$autocomplete) autocomplete="{{ $autocomplete }}" @endif {{ $requiredd }}
            {{ $readonlyy }} {{ $disabledd }} {{ $minn }} {{ $maxx }} {{ $minlengthh }}
            {{ $maxlengthh }} @if (@$onchange) onchange="{{ $onchange }}" @endif
            @if (@$onkeypress) onkeypress="{{ $onkeypress }}" @endif>
        @if (@$message)
            <p><small class="text-muted">{{ $message }}</small></p>
        @endif
        @error($name)
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>
@elseif ($theme == 'horizontal')
    <div class="col-12">
        <div class="mb-1 row">
            <div class="col-sm-3">
                <label for="{{ $id ?? $name }}" class="col-form-label">
                    {{ $label }}
                    {!! $label_requiredd !!}
                </label>
            </div>
            <div class="col-sm-9">
                <input class="form-control {{ @$class }} @error($name) is-invalid @enderror"
                    type="{{ $type }}" name="{{ $name }}" id="{{ $id ?? $name }}"
                    @if (@$valuee) value="{{ $valuee }}" @endif
                    @if (@$autofocus) autofocus="{{ $autofocus }}" @endif
                    @if (@$placeholder) placeholder="{{ $placeholder }}" @endif
                    @if (@$autocomplete) autocomplete="{{ $autocomplete }}" @endif
                    {{ $requiredd }} {{ $readonlyy }} {{ $disabledd }} {{ $minn }}
                    {{ $maxx }} {{ $minlengthh }} {{ $maxlengthh }}
                    @if (@$onchange) onchange="{{ $onchange }}" @endif
                    @if (@$onkeypress) onkeypress="{{ $onkeypress }}" @endif>
                @if (@$message)
                    <p><small class="text-muted">{{ $message }}</small></p>
                @endif
                @error($name)
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>
@endif
