<input
    @isset($id) id="{{ str_replace(['[', ']'], ['-', ''], $id) }}" @endisset
    type="hidden"
    @if(@$name) name="{{ $name }}" @endif
    @if(@$value) value="{{ $value }}" @endif
    @foreach((array) @$attrs as $attrName => $attrValue)
        @if(is_int($attrName))
            {{ $attrValue }}
        @else
            {{ $attrName }}='{{ is_scalar($attrValue) ? $attrValue : json_encode($attrValue) }}'
        @endif
    @endforeach
>
