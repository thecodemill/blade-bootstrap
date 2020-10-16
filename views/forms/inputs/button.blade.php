@if(@$type == 'link')
    <a
        id="{{ str_replace(['[', ']'], ['-', ''], @$id) }}"
        class="{{ trim('btn ' . @$class) }}"
        href="{{ @$href ?: '#' }}"
        @foreach((array) @$attrs as $attrName => $attrValue)
            @if(is_int($attrName))
                {{ $attrValue }}
            @else
                {{ $attrName }}='{{ is_scalar($attrValue) ? $attrValue : json_encode($attrValue) }}'
            @endif
        @endforeach
    >
        @if(@$raw)
            {!! @$label ?: @$slot !!}
        @else
            {{ @$label ?: @$slot }}
        @endif
    </a>
@else
    <button
        id="{{ str_replace(['[', ']'], ['-', ''], @$id) }}"
        class="{{ trim('btn ' . @$class) }}"
        type="{{ @$type ?: 'button' }}"
        @if(@$name) name="{{ $name }}" @endif
        @if(@$value) value="{{ $value }}" @endif
        {{ @$disabled ? 'disabled' : '' }}
        @foreach((array) @$attrs as $attrName => $attrValue)
            @if(is_int($attrName))
                {{ $attrValue }}
            @else
                {{ $attrName }}='{{ is_scalar($attrValue) ? $attrValue : json_encode($attrValue) }}'
            @endif
        @endforeach
    >
        @if(@$raw)
            {!! @$label ?: @$slot !!}
        @else
            {{ @$label ?: @$slot }}
        @endif
    </button>
@endif
