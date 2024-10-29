<div class="dropdown {{ @$class }}">
    <div class="dropdown-trigger">
        @if (!@$buttonSlot)
            <button class="button" aria-haspopup="true"
                @if (@$id) aria-controls="{{ $id }}" @endif>
                <span>{{ $buttonText ?? 'Dropdown Button' }}</span>
                <span class="icon is-small">
                    <i class="fas fa-angle-down" aria-hidden="true"></i>
                </span>
            </button>
        @else
            {!! $buttonSlot !!}
        @endif
    </div>
    <div class="dropdown-menu" @if (@$id) id="{{ $id }}" @endif role="menu">
        <div class="dropdown-content">
            @if (@$content)
                @foreach ($content as $item)
                    <a href="{{ $item['url'] ?? '#' }}" class="dropdown-item">
                        {{ $item['title'] }}
                    </a>
                @endforeach
            @endif
            {{ @$contentSlot }}
        </div>
    </div>
</div>
