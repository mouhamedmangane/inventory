<<<<<<< HEAD
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
=======
<div class="custom-control  custom-switch custom-control-inline">

    <input  type="checkbox"
        name="{{ $name }}"
        value="{{ $value }}"
        id="{{ $attributes['id'] }}"
        @if ($attributes['checked']=='true')
            checked="{{ $attributes['checked'] }}"
        @endif
        class="custom-control-input"
>>>>>>> 3d9119e184b9abe2f3cc882c372b2137e868f455
    >

    <label for="{{ $attributes['id'] }}" class="custom-control-label">
    </label>
    
</div>
