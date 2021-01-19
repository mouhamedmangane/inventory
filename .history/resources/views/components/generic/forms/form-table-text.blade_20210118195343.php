@isset ($attributes['required'])
        @props(['req'=> $attributes['required']])
@else
        @props(['req'=> 'false'])
@endif

<x-generic.forms.form-table-line class="{{ $attributes['class'] }}">

    <x-slot name="label">
        <x-generic.forms.form-table-label  :labelText="$labelText" required="{{ $req }}" />
    </x-slot>
    
    <x-generic.input.text :name="$name" 
                          :type="$attributes['typpe']"
                          :value="$value"
                          id="{{ $attributes['id'] }}" 
                          @if($req)
                                required
                          @endif
                          placeholder="{{ $attributes['placeholder'] }}" />
    
</x-generic.forms.form-table-line>