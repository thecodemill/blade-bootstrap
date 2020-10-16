<input
    id="{{ str_replace(['[', ']'], ['-', ''], @$id) }}"
    class="{{ trim('form-control-plaintext ' . @$class) . (@$error ? ' is-invalid' : '') }}"
    type="text"
    @if(@$value) value="{{ $value }}" @endif
    readonly
    @foreach((array) @$attrs as $attrName => $attrValue)
        @if(is_int($attrName))
            {{ $attrValue }}
        @else
            {{ $attrName }}='{{ is_scalar($attrValue) ? $attrValue : json_encode($attrValue) }}'
        @endif
    @endforeach
>
