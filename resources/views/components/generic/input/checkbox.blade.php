
@if($attributes['id'])
    @props(['idd' => $attributes['id']])      
@else
    @props(['idd' => App\ViewModel\GenId::newId()]) 
@endif

<div class="custom-control  custom-switch custom-control-inline" class="">

    <input  type="checkbox"
            name="{{ $name }}"
            value="{{ $value }}"
            id="{{ $idd }}"
            @if ($attributes['checked']=='true')  checked="{{ $attributes['checked'] }}"  @endif
            class=" @if ($attributes['type'] == 'switch') custom-switch @else custom-checkbox @endif 
                    custom-control-input {{ $attributes['class'] }}"
            @isset($attributes['data'])
                @foreach ($attributes['data'] as $key=>$value ) data-{{ $key }}="{{ $value }}" @endforeach
            @endisset
    >

    <label for="{{ $idd }}" class="custom-control-label">
    </label>
    
</div>
