@if($attributes['required'])
        @props(['req'=> $attributes['required']])
@else
        @props(['req'=> 'false'])
@endif

<x-generic.forms.form-table-line class="{{ $attributes['class'] }}" disposition="{{ $attributes['disposition'] }}" :idMessage="'form__message__'.$name">

    <x-slot name="label">
        <x-generic.forms.form-table-label  :labelText="$labelText" required="{{ $req }}"  disposition="{{ $attributes['disposition'] }}" />
    </x-slot>
    
    <x-generic.input.telephone :name="$name" 
                               :indicatif="$indicatif"
                               :numero="$numero"
                               id="{{ $attributes['id'] }}" 
                               required="{{ $req }}"
                               placeholder="{{ $attributes['placeholder'] }}" />
    
</x-generic.forms.form-table-line>