<select
    id="{{ str_replace(['[', ']'], ['-', ''], @$id) }}"
    class="{{ trim('custom-select ' . @$class) . (@$error ? ' is-invalid' : '') }}"
    @if(@$name) name="{{ $name }}" @endif
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
    @if(@$placeholder)
        <option value="" @if(@$required) disabled @endif @if(@$value === false) selected @endif>{{ $placeholder }}</option>
    @endif

    @foreach(array_filter(['preOptions' => @$preOptions, 'options' => @$options]) as $optionType => $options)
        @foreach((array) $options as $optionValue => $optionLabel)
            <option
                value="{{ $optionValue }}"
                @if((string) $optionValue === @$value) selected @endif
                @if(is_array($optionLabel) && $optionLabel['attrs'])
                    @foreach($optionLabel['attrs'] as $attrName => $attrValue)
                        @if(is_int($attrName))
                            {{ $attrValue }}
                        @else
                            {{ $attrName }}='{{ is_scalar($attrValue) ? $attrValue : json_encode($attrValue) }}'
                        @endif
                    @endforeach
                @endif
            >{{ is_array($optionLabel) ? $optionLabel['label'] : $optionLabel }}</option>
        @endforeach

        @if($optionType == 'preOptions')
            <option val="" disabled>––––––––––––––––––––</option>
        @endif
    @endforeach
</select>
