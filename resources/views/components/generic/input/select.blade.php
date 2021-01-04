<select name="{{ $name }}" id="{{ $attributes['id'] }}" class="custom-select {{ $attributes['class'] }}" >
    @foreach ($data as $key=>$text )
        <option value="{{ $key }}">{{ $text }}</option>
    @endforeach
</select>