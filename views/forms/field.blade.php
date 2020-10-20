@component('bbs::forms.group', [
    'class' => trim((in_array(@$field['type'], ['checkbox', 'radio']) ? 'custom-control custom-' . $field['type'] . ' ' : '') . ' ' . (@$group['class'] ?: @$field['class'])) . (@$field['required'] ? ' required' : '') . (@$field['error'] ? ' has-error ' : ''),
] + (array) @$group)

    {{ @$pre }}

    @if(!in_array(@$field['type'], ['checkbox', 'radio']))
        @include('bbs::forms.label', [
            'for' => @$label['for'] ?: (@$field['namespace'] ? $field['namespace'] . '-' . @$field['name'] : 'input-' . @$field['name']),
            'title' => @$label['title'] ?: @$field['label'],
            'required' => @$field['required'],
            'class' => trim(in_array(@$field['type'], ['checkbox', 'radio']) ? 'custom-control-label ' . @$label['class'] : @$label['class']),
        ] + (array) @$label)
    @endif

    @include('bbs::forms.inputs.' . (@$field['type'] ?: 'text'), [
        'id' => @$input['id'] ?: (@$field['namespace'] ? $field['namespace'] . '-' . @$field['name'] : 'input-' . @$field['name']),
        'class' => @$input['class'],
        'name' => @$input['name'] ?: @$field['name'],
        'placeholder' => @$input['placeholder'] ?: @$field['placeholder'],
        'options' => (array) (@$input['options'] ?: @$field['options']),
        'preOptions' => (array) (@$input['preOptions'] ?: @$field['preOptions']),
        'value' => array_key_exists('value', (array) @$input) ? $input['value'] : @$field['value'],
        'checked' => @$input['checked'] ?: @$field['checked'],
        'required' => array_key_exists('required', (array) @$input) ? $input['required'] : @$field['required'],
        'autofocus' => array_key_exists('autofocus', (array) @$input) ? $input['autofocus'] : @$field['autofocus'],
        'maxlength' => @$input['maxlength'] ?: 190,
        'error' => (bool) @$field['error'],
    ] + (array) @$input)

    @if(in_array(@$field['type'], ['checkbox', 'radio']))
        @include('bbs::forms.label', [
            'for' => @$label['for'] ?: (@$field['namespace'] ? $field['namespace'] . '-' . @$field['name'] : 'input-' . @$field['name']),
            'title' => @$label['title'] ?: @$field['label'],
            'required' => @$field['required'],
            'class' => trim(in_array(@$field['type'], ['checkbox', 'radio']) ? 'custom-control-label ' . @$label['class'] : @$label['class']),
        ] + (array) @$label)
    @endif

    @if(@$field['error'])
        @include('bbs::forms.error', [
            'message' => $field['error'],
        ] + (array) @$error)
    @endif

    {{ @$post }}

@endcomponent
