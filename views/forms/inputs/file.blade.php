<div class="{{ trim('custom-file ' . @$class) }}">
    <input
        id="{{ str_replace(['[', ']'], ['-', ''], @$id) }}"
        class="{{ trim('custom-file-input ' . (@$error ? 'is-invalid' : '')) }}"
        type="file"
        @if(@$name) name="{{ $name }}" @endif
        {{ @$required ? 'required' : '' }}
        {{ @$autofocus ? 'autofocus' : '' }}
        {{ @$disabled ? 'disabled' : '' }}
        @foreach((array) @$attrs as $attrName => $attrValue)
            @if(is_int($attrName))
                {{ $attrValue }}
            @else
                {{ $attrName }}='{{ is_scalar($attrValue) ? $attrValue : json_encode($attrValue) }}'
            @endif
        @endforeach
    >
    <span class="custom-file-label" for="{{ str_replace(['[', ']'], ['-', ''], @$id) }}">{{ @$placeholder ?: '…' }}</span>
</div>