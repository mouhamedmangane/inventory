<div class="d-flex align-items-center justify-content-between pl-3 mt-1 w-100 flex-wrap-sm" style="overflow-x: hidden;">
    <div class="d-flex align-items-center my-2 n-col-sm-12">
        <div  class="bg-primary text-white rounded-circle border  text-align center d-flex align-items-center justify-content-center" 
        style="width: 35px; height: 35px;@if ($attributes['img'])border-color:black!important;@endif">
            {{ $image }}
        </div>
        {{ $slot }}
    </div>
    <div class="flex-grow-1 d-flex aligns-items-center pr-2 justify-content-end  " style="overflow-x: hidden;">
        {{ $right }}
    </div>
</div>