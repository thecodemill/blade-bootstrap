<div
    id="{{ str_replace(['[', ']'], ['-', ''], @$id) }}"
    class="{{ @$class . (@$error ? ' is-invalid' : '') }}"
    @foreach((array) @$attrs as $attrName => $attrValue)
        @if(is_int($attrName))
            {{ $attrValue }}
        @else
            {{ $attrName }}='{{ is_scalar($attrValue) ? $attrValue : json_encode($attrValue) }}'
        @endif
    @endforeach
>{{ @$slot }}</div>
