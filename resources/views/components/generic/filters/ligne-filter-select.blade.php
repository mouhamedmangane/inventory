@props(['idd'=>App\ViewModel\GenId::newId()])
@foreach ($datas as $valeur => $label)
<a class="{{ $attributes['class'] }} dropdown-item text-sm ligne-filter-select p-0 " 
    style="font-size: 14px;">
    <span class="form-check form-check-inline w-100 d-inline-block" style="padding: 4px 10px">
        <input class="form-check-input ligne-filter-select-input" type="checkbox" id="{{ $idd }}__{{ $loop->index }}" value="option1">
        <label class="form-check-label w-100" for="{{ $idd }}__{{ $loop->index }}">{{ $label }}</label>
    </span>
    <input type="hidden" name="{{ $name }}[]" value="{{ $valeur }}" >
    <input type="hidden" name="{{ $name }}__filter_op[]" value="egal" >
    <input type="hidden" name="{{ $name }}__liaison" value="et">
</a>  
@endforeach


    
    

