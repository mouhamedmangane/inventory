<div class="custom-control  custom-switch custom-control-inline" class="">

    <input  type="checkbox"
            name="{{ $name }}"
            value="{{ $value }}"
            id="{{ $attributes['id'] }}"
            @if ($attributes['checked']=='true')  checked="{{ $attributes['checked'] }}"  @endif
            class=" @if ($attributes['type'] == 'switch') custom-switch @else custom-checkbox @endif 
                    custom-control-input {{ $attributes['class'] }}"
            @isset($attributes['data'])
                @foreach ($attributes['data'] as $key=>$value ) data-{{ $key }}="{{ $value }}" @endforeach
            @endisset
    >

    <label for="{{ $attributes['id'] }}" class="custom-control-label">
    </label>
    
</div>
