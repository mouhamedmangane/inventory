@props(['idd'=>App\ViewModel\GenId::newId()])
<a class="{{ $attributes['class'] }} dropdown-item text-sm ligne-filter-select p-0 " 
    style="font-size: 14px;">
    <span class="form-check form-check-inline w-100 d-inline-block" style="padding: 4px 10px">
        <input class="form-check-input ligne-filter-select-input" type="checkbox" id="{{ $idd }}" value="option1">
        <label class="form-check-label w-100" for="{{ $idd }}">{{ $label }}</label>
    </span>
    <div class="position-relative">
        <input type="text" name="{{ $name }}[]" value="{{ $valeur }}" 
                class="form-control form-control- mb-1 pl-3"
                style="margin-left: 10px;width:calc(100% - 20px)!important;" >
        <span class="position-absolute h-100 bg-info text-white d-flex align-items-center justify-content-center rounded" 
              style="top:0px;left:10px;width:13px;"> = </span>
    </div>
    <input type="hidden" name="{{ $name }}__filter_op[]" value="like" >
    <input type="hidden" name="{{ $name }}__liaison" value="ou">
</a>  
