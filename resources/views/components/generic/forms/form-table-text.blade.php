<tr>
    <td style="white-space: nowrap;min-width:150px;" class="pl-3 py-3">
        {{ $labelText }}
        @if ($attributes['required'])
            <span class="text-danger ml-1">*</span>
        @endif
    </td>
    @isset ($attributes['required'])
        @props(['req'=> $attributes['required']])
    @else
        @props(['req'=> 'false'])
    @endif
    <td style="width: 100%;" class="mr-2" >
        <x-generic.input.text :name="$name" 
                              :value="$value"
                              id="{{ $attributes['id
                               '] }}" 
                              required="{{ $req }}"
                              placeholder="{{ $attributes['placeholder'] }}" />
    </td>
</tr>