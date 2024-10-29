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
        <textarea name="{{ $name }}" id="{{ $id ?? $name }}"
            @if (@$placeholder) placeholder="{{ $placeholder }}" @endif
            class="form-control {{ @$class }} @error($name) is-invalid @enderror"
            @if (@$cols) cols="{{ @$cols }}" @endif
            @if (@$rows) rows="{{ $rows }}" @endif {{ $requiredd }} {{ $readonlyy }}
            {{ $disabledd }}>{{ $valuee }}</textarea>
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
                <textarea name="{{ $name }}" id="{{ $id ?? $name }}"
                    @if (@$placeholder) placeholder="{{ $placeholder }}" @endif
                    class="form-control {{ @$class }} @error($name) is-invalid @enderror"
                    @if (@$cols) cols="{{ @$cols }}" @endif
                    @if (@$rows) rows="{{ $rows }}" @endif {{ $requiredd }}
                    {{ $readonlyy }} {{ $disabledd }}>{{ $valuee }}</textarea>
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
