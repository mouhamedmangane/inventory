<tr class="n-form-table-row ">

    <td style="white-space: nowrap;min-width:150px;@if($attributes['dispositon'])display:block; padding-bottom: 5px!important;@and" 
        class=" n-form-table-col-label pl-3 py-3 ">
        {{ $label }}
    </td>

    <td style="width: 100%;display:block;" class="mr-2 n-form-table-col-input" >
        {{ $slot }}
        <div class="form-table-feedback">
            
        </div>
    </td>
</tr>