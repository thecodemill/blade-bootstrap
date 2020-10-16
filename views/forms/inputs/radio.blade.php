<input
    id="{{ str_replace(['[', ']'], ['-', ''], @$id) }}"
    class="{{ trim('custom-control-input ' . @$class) . (@$error ? ' is-invalid' : '') }}"
    type="radio"
    @if(@$name) name="{{ $name }}" @endif
    @if(@$value) value="{{ $value }}" @endif
    @if(@$checked) checked @endif
    {{ @$required ? 'required' : '' }}
    {{ @$autofocus ? 'autofocus' : '' }}
    {{ @$readonly ? 'readonly' : '' }}
    {{ @$disabled ? 'disabled' : '' }}
    @foreach((array) @$attrs as $attrName => $attrValue)
        @if(is_int($attrName))
            {{ $attrValue }}
        @else
            {{ $attrName }}='{{ is_scalar($attrValue) ? $attrValue : json_encode($attrValue) }}'
        @endif
    @endforeach
>
