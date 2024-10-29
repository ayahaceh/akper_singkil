@if ($data)
    <ol class="breadcrumb">
        @foreach ($data as $key => $bread)
            <li class="breadcrumb-item @if (count($data) === $key + 1) active @endif">
                @if (count($data) !== $key + 1)
                    @if ($bread['url'] !== '#')
                        <a href="{{ $bread['url'] }}">
                    @endif
                @endif
                {{ $bread['title'] }}
                @if (count($data) !== $key + 1)
                    @if ($bread['url'] !== '#')
                        </a>
                    @endif
                @endif
            </li>
        @endforeach
    </ol>
@endif
