@props(['disposition'=>$attributes['disposition']])
<tr class="n-form-table-row ">

    <td style="white-space: nowrap;min-width:150px;" 
        class=" n-form-table-col-label pl-3 py-3 ">
        {{ $label }}e{{$attributes['disposition']}}
    </td>

    <td style="width: 100%;" class="mr-2 n-form-table-col-input" >
        {{ $slot }}
        <div class="form-table-feedback">
            
        </div>
    </td>
</tr>