<select name="{{ $name }}" id="{{ $attributes['id'] }}" 
        class="custom-select {{ $attributes['class'] }}" 
        @if($attributes['required'] && $attributes['required']=='true')
                required 
        @endif
<<<<<<< HEAD
        @if($attributes['disabled'] && $attributes['disabled']=='true')
            disabled
        @endif
=======
>>>>>>> 3d9119e184b9abe2f3cc882c372b2137e868f455
    >
    @foreach ($dt as $key=>$text )
        <option value="{{ $key }}" 
                @if ($key == $value) 
                    selected="true"
                @endif>
            {{ $text }}
        </option>
    @endforeach
</select>