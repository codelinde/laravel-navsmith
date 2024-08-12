@foreach ($links as $name => $link)
    <li><a
            @if($attributes->has('class'))
                @class([
                    $attributes->get('class'),
                    $attributes->get('current') => $isCurrentLink($link) && !$attributes->has('style'),
                ])
            @endif
            @if($attributes->has('style'))
                @style([
                    $attributes->get('style'),
                    $attributes->get('current') => $isCurrentLink($link) && !$attributes->has('class'),
                ])
            @endif
            {{ $attributes
                ->filter(fn (string $_, string $key) => !in_array($key, ['current', 'class', 'style'], true))
            }}
            href="{{ $link }}"
        >{{ $name }}</a>
    </li>
@endforeach
