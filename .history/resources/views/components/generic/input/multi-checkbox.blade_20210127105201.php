@foreach ($dt as $key=>$item)
<div class="custom-control 
            @if ($attributes['type'] == 'switch') 
                custom-switch
            @else
                custom-checkbox
            @endif  custom-control-inline ml-2">
   
    <input  type="checkbox" 
            name="{{ $name }}[]"
            id="{{ $attributes['id']}}-{{ $key}}" 
            class="custom-control-input" 
            value={{ $key }}
            @if (in_array($key,$value)) 
                checked="true" 
            @endif 
    />    
   
    <label for="{{ $attributes['id']}}_{{ $key}}" class="custom-control-label">
        {{ $item }}
    </label>
    
</div>
@endforeach