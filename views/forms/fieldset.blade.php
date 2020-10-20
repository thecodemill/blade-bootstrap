<fieldset
    @isset($id) id="{{ $id }}" @endisset
    @isset($class) class="{{ $class }}" @endisset
    @foreach((array) @$attrs as $attrName => $attrValue)
        @if(is_int($attrName))
            {{ $attrValue }}
        @else
            {{ $attrName }}='{{ is_scalar($attrValue) ? $attrValue : json_encode($attrValue) }}'
        @endif
    @endforeach
>
    @isset($legend)
        @include('bs::forms.legend', ['slot' => $legend])
    @endif

    {{ @$slot }}
</fieldset>
