
<tr class="n-form-table-row ">

    <td style="white-space: nowrap;min-width:150px;@if($attributes['dispositon']=='block')display:block; padding-bottom: 5px!important;@endif" 
        class=" n-form-table-col-label pl-3 py-3 ">
        {{ $label }} {{}}
    </td>

    <td style="width: 100%;@if($attributes['dispositon']=='block')display:block;@endif" class="mr-2 n-form-table-col-input" >
        {{ $slot }}
        <div class="form-table-feedback">
            
        </div>
    </td>
</tr>