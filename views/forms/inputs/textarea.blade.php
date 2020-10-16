<textarea
    id="{{ str_replace(['[', ']'], ['-', ''], @$id) }}"
    class="{{ trim('form-control ' . @$class) . (@$error ? ' is-invalid' : '') }}"
    @if(@$name) name="{{ $name }}" @endif
    cols="{{ @$cols ?: 30 }}"
    rows="{{ @$rows ?: 8 }}"
    @if(@$placeholder) placeholder="{{ $placeholder }}" @endif
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
>{{ @$value }}</textarea>