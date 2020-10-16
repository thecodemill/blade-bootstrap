<label
    @if(@$for) for="{{ str_replace(['[', ']'], ['-', ''], $for) }}" @endif
    @if(@$class) class="{{ $class }}" @endif
    @foreach((array) @$attrs as $attrName => $attrValue)
        @if(is_int($attrName))
            {{ $attrValue }}
        @else
            {{ $attrName }}='{{ is_scalar($attrValue) ? $attrValue : json_encode($attrValue) }}'
        @endif
    @endforeach
>
    @if(@$raw)
        {!! @$title ?: @$slot !!}
    @else
        {{ @$title ?: @$slot }}
    @endif
    @if(@$required)
        @include('bbs::forms.required')
    @endif
</label>
