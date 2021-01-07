@isset ($attributes['required'])
        @props(['req'=> $attributes['required']])
@else
        @props(['req'=> 'false'])
@endif

<x-generic.forms.form-table-line class="{{ $attributes['class'] }}">

    <x-slot name="label">
        <x-generic.forms.form-table-label  :labelText="$labelText" :required="$req" />
    </x-slot>

    <x-generic.input.multi-checkbox :name="$name" 
                            :dt="$dt"
                            :value="$value"
                            id="{{ $attributes['id'] }}" 
                            required="{{ $req }}"
                            type="{{ $attributes['type'] }}"
                            />
</x-generic.forms.form-table-line>