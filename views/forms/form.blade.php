<form
    @if(@$class) class="{{ $class }}" @endif
    method="{{ @$method == 'get' ? 'get' : 'post' }}"
    action="{{ @$action ?: '#' }}"
    enctype="multipart/form-data"
    @foreach((array) @$attrs as $attrName => $attrValue)
        @if(is_int($attrName))
            {{ $attrValue }}
        @else
            {{ $attrName }}='{{ is_scalar($attrValue) ? $attrValue : json_encode($attrValue) }}'
        @endif
    @endforeach
>
    @if(@$method && !in_array(@$method, ['get', 'post']))
        <input type="hidden" name="_method" value="{{ $method }}">
    @endif

    @if(@$method != 'get')
        {{ csrf_field() }}
    @endif

    {{ @$slot }}
</form>
