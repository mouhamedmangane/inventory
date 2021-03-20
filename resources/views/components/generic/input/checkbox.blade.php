<div class="custom-control  custom-switch custom-control-inline">

    <input  type="checkbox"
        name="{{ $name }}"
        value="{{ $value }}"
        id="{{ $attributes['id'] }}"
        @if ($attributes['checked']=='true')
            checked="{{ $attributes['checked'] }}"
        @endif
        class="custom-control-input"
    >

    <label for="{{ $attributes['id'] }}" class="custom-control-label">
    </label>
    
</div>
