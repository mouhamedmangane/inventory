<input  type="@if($type){{ $type }}@else text @endif" 
        name="{{ $name }}" 
        value="{{ $value }}"
        id="{{ $attributes['id'] }}" 
        class="form-control @if ($attributes['sm']) form-control-sm @endif {{ $attributes['class'] }}"
        required="{{ $attributes['required'] }}" 
        placeholder="{{ $attributes['placeholder'] }}">