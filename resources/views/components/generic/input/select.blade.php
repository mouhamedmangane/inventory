<select name="{{ $name }}" id="{{ $attributes['id'] }}" class="custom-select {{ $attributes['class'] }}" >
    @foreach ($dt as $key=>$text )
        <option value="{{ $key }}" 
                @if ($key == $value) 
                    selected="true"
                @endif>
            {{ $text }}
        </option>
    @endforeach
</select>