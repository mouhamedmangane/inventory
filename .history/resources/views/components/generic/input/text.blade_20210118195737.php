<input  type="@if($type){{ $type }}@else text @endif" 
        name="{{ $name }}" 
        value="{{ $value }}"
        id="{{ $attributes['id'] }}" 
        class="form-control @if ($attributes['sm']) form-control-sm @endif {{ $attributes['class'] }}"
        @if($attributes['required'] && $attributes['requiredt']=='true')
                required="true"    
        @endif
        placeholder="{{ $attributes['placeholder'] }}"
        style="{{ $attributes['style'] }}">