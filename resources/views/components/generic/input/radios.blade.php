@foreach ($dt as $key=>$item)
    <div class="custom-control 
                @if ($attributes['type'] == 'switch') 
                    custom-switch
                @else
                    custom-radio
                @endif custom-control-inline ml-2">
       
        <input  type="radio" 
                name="{{ $name }}"
                value="{{ $key }}"
                id="{{ $attributes['id']}}-{{ $key}}" 
                class="custom-control-input" 
                @if ($key == $value) 
                    checked="true" 
                @endif  
        >    
       
        <label for="{{ $attributes['id']}}-{{ $key}}" class="custom-control-label">{{ $item }}</label>

    </div>
@endforeach