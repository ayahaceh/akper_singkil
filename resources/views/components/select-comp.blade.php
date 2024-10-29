@php

$label_requiredd = @$required ? '<span class="text-danger">*</span>' : '';
$requiredd = @$required ? 'required' : '';
$readonlyy = @$readonly ? 'readonly' : '';
$disabledd = @$disabled ? 'disabled=disabled' : '';
$multiplee = @$multiple ? 'multiple' : '';

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
        <select name="{{ $name }}" id="{{ $id ?? $name }}"
            class="form-select {{ @$class }} @error($name) is-invalid @enderror" {{ $requiredd }}
            {{ $readonlyy }} {{ $disabledd }} {{ $multiplee }}>
            {{ $slot }}
        </select>
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
                <select name="{{ $name }}" id="{{ $id ?? $name }}"
                    class="form-select {{ @$class }} @error($name) is-invalid @enderror" {{ $requiredd }}
                    {{ $readonlyy }} {{ $disabledd }} {{ $multiplee }}>
                    {{ $slot }}
                </select>
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
