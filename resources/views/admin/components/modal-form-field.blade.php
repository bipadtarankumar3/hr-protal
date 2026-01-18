@props([
    'name',
    'label',
    'type' => 'text',
    'value' => null,
    'placeholder' => '',
    'required' => false,
    'readonly' => false,
    'disabled' => false,
    'options' => [],
    'rows' => 3,
    'helpText' => null,
    'class' => '',
])

<div class="mb-3">
    <label for="{{ $name }}" class="form-label">
        {{ $label }}
        @if($required)
            <span class="text-danger">*</span>
        @endif
    </label>
    
    @if($type === 'textarea')
        <textarea 
            name="{{ $name }}" 
            id="{{ $name }}" 
            class="form-control {{ $class }}"
            rows="{{ $rows }}"
            placeholder="{{ $placeholder }}"
            @if($required) required @endif
            @if($readonly) readonly @endif
            @if($disabled) disabled @endif
        >{{ old($name, $value) }}</textarea>
    @elseif($type === 'select')
        <select 
            name="{{ $name }}" 
            id="{{ $name }}" 
            class="form-select {{ $class }}"
            @if($required) required @endif
            @if($readonly) readonly @endif
            @if($disabled) disabled @endif
        >
            <option value="">Select {{ $label }}</option>
            @foreach($options as $optionValue => $optionLabel)
                <option value="{{ $optionValue }}" @if(old($name, $value) == $optionValue) selected @endif>
                    {{ $optionLabel }}
                </option>
            @endforeach
        </select>
    @elseif($type === 'checkbox' || $type === 'radio')
        <div class="form-check">
            <input 
                type="{{ $type }}" 
                name="{{ $name }}" 
                id="{{ $name }}" 
                class="form-check-input {{ $class }}"
                value="{{ $value }}"
                @if(old($name)) checked @endif
                @if($required) required @endif
                @if($readonly) readonly @endif
                @if($disabled) disabled @endif
            >
            <label class="form-check-label" for="{{ $name }}">
                {{ $label }}
            </label>
        </div>
    @else
        <input 
            type="{{ $type }}" 
            name="{{ $name }}" 
            id="{{ $name }}" 
            class="form-control {{ $class }}"
            value="{{ old($name, $value) }}"
            placeholder="{{ $placeholder }}"
            @if($required) required @endif
            @if($readonly) readonly @endif
            @if($disabled) disabled @endif
        >
    @endif
    
    @if($helpText)
        <div class="form-text">{{ $helpText }}</div>
    @endif
    
    @error($name)
        <div class="text-danger small">{{ $message }}</div>
    @enderror
</div>

