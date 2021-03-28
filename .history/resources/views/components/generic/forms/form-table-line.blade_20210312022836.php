@props(['disposition'=>$attributes['disposition']])
<tr class="n-form-table-row ">

    <td style="white-space: nowrap;min-width:150px;@if($disposition=='block')display:block; padding-bottom: 5px!important;@endif" 
        class=" n-form-table-col-label pl-3 py-3 ">
        {{ $label }}e{{$disposition}}
    </td>

    <td style="width: 100%;@if($disposition=='block')display:block;@endif" class="mr-2 n-form-table-col-input" >
        {{ $slot }}
        <div class="form-table-feedback">
            
        </div>
    </td>
</tr>