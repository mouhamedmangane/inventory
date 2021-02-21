<select  id="{{ $id }}">
    @foreach ($items as $item)
        <option value="{{ $item['filter'] }}">{{ $item['name'] }}</option>
    @endforeach
</select>