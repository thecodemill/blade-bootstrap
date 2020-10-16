<input
    id="{{ str_replace(['[', ']'], ['-', ''], @$id) }}"
    class="{{ trim('form-control ' . @$class) . (@$error ? ' is-invalid' : '') }}"
    type="text"
    @if(@$name) name="{{ $name }}" @endif
    @if(@$value) value="{{ $value }}" @endif
    @if(@$placeholder) placeholder="{{ $placeholder }}" @endif
    @if(@$size) size="{{ $size }}" @endif
    @if(@$maxlength) maxlength="{{ $maxlength }}" @endif
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